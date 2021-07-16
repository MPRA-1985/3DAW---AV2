<?php

//Criar conexão com o banco
  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $nomeBanco = "av2daw";
  
  
  $codigo = $_GET['codigo'];
  

 $conn = mysqli_connect($servidor, $usuario, $senha, $nomeBanco);

  if( !$conn ) {
    die( "Erro de conexão com localhost, o seguinte erro ocorreu ->".mysql_error() );
  }

  // Passar o comando sql para inserir a tabela

  $query = "DELETE FROM produtos WHERE codigoBarras = $codigo";

  if( !$conn->query($query) ) {
    echo json_encode("erro!");
  } else {
    echo json_encode("Produto removido com sucesso!");
  }


?>


