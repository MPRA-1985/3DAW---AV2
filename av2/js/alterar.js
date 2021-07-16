var formAlterar = $( "#alterarProduto form" ).detach();
			
let xmlHttp = new XMLHttpRequest();

xmlHttp.onreadystatechange = function() {

  if (this.readyState == 4 && this.status == 200) {

      console.log( "retorno do back: ", this.responseText );
      
      var produtos = JSON.parse(this.responseText);
      console.log( "objeto parseado no front: ", produtos );
      console.log( "teste: ", produtos.resultados );

      for ( var i = 0; i < produtos.resultados.length; i++  ) {

      	var trTable = 	"<tr><td>" + produtos.resultados[i]['nome'] + "</td>" + // nome
						"<td>" + produtos.resultados[i]['codigoBarras'] + "</td>" +	// codigo de barras
						"<td>" + produtos.resultados[i]['fabricante'] + "</td>" + // fabricante
						"<td>" + "<a id='" + produtos.resultados[i]['codigoBarras'] + "' class='btn btn-primary'>Alterar</a>" + 
						"</td></tr>";

		$("#alterarProduto table").append(trTable);				 

      }
      
  } 

}  
  
xmlHttp.open("GET", "carregar.php");

xmlHttp.send();

// AO CLICAR NO ALTERAR
$("#alterarProduto").on( 'click', 'a.btn', function() {

  var codBarras = $(this).attr("id");

  $("#alterarProduto table").addClass("hide");

  formAlterar.removeClass("hide");

  $("#incluirProduto content").append(formAlterar);	

});