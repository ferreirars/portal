<?php 
include_once('./conteudo.php');
$conteudo = $_GET['conteudo'];
?>
<html>
<head>
	<title>Templates com CSS</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="./templates/green_glass/style.css" />
</head>

<body>
	<div id="wrapper"> 

		<div id="top"> </div>

		<div id="logomarca"> <b> Templates com CSS </b> </div>

		<div id="contentwrapper"> 

			<?php if($conteudo =='conteudo_cheio'){?>
				<div id="conteudo_cheio">
			<?php }else{?>
				<div id="menu"> 
					<?php 
						include_once("menu.php"); 
					?> 
				</div>

				<div id="conteudo">
             <?php
				}
				switch ($conteudo){
					case 'index':
						print $index;
					break;			 		

					case 'inserir':
						print $inserir;
					break;

					case 'conteudo_cheio':
						print $conteudo_cheio;
					break;

					default:
						print $index;
						break;
				}
             ?>

			</div> <!-- Final do conteudo -->

		</div> <!-- Final do contentwrapper-->

		<div id="rodape">
			Adaptação (2007) <a href="http://ribafs.net">Ribamar FS</a>, Design by <a href="http://lormal.freehostia.com">Rex Jones</a>
		</div>

	</div> <!-- Final do wrapper-->
</body>

</html>
