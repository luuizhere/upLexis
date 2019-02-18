<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\DB;
class ControladorLogin extends Controller
{
	public function index()
    {
        return view('logar');
    }


    public function logar(Request $request){
    	$login_ok = false;   // VARIAVEL DE INICIAÇÃO PARA TESTE DE LOGIN
    	$regras = [
            'login' => 'required',
            'senha' => 'required'
        ];
        $mensagens = [
            'required' => 'O campo :attribute precisa ser preenchido',
        ];
        $request->validate($regras,$mensagens); 
    		$users = DB::table('usuarios')
    		->where('usuario',$request->login)
    		->where('senha',$request->senha)
    		->get();
    		if(count($users)>0){
    			//$loginsave = $request->login;
    			//return view('search',compact('loginsave'));
    			$login = ['usuario' => $request->input('login')];
				$request->session()->put('login',$login);
                $resultados = 0;
                $request->session()->put('404',$resultados);
				//return response("Login ok",200);
				return view('search');
    		}else{
    			$login_ok = 1;
                $request->session()->flush();
                $request->session()->put('loginfail',$login_ok);
				//return view('logar');
                return redirect('/');
            } 	
    }
}
