<?php
use App\Usuario;
use App\Artigo;

Route::get('/', 'ControladorGeral@index'); // LOGIN

Route::post('/auth', 'ControladorGeral@logar'); // Testa o user e senha

Route::post('/getArtigos','ControladorGeral@pegaTitulo'); // FUncao de buscar os titles e retornar

Route::get('/consulta', function(){
	$artigos = Artigo::all();
    $idusuario = Usuario::all();
    return view('consulta',[
            'artigos' => $artigos, 
            'usuario' => $idusuario
        ]);
}); // View de consulta

Route::get('/404', function () {
    return view('404');
});

Route::get('/buscar', function () {
    return view('search');
});

Route::get('/loginteste', function(){
	return view('logar');
});