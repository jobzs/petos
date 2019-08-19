<?php 
session_start();

if (!isset($_SESSION['idusuario'])) {
       echo "<script> alert('Acesso negado'); 
      window.location = '../index.php';
      </script>";
}


date_default_timezone_set('America/Sao_Paulo');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Crie seu tópico</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" href="../bootstrap/petos.css" media="all">
    <link rel="stylesheet" href="../bootstrap/offcanvas.css" rel="stylesheet">

      
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-info">
    <img src="../img/petoslogo.png" height="30" class="d-inline-block align-top" alt="">
  <a class="navbar-brand mr-auto mr-lg-0" href="#">PETos - Social Media</a>
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse offcanvas-collapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="forum.php">Forum <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="perfil.php">Perfil</a>
      </li>
    </ul>
  </div>
    </ul>
  </div>
</nav>
            <main role="main" class="container">
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                        <h1 class="text-white">Crie seu Tópico</h1>
                    </div>


                <div class="container">
                    <div class="row">
                        
                        <div class="card-body">
                                                        
                            <form action="../Forms/processaTodosFormularios.php" method="POST">
                                <label for="titulo">Tema <span class="require text-danger">*</span></label>
                                <select  class="form-control" name="tema">
                                    <option autofocus value="outros">Outros</option>
                                    <option value="saude">Saúde</option>
                                    <option value="lazer">Lazer</option>
                                    <option value="curiosidades">Curiosidades</option>
                                    <option value="ajuda">Ajuda</option>
                                </select>                                
                                <div class="form-group my-2">
                                    <label for="titulo">Título <span class="require text-danger">*</span></label>
                                    <input type="text" class="form-control" name="titulo"/>
                                </div>
                                
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <textarea rows="5" class="form-control" name="conteudo" ></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <p><span class="require text-danger">*</span> - campo obrigatório</p>
                                </div>

                                <div class="form-group">
                                    <button name="acao" class="btn btn-info" value="topic" type="submit">
                                        Criar
                                    </button>
                                </div>
                                
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>
        <script src="../bootstrap/js/jquery/jquery-slim.min.js"></script>
        <script>window.jQuery || document.write('<script src="../bootstrap/js/jquery/jquery-slim.min.js<\/script>')</script>
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../bootstrap/offcanvas.js"></script></body>
    </body>
</html>