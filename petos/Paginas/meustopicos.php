<?php  

session_start();

if (!isset($_SESSION['idusuario'])) {
        echo "<script> alert('Acesso negado'); 
      window.location = '../index.php';
      </script>";
}


?>
<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forum</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" href="../bootstrap/petos.css" media="all">
    <link rel="stylesheet" href="../bootstrap/offcanvas.css" rel="stylesheet">



  </head>
  <body class="bg-light">
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
  <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
    <a href="criatopico.php" class="btn btn-lg btn-info btn-block">Crie seu Tópico</a>
  </div>

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <form class="form-inline my-2 my-lg-0" action="#" method="GET">
      <input class="form-control mr-sm-2" type="text" name="busca" placeholder="Buscar tópico"/>
      <button class="btn btn-primary" type="submit">Ok</button>
    </form>
    <br>
    <div class="table-responsive">
      <h2>Seus Tópicos</h2>
      <table class="table">
      <thead>
        <tr>
          <th></th>
          <th>Usuario</th>
          <th>Data</th>
          <th>Tema</th>
          <th>Título</th>
          <th>Ações</th>
        </tr>
      </thead>

      <tbody>
        
        <?php 
        if(isset($_GET['busca'])){
      include '../BO/petosBO.php';
                        $resultado = buscartopicousuarioativoBO($_GET['busca'], $_SESSION['idusuario']);                          
                        if($resultado->rowCount() > 0){
                        while($registro = $resultado->fetch(PDO::FETCH_OBJ)) 
                          {
                     
                   ?>
        <tr>
          <td><a href="../Paginas/topico.php?idtopico=<?php echo $registro->idtopico; ?>"><svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title>
            <rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></td></a>
          <td><?php echo $registro->idusuario ; ?></td>
          <td><?php echo $registro->datatopico ; ?></td>
          <td><?php echo $registro->tema ;?></td>
          <td><?php echo $registro->titulo ;?></td>
          <td>
           
                <a href="../Paginas/editatopico.php?idtopico=<?php echo $registro->idtopico; ?>" class="btn btn-success">
                 Editar
                </a>
            
          </td>
          <td>
            <form action="../Forms/processaTodosFormularios.php?idtopico=<?php echo $registro->idtopico; ?>" method="POST">
            <button name="acao" value="Excluir" class="btn btn-danger">
                    Excluir
                    </button>
                  </form>
          
          </td>
        </td>
      </tr>
        <?php }
      }
      }else{
              include '../BO/petosBO.php';
              $resultado = buscartopicousuarioBO($_SESSION['idusuario']);
                
              if($resultado->rowCount() > 0)
              {
                while($registro = $resultado->fetch(PDO::FETCH_OBJ)){           
                   ?>
        <tr>
          <td><a href="../Paginas/topico.php?idtopico=<?php echo $registro->idtopico; ?>"><svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title>
            <rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></td></a>
          <td><?php echo $registro->idusuario ; ?></td>
          <td><?php echo $registro->datatopico ; ?></td>
          <td><?php echo $registro->tema ;?></td>
          <td><?php echo $registro->titulo ;?></td>
          <td>
                <a href="../Paginas/editatopico.php?idtopico=<?php echo $registro->idtopico; ?>" class="btn btn-success">
                 Editar
                </a>
            
          </td>
          <td>
            <form action="../Forms/processaTodosFormularios.php?idtopico=<?php echo $registro->idtopico; ?>" method="POST">
            <button name="acao" value="Excluir" class="btn btn-danger">
                    Excluir
                    </button>
                  </form>
          </td>
        </tr>
        <?php }}} ?>
      </tbody>
    </table>

    </div>
  </div>
      
</main>
<script src="../bootstrap/js/jquery/jquery-slim.min.js"></script>
      <script>window.jQuery || document.write('<script src="../bootstrap/js/jquery/jquery-slim.min.js<\/script>')</script>
      <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="../bootstrap/offcanvas.js"></script></body>
</html>
