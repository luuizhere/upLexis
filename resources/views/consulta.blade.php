@extends('layout.app')  
@if(session()->has('login'))

<div class="card border">
	<div class="card-body">
		<h5 class="card-title">Consulta de requisições</h5>
		<table class="table">
 				<thead class="thead-dark">
 					<tr>
 						<th>Titulo</th>
 						<th>Link</th>
 						<th>Usuario</th>
 					</tr>
 				</thead>
 				<tbody>
					@foreach($artigos as $a)
						<tr>
		 					<td>{{$a->titulo}}</td>
		 					<td>{{$a->link}}</td>
		 					<td>{{$a->usuario->usuario}}</td>
		 				</tr>
					@endforeach
				</tbody>
 		</table>
	</div>
</div>

@endif
@if(!session()->has('login'))
	<div class="alert alert-danger">
		<b>Voce precisa estar logado para acessar essa pagina</b>
	</div>
@endif