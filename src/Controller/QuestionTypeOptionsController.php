<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QuestionTypeOptions Controller
 *
 * @property App\Model\Table\QuestionTypeOptionsTable $QuestionTypeOptions
 */
class QuestionTypeOptionsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['QuestionTypes']
		];
		$this->set('questionTypeOptions', $this->paginate($this->QuestionTypeOptions));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function view($id = null) {
		$questionTypeOption = $this->QuestionTypeOptions->get($id, [
			'contain' => ['QuestionTypes', 'Answers']
		]);
		$this->set('questionTypeOption', $questionTypeOption);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$questionTypeOption = $this->QuestionTypeOptions->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->QuestionTypeOptions->save($questionTypeOption)) {
				$this->Flash->success('The question type option has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The question type option could not be saved. Please, try again.');
			}
		}
		$questionTypes = $this->QuestionTypeOptions->QuestionTypes->find('list');
		$this->set(compact('questionTypeOption', 'questionTypes'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$questionTypeOption = $this->QuestionTypeOptions->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['post', 'put'])) {
			$questionTypeOption = $this->QuestionTypeOptions->patchEntity($questionTypeOption, $this->request->data);
			if ($this->QuestionTypeOptions->save($questionTypeOption)) {
				$this->Flash->success('The question type option has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The question type option could not be saved. Please, try again.');
			}
		}
		$questionTypes = $this->QuestionTypeOptions->QuestionTypes->find('list');
		$this->set(compact('questionTypeOption', 'questionTypes'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function delete($id = null) {
		$questionTypeOption = $this->QuestionTypeOptions->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->QuestionTypeOptions->delete($questionTypeOption)) {
			$this->Flash->success('The question type option has been deleted.');
		} else {
			$this->Flash->error('The question type option could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
