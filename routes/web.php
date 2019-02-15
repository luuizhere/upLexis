<?php
use App\Usuario;
use App\Artigo;

Route::get('/', 'ControladorGeral@index'); // LOGIN

Route::post('/auth', 'ControladorGeral@logar'); // Testa o user e senha

Route::post('/getArtigos','ControladorGeral@pegaTitulo'); // FUncao de buscar os titles e retornar

Route::get('/consulta', 'ControladorGeral@consultar'); // View de consulta

Route::get('/404', function () {
    return view('404');
});

Route::get('/buscar', function () {
    return view('search');
});