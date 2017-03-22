<?php
// O comando abaixo faz o include da classe AppController que encontra-se na pasta app/Controller
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
// Observe que o controller PostsController extende a classe AppController
class PostsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
/*
A propriedade recursive define qual a profundidade que o CakePHP deve ir para procurar modelos associados de dados via métodos find() e read().

Imagine uma aplicação com Groups e cada Group contém muitos Users que por sua vez, cada User tem muitos Articles. Você pode setar $recursive para vários valores baseado no total de dados que você deseja de volta de uma chamada $this->Group->find():

    -1 Cake busca somente dados de Group, sem joins.
    0 Cake busca dados de Group e seu domínio
    1 Cake busca um Group, seu domínio e seus Users associados
    2 Cake busca um Group, seu domínio, seus Users associados e os Articles assoaiados aos Users

Não defina $recursive mais do que você precisa. Quando você tem dados buscados pelo CakePHP você não vai deixar sua aplicação lenta desnecessariamente. Observe também que o nível recursivo padrão é 1.
*/
		$this->Post->recursive = 0;
/*
O método set() tem como objetivo enviar informações para a View.
Com a linha abaixo a view index.ctp poderá chamar o array $posts, que contém todos os posts paginados.
*/
		$this->set('posts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		// Verifica com o model Post, se existe o $id recebido
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		// Opções para filtrar o model Post que tem o $id como chave primária
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		// Passa para a view a variável $post com o primeiro Post encontrado
		$this->set('post', $this->Post->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		// Verifica se a requisição é do tipo POST
		if ($this->request->is('post')) {
			// Cake PHP recomenda chamar a função create() para re-inicializar um model antes de salvar
			// um novo registro. Criar - create(). Salvar/Atualizar - save().
			$this->Post->create();
			// O método save() salva o registro e também valida
			if ($this->Post->save($this->request->data)) {
				// setFlash mostra uma mensagem
				$this->Session->setFlash(__('The post has been saved'));
				// redirect redireciona para o action index. Também existem outros parâmetros
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		// Verifica se existe o $id no model Post
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
	//echo 'CONTROLLER - Enviando para o Model';
	//exit;
		// Verifica se houve requisição do tipo POST ou PUT
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->save($this->request->data)) {
	//echo 'CONTROLLER - Vindo do Model';
	//exit;
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		// Guarda em $this->Post->id o $id passado via parâmetro
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		// CakeRequest::onlyAllow($methods) - adicionado no Cake 2.3. Substituiu o método 
		// requireDelete() das versões anteriores.
		$this->request->onlyAllow('post', 'delete');
		// Exclui o registro
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('Post deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Post was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
