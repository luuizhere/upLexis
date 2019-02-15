@extends('layout.app')  
@if(isset($loginsave))

	<div class="container">
		<div class="row">
			<div class="col-9 col-md-7 mx-auto">
				<div class="row justify-content-center">
					<div class="card card-signin my-5">
						<div class="card-body">
							<h5 class="card-title text-center">upLexis - Buscar artigos</h5>
							<div class="form-label-group">
								<form action="/getArtigos" method="post">
									@csrf
										<input type="hidden" name="user" value="{{$loginsave}}" placeholder="Digite sua busca">
										<input type="text" name="s" class="form-control" placeholder="Digite sua busca" required autofocus>
		 								<hr>
										<button class="btn btn-sm btn-primary">Capturar</button>
								</form>
								<a href="/consulta" class="btn btn-sm btn-warning">Consultar requisições</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endif
@if(!isset($loginsave))
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