<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Questions Controller
 *
 * @property App\Model\Table\QuestionsTable $Questions
 */
class QuestionsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Users', 'QuestionTypes']
		];
		$this->set('questions', $this->paginate($this->Questions));
		$this->set('success', true);
		$this->set('_serialize', [
			'data' => 'questions',
			'success'
		]);
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function view($id = null) {
		$question = $this->Questions->get($id, [
			'contain' => ['Users', 'QuestionTypes', 'Tags', 'Answers']
		]);
		$this->set('question', $question);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$question = $this->Questions->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($response = $this->_saveAndNotify($question)) {
				return $response;
			}
		}
		$users = $this->Questions->Users->find('list');
		$questionTypes = $this->Questions->QuestionTypes->find('list');
		$tags = $this->Questions->Tags->find('list');
		$this->set(compact('question', 'users', 'questionTypes', 'tags'));
	}

	protected function _saveAndNotify($question) {
		$success = $this->Questions->save($question);
		$response = false;

		if ($success && !$this->request->accepts('application/json')) {
			$response = $this->redirect(['action' => 'index']);
		}

		if ($success && $this->request->accepts('application/json')) {
			$question->virtualProperties([]);
			$this->set('data', $question);
			$this->set('success', true);
			$this->set('_serialize', ['data', 'success']);
			return;
		}
		
		if ($response) {
			$this->Flash->success('The question has been saved.');
			return $response;
		}

		$this->Flash->error('The question could not be saved. Please, try again.');
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$question = $this->Questions->get($id, [
			'contain' => ['Tags']
		]);
		if ($this->request->is(['post', 'put'])) {
			$question = $this->Questions->patchEntity($question, $this->request->data);
			if ($this->Questions->save($question)) {
				$this->Flash->success('The question has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The question could not be saved. Please, try again.');
			}
		}
		$users = $this->Questions->Users->find('list');
		$questionTypes = $this->Questions->QuestionTypes->find('list');
		$tags = $this->Questions->Tags->find('list');
		$this->set(compact('question', 'users', 'questionTypes', 'tags'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function delete($id = null) {
		$question = $this->Questions->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Questions->delete($question)) {
			$this->Flash->success('The question has been deleted.');
		} else {
			$this->Flash->error('The question could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
