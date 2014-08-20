<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Organizations Controller
 *
 * @property App\Model\Table\OrganizationsTable $Organizations
 */
class OrganizationsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('organizations', $this->paginate($this->Organizations));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function view($id = null) {
		$organization = $this->Organizations->get($id, [
			'contain' => ['Users']
		]);
		$this->set('organization', $organization);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$organization = $this->Organizations->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Organizations->save($organization)) {
				$this->Flash->success('The organization has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The organization could not be saved. Please, try again.');
			}
		}
		$this->set(compact('organization'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$organization = $this->Organizations->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['post', 'put'])) {
			$organization = $this->Organizations->patchEntity($organization, $this->request->data);
			if ($this->Organizations->save($organization)) {
				$this->Flash->success('The organization has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The organization could not be saved. Please, try again.');
			}
		}
		$this->set(compact('organization'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function delete($id = null) {
		$organization = $this->Organizations->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Organizations->delete($organization)) {
			$this->Flash->success('The organization has been deleted.');
		} else {
			$this->Flash->error('The organization could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
