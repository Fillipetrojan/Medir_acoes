<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',
	function ()
	{
		require_once("../src/classes.php");

		require_once("../src/conectar.php");

		$acao=new Acao;

		$html_acao=$acao->consultar_form_acao($conectar);


    	return view('consult/consultar_ultimo_valor',
    	['html_acao'=>$html_acao]);
	}
);



Route::get
('/Cadastro Empresa',
	function ()
	{	
    	return view('form/cadastro_empresa');
	}

);


Route::post
('/Cadastrar Empresa',
	function ()
	{	
		
		require_once("../src/classes.php");

		require_once("../src/conectar.php");

		try
		{
			$empresa= new Empresa;

			$empresa->Cadastrar_empresa($conectar);

			return redirect('Cadastro Empresa');

		} catch (Exception $e)
		{
			
		}
	}

);



Route::get
('/Consultar Ação',
	function ()
	{	
		
		require_once("../src/classes.php");

		require_once("../src/conectar.php");

		$acao=new Acao;

		$empresa=new Empresa;

		$contato= new Contato;

		$endereco=new Endereco;


		$html_acao=$acao->consultar_form_acao($conectar);

		$html_valor_acao=$acao->return_valor_atual($conectar);

		foreach($html_valor_acao as $exibir_acao)
		{
			$id_empresa=$exibir_acao['id_empresa'];
		}

		$html_empresa=$empresa->consultar_empresa_id($conectar, $id_empresa);


		$html_acao_empresa=$acao->consultar_acao_empresa($conectar, $id_empresa);

		$html_contato=$contato->consultar_contato_empresa($conectar, $id_empresa);

		$html_endereco=$endereco->consultar_endereco_empresa($conectar, $id_empresa);

		return view("consult/consultar_ultimo_valor",
		compact(
		'html_acao','html_valor_acao',
		'html_acao_empresa',
		'html_empresa',
		'html_contato',
		'html_endereco'));
	}//// fim function ()

);



Route::post
('/Cadastrar Ação',
	function ()
	{	
		
		require_once("../src/classes.php");

		require_once("../src/conectar.php");

		try
		{
			$acao=new Acao;

			$acao->Cadastrar_acao($conectar);

			return redirect('Cadastro Ação');
			
		} catch (Exception $e)
		{
			
		}
	}

);




Route::get
('/Cadastro Ação',
	function ()
	{	
		
		require_once("../src/classes.php");

		require_once("../src/conectar.php");

		try
		{
			$empresa= new Empresa;

			$html_empresa=$empresa->consultar_form_empresa($conectar);

			return view('form/cadastro_acao',
			['empresa'=>$html_empresa]);
			
		} catch (Exception $e)
		{
			
		}
	}

);


Route::get
('/Cadastro Balanço',
	function ()
	{	
		
		require_once("../src/classes.php");

		require_once("../src/conectar.php");

		$acao=new Acao;

		$html_acao=$acao->consultar_form_acao($conectar);

		return view("form/cadastro_balanco",
		['acao'=>$html_acao]);
	}

);


Route::post
('/Cadastrar Balanço',
	function ()
	{	
		
		require_once("../src/classes.php");

		require_once("../src/conectar.php");

		$acao=new Acao;

		$acao->cadastrar_balanco($conectar);

		return redirect('Cadastro Balanço');

	}

);





Route::get
('/Cadastro Contato',
	function ()
	{	
		
		require_once("../src/classes.php");

		require_once("../src/conectar.php");


		$empresa= new Empresa;

		$html_empresa=$empresa->consultar_form_empresa($conectar);

		return view("form/cadastro_contato",
		['html_empresa'=>$html_empresa]);
	}

);



Route::post
('/Cadastrar Contato',
	function ()
	{	
		
		require_once("../src/classes.php");

		require_once("../src/conectar.php");

		$contato=new Contato;

		$contato->cadastro_contato($conectar);

		return redirect('Cadastro Contato');
	}

);



Route::get
('/Cadastro Endereco',
	function ()
	{	
		
		require_once("../src/classes.php");

		require_once("../src/conectar.php");



		$empresa= new Empresa;

		$html_empresa=$empresa->consultar_form_empresa($conectar);

		return view("form/cadastro_endereco",
		['html_empresa'=>$html_empresa]);



	}

);

Route::post
('/Cadastrar Endereco',
	function ()
	{	
		
		require_once("../src/classes.php");

		require_once("../src/conectar.php");

		$endereco= new Endereco;

		$endereco->cadastro_endereco($conectar);

		return redirect('Cadastro Endereco');
	}

);

