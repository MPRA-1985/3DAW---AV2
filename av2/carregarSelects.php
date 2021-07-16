<?php

//Criar conexão com o banco
  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $nomeBanco = "av2daw";

  $conn = mysqli_connect($servidor, $usuario, $senha, $nomeBanco);

  if( !$conn ) {
    die( "Erro de conexão com localhost, o seguinte erro ocorreu ->".mysql_error() );
  }

  // Passar o comando sql para inserir a tabela

  $query1 = "SELECT * FROM categoria";
  $query2 = "SELECT * FROM tipo";

  $result1 = $conn->query($query1);
  $result2 = $conn->query($query2);

  $arrResults = array();


  if( !$conn->query($query1) ) {

    echo json_encode("erro!");

  } else {

    while ( $linha = $result1->fetch_assoc() ) {

       $arrResult1 = array(
          'nomeCategoria' => utf8_encode( $linha['nome'] ),
      );

      $arrResults['categoria'][] = $arrResult1;

    }

  }

  if( !$conn->query($query2) ) {

    echo json_encode("erro!");

  } else {

    while ( $linha = $result2->fetch_assoc() ) {

       $arrResult2 = array(
          'nomeTipo' => utf8_encode( $linha['nome'] ),
      );

      $arrResults['tipo'][] = $arrResult2;

    }

  }

  echo json_encode( $arrResults );
  
?>


