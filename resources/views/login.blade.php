@extends('layout.app')	
<div class="card border">
	<div class="card-body">	
		<form action="/auth" method="POST">
		@csrf
		<label for="login">Login</label>
		<input type="text" name="login"  class="form-control" id="login" placeholder="Digite o usuario">
		<label for="senha">Senha</label>
		<input type="password" name="senha"  class="form-control" id="senha" placeholder="Digite a senha">
		</br>
		<div class="card border">
			<button type="submit" class="btn btn-primary btn-sm">Logar</button>
		</div>
		@if($errors->any())
					<div class="card-footer">
						@foreach($errors->all() as $error)
						<div class="alert alert-danger" role="alert">
							{{$error}}
						</div>
						@endforeach

					</div>
				@endif
		</form>
	</div>	
</div>
