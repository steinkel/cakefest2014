<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questions Model
 */
class QuestionsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('questions');
		$this->displayField('text');
		$this->primaryKey('id');

		$this->belongsTo('Users', [
			'foreignKey' => 'user_id',
		]);
		$this->belongsTo('QuestionTypes', [
			'foreignKey' => 'question_type_id',
		]);
		$this->hasMany('Answers', [
			'foreignKey' => 'question_id',
		]);
		$this->belongsToMany('Tags', [
			'foreignKey' => 'question_id',
			'targetForeignKey' => 'tag_id',
			'joinTable' => 'questions_tags',
		]);
		$this->addBehavior('NotifyOwner');
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
			->add('user_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('user_id', 'create')
			->notEmpty('user_id')
			->validatePresence('text', 'create')
			->notEmpty('text')
			->add('question_type_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('question_type_id', 'create')
			->notEmpty('question_type_id');

		return $validator;
	}

}
