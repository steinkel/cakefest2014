<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QuestionsTags Controller
 *
 * @property App\Model\Table\QuestionsTagsTable $QuestionsTags
 */
class QuestionsTagsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Questions', 'Tags']
		];
		$this->set('questionsTags', $this->paginate($this->QuestionsTags));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function view($id = null) {
		$questionsTag = $this->QuestionsTags->get($id, [
			'contain' => ['Questions', 'Tags']
		]);
		$this->set('questionsTag', $questionsTag);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$questionsTag = $this->QuestionsTags->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->QuestionsTags->save($questionsTag)) {
				$this->Flash->success('The questions tag has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The questions tag could not be saved. Please, try again.');
			}
		}
		$questions = $this->QuestionsTags->Questions->find('list');
		$tags = $this->QuestionsTags->Tags->find('list');
		$this->set(compact('questionsTag', 'questions', 'tags'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$questionsTag = $this->QuestionsTags->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['post', 'put'])) {
			$questionsTag = $this->QuestionsTags->patchEntity($questionsTag, $this->request->data);
			if ($this->QuestionsTags->save($questionsTag)) {
				$this->Flash->success('The questions tag has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The questions tag could not be saved. Please, try again.');
			}
		}
		$questions = $this->QuestionsTags->Questions->find('list');
		$tags = $this->QuestionsTags->Tags->find('list');
		$this->set(compact('questionsTag', 'questions', 'tags'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function delete($id = null) {
		$questionsTag = $this->QuestionsTags->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->QuestionsTags->delete($questionsTag)) {
			$this->Flash->success('The questions tag has been deleted.');
		} else {
			$this->Flash->error('The questions tag could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
