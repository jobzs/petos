<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PETos</title>


    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" href="bootstrap/petos.css" media="all">

  </head>

  <body>

    <nav class="navbar navbar-dark bg-info">
      <a class="navbar-brand" href="#">
        <img src="img/petoslogo.png" height="30" class="d-inline-block align-top" alt="">
        <span class="text-monospace">PETos - Social Media</span>
      </a>
    </nav>

    <img src="img/petoslogo.png" height="30%" class="rounded mx-auto d-block mt-5 img-responsive" style="position: center;" alt="PETos">
    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header text-center">
              Login
            </div>
            <div class="card-body">
              <form action="Forms/processaTodosFormularios.php" method="POST">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>
                <div>
                  Qual o tipo de conta você deseja acessar?
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tipo" id="inlineRadio1" value="pf">
                  <label class="form-check-label" for="inlineRadio1">Pet</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tipo" id="inlineRadio2" value="pj">
                  <label class="form-check-label" for="inlineRadio2">Comercial</label>
                </div>
                <br>
                <button name="acao" value="logar" class="btn btn-lg btn-info btn-block">Entrar</button>
                <h3 class="text-info text-sm-center"> ou </h3>
                <a href="paginas/cadastro.php" class="btn btn-lg btn-dark btn-block">Cadastre-se</a>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>