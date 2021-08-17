<!DOCTYPE html>
<html>
<head>
	<title>Cadastro Empresa</title>


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
	


header
{
	margin-left: 30px;

	width: 50%;
}

</style>


</head>
<body>


	<header>
		
		<form
		action="Cadastrar Balanço"
		method="POST">
			
		@csrf


			<div class="form-group">
				<label for="I_valor_prev">Valor Previsto</label>
				<input type="text"
				class="form-control"
				id="I_valor_prev"
				name="T_valor_prev">	
			</div>

			<div class="form-group">
				<label for="I_analista">Numero de Analistas</label>
				<input type="text"
				class="form-control"
				id="I_analista"
				name="T_analista">	
			</div>


			<div class="form-group">
				

			<select class="custom-select"
			name="T_acao">


			    <option selected>Ação / Empresa</option>
			    @foreach($acao as $exibir_acao)

			    <option value="{{$exibir_acao['id_acao']}}">
			    	{{$exibir_acao['simbolo_acao']}} / {{$exibir_acao['nome_empresa']}}
			    </option>

			    @endforeach

  			</select>

			</div>

			<button type="submit" class="btn btn-primary">Cadastrar</button>

		</form>


	</header>

</body>
</html>