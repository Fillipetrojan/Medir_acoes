<!DOCTYPE html>
<html>
<head>
	<title>Cadastro Endereço</title>


<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin="anonymous">
</script>

<script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
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
		action="Cadastrar Endereco"
		method="POST">
			
		@csrf

			<div class="form-group">
				<label for="I_nome">Nome da rua</label>
				<input type="text"
				class="form-control"
				id="I_nome"
				name="T_nome">	
			</div>


			<div class="form-group">
				<label for="I_numero">Numero</label>
				<input type="text"
				class="form-control"
				id="I_numero"
				name="T_numero">	
			</div>

			<div class="form-group">
				<label for="I_CEP">CEP</label>
				<input type="text"
				class="form-control"
				id="I_CEP"
				name="T_CEP">	
			</div>

			<div class="form-group">
				<label for="I_bairro">bairro</label>
				<input type="text"
				class="form-control"
				id="I_bairro"
				name="T_bairro">	
			</div>

			<div class="form-group">
				<select class="form-select"
				aria-label="Default select example"
				id="estado" name="T_estado">
				    <option value="AC">Acre</option>
				    <option value="AL">Alagoas</option>
				    <option value="AP">Amapá</option>
				    <option value="AM">Amazonas</option>
				    <option value="BA">Bahia</option>
				    <option value="CE">Ceará</option>
				    <option value="DF">Distrito Federal</option>
				    <option value="ES">Espírito Santo</option>
				    <option value="GO">Goiás</option>
				    <option value="MA">Maranhão</option>
				    <option value="MT">Mato Grosso</option>
				    <option value="MS">Mato Grosso do Sul</option>
				    <option value="MG">Minas Gerais</option>
				    <option value="PA">Pará</option>
				    <option value="PB">Paraíba</option>
				    <option value="PR">Paraná</option>
				    <option value="PE">Pernambuco</option>
				    <option value="PI">Piauí</option>
				    <option value="RJ">Rio de Janeiro</option>
				    <option value="RN">Rio Grande do Norte</option>
				    <option value="RS">Rio Grande do Sul</option>
				    <option value="RO">Rondônia</option>
				    <option value="RR">Roraima</option>
				    <option value="SC">Santa Catarina</option>
				    <option value="SP">São Paulo</option>
				    <option value="SE">Sergipe</option>
				    <option value="TO">Tocantins</option>
				    <option value="EX">Estrangeiro</option>
				</select>
			</div>



			<div class="form-group">
				<label for="I_cidade">Cidade</label>
				<input type="text"
				class="form-control"
				id="I_cidade"
				name="T_cidade">	
			</div>

			<div class="form-group">
				

			<select class="custom-select"
			name="T_empresa">


			    <option selected>Empresa</option>
			    @foreach($html_empresa as $exibir_empresa)

			    <option value="{{$exibir_empresa['id_empresa']}}">
			    	{{$exibir_empresa['nome_empresa']}}
			    </option>

			    @endforeach

  			</select>

			</div>

			<button type="submit" class="btn btn-primary">Cadastrar</button>

		</form>


	</header>

</body>
</html>