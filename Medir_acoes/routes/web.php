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

Route::get('/', function () {
    return view('consult/consultar_ultimo_valor');
});



Route::get
('/Cadastro Empresa',
	function ()
	{	
		
		require_once("../src/classes.php");
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

		##return redirect('Cadastro Balanço');

	}

);



/*
Route::get
('/Consultar Ações',
	function ()
	{	
		$html_acao
    	return view('consultar_ultimo_valor',
    	['acao'=>$teste]);
	}

);

*/