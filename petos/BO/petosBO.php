<?php
	include '../DAO/petosDAO.php';

	function cadastrarusuarioPFBO($email, $senha, $senha2, $pais, $cpf, $nome, $sobrenome, $datanasc){
		return cadastrarusuarioPFDAO($email, $senha, $senha2, $pais, $cpf, $nome, $sobrenome, $datanasc);
		
	}

	function logarBO($email, $senha, $tipo){
		return logarDAO($email, $senha, $tipo);

	}

	function cadastrarpetBO($cpf, $especie, $descpet, $nomepet, $sexo, $datanascpet, $foto){
		return cadastrarpetDAO($cpf, $especie, $descpet, $nomepet, $sexo, $datanascpet, $foto);
	}

	function cadastrarusuarioPJBO($email, $senha, $pais, $cnpj, $nomeloja, $descloja, $foto){
		return cadastrarusuarioPJDAO($email, $senha, $pais, $cnpj, $nomeloja, $descloja, $foto);
	}

	function consultarTodosRegistrosBO() {
		return consultarTodosRegistrosDAO();
	}

	function buscartopicoBO($busca){
		return buscartopicoDAO($busca);
	}

	function buscartopicousuarioativoBO($busca, $idusuario){
		return buscartopicousuarioativoDAO($busca, $idusuario);
	}

	function excluirRegistrosPorIDBO(){
		return excluirRegistrosPorIDDAO();
	}

	function excluirRegistrosPorIDtopicoBO(){
		return excluirRegistrosPorIDtopicoDAO();
	}

	function cadastrartopicoBO($tema, $titulo, $conteudo, $datatopico, $idusuario){
		return cadastrartopicoDAO($tema, $titulo, $conteudo, $datatopico, $idusuario);
	}

	function consultartopicogetBO($idtopico){
		return consultartopicogetDAO($idtopico);

	}

	function consultarrespostaBO($idtopico){
		return consultarrespostaDAO($idtopico);

	}

	function cadastrarrespostaBO($conteudo, $idtopico, $idusuario, $dataresp){
		return cadastrarrespostaDAO($conteudo, $idtopico, $idusuario, $dataresp);
	}

	function cadastrarpublicacaoBO($idusuario, $textopublicacao, $datapublicacao, $midia){
		return cadastrarpublicacaoDAO($idusuario, $textopublicacao, $datapublicacao, $midia);
	}

	function buscarpublisBO($idusuario) {
		return buscarpublisDAO($idusuario);
	}

	function buscarperfilBO($cpf) {
		return buscarperfilDAO($cpf);
	}

	function buscartopicousuarioBO($idusuario) {
		return buscartopicousuarioDAO($idusuario);
	}

	function editartopicoBO($idtopico, $tema, $titulo, $conteudo){
		return editartopicoDAO($idtopico, $tema, $titulo, $conteudo);

	}



	/*function cadastraranuncioBO($cnpj, $descanuncio, $midia, $preco, $telefonecontato, $dataanuncio){
		return cadastraranuncioDAO($cnpj, $descanuncio, $midia, $preco, $telefonecontato, $dataanuncio);
	}

	function cadastrarcomentarioBO($idpublicacao, $idusuario, $textocomentario, $datacomentario){
		return cadastrarcomentarioDAO($idpublicacao, $idusuario, $textocomentario, $datacomentario);
	}

	function cadastraramizadeBO($idsolicitante, $idsolicitado, $datasolicita){
		return cadastraramizadeDAO($idsolicitante, $idsolicitado, $datasolicita);
	}*/



	
	
?>