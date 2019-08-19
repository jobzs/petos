<?php  

session_start();

if (!isset($_SESSION['idusuario'])) {
        echo "<script> alert('Acesso negado'); </script>";
        echo '<meta http-equiv = refresh content= "0; url = ../index.php">';
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Forum</title>

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
</nav>
            

            <main role="main" class="container">
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                  
<div class="table-responsive">
                    <table class="table">
                      <thead class=" bg-info text-white">
                        <tr>
                          <th></th>
                          <th>Usuario</th>
                          <th>Data</th>
                          <th>Título</th>
                          <th>Tema</th>
                          
                          </tr>
                        </thead>
                      <tbody>

                         <?php 
                            include '../BO/petosBO.php';
                            $resultado = consultartopicogetBO($_GET['idtopico']);
                              
                            if($resultado->rowCount() > 0)
                            {
                              while($registro = $resultado->fetch(PDO::FETCH_OBJ)){           
                                 

                                 ?>
                        <tr>
                          <td><svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></td>
                          <td><?php echo $registro->idusuario; ?></td>
                          <td><?php echo $registro->datatopico; ?></td>
                          <td><?php echo $registro->titulo; ?></td>
                          <td><?php echo $registro->tema; ?></td>
                        </tr>
                        <tr>
                          <th>Tópico</th>
                          <td colspan="5"><?php echo $registro->conteudo; }} ?></td>
                        </tr>   
                      </tbody>
                    </table>

    </div>
    <div class="table-responsive">
                    <table class="table">
                      <thead class="bg-purple text-white">
                        <tr>
                          <th></th>
                          <th>Usuario</th>
                          <th>Data</th>         
                          
                          </tr>
                        </thead>
                      <tbody>
                       <?php 

                        $resultado = consultarrespostaBO($_GET['idtopico']);
                              
                            if($resultado->rowCount() > 0)
                            {
                              while($registro = $resultado->fetch(PDO::FETCH_OBJ)){           
                                 

                                 ?>
                        <tr>
                          <td><svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></td>
                          <td><?php echo $registro->idusuario; ?></td>
                          <td><?php echo $registro->dataresp; ?></td>
                        </tr>
                        <tr>
                          <th>Resposta</th>
                          <td colspan="5"><?php echo $registro->conteudo; }}?></td>
                        </tr>   
                      </tbody>
                    </table>

    </div>

                <div class="container">
                    <div class="row">
                        
                        <div class="card-body">
                                                        
                            <form action="../Forms/processaTodosFormularios.php?idtopico=<?php echo $_GET['idtopico']; ?>" method="POST">                               
                                <div class="form-group">
                                    <label for="descricao">Responder:</label>
                                    <textarea rows="5" class="form-control" name="conteudo" ></textarea>
                                </div>           
                                <input type="hidden" name="<?php echo $_SESSION['idusuario']; ?>">
                                <input type="hidden" name="dataresp">                 
                                                   
                                <div class="form-group">
                                    <button class="btn btn-info" name="acao" value="cadastrarresposta">
                                        Enviar
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