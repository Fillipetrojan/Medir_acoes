<!DOCTYPE html>
<html>
<head>
</head>
<body>


@if(isset($empresa))

	@foreach($empresa as $exibir_empresa)
	<hr>
	<div class="card">
	  <div class="card-header">
	    {{$exibir_empresa['simbolo_empresa']}}
	  </div>
	  <div class="card-body">
	    <h5 class="card-title">
	    {{$exibir_empresa['nome_empresa']}}/ CEO: {{$exibir_empresa['CEO']}}</h5>
	    <p class="card-text">
	@endforeach
@endif

    	<hr>

</body>
</html>