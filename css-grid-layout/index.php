<!--
*
* ### ESTUDOS DE PROGRAMAÇÃO/DESENVOLVIMENTO WEB | FRONT END ###
*     ##### CSS GRID LAYOUT E O USO DE VARIÁVEIS NO CSS ####
*
* Página criada para estudo sobre uso do Grid Layout e 
* o uso das variáveis no CSS.
*
* autor: Marcelo Diament
* estilo: style-grid-layout.css
* github: Marcelo-Diament
* linkedin: in/marcelodiament
* site: djament.com.br/cv
* 
* Fonte principal: https://medium.com/@fionnachan/dynamic-number-of-rows-and-columns-with-css-grid-layout-and-css-variables-cb8e8381b6f2
* Acesso em 26/09/2018 em às 20:07
*
-->
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title>CSS Grid Layout</title>
	<link rel="stylesheet" href="style-grid-layout.css">
</head>
<body>

<div class="container">
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
  <div class="celula"></div>
</div>

<!-- alterar controles -->
<div class="controles">

  <!-- adicionar célula -->
  <div class="controle">
      <a href="javascript:add();">+ Célula</a>
  </div>

  <!-- subtrair célula -->
  <div class="controle">
      <a href="javascript:del();">- Célula</a>
  </div>

<!-- alterar colunas -->

  <!-- adicionar Coluna -->
  <div class="controle">
  	<a href="javascript:alterarColuna('add');">+ Coluna</a>
  </div>

  <!-- subtrair célula -->
  <div class="controle">
    <a href="javascript:alterarColuna('minus');">- Coluna</a>
  </div>

</div>

<!-- SCRIPT -> javascript (JS) -->
<script>
  // function reset -> pega elemento pelo querySelector (apenas o primeiro, não todos - USAR IDs para seleção)
	function $(el) {
  return document.querySelector(el);
}

// adiciona uma célula
function add() {
  $('.container').innerHTML += '<div class="celula"></div>';
  updateVar();
}

// subtrai uma célula
function del() {  
  $('.celula:last-child').parentNode.removeChild($('.celula:last-child'));
  updateVar();
}

// função que, quando chamada (no fim das ações), atualiza o grid gerando novo valor para as variáveis de CSS
function updateVar(action) {
  let htmlStyles = window.getComputedStyle($("html"));
  let rowNum = parseInt(htmlStyles.getPropertyValue("--rowNum"));
  let colNum = parseInt(htmlStyles.getPropertyValue("--colNum"));
  if (colNum <= 0) {
    document.documentElement.style.setProperty(`--colNum`, 1);
  }
  let gridItemsCount = document.querySelectorAll('.celula').length;
  document.documentElement.style.setProperty(`--rowNum`, Math.ceil(gridItemsCount/colNum));
  if (colNum <= 0 || document.documentElement.style.getPropertyValue("--rowNum") == "Infinity") {
    document.documentElement.style.setProperty(`--rowNum`, 20);
  }
}

// altera colunas
function alterarColuna(action) {
  let htmlStyles = window.getComputedStyle($("html"));
  let colNum = parseInt(htmlStyles.getPropertyValue("--colNum"));
  // adiciona coluna
  if (action == 'add') {
    document.documentElement.style.setProperty(`--colNum`, colNum+1);    
  }
  // subtrai coluna
  else {    
    document.documentElement.style.setProperty(`--colNum`, colNum-1);
  }
  // chama a função de atualizar o grid
  updateVar();
}
</script>
</body>
</html>