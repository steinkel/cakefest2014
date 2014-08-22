<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use App\Model\Entity\Answer;
use Cake\Network\Email\Email;
use Cake\Routing\Router;
use Cake\Utility\Debugger;

/**
 * Answers Model
 */
class AnswersTable extends Table {

	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config) {
		$this->table('answers');
		$this->displayField('id');
		$this->primaryKey('id');

		$this->belongsTo('Questions', [
			'foreignKey' => 'question_id',
		]);
		$this->belongsTo('Users', [
			'foreignKey' => 'user_id',
		]);
		$this->belongsTo('QuestionTypeOptions', [
			'foreignKey' => 'question_type_option_id',
		]);
		$this->addBehavior('NotifyOwner', ['log' => true]);
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator) {
		$validator
				->add('id', 'valid', ['rule' => 'numeric'])
				->allowEmpty('id', 'create')
				->add('question_id', 'valid', ['rule' => 'numeric'])
				->validatePresence('question_id', 'create')
				->notEmpty('question_id')
				->add('user_id', 'valid', ['rule' => 'numeric'])
				->validatePresence('user_id', 'create')
				->notEmpty('user_id')
				->add('question_type_option_id', 'valid', ['rule' => 'numeric'])
				->validatePresence('question_type_option_id', 'create')
				->notEmpty('question_type_option_id')
				->validatePresence('comment', 'create')
				->notEmpty('comment');

		return $validator;
	}

	public function findHome(Query $query, array $options) {
		$query
				->limit(20)
				->order(['Answers.id' => 'desc'])
				->contain(['Users', 'Questions', 'QuestionTypeOptions']);
		return $query;
	}

	public function sendEmail() {
		$email = $this->_getEmailInstance();
		$email->from('noreply@factionquestions.org')
				->to('admin@factionquestions.org')
				->subject(__('New answer!!'))
				->send(__("Check the new answer here ..."));
	}

	protected function _getEmailInstance() {
		if ($this->Email) {
			return $this->Email;
		}
		return new Email('default');
	}

}
