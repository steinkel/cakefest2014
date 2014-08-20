<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tags Controller
 *
 * @property App\Model\Table\TagsTable $Tags
 */
class TagsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('tags', $this->paginate($this->Tags));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function view($id = null) {
		$tag = $this->Tags->get($id, [
			'contain' => ['Questions', 'QuestionsTags']
		]);
		$this->set('tag', $tag);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$tag = $this->Tags->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Tags->save($tag)) {
				$this->Flash->success('The tag has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The tag could not be saved. Please, try again.');
			}
		}
		$questions = $this->Tags->Questions->find('list');
		$this->set(compact('tag', 'questions'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$tag = $this->Tags->get($id, [
			'contain' => ['Questions']
		]);
		if ($this->request->is(['post', 'put'])) {
			$tag = $this->Tags->patchEntity($tag, $this->request->data);
			if ($this->Tags->save($tag)) {
				$this->Flash->success('The tag has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The tag could not be saved. Please, try again.');
			}
		}
		$questions = $this->Tags->Questions->find('list');
		$this->set(compact('tag', 'questions'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function delete($id = null) {
		$tag = $this->Tags->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Tags->delete($tag)) {
			$this->Flash->success('The tag has been deleted.');
		} else {
			$this->Flash->error('The tag could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
