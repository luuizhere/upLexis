@extends('layout.app')
@if(isset($loginsave))
<div class="card border">

	<div class="card-body">	
		<div class="form-group">
		<form action="/getArtigos" method="post">
			@csrf
			<input type="hidden" name="user" value="{{$loginsave}}">
			<input type="text" name="s" class="form-control" placeholder="Digite sua busca">
		</div>	
			<button class="btn btn-sm btn-primary">Capturar</button>
			
		</form>
			<a href="/consulta" class="btn btn-sm btn-warning">Consultar requisições</a>

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