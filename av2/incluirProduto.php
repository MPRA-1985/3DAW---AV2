<?php

//Criar conexão com o banco
  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $nomeBanco = "av2daw";
  
  $nome = $_GET['nome'];
  $codigo = $_GET['codigo'];
  $fabricante = $_GET['fabricante'];
  $preco = $_GET['preco'];
  $qtde = $_GET['qtde'];
  $categoria = $_GET['categoria'];
  $tipo = $_GET['tipo'];
  $peso = $_GET['peso'];
  $data = $_GET['data'];
  $descricao = $_GET['descricao'];
  $link = "images/" . $codigo . ".jpg";
  $status = 1;

 $conn = mysqli_connect($servidor, $usuario, $senha, $nomeBanco);

  if( !$conn ) {
    die( "Erro de conexão com localhost, o seguinte erro ocorreu ->".mysql_error() );
  }

  // Passar o comando sql para inserir a tabela

  $query = "INSERT INTO produtos (codigoBarras, nomeProduto, fabricante, categoria, tipo, preco, quantidade, peso, descricao, link, data, ativo ) VALUES ('$codigo', '$nome', '$fabricante', '$categoria', '$tipo', '$preco', '$qtde', '$peso', '$descricao', '$link', '$data', '$status')";

  if( !$conn->query($query) ) {
    echo json_encode("erro!");
  } else {
    echo json_encode("Produto incluído com sucesso!");
  }


?>


