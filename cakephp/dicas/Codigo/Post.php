<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Post extends AppModel {
/*
O model é a camada que vai ao banco de dados e traz algo de lá, se for o caso.
Também é aqui que se valida os dados de cada campo da tabela.
Outra função importante do model é a de lidar com os relacionamentos/associações.
Veja outros models gerados pelo Cake, especialmente com tabelas relacionadas para detalhes.
*/
	public function beforeSave($options = array()){
	//	echo 'MODEL - antes de salvar';
	//	exit;
	}

	public function afterSave($options = array()){
		//echo 'MODEL - após salvar<br>';
	}

}
