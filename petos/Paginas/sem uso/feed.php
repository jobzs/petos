<?php  

session_start();

if (!isset($_SESSION['idusuario'])) {
        
        echo "<script> alert('Acesso negado'); 
            window.location = '../index.php';
          </script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Feed</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="all">
   
    <link rel="stylesheet" href="../bootstrap/sidebar.css" media="all">
    <link rel="stylesheet" href="../bootstrap/petos.css" media="all">
    <!-- Font Awesome JS -->
    <script defer src="../bootstrap/fontawesome/solid.js"></script>
    <script defer src="../bootstrap/fontawesome/fontawesome.js"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" class="bg-info">
            <div class="sidebar-header bg-info">
                <img src="../img/petoslogo.png" height="30" class="d-inline-block align-top" alt="">
                <span class="text-light">PETos</span>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a class="nav-link" href="feed.php">
                        <p>Feed</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="perfil.php">
                        <p>Perfil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notificacoes.php">
                        <p>Notificações</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link text-light" href="forum.php">
                        <p>Forum</p>
                    </a>
                </li> 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mais</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="configuracoes.php">Configurações</a>
                        <a class="dropdown-item" href="editarperfil.php">Editar Perfil</a>
                        <a class="dropdown-item" href="sobre.php">Sobre o PETos</a>
                        <div class="dropdown-divider"></div>
                        <form action="../Forms/processaTodosFormularios.php" method="POST">
                        <button class="dropdown-item" name="acao" value="logout">Sair</button></form>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-info bg-info sticky-top">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="buscar">
                                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Ok</button></form>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="contaneir">
                            <div class="card  card-tasks">
                                <div class="card-header ">
                                    <h4 class="card-title">Seu Feed</h4>
                                </div>
                                <div class="card-body ">
                                    <div class="container">
                    <div class="row">
                        
                        <div class="card-body">
                                                        
                            <form action="../Forms/processaTodosFormularios.php" method="POST">                               
                                <div class="form-group">
                                    <h3>Publicar: </h3>
                                    <textarea rows="5" class="form-control" name="textopublicacao" ></textarea>
                                </div>                             
                                                   
                                <div class="form-group">
                                    <label for="fotopet">Envie uma foto</label>
                                    <input type="file" class="form-control-file" name="midia" id="foto"><br>
                                    <button class="btn btn-info" name="acao" value="cadastrarpublicacao">
                                        Enviar
                                    </button>
                                </div>
                                
                            </form>
                        </div>
                        
                    </div>
                                    <div class="table-full-width table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <?php 
                                                    
                                                  include '../BO/petosBO.php';
                                                                    $resultado = buscarpublisBO();                          
                                                                    if($resultado->rowCount() > 0){
                                                                    while($registro = $resultado->fetch(PDO::FETCH_OBJ)) 
                                                                      {
                                                                 
                                                               ?>
                                                <tr>
                                                    <td><svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></td>
                                                    <td><?php echo $registro->datapublicacao; ?></td>
                                                    <td><?php echo $registro->textopublicacao; ?></td>
                                                    <td><img src="data:image/jpeg;base64,'<?php base64_encode($registro->midia);?>" >
                                                    </td>
                                                </tr>
                                            <?php }}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="../bootstrap/js/jquery/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="../bootstrap/js/ajax/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>

</html>