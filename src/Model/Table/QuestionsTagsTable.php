<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuestionsTags Model
 */
class QuestionsTagsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('questions_tags');
		$this->displayField('question_id');
		$this->primaryKey(['question_id', 'tag_id']);

		$this->belongsTo('Questions', [
			'foreignKey' => 'question_id',
		]);
		$this->belongsTo('Tags', [
			'foreignKey' => 'tag_id',
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
			->add('question_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('question_id', 'create')
			->add('tag_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('tag_id', 'create');

		return $validator;
	}

}
