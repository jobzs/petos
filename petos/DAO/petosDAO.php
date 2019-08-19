<?php

include '../Util/conexaoBD.php';


		
	function cadastrarusuarioPFDAO($email, $senha, $senha2, $pais, $cpf, $nome, $sobrenome, $datanasc) {
	
		$bancoDeDados = conectar();
		
			try {
					 $verifica = $bancoDeDados->prepare("select * from usuarios where email = ?");
					 $verifica->bindValue(1, $email);
					 $verifica->execute();

				if($verifica->rowCount() == 0){

					 $verifica2 = $bancoDeDados->prepare("select * from usuarios where cpf = ?");
					 $verifica2->bindValue(1, $cpf);
					 $verifica2->execute();
				if ($verifica2->rowCount() == 0) {
				if ($senha != $senha2) {
					echo "<script> alert('As senhas não coincidem'); </script>";
					echo "<script> window.history.back() </script>";
				}else{

					$cadastrar = $bancoDeDados->prepare("insert into usuarios(email, senha, pais, cpf, nome, sobrenome, datanasc) values (?, ?, ?, ?, ?, ?, ?)");
					$cadastrar->bindParam(1, $email);
					$cadastrar->bindParam(2, $senha);
					$cadastrar->bindParam(3, $pais);
					$cadastrar->bindParam(4, $cpf);
					$cadastrar->bindParam(5, $nome);
					$cadastrar->bindParam(6, $sobrenome);
					$cadastrar->bindParam(7, $datanasc);
					$cadastrar->execute();
					
					echo "<script> alert('cadastrado com sucesso'); </script>";
					echo '<meta http-equiv = refresh content= "0; url = ../index.php">';
				}
			}else{
				echo "<script> alert('cpf ja existe'); </script>";
				echo "<script> window.history.back() </script>";
			}
			}else{
				echo "<script> alert('email ja existe'); </script>";
				echo "<script> window.history.back() </script>";

				 }
			}catch (Exception $e) {
				echo "Erro petosDAO: " . $e;
			}
	}

	function cadastrarpetDAO($cpf, $especie, $descpet, $nomepet, $sexo, $datanascpet, $foto) {
	
		$bancoDeDados = conectar();
		
		try {
			
			
			$cadastrar = $bancoDeDados->prepare("insert into pet(cpf, especie, descpet, nomepet, sexo, datanascpet, foto) values (?, ?, ?, ?, ?, ?, ?)");
			$cadastrar->bindParam(1, $cpf);
			$cadastrar->bindParam(2, $especie);
			$cadastrar->bindParam(3, $descpet);
			$cadastrar->bindParam(4, $nomepet);
			$cadastrar->bindParam(5, $sexo);
			$cadastrar->bindParam(6, $datanascpet);
			$cadastrar->bindParam(7, $foto);
			$cadastrar->execute();
			

			echo "<script> alert('Pet cadastrado com sucesso'); </script>";
			echo '<meta http-equiv = refresh content= "0; url = ../Paginas/perfil.php">';
			
		} catch (Exception $e) {
			echo "Erro petosDAO: " . $e;
		}
		
	}
		
	function cadastrarusuarioPJDAO($email, $senha, $senha2, $pais, $cnpj, $nomeloja, $descloja, $foto) {
	
		$bancoDeDados = conectar();
		
			try {
					 $verifica = $bancoDeDados->prepare("select * from usuarios where email = ?");
					 $verifica->bindValue(1, $email);
					 $verifica->execute();

				if($verifica->rowCount() == 0){

					 $verifica2 = $bancoDeDados->prepare("select * from usuarios where cnpj = ?");
					 $verifica2->bindValue(1, $cnpj);
					 $verifica2->execute();
				if ($verifica2->rowCount() == 0) {
				if ($senha != $senha2) {
					echo "<script> alert('As senhas não coincidem'); </script>";
					echo "<script> window.history.back() </script>";
				}else{

					$cadastrar = $bancoDeDados->prepare("insert into usuarios(email, senha, pais, cnpj, nomeloja, descloja, foto) values (?, ?, ?, ?, ?, ?, ?)");
					$cadastrar->bindParam(1, $email);
					$cadastrar->bindParam(2, $senha);
					$cadastrar->bindParam(3, $pais);
					$cadastrar->bindParam(4, $cnpj);
					$cadastrar->bindParam(5, $nomeloja);
					$cadastrar->bindParam(6, $descloja);
					$cadastrar->bindParam(7, $foto);
					$cadastrar->execute();
					
					echo "<script> alert('cadastrado com sucesso, efetue o login para acessar o sistema'); </script>";
					echo '<meta http-equiv = refresh content= "0; url = ../index.php">';
				}
			}else{
				echo "<script> alert('cnpj ja existe'); </script>";
				echo "<script> window.history.back() </script>";
			}
			}else{
				echo "<script> alert('email ja existe'); </script>";
				echo "<script> window.history.back() </script>";

				 }
			}catch (Exception $e) {
				echo "Erro petosDAO: " . $e;
			}
		
	}

	function logarDAO($email, $senha, $tipo){
		
		$bancoDeDados = conectar();

		try{

			$verificaemail = $bancoDeDados->prepare("select * from usuarios where email = ? and senha = ?");
			$verificaemail->bindValue(1, $email);
			$verificaemail->bindValue(2, $senha);
			$verificaemail->execute();


			if ($verificaemail->rowCount() == 1) {
				if ($tipo == "pf") {
					$list = $bancoDeDados->query("select * from usuarios where email = '$email' and senha = '$senha'");
					$list->execute();
					while ($registro = $list->fetch(PDO::FETCH_OBJ)) {
						$_SESSION["idusuario"] = $registro->idusuario;
						$_SESSION["email"] = $registro->email;
						$_SESSION["senha"] = $registro->senha;
						$_SESSION["cpf"] = $registro->cpf;
						}

							$verifica = $bancoDeDados->prepare("select * from pet p inner join usuarios u on p.cpf = u.cpf where p.cpf = ?");
							$verifica->bindValue(1, $_SESSION['cpf']);
							$verifica->execute();

							echo $verifica->rowCount();

							if ($verifica->rowCount() > 0) {
						echo "<script> alert('Login efetuado'); </script>";
						echo '<meta http-equiv = refresh content= "0; url = ../Paginas/perfil.php">';
							}
							else{ 

						echo "<script> alert('Login efetuado, agora cadastre seu bichinho!'); </script>";
						echo '<meta http-equiv = refresh content= "0; url = ../Paginas/cadastropet.php">';
					}
										
						} 

						
					else{
						$list = $bancoDeDados->query("select * from usuarios where email = '$email' and senha = '$senha'");
						$list->execute();

					while ($registro = $list->fetch(PDO::FETCH_OBJ)) {
						$_SESSION["idusuario"] = $registro->idusuario;
						$_SESSION["email"] = $registro->email;
						$_SESSION["senha"] = $registro->senha;
						$_SESSION["cnpj"] = $registro->cnpj;
						
					}
					echo "<script> alert('Login efetuado'); </script>";

					echo '<meta http-equiv = refresh content= "0; url = ../Paginas/emcontrucao.php">';
				}
			}
		}
		catch(Exception $e){
			echo "Erro petosDAO: " . $e;

		}
	}
	
	function consultarTodosRegistrosDAO() {
		
		$bancoDeDados = conectar();
		
		try {
			$consulta = "select * from topico";
			
			//QUERY utiliza-se apenas para consulta
			return $bancoDeDados->query($consulta);
			
		} catch (Exception $e) {
			echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
		}
	}

	function buscartopicoDAO($busca) {
		
		$bancoDeDados = conectar();
		
		try {
			$consulta = "select idtopico,titulo,tema,datatopico,idusuario from topico where titulo like '%".$busca."%'";
			// nao pode usar * para array associativo
			// vc tem que dar o nome dos campos no banco, pois no array, eles vao ficar com o nome dos campos do banco
			//QUERY utiliza-se apenas para consulta
			return $bancoDeDados->query($consulta);
			
		} catch (Exception $e) {
			echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
		}
	}

	function buscartopicousuarioativoDAO($busca, $idusuario) {
		
		$bancoDeDados = conectar();
		
		try {
			$consulta = "select idtopico,titulo,tema,datatopico,idusuario from topico where titulo like '%".$busca."%' and idusuario = ".$idusuario;
			// nao pode usar * para array associativo
			// vc tem que dar o nome dos campos no banco, pois no array, eles vao ficar com o nome dos campos do banco
			//QUERY utiliza-se apenas para consulta
			return $bancoDeDados->query($consulta);
			
		} catch (Exception $e) {
			echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
		}
	}

	function consultartopicogetDAO($idtopico){

		$bancoDeDados = conectar();

		try{
			$consulta = "select titulo,tema, conteudo, datatopico,idusuario from topico where idtopico = ".$idtopico;

			return $bancoDeDados->query($consulta);


		} catch (Exception $e){

			echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
		}


	}

	function consultarrespostaDAO($idtopico){

		$bancoDeDados = conectar();

		try{
			$consulta = "select r.conteudo, r.idtopico, r.idusuario, r.dataresp from resposta r inner join topico t on r.idtopico = t.idtopico where r.idtopico = ".$idtopico;

			return $bancoDeDados->query($consulta);


		} catch (Exception $e){

			echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
		}


	}

	function cadastrartopicoDAO($tema, $titulo, $conteudo, $datatopico, $idusuario) {
	
		$bancoDeDados = conectar();
		
		try {
			
			$cadastrar = $bancoDeDados->prepare("insert into topico (tema, titulo, conteudo, datatopico, idusuario) values (?, ?, ?, ?, ?)");
			$cadastrar->bindParam(1, $tema);
			$cadastrar->bindParam(2, $titulo);
			$cadastrar->bindParam(3, $conteudo);
			$cadastrar->bindParam(4, $datatopico);
			$cadastrar->bindParam(5, $idusuario);
			$cadastrar->execute();
			
		echo "<script> alert('Topico inserido com sucesso'); </script>";
		} catch (Exception $e) {
			echo "Erro petosDAO: " . $e;
		}
		
	}

	function cadastrarrespostaDAO($conteudo, $idtopico, $idusuario, $dataresp) {
		
		$bancoDeDados = conectar();
		try {
			
			$cadastrar = $bancoDeDados->prepare("insert into resposta (conteudo, idtopico, idusuario, dataresp) values (?, ?, ?, ?)");
			$cadastrar->bindParam(1, $conteudo);
			$cadastrar->bindParam(2, $idtopico);
			$cadastrar->bindParam(3, $idusuario);
			$cadastrar->bindParam(4, $dataresp);
			$cadastrar->execute();
			
		echo "<script> alert('Resposta inserida com sucesso'); </script>";
		} catch (Exception $e) {
			echo "Erro petosDAO: " . $e;
		}
		
	}

	function cadastrarpublicacaoDAO($idusuario, $textopublicacao, $datapublicacao, $midia) {
	
		$bancoDeDados = conectar();
		
		try {
			
			$cadastrar = $bancoDeDados->prepare("insert into publicacao (idusuario, textopublicacao, datapublicacao, midia) values (?, ?, ?, ?)");
			$cadastrar->bindParam(1, $idusuario);
			$cadastrar->bindParam(2, $textopublicacao);
			$cadastrar->bindParam(3, $datapublicacao);
			$cadastrar->bindParam(4, $midia);
			$cadastrar->execute();
			
		} catch (Exception $e) {
			echo "Erro petosDAO: " . $e;
		}
		
	}

	function buscarpublisDAO($idusuario) {
		
		$bancoDeDados = conectar();
		
		try {
			$consulta = "select idusuario, textopublicacao, datapublicacao, midia from publicacao where idusuario = ".$idusuario;
			
			//QUERY utiliza-se apenas para consulta
			return $bancoDeDados->query($consulta);
			
		} catch (Exception $e) {
			echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
		}
	}

	function buscarperfilDAO($cpf) {
		
		$bancoDeDados = conectar();
		
		try {
			$consulta = "select especie, descpet, nomepet, datanascpet, p.foto from pet p inner join usuarios u on p.cpf = u.cpf where p.cpf = '".$cpf."'";
			
			//QUERY utiliza-se apenas para consulta
			return $bancoDeDados->query($consulta);
			
		} catch (Exception $e) {
			echo "Erro consultarperfilDAO: " . $e->getMessage();
		}
	}

	function buscartopicousuarioDAO($idusuario) {
		
		$bancoDeDados = conectar();
		
		try {
			$consulta = "select idtopico,titulo,tema,datatopico,idusuario from topico where idusuario = ".$idusuario;

			return $bancoDeDados->query($consulta);
			
		} catch (Exception $e) {
			echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
		}
	}

	function excluirRegistrosPorIDDAO($idtopico) {
		$bancoDeDados = conectar();
		
		try {

			$sql = "delete from resposta where idtopico = ".$idtopico;
		
			return $bancoDeDados->exec($sql);
		
		} catch (Exception $e) {
			echo "Erro excluirRegistrosPorIDDAO: " . $e->getMessage();
		}
	}

	function excluirRegistrosPorIDtopicoDAO($idtopico) {
		$bancoDeDados = conectar();
		
		try {

			$sql = "delete from topico where idtopico = ".$idtopico;
		
			return $bancoDeDados->exec($sql);
		
		} catch (Exception $e) {
			echo "Erro excluirRegistrosPorIDDAO: " . $e->getMessage();
		}
	}

		function editartopicoDAO($idtopico, $tema, $titulo, $conteudo) {
		$bancoDeDados = conectar();
		
		try {

			$sql = "update topico set tema = '$tema', titulo = '$titulo', conteudo = '$conteudo' where idtopico = ".$idtopico;
		
			return $bancoDeDados->exec($sql);
		
		} catch (Exception $e) {
			echo "Erro excluirRegistrosPorIDDAO: " . $e->getMessage();
		}
	}
	/* function cadastraranuncioDAO($cnpj, $descanuncio, $midia, $preco, $telefonecontato, $dataanuncio) {
	
		$bancoDeDados = conectar();
		
		try {
			
			$cadastrar = $bancoDeDados->prepare("insert into anuncio (cnpj, descanuncio, midia, preco, telefonecontato, dataanuncio) values (?, ?, ?, ?, ?, ?)");
			$cadastrar->bindParam(1, $cnpj);
			$cadastrar->bindParam(2, $descanuncio);
			$cadastrar->bindParam(3, $midia);
			$cadastrar->bindParam(4, $preco);
			$cadastrar->bindParam(5, $telefonecontato);
			$cadastrar->bindParam(6, $dataanuncio);
			$cadastrar->execute();
			
		} catch (Exception $e) {
			echo "Erro petosDAO: " . $e;
		}
		
	}

	

	function cadastrarcomentarioDAO($idpublicacao, $idusuario, $textocomentario, $datacomentario) {
	
		$bancoDeDados = conectar();
		
		try {
			
			$cadastrar = $bancoDeDados->prepare("insert into comentario (idpublicacao, idusuario, textocomentario, datacomentario) values (?, ?, ?, ?)");
			$cadastrar->bindParam(1, $idpublicacao);
			$cadastrar->bindParam(2, $idusuario);
			$cadastrar->bindParam(3, $textocomentario);
			$cadastrar->bindParam(4, $datacomentario);			
			$cadastrar->execute();
			
		} catch (Exception $e) {
			echo "Erro petosDAO: " . $e;
		}
		
	}

	function cadastraramizadeDAO($idsolicitante, $idsolicitado, $datasolicita) {
	
		$bancoDeDados = conectar();
		
		try {
			
			$cadastrar = $bancoDeDados->prepare("insert into amizade (idsolicitante, idsolicitado, datasolicita) values (?, ?, ?)");
			$cadastrar->bindParam(1, $idsolicitante);
			$cadastrar->bindParam(2, $idsolicitado);
			$cadastrar->bindParam(3, $datasolicita);	
			$cadastrar->execute();
			
		} catch (Exception $e) {
			echo "Erro petosDAO: " . $e;
		}
		
	}	
	*/
?>