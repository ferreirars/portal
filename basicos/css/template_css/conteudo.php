<?php
/*
Outra forma mais usual de receber conteúdo é trazendo do banco de dados.
*/

$index = "
				<br>
				<br>
				Índex.
				<br>
				Demonstração de como substituir os frames por CSS.
				<br>
				<a href=\"http://ribafs.org\">http://ribafs.org</a>
				<br>
				<h2>Como adicionar outra página?</h2>
				- Copiar a index.php ou a inserir.php 
				<br>
				- E fazer as devidas alterações para a página que deseja adicionar.
				<br>
				- Então entre o nome do arquivo no menu.php.
				<br>
				- Quando quizer usar uma página sem o menu use o id conteudo_cheio, ao invés de conteudo, que ocupará toda a largura da página.
				<br>
				<br>
				<h2>Como Adicionar um Template?</h2>
				- Faça uma cópia do diretório <b>green_glass</b> e renomeie a cópia para um nome desejado
				<br>
				- Edite o CSS para alterar formatos, cores e posições
				<br>
				- Troque ou edite as imagens como desejar.
				<br>
				- Depois disso basta trocar o include do CSS nas páginas. 
				<br>Exemplo: caso tenha renomeado a pasta para blue_glass, então basta trocar green_glass por blue_glass no include do CSS.
				<br>
";

$inserir="
				<fieldset>
				<legend>Cadastro de Clientes</legend>		
				<form id=\"test\" name=\"frmClientes\" action=\"\" method=\"post\" onSubmit=\"alert('Form submetido!')\">

					<div class=\"form-row\">
						<div class=\"field-label\"><label for=\"nome\">Nome</label></div>
						<div class=\"field-widget\"><input name=\"nome\" id=\"nome\" class=\"required\" title=\"Entre seu nome\" size=\"45\" maxlength=\"45\" /></div>
					</div>
					<div class=\"form-row\">
						<div class=\"field-label\"><label for=\"email\">E-mail</label></div>
						<div class=\"field-widget\"><input name=\"email\" title=\"Entre seu e-mail\" size=\"45\" /></div>
					</div>
				</fieldset>
					<input type=\"submit\" value=\"Enviar\" /> <input type=\"button\" value=\"Cancelar\" onclick=\"valid.reset(); return false;\" />
				</form>
";

$conteudo_cheio="
				<br><font size=2>
				<br>
				Índex.
				<br>
				Demonstração de como substituir os frames por CSS.
				<br>
				<a href=\"http://ribafs.org\">http://ribafs.org</a>
				<br>
				<h2>Sem menu</h2>
				<br>
				<a href=\"index.php\">Voltar</a>
";

?>
