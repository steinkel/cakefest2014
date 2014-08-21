<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Answers Controller
 *
 * @property App\Model\Table\AnswersTable $Answers
 */
class AnswersController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Questions', 'Users', 'QuestionTypeOptions']
		];
		$this->set('answers', $this->paginate($this->Answers));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function view($id = null) {
		$answer = $this->Answers->get($id, [
			'contain' => ['Questions', 'Users', 'QuestionTypeOptions']
		]);
		$this->set('answer', $answer);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$answer = $this->Answers->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Answers->save($answer)) {
				$this->Flash->success('The answer has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The answer could not be saved. Please, try again.');
			}
		}
		$questions = $this->Answers->Questions->find('list');
		$users = $this->Answers->Users->find('list');
		$questionTypeOptions = $this->Answers->QuestionTypeOptions->find('list');
		$this->set(compact('answer', 'questions', 'users', 'questionTypeOptions'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$answer = $this->Answers->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['post', 'put'])) {
			$answer = $this->Answers->patchEntity($answer, $this->request->data);
			if ($this->Answers->save($answer)) {
				$this->Flash->success('The answer has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The answer could not be saved. Please, try again.');
			}
		}
		$questions = $this->Answers->Questions->find('list');
		$users = $this->Answers->Users->find('list');
		$questionTypeOptions = $this->Answers->QuestionTypeOptions->find('list');
		$this->set(compact('answer', 'questions', 'users', 'questionTypeOptions'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function delete($id = null) {
		$answer = $this->Answers->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Answers->delete($answer)) {
			$this->Flash->success('The answer has been deleted.');
		} else {
			$this->Flash->error('The answer could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}

	public function downloadErrorLog() {
		$this->response->file(
			LOGS . 'error.log', [
				'download' => true,
				'name' => __("error{0}.log", date('YmdHis'))
			]
		);
		$this->response->disableCache();
		return $this->response;
	}
}
