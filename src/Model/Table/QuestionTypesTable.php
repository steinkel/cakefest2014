<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuestionTypes Model
 */
class QuestionTypesTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('question_types');
		$this->displayField('name');
		$this->primaryKey('id');

		$this->hasMany('QuestionTypeOptions', [
			'foreignKey' => 'question_type_id',
		]);
		$this->hasMany('Questions', [
			'foreignKey' => 'question_type_id',
		]);
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
			->validatePresence('name', 'create')
			->notEmpty('name')
			->allowEmpty('description');

		return $validator;
	}

}
