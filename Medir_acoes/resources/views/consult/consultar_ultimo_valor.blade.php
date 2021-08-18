<!DOCTYPE html>
<html>
<head>
	<title>Consultar Ultimo valor</title>


<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin="anonymous">
</script>

<script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous">
</script>

<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous">
</script>


<style type="text/css">
	

div
{
	margin-top: 10px;
}

hr
{
	height: 0px;
    border: none;
    border-top: 3px solid black;
}

header
{
	width: 75%;
}

ul
{
	width: 100%;
}

section#list
{
	float: left;
}


section#consult
{
	float: left;

	margin-left: 50px;

	width: 600px;
}


</style>


</head>
<body>
<header>

<section id="list">


<h3>Lista de empresas</h3>

<div>
	<ul class="list-group">

		@foreach($html_acao as $exibir_acao)

		<li class="list-group-item">
			<h6>{{$exibir_acao['nome_empresa']}}</h6> / 
	  		{{$exibir_acao['simbolo_acao']}}
	  	</li>
		@endforeach

	</ul>
</div>

</section>

<section id="consult">

	<form
	action="Consultar Ação"
	method="GET">


		<div class="form-group">
			<label for="I_simbolo">Digite o simbologo da Ação</label>
			<input type="text"
			class="form-control"
			id="I_simbolo"
			name="T_simbolo"
			placeholder="xxxx">
			<small id="I_simbolo"
			class="form-text text-muted">
			Escreva corretamente</small>
		</div>



		<button type="submit"
		class="btn btn-primary">
		Consultar</button>
		
	</form>


<hr>

@if(isset($html_valor_acao))
	
	@foreach($html_valor_acao as $exibir_acao)


		<ul class="list-group">

			<li class="list-group-item">
			Nome: {{$exibir_acao['simbolo_acao']}}
			</li>

			<li class="list-group-item">
			Valor: {{$exibir_acao['valor_atual']}}
			</li>

		</ul>

	@endforeach

@endif

@if(isset($html_empresa))

	@foreach($html_empresa as $exibir_empresa)
	<hr>
	<div class="card">
	  <div class="card-header">
	    {{$exibir_empresa['simbolo_empresa']}}
	  </div>
	  <div class="card-body">
	    <h5 class="card-title">
	    {{$exibir_empresa['nome_empresa']}}/ CEO: {{$exibir_empresa['CEO']}}</h5>
	    
	@endforeach
@endif


    <hr>
    <h4>Ações</h4>


    @if(isset($html_acao_empresa))
		<p class="card-text">

     	<ul class="list-group">


     	@foreach($html_acao_empresa as $exibir_acao_empresa)

			<li class="list-group-item">
			R$ {{$exibir_acao_empresa['valor_atual']}}
			/ {{$exibir_acao_empresa['simbolo_acao']}}
			</li>
		</ul>

		@endforeach

		</p>


	@endif

		<hr>

		<div>


	@if(isset($html_endereco))

		@foreach($html_endereco as $exibir_endereco)
			<h4>Endereço</h4>
			<p>
				<div>
					{{$exibir_endereco['nome_rua']}}
					{{$exibir_endereco['numero_rua']}} - 
					{{$exibir_endereco['CEP']}}
				</div>
				<div>{{$exibir_endereco['bairro']}}</div>
				<div>{{$exibir_endereco['cidade']}}
				/ {{$exibir_endereco['estado']}}</div>
				<div><h5>{{$exibir_endereco['pais']}}</h5></div>
			</p>
		@endforeach
	@endif
		</div>
	<p>
		<hr>
		<h5>Telefones</h5>

		@if(isset($html_contato))
			<ul class="list-group">

			@foreach($html_contato as $exibir_contato)
			

				<li class="list-group-item">
				({{$exibir_contato['DDD_telefone']}})
				{{$exibir_contato['numero_telefone']}}
				</li>
			@endforeach
			</ul>
		@endif


	</p>

  </div>
</div>


<hr>
</section>
</header>
</body>

</html>



