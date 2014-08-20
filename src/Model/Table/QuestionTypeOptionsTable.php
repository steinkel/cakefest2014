<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuestionTypeOptions Model
 */
class QuestionTypeOptionsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('question_type_options');
		$this->displayField('id');
		$this->primaryKey('id');

		$this->belongsTo('QuestionTypes', [
			'foreignKey' => 'question_type_id',
		]);
		$this->hasMany('Answers', [
			'foreignKey' => 'question_type_option_id',
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
			->add('question_type_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('question_type_id', 'create')
			->notEmpty('question_type_id')
			->validatePresence('label', 'create')
			->notEmpty('label');

		return $validator;
	}

}
