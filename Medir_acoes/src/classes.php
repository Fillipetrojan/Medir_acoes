<?php


class Empresa
{

	//====================================
	// INICIO INSERT
	//====================================

		function Cadastrar_empresa(&$con)
		{
			$sql_empresa="
			INSERT INTO empresa
			(simbolo_empresa, CNPJ_empresa,
			nome_empresa,
			numero_funcionarios,
			URL,
			CEO,
			nome_seguranca,
			DESC_empresa)
			VALUES
			(:simbolo_empresa, :CNPJ_empresa,
			:nome_empresa,
			:numero_funcionarios,
			:URL,
			:CEO,
			:nome_seguranca,
			:DESC_empresa)";

			$simbolo_empresa=$_POST['T_simbolo'];

			$CNPJ_empresa=$_POST['T_CNPJ'];

			$nome_empresa=$_POST['T_nome'];

			$numero_funcionarios=$_POST['T_funcionario'];

			$URL_empresa=$_POST['T_URL'];

			$CEO=$_POST['T_CEO'];

			$nome_seguranca=$nome_empresa;

			$DESC_empresa=$_POST['T_desc'];

			$empresa=$con->prepare($sql_empresa);

			$empresa->bindParam(':simbolo_empresa', $simbolo_empresa);

			$empresa->bindParam(':CNPJ_empresa', $CNPJ_empresa);

			$empresa->bindParam(':nome_empresa', $nome_empresa);

			$empresa->bindParam(':numero_funcionarios', $numero_funcionarios);

			$empresa->bindParam(':URL', $URL_empresa);

			$empresa->bindParam(':CEO', $CEO);

			$empresa->bindParam(':nome_seguranca', $nome_seguranca);

			$empresa->bindParam(':DESC_empresa', $DESC_empresa);


			$empresa->execute();
		}/// fim function Cadastrar_empresa(&$con)

	//====================================
	// FIM INSERT
	//====================================



	//====================================
	// INICIO SELECT
	//====================================


		function consultar_empresa_id(&$con, &$id_empresa)
		{
			$sql_empresa="SELECT
			id_empresa,
			simbolo_empresa, nome_empresa,
			CEO,
			URL
			FROM empresa
			WHERE id_empresa=:id_empresa";

			$empresa=$con->prepare($sql_empresa);

			$empresa->bindParam(':id_empresa', $id_empresa);

			$empresa->execute();

			$consultar_empresa=$empresa->fetchAll();

			return $consultar_empresa;
		}/// fim function consultar_empresa(&$con)


		function consultar_form_empresa(&$con)
		{
			$sql_empresa="
			SELECT id_empresa, nome_empresa,
			simbolo_empresa
			FROM empresa
			ORDER BY nome_empresa";

			$empresa=$con->prepare($sql_empresa);

			$empresa->execute();

			$consultar_empresa=$empresa->fetchAll();

			return $consultar_empresa;
		}/// function consultar_form_empresa(&$con)

	//====================================
	// FIM SELECT
	//====================================

}/// fim class Empresa


class Acao
{
	//====================================
	// INICIO INSERT
	//====================================

		function Cadastrar_acao(&$con)
		{
			$sql_acao="
			INSERT INTO
			acao
			(id_empresa,
			simbolo_acao,
			valor_atual)
			VALUES
			(:id_empresa,
			:simbolo_acao,
			:valor_atual)";

			$id_empresa=$_POST['T_empresa'];

			$simbolo_acao=$_POST['T_simbolo'];

			$valor_atual=$_POST['T_valor'];

			$acao=$con->prepare($sql_acao);

			$acao->bindParam(':id_empresa', $id_empresa);

			$acao->bindParam(':simbolo_acao', $simbolo_acao);

			$acao->bindParam(':valor_atual', $valor_atual);

			$acao->execute();

		}/// fim function Cadastrar_acao(&$con)


		function cadastrar_balanco(&$con)
		{
			$sql_balanco="
			INSERT INTO balanco
			(id_acao, numero_analistas,
			data_consenso,
			media_consenso_atual,
			media_consenso_futuro)
			VALUES
			(:id_acao, :num_analistas,
			NOW(),
			(SELECT valor_atual FROM acao WHERE id_acao=:id_acao),
			:media_consenso_futuro)";

			$id_acao=$_POST['T_acao'];

			$num_analistas=$_POST['T_analista'];

			$media_consenso_futuro=$_POST['T_valor_prev'];

			$balanco=$con->prepare($sql_balanco);

			$balanco->bindParam(':id_acao', $id_acao);

			$balanco->bindParam(':num_analistas', $num_analistas);

			$balanco->bindParam(':media_consenso_futuro', $media_consenso_futuro);

			$balanco->execute();


			$this->update_valor_acao($con, $id_acao, $media_consenso_futuro);

			
		}//// fim function cadastrar_balanco(&$con)


	//====================================
	// FIM INSERT
	//====================================



	//====================================
	// INICIO SELECT
	//====================================

		function return_valor_atual(&$con)
		{
			$sql_acao="
			SELECT id_empresa,
			valor_atual, simbolo_acao
			FROM acao
			WHERE simbolo_acao=:simbolo_acao";

			$simbolo_acao=$_GET['T_simbolo'];

			$acao=$con->prepare($sql_acao);

			$acao->bindParam(':simbolo_acao', $simbolo_acao);

			$acao->execute();

			$valor_atual=$acao->fetchAll();

			return $valor_atual;

		}/// fim function return_valor_atual(&$con, &$id_acao)


		function consultar_form_acao(&$con)
		{
			$sql_acao="
			SELECT
			id_acao,
			simbolo_acao, nome_empresa
			FROM acao
			INNER JOIN empresa ON empresa.id_empresa=acao.id_empresa
			ORDER BY nome_empresa, simbolo_acao";

			$acao=$con->prepare($sql_acao);

			$acao->execute();

			$consultar_acao=$acao->fetchAll();

			return $consultar_acao;
		}/// fim function return_valor_atual(&$con, &$id_acao)



		function consultar_acao_empresa(&$con, &$id_empresa)
		{
			$sql_acao="
			SELECT
			simbolo_acao, valor_atual
			FROM acao
			WHERE id_empresa=:id_empresa";

			$acao=$con->prepare($sql_acao);

			$acao->bindParam(':id_empresa', $id_empresa);

			$acao->execute();

			$consultar_acao=$acao->fetchAll();

			return $consultar_acao;
		}/// fim function consultar_acao_empresa(&$con)

	//====================================
	// FIM SELECT
	//====================================



	//====================================
	// INCIO UPDATE
	//====================================


		function update_valor_acao(&$con, &$id_acao, &$valor_atual)
		{
			$sql_acao="
			UPDATE acao SET
			valor_atual=:valor_atual
			WHERE id_acao=:id_acao";

			$acao=$con->prepare($sql_acao);

			$acao->bindParam(':valor_atual', $valor_atual);

			$acao->bindParam(':id_acao', $id_acao);

			$acao->execute();
		}/// fim function update_valor_acao(&$con, &$id_acao, &$$valor_atual)

	//====================================
	// FIM UPDATE
	//====================================
}/// fim class Acao


class Contato
{



	//====================================
	// INICIO INSERT
	//====================================

		function cadastro_contato(&$con)
		{
			$sql_contato="
			INSERT INTO telefone
			(id_empresa,
			DDD_telefone,
			numero_telefone)
			VALUES
			(:id_empresa,
			:DDD_telefone,
			:numero_telefone)";


			$id_empresa=$_POST['T_empresa'];

			$DDD_telefone=$_POST['T_DDD'];

			$numero_telefone=$_POST['T_numero'];

			$contato=$con->prepare($sql_contato);

			$contato->bindParam(':id_empresa', $id_empresa);

			$contato->bindParam(':DDD_telefone', $DDD_telefone);

			$contato->bindParam(':numero_telefone', $numero_telefone);

			$contato->execute();

		}/// fim function cadastro_contato(&$con)

	//====================================
	// FIM INSERT
	//====================================


	//====================================
	// INICIO SELECT
	//====================================

		function consultar_contato_empresa(&$con, &$id_empresa)
		{
			$sql_contato="
			SELECT numero_telefone, DDD_telefone
			FROM telefone
			WHERE id_empresa=:id_empresa";


			$contato=$con->prepare($sql_contato);

			$contato->bindParam(':id_empresa', $id_empresa);

			$contato->execute();

			$consultar_contato=$contato->fetchAll();

			return $consultar_contato;
		}/// fim function consultar_contato(&$con, &$id_empresa)



	//====================================
	// FIM SELECT
	//====================================

}/// fim class contato


class Endereco
{

	//====================================
	// INICIO INSERT
	//====================================

		function cadastro_endereco(&$con)
		{
			$sql_endereco="
			INSERT INTO endereco
			(id_empresa,
			nome_rua,
			numero_rua,
			CEP,
			bairro,
			cidade,
			estado,
			pais)
			VALUES
			(:id_empresa,
			:nome_rua,
			:numero_rua,
			:CEP,
			:bairro,
			:cidade,
			:estado,
			:pais
			)";

			$id_empresa=$_POST['T_empresa'];

			$nome_rua=$_POST['T_nome'];

			$numero_rua=$_POST['T_numero'];

			$CEP=$_POST['T_CEP'];

			$bairro=$_POST['T_bairro'];

			$cidade=$_POST['T_cidade'];

			$estado=$_POST['T_estado'];

			$pais="Brasil";


			$endereco=$con->prepare($sql_endereco);

			$endereco->bindParam(':id_empresa', $id_empresa);

			$endereco->bindParam(':nome_rua', $nome_rua);

			$endereco->bindParam(':numero_rua', $numero_rua);

			$endereco->bindParam(':CEP', $CEP);

			$endereco->bindParam(':bairro', $bairro);

			$endereco->bindParam(':cidade', $cidade);

			$endereco->bindParam(':estado', $estado);

			$endereco->bindParam(':pais', $pais);

			$endereco->execute();
		}/// fim function cadastro_endereco(&$con)


	//====================================
	// FIM INSERT
	//====================================





	//====================================
	// INICIO SELECT
	//====================================

		function consultar_endereco_empresa(&$con, &$id_empresa)
		{

			$sql_endereco="
			SELECT
			nome_rua,
			numero_rua,
			CEP,
			bairro,
			cidade,
			estado,
			pais
			FROM endereco
			WHERE id_empresa=:id_empresa
			";

			$endereco=$con->prepare($sql_endereco);

			$endereco->bindParam(':id_empresa', $id_empresa);

			$endereco->execute();

			$consultar_endereco=$endereco->fetchAll();

			return $consultar_endereco;
			
		}//// fim function consultar_endereco_empresa(&$con, &$id_empresa)

	//====================================
	// FIM SELECT
	//====================================

}/// fim class Endereco


?>