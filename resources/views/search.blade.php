@extends('layout.app')  

@if(session()->has('login'))

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">upLexis - Buscar artigos</h5>
            <hr>
            <form class="form-signin" action="/getArtigos" method="post">
              @csrf
              <div class="form-label-group">
              	<input type="hidden" name="user" value="" placeholder="Digite sua busca">
                <input type="text" name ="s" id="s" class="form-control" placeholder="Digite seu usuario" required autofocus>
              </div>
              <hr>
              <button class="btn btn-sm btn-primary btn-block text-uppercase" type="submit">Buscar Artigos</button>
            </form>
            <a href="/consulta" class="btn btn-sm btn-warning btn-block text-uppercase" type="submit">Consultar Artigos</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

@endif

@if(!session()->has('login'))
	<div class="alert alert-danger">
		<b>Voce precisa estar logado para acessar essa pagina</b>
	</div>
@endif
@if($errors->any())
					<div class="card-footer">
						@foreach($errors->all() as $error)
						<div class="alert alert-danger" role="alert">
							{{$error}}
						</div>
						@endforeach

					</div>
@endif
@if(!session()->has('404'))
  <div class="alert alert-warning">
    <b>Desculpe, nenhum resultado encontrado.</b>
  </div>
@endif