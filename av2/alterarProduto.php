
<?php

  $nome = $_GET['nomeDisc'];
  $periodo = $_GET['periodoDisc'];
  $idPre = $_GET['idPreDisc'];
  $creditos = $_GET['creditosDisc'];

?>

<!DOCTYPE html>

  <html lang="en">

    <head>

        <title>Sistema</title>

        <meta charset="utf-8">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link href="css/estilo.css" rel="stylesheet">

        <script src="js/main.js"></script>

    </head>

    <body>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav mr-auto">

              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="incluirProduto.html">Incluir novo produto</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="alterar.php">Alterar produto</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="listar_todos.php">Listar todos os produtos</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="listar_um.html">Listar um produto</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="apagar.html">Remover produto</a>
              </li>

            </ul>

        </div>

      </nav>

      <div id="content" class="mx-auto">

          <form class="form-row" method="POST" action="" style="margin-bottom: 85px;">

              <div class="col-sm-12">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome da disciplina" value='<?php echo $nome?>'>
              </div>

              <div class="col-sm-12">
                <label for="preReq">Pré requisito</label>
                <input type="number" class="form-control preReq" id="preReq" name="preReq" placeholder="Insira o ID do pre requisito" value='<?php echo $idPre?>'>
              </div>

              <div class="col-sm-12">
                <label for="periodo">Período</label>
                <input type="number" class="form-control periodo" id="periodo" name="periodo" placeholder="Insira o período" value='<?php echo $periodo?>'>
              </div>

              <div class="col-sm-12">
                <label for="creditos">Creditos</label>
                <input type="number" class="form-control creditos" id="creditos" name="creditos" placeholder="Insira a quantidade de creditos" value='<?php echo $creditos?>'>
              </div>

              <div class="form-group col-md-12">
                  <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
              </div>

          </form>

      </div>


    </body>

</html>

<?php
   
   if ( isset( $_POST['enviar'] ) ) {

      //Criar conexão com o banco
      $servidor = "localhost";
      $usuario = "root";
      $senha = "";
      $nomeBanco = "av2daw";

      $nome = $_POST['nome'];
      $id = $_GET['idDisc'];
      $periodo = $_POST['periodo'];
      $idPreReq = $_POST['preReq'];
      $creditos = $_POST['creditos'];

      $conn = mysqli_connect( $servidor, $usuario, $senha, $nomeBanco );

      if( !$conn ) {
        die( "Erro de conexão com localhost, o seguinte erro ocorreu ->".mysql_error() );
      }


      $query =  "UPDATE disciplina SET nome = '$nome', periodo = '$periodo', idPreReq = '$idPreReq', creditos = '$creditos' WHERE id = '$id'";

      if( $conn->query($query) ) {
        echo "<script>alert('Cadastro realizado com sucesso'); location= 'alterar.php';</script>";
      } else {
        echo "erro!";
      }

   } 


?>