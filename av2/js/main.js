$(document).ready(function (success) {

  var objIncluir = {
    nome: "",
    codigo: 0,
    fabricante: "",
    preco: 0,
    qtde: "",
    categoria: "",
    tipo: "",
    peso: 0,
    data: "",
    descricao: "",
  }

  var codProduto = 0;

  function init () {
    addEvents();
  };


  function incluirProduto () {

    let xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {
        alert(this.responseText);

        $("#incluirProduto input, #incluirProduto select").each(function(i) {
          $(this).val("");
        });

        objIncluir = {
          nome: "",
          codigo: 0,
          fabricante: "",
          preco: 0,
          qtde: "",
          categoria: "",
          tipo: "",
          peso: 0,
          data: "",
          descricao: "",
        }

      }

    }

    xmlHttp.open(
      "GET", "incluirProduto.php?nome=" + objIncluir.nome + "&codigo=" + objIncluir.codigo +
      "&fabricante=" + objIncluir.fabricante + "&preco=" + objIncluir.preco + "&qtde=" +
      objIncluir.qtde + "&categoria=" + objIncluir.categoria + "&tipo=" + objIncluir.tipo +
      "&peso=" + objIncluir.peso + "&data=" + objIncluir.data + "&descricao=" + objIncluir.descricao
    );

    xmlHttp.send();

  };

  function listarUmProduto () {

    let xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {
        console.log( "retorno do back: ", this.responseText );
            
        produto = JSON.parse(this.responseText);
        console.log( "objeto parseado no front: ", produto );

                /*<td class="nome"></td>
                <td class="cod"></td>
                <td class="fab"></td>*/
        $("#listarUm table td.nome").html(produto.nomeProduto);
        $("#listarUm table td.cod").html(produto.codigoBarras);
        $("#listarUm table td.fab").html(produto.fabricante);

        $("#listarUm form").addClass("hide");
        $("#listarUm table").removeClass("hide");


      }

    }

    xmlHttp.open(
      "GET", "listarUmProduto.php?codigo=" + codProduto
    );

    xmlHttp.send();

  };

  function excluirUmProduto () {

    let xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {
        alert(this.responseText);
        location = 'apagar.html';
        
      }

    }

    xmlHttp.open(
      "GET", "excluirUmProduto.php?codigo=" + codProduto
    );

    xmlHttp.send();

  };

  

  function addEvents () {
    
    // ao clicar no botão enviar da página 'incluirProduto.html', guardar os dados de todos os itens do formulário dessa página.
    $("#incluir").on( 'click', function() {

      objIncluir.nome = $(this).closest("form").find("#nome").val();
      objIncluir.codigo = $(this).closest("form").find("#codigo").val();
      objIncluir.fabricante = $(this).closest("form").find("#fabricante").val();
      objIncluir.preco = $(this).closest("form").find("#preco").val();
      objIncluir.qtde = $(this).closest("form").find("#qtde").val();
      objIncluir.categoria = $(this).closest("form").find("#categoria").val();
      objIncluir.tipo = $(this).closest("form").find("#tipo").val();
      objIncluir.peso = $(this).closest("form").find("#peso").val();
      objIncluir.data = $(this).closest("form").find("#data").val();
      objIncluir.descricao = $(this).closest("form").find("#descricao").val();

      console.log(objIncluir);

      incluirProduto();

    });

    $("#listarUm #enviarListarUm").on( 'click', function() {

      codProduto = $("#listarUm #codBarras").val();

      listarUmProduto();

    });

     $("#excluirProduto #excluir").on( 'click', function() {

      codProduto = $("#excluirProduto #codBarras").val();

      excluirUmProduto();

    });
    

  };

  init();

});
