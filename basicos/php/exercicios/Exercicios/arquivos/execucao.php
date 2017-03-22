<?php

// Em PHP a crase ` é um operador de execução de arquivos do SO
// Como em scripts bash

// Exibir todos os arquivos do diretório atual, inclusive os ocultos
if (PHP_OS == "WINNT"){

	$output = `dir/o/p`;
	echo "<pre>$output</pre>";
} elseif (PHP_OS == "Linux){
	$output = `ls -la`;
	echo "<pre>$output</pre>";
}else{
	echo "Você está usando um SO diferente de Linux e de Windows!"
}
?>
