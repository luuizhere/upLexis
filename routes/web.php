<?php
use App\Usuario;
use App\Artigo;

Route::get('/', 'ControladorLogin@index'); // LOGIN

Route::post('/auth', 'ControladorLogin@logar'); // Testa o user e senha

Route::post('/getArtigos','ControladorGeral@pegaTitulo'); // FUncao de buscar os titles e retornar

Route::get('/negado' ,function(){
	return "Acesso negado.";
})->name('negado');

Route::get('/consulta', function(){
	$artigos = Artigo::all();
    $idusuario = Usuario::all();
    return view('consulta',[
            'artigos' => $artigos, 
            'usuario' => $idusuario
        ]);
}); // View de consulta

Route::get('/buscar', function () {
    return view('search');
});

Route::get('/loginteste', function(){
	return view('logar');
});