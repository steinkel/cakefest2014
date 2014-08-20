<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QuestionTypes Controller
 *
 * @property App\Model\Table\QuestionTypesTable $QuestionTypes
 */
class QuestionTypesController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('questionTypes', $this->paginate($this->QuestionTypes));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function view($id = null) {
		$questionType = $this->QuestionTypes->get($id, [
			'contain' => ['QuestionTypeOptions', 'Questions']
		]);
		$this->set('questionType', $questionType);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$questionType = $this->QuestionTypes->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->QuestionTypes->save($questionType)) {
				$this->Flash->success('The question type has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The question type could not be saved. Please, try again.');
			}
		}
		$this->set(compact('questionType'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$questionType = $this->QuestionTypes->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['post', 'put'])) {
			$questionType = $this->QuestionTypes->patchEntity($questionType, $this->request->data);
			if ($this->QuestionTypes->save($questionType)) {
				$this->Flash->success('The question type has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The question type could not be saved. Please, try again.');
			}
		}
		$this->set(compact('questionType'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function delete($id = null) {
		$questionType = $this->QuestionTypes->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->QuestionTypes->delete($questionType)) {
			$this->Flash->success('The question type has been deleted.');
		} else {
			$this->Flash->error('The question type could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
