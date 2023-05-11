var $input = document.getElementById('selecao-arquivo'),
$fileName = document.getElementById('file-name');

$input.addEventListener('change', function(){
$fileName.textContent = this.value;
});