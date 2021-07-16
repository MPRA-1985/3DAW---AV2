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

  $query =  "SELECT * FROM produtos WHERE codigoBarras='$codigo'";

  $result = $conn->query($query);


  if( !$conn->query($query) ) {

    echo json_encode("erro!");

  } else {

    while ( $linha = $result->fetch_assoc() ) {

       $arrResult = array(
          'codigoBarras' => $linha['codigoBarras'],
          'nomeProduto' => utf8_encode( $linha['nomeProduto'] ),
          'fabricante' => utf8_encode( $linha['fabricante'] ),
      );

    }

    echo json_encode( $arrResult );

  }


?>


