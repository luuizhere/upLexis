<?php

namespace App\Http\Controllers;
use App\Artigo;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControladorGeral extends Controller
{
    public function __construct(){
        $this->middleware('checklogin');
    }
         
    public function pegaTitulo(Request $request){ 
        $user = $request->session()->get('login');
        $regra = [
            's' => 'required',
        ];
        $mensagen = [
            'required' => 'Voce precisa digitar algo',
        ];
        $request->validate($regra,$mensagen); 
        $pegaid = DB::table('usuarios')
            ->where('usuario',$user)
            ->get();
            foreach($pegaid as $p){
                //echo $p->id;
            }
        $clearlink = str_replace(" ","+",$request->s); //REPLACE PARA RETIRAR OS ESPAÇOS DA STRING DIGITADA NO INPUT
        $regras = [                     //  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//
                's' => 'required',      //  Regras para o validar do campo //
        ];                              //  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//
        $mensagens = [
                'required' => 'O campo de busca precisa ser preenchido', //  Mensagem para Regras para o validar// 
        ];
        $request->validate($regras,$mensagens); 
        $inserirartigo = new Artigo();
    	$url = 'https://www.uplexis.com.br/blog/?s='.$clearlink;   // $clearlink => input com replace de espaço para +
    	$dadosSite = file_get_contents($url);
    	$titulomaior = explode('<div class="col-md-6 title">',$dadosSite); // explode na primeira classe do titulo maior 
        $cnt = count($titulomaior); // Contar quantos titulos foram encontrados no Blog
    if($cnt>1){
    	$fimtitulomaior = explode('</div>
                                                        <div class="col-md-6">',$titulomaior[1]); // Explode no objeto depois do desejado 
	    $pegatitulo1 = explode('<div class="title">',$dadosSite);//explode na segunda classe de titulo 
        $qtdTitulos = count($pegatitulo1);
    	$linktitulomaior = explode('<div class="col-md-6">
                                                            <a href="',$dadosSite);
	    $linkfimtitulomaior = explode('" class="btn-uplexis orange">',$linktitulomaior[1]);
	    $pegalinktitulo1 = explode('<div class="col-12 post" onclick="window.location.href=',$dadosSite);
    	$qtdlinkTitulos = count($pegalinktitulo1);
        $inserirartigo = new Artigo();
        $inserirartigo->titulo = $fimtitulomaior[0];   
        $inserirartigo->link = $linkfimtitulomaior[0];
        $inserirartigo->usuario_id = $p->id;
        $inserirartigo->save();
		for($a=1;$a<$qtdTitulos;$a++){
			$pegatitulo2 = explode('</div>
		                                                    <div class="wrap-button">',$pegatitulo1[$a]);//Segunda busca, para fazer uma limpeza melhor no explode
			$pegatitulo3 = explode('</div>
                                                    <div class="wrap-button">',$pegatitulo2[0]);//Terceira e ultima limpeza, onde conseguimos apenas o texto do titulo
			$pegalinktitulo2 = explode(' <div class="row image',$pegalinktitulo1[$a]);
			$pegalinktitulo3 = explode('">',$pegalinktitulo2[0]);
			$limpalink = str_replace("'","",$pegalinktitulo3[0]);
            $inserir = new Artigo();
            $inserir->titulo = $pegatitulo3[0];   
            $inserir->link = $limpalink;
            $inserir->usuario_id = $p->id;
            $inserir->save();
		}  
        $counttotal = $cnt+$qtdTitulos; //contagem de todos os artigos encontrados
        echo '<script>alert("Deu tudo certo foram encontrados  artigos!");</script>';
        //return redirect('consulta'); //Caso consiga encontrar os artigos buscados
        $artigos = Artigo::all();
        $idusuario = Usuario::all();
        return view('consulta',[
            'artigos' => $artigos, 
            'usuario' => $idusuario
        ]);
        }else{
            $resultados = 1;
            $request->session()->put('404',$resultados);
            return redirect('/buscar');
        } 

    }

}
