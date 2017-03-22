<?php
class pessoa {
	// propriedade
	private $nome;

	// método setter
	function set_nome($novo_nome) {
		$this->nome = $novo_nome;
	}

	// método getter
	function get_nome() {
		return $this->nome;
	}
}

$p = new pessoa;
$p->set_nome('Ribamar');
print $p->get_nome();
?>
