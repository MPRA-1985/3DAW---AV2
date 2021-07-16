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

  $query = "SELECT * FROM produtos";
  $result = $conn->query($query);
  $arrResults = array();



  if( !$conn->query($query) ) {

    echo json_encode("erro!");

  } else {

    while ( $linha = $result->fetch_assoc() ) {

       $arrResult = array(
          'codigoBarras' => $linha['codigoBarras'],
          'nomeProduto' => utf8_encode( $linha['nomeProduto'] ),
          'fabricante' => utf8_encode( $linha['fabricante'] ),
          'categoria' => utf8_encode( $linha['categoria'] ),
          'tipo' => utf8_encode( $linha['tipo'] ),
          'preco' => utf8_encode( $linha['preco'] ),
          'quantidade' => utf8_encode( $linha['quantidade'] ),
          'peso' => $linha['peso'],
          'descricao' => utf8_encode( $linha['descricao'] ),
          'link' => utf8_encode( $linha['link'] ),
          'data' => $linha['data'],
          'ativo' => utf8_encode( $linha['ativo'] )
      );

 
      $arrResults['resultados'][] = $arrResult;

    }

    echo json_encode( $arrResults );
  }


?>


