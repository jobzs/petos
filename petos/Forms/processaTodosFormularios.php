<?php
	include_once '../BO/petosBO.php';
	
	if($_POST["acao"] == "cadastrarusuarioPF"){
		
		if(!empty($_POST["email"]) && !empty($_POST["senha"]) && !empty($_POST["senha2"]) && !empty($_POST["pais"]) && !empty($_POST["cpf"]) && !empty($_POST["nome"]) && !empty($_POST["sobrenome"]) && !empty($_POST["datanasc"])){

			$email = $_POST["email"];
			$senha = $_POST["senha"];
			$senha2 = $_POST["senha2"];
			$pais = $_POST["pais"];
			$cpf = $_POST["cpf"];
			$nome = $_POST["nome"];
			$sobrenome = $_POST["sobrenome"];
			$datanasc = $_POST["datanasc"];

			cadastrarusuarioPFBO($email, $senha, $senha2, $pais, $cpf, $nome, $sobrenome, $datanasc);
			
						
		} 
		else {
			echo "<script> alert('preencha todos os campos'); </script>";
			echo "<script> window.history.back() </script>";
		}
		
	}


	if($_POST["acao"] == "logar"){
		


		if(!empty($_POST["email"]) && !empty($_POST["senha"]) && isset($_POST["tipo"])){

			$email = $_POST["email"];
			$senha = $_POST["senha"];
			$tipo = $_POST["tipo"];

			session_start();
			logarBO($email, $senha, $tipo);
			
		}else {
			echo "<script> alert('preencha todos os campos'); </script>";
			echo "<script> window.history.back() </script>";
		}
	
		
	}

	if($_POST["acao"] == "cadastrarpet") {
		session_start();
		if(!empty($_POST["especie"]) && !empty($_POST["descpet"]) && !empty($_POST["nomepet"]) && isset($_POST["sexo"]) && !empty($_POST["datanascpet"])){

			$cpf = $_SESSION["cpf"];
			$especie = $_POST["especie"];
			$descpet = $_POST["descpet"];
			$nomepet = $_POST["nomepet"];
			$sexo = $_POST["sexo"];
			$datanascpet = $_POST["datanascpet"];
			$token = rand(15487,1045646);
			move_uploaded_file($_FILES["foto"]['tmp_name'], '../img/'.$token.'.png');

			cadastrarpetDAO($cpf, $especie, $descpet, $nomepet, $sexo, $datanascpet, $token);
			
			
			
		} else {
			echo "<script> window.alert(\"Você deve preencher todos os campos\") </script>";
			echo "<script> window.history.back(); </script>";
		}
		
	}

	if($_POST["acao"] == "cadastrarusuarioPJ") {
		
		if(!empty($_POST["email"]) && !empty($_POST["senha"]) && !empty($_POST["senha2"]) && !empty($_POST["pais"]) && !empty($_POST["cnpj"]) && !empty($_POST["nomeloja"]) && !empty($_POST["descloja"]) && !empty($_POST["foto"])){

			$email = $_POST["email"];
			$senha = $_POST["senha"];
			$senha2 = $_POST["senha2"];
			$pais = $_POST["pais"];
			$cnpj = $_POST["cnpj"];
			$nomeloja = $_POST["nomeloja"];
			$descloja = $_POST["descloja"];
			$foto = $_POST["foto"];

			cadastrarusuarioPJDAO($email, $senha, $senha2, $pais, $cnpj, $nomeloja, $descloja, $foto);
			
			header('Location:../index.php');
			
		} else {
			echo "<script> window.alert(\"Você deve preencher todos os campos\") </script>";
			echo "<script> window.history.back(); </script>";
		}
		
	}

		if($_POST["acao"] == "topic") {
			session_start();
		if(!empty($_POST["tema"]) && !empty($_POST["conteudo"]) && !empty($_POST["titulo"])){
			
			$tema = $_POST["tema"];
			$titulo = $_POST["titulo"];
			$conteudo = $_POST["conteudo"];
			$datatopico = date('Y/m/d');
			$idusuario = $_SESSION["idusuario"];

			cadastrartopicoBO($tema, $titulo, $conteudo, $datatopico, $idusuario);
			
			echo '<meta http-equiv = refresh content= "0; url = ../Paginas/meustopicos.php">';
			
		} else {
			echo "<script> window.alert(\"Você deve preencher todos os campos\") </script>";
			echo "<script> window.history.back(); </script>";
		}
		
	}

	if($_POST["acao"] == "cadastrarresposta") {

		if(!empty($_POST["conteudo"])){

			session_start();
			$conteudo = $_POST["conteudo"];
			$idtopico = $_GET["idtopico"];
			$idusuario = $_SESSION["idusuario"];
			$dataresp = date('Y/m/d');

			cadastrarrespostaBO($conteudo, $idtopico, $idusuario, $dataresp);



			echo '<meta http-equiv = refresh content= "0; url = ../Paginas/topico.php?idtopico='.$idtopico.'">';
			
		} else {
			echo "<script> window.alert(\"Você deve preencher todos os campos\") </script>";
			echo "<script> window.history.back(); </script>";
		}
		
	}

	if ($_POST["acao"] == "logout") {
		session_start();
				unset($_SESSION["idusuario"]);
				unset($_SESSION["email"]);
				unset($_SESSION["senha"]);
				unset($_SESSION["cpf"]);
				unset($_SESSION["cnpj"]);
		session_destroy();

		echo "<script> alert('Deslogado'); </script>";
		echo '<meta http-equiv = refresh content= "0; url = ../index.php">';

	}


	if($_POST["acao"] == "cadastrarpublicacao") {
		
		if(!empty($_POST["textopublicacao"]) or !empty($_POST["midia"])){
			session_start();
			$idusuario = $_SESSION["idusuario"];
			$textopublicacao = $_POST["textopublicacao"];
			$datapublicacao = date('Y/m/d');
			$token = rand(15487,1045646);
			move_uploaded_file($_FILES["midia"]['tmp_name'], '../img/'.$token.'.png');

			cadastrarpublicacaoBO($idusuario, $textopublicacao, $datapublicacao, $token);
			
			header('Location:../paginas/perfil.php');
			
		} else {
			echo "<script> window.alert(\"Você deve preencher todos os campos\") </script>";
			echo "<script> window.history.back(); </script>";
		}
		
	}

		if($_POST["acao"] == "Excluir") {
		
		excluirRegistrosPorIDDAO($_GET['idtopico']);

		excluirRegistrosPorIDtopicoDAO($_GET['idtopico']);	

			header('Location:../paginas/meustopicos.php');
		
	}

	if($_POST["acao"] == "Editar") {
		
		$conteudo = $_POST["conteudo"];
		$idtopico = $_GET["idtopico"];
		$titulo = $_POST["titulo"];
		$tema = $_POST["tema"];


			
		editartopicoBO($idtopico, $tema, $titulo, $conteudo);	

			header('Location:../paginas/meustopicos.php');
		
	}
	
	/*if($_POST["acao"] == "cadastraranuncio") {
		
		if(!empty($_POST["cnpj"]) && !empty($_POST["descanuncio"]) && !empty($_POST["midia"]) && !empty($_POST["preco"]) && !empty($_POST["telefonecontato"]) && !empty($_POST["dataanuncio"])){

			$cnpj = $_POST["cnpj"];
			$descanuncio = $_POST["descanuncio"];
			$midia = $_POST["midia"];
			$preco = $_POST["preco"];
			$telefonecontato = $_POST["telefonecontato"];
			$dataanuncio = $_POST["dataanuncio"];

			cadastraranuncioDAO($cnpj, $descanuncio, $midia, $preco, $telefonecontato, $dataanuncio);
			
			header('Location:../index.php');
			
		} else {
			echo "<script> window.alert(\"Você deve preencher todos os campos\") </script>";
			echo "<script> window.history.back(); </script>";
		}
		
	}
	

	if($_POST["acao"] == "cadastrarcomentario") {
		
		if(!empty($_POST["idpublicacao"]) && !empty($_POST["idusuario"]) && !empty($_POST["textocomentario"]) && !empty($_POST["datacomentario"])){

			$idpublicacao = $_POST["idpublicacao"];
			$idusuario = $_POST["idusuario"];
			$textocomentario = $_POST["textocomentario"];
			$datacomentario = $_POST["datacomentario"];

			cadastrarcomentarioDAO($idpublicacao, $idusuario, $textocomentario, $datacomentario);
			
			header('Location:../index.php');
			
		} else {
			echo "<script> window.alert(\"Você deve preencher todos os campos\") </script>";
			echo "<script> window.history.back(); </script>";
		}
		
	}

	if($_POST["acao"] == "cadastraramizade") {
		
		if(!empty($_POST["idsolicitante"]) && !empty($_POST["idsolicitado"]) && !empty($_POST["datasolicita"])){

			$idsolicitante = $_POST["idsolicitante"];
			$idsolicitado = $_POST["idsolicitado"];
			$datasolicita = $_POST["data"];

			cadastraramizadeDAO($idsolicitante, $idsolicitado, $datasolicita);
			
			header('Location:../index.php');
			
		} else {
			echo "<script> window.alert(\"Você deve preencher todos os campos\") </script>";
			echo "<script> window.history.back(); </script>";
		}
		
	}


*/
	
?>
