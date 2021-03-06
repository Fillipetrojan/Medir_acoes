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
		action="Cadastrar Empresa"
		method="POST">
			
		@csrf

			<div class="form-group">
				<label for="I_nome">Nome da empresa</label>
				<input type="text"
				class="form-control"
				id="I_nome"
				name="T_nome">
				
			</div>


			<div class="form-group">
				<label for="I_simbolo">Simbolo da empresa</label>
				<input type="text"
				class="form-control"
				id="I_simbolo"
				name="T_simbolo">
				
			</div>

			<div class="form-group">
				<label for="I_CNPJ">CNPJ da empresa</label>
				<input type="text"
				class="form-control"
				id="I_CNPJ"
				name="T_CNPJ"
				placeholder="00.000.000/0000-00">
			</div>


			<div class="form-group">
				<label for="I_funcionario">Numero de Funcionarios</label>
				<input type="number"
				min="0"
				step="1" 
				class="form-control"
				id="I_funcionario"
				name="T_funcionario">
			</div>


			<div class="form-group">
				<label for="I_URL">Site</label>
				<input type="text"
				class="form-control"
				id="I_URL"
				name="T_URL">
			</div>

			<div class="form-group">
				<label for="I_CEO">CEO</label>
				<input type="text"
				class="form-control"
				id="I_CEO"
				name="T_CEO">
			</div>


			<div class="form-group">
		    <label for="I_desc">Descri????o</label>
		    <textarea class="form-control"
		    id="I_desc"
		    name="T_desc"
		    rows="3"></textarea>
		  	</div>


			<button type="submit" class="btn btn-primary">Cadastrar</button>

		</form>


	</header>

</body>
</html>