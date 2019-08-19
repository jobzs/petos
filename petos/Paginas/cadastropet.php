<?php
session_start();
?>

<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PETos</title>


    
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" href="../bootstrap/petos.css" media="all">

  </head>

  <body>

    <nav class="navbar navbar-dark bg-info">
      <a class="navbar-brand" href="#">
        <img src="../img/petoslogo.png" height="30" class="d-inline-block align-top" alt="">
        <span class="text-monospace">PETos - Social Media</span>
      </a>
    </nav>

    <img src="../img/petoslogo.png" height="30%" class="rounded mx-auto d-block mt-5 img-responsive" style="position: center;" alt="PETos">
    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header text-center">
              Agora cadastre seu Pet!
            </div>
            <div class="card-body">
              <form action="../Forms/processaTodosFormularios.php" enctype="multipart/form-data"  method="POST">
                <input type="hidden" name="cpf" value="<?php echo $_SESSION['cpf']; ?>">
                <div class="form-group">
                  <select  class="form-control" name="especie">
                  <option autofocus value="invalido">O que seu bichinho é?</option>
                  <option disabled>Mamíferos</option>
                  <option value="Cão">Cão (Cachorro)</option>
                  <option value="Gato">Gato</option>
                  <option value="Furão">Furão (Ferret)</option>
                  <option value="Mico">Mico (Sagui)</option>
                  <option value="Cavalo">Cavalo</option>
                  <option value="Petauro de Açúcar">Petauro de Açúcar (Sugar Glider)</option>
                  <option value="Ouriço">Ouriço</option>
                  <option value="Hamster">Hamster</option>
                  <option value="Rato">Rato (Twister ou Mecol)</option>
                  <option value="Camundongo">Camundongo (Topolino)</option>
                  <option value="Porco da Índia">Porco da Índia (Cobaia ou Cávia)</option>
                  <option value="Porco domestico">Porco doméstico (Mini-porquinho)</option>
                  <option value="Chinchila">Chinchila</option>
                  <option value="Gerbil">Gerbil (Esquilo-da-Mongólia)</option>
                  <option value="Esquilo">Esquilo</option>
                  <option disabled>Aves</option>
                  <option value="Piriquito">Piriquito</option>
                  <option value="Canário">Canário</option>
                  <option value="Caturra">Caturra (Calopsita)</option>
                  <option value="Cacatua">Cacatua</option>
                  <option value="Papagaio">Papagaio</option>
                  <option value="Galinha (Galo)">Galinha (Galo)</option>
                  <option value="Peru">Peru</option>
                  <option value="Arara">Arara</option>
                  <option value="Mandarim">Mandarim</option>
                  <option value="Agapornis">Agapornis</option>
                  <option value="Pardal doméstico">Pardal doméstico</option>
                  <option value="Galah">Galah</option>
                  <option value="Calafate">Calafate</option>
                  <option value="Cardeal (ave)">Cardeal (ave)</option>
                  <option value="Curió">Curió</option>
                  <option value="Canário-da-terra">Canário-da-terra</option>
                  <option value="Trinca-Ferro">Trinca-Ferro</option>
                  <option disabled>Répteis</option>
                  <option value="Cágado">Cágado</option>
                  <option value="Tartaruga">Tartaruga</option>
                  <option value="Jabuti">Jabuti</option>
                  <option value="Lagarto">Lagarto</option>
                  <option value="Cobra">Cobra</option>
                  <option disabled>Anfíbios</option>
                  <option value="Sapo">Sapo</option>
                  <option value="Pereca">Pereca</option>
                  <option value="Salamandras">Salamandras</option>
                  <option disabled>Peixes</option>
                  <option value="Poecilídeos">Poecilídeos</option>
                  <option value="Betta">Betta</option>
                  <option value="Kinguio">Kinguio</option>
                  <option value="Carpa">Carpa</option>
                  <option value="Barbos">Barbos</option>
                  <option value="Peixe-palhaço">Peixe-palhaço</option>
                  <option value="Tetras">Tetras</option>
                  <option value="Acarás">Acarás</option>
                  <option value="Oscar">Oscar</option>
                  <option value="Cirurgiões">Cirurgiões</option>
                  <option value="Cascudos">Cascudos</option>
                  <option value="Coridoras">Coridoras</option>
                  <option disabled>Invertebrados</option>
                  <option value="Tarântulas">Tarântulas</option>
                  <option value="Caramujos">Caramujos</option>
                  <option value="Carangueijos">Carangueijos</option>

                  <option value="Outros">Outros</option>
                  </select>


                </div>
               <div class="form-group">
                  <textarea name="descpet" rows="5" class="form-control" placeholder="Escreva um pouco sobre seu Pet!"></textarea>
                </div>
                <div class="form-group">
                  <input name="nomepet" type="text" class="form-control" placeholder="E qual o nome dele?">
                </div>
                <div>
                  Qual o sexo do seu Pet?
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1" value="fem">
                  <label class="form-check-label" for="inlineRadio1">Feminino</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="masc">
                  <label class="form-check-label" for="inlineRadio2">Masculino</label>
                </div>
                <div class="form-group">
                  <input type="date" name="datanascpet" maxlength="10" class="form-control" placeholder="Data de Nascimento do Pet" OnKeyPress="formatar('##/##/####', this)" >
                </div>
                <div class="form-group">
                  <label for="foto">Envie uma foto do seu Pet</label>
                  <input type="file" class="form-control-file" name="foto">
                </div>
                <button name="acao" value="cadastrarpet" class="btn btn-lg btn-dark btn-block" type="submit">Salvar todos os Dados</button>

                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar agora</button>
                
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>