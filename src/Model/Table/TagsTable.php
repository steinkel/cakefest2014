<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tags Model
 */
class TagsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('tags');
		$this->displayField('name');
		$this->primaryKey('id');

		$this->belongsToMany('Questions', [
			'foreignKey' => 'tag_id',
			'targetForeignKey' => 'question_id',
			'joinTable' => 'questions_tags',
		]);
		$this->hasMany('QuestionsTags');
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
			->notEmpty('name');

		return $validator;
	}

	public function findInBooleanQuestions(Query $query, $options = []) {
		$questionsFilter = $this->Questions
			->find('booleanQuestions')
			->select(['id']);
		return $query
			->distinct(['Tags.id'])
			->matching('QuestionsTags')
			->where(['QuestionsTags.question_id IN' => $questionsFilter]);
	}

}
