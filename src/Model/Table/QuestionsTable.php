<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Database\Schema\Table as Schema;

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

	protected function _initializeSchema(Schema $schema) {
		$schema->columnType('preferences', 'json');
		return $schema;
	}

	public function findBooleanQuestions(Query $query, $options = []) {
		return $query->contain(['QuestionTypes' => function($query) {
			return $query->where(['QuestionTypes.name' => 'Boolean']);
		}]);
	}

	public function findRangeQuestions(Query $query, $options = []) {
		return $query
			->contain('QuestionTypes')
			->where(['QuestionTypes.name' => 'Range']);
	}

	public function findByUser(Query $query, $options = []) {
		$user = $options['user'];
		return $query->where(['user_id IN' => $user]);
	}

	public function findGroupedByType(Query $query, $options = []) {
		return $query
			->contain('QuestionTypes')
			->formatResults(function($results) {
				return $results->groupBy('question_type.name');
			});
	}

	public function findWithOrganizationName(Query $query, $options = []) {
		return $query
			->contain('Users.Organizations')
			->formatResults(function($results) {
				return $results->map(function($row) {
					$row->organization_name = $row->user->organization->name;
					return $row;
				});
			});
	}

	public function findWithMissingOrganization(Query $query, $options = []) {
		return $query->contain('Users.Organizations')
			->where(['Organizations.id IS' => null]);
	}

	public function findWithTags(Query $query) {
		return $query->contain('Tags');
	}

	public function findTagged(Query $query, $options = []) {
		$tagName = $options['tag'];
		return $query->matching('Tags', function($q) use ($tagName) {
			return $q->where(['Tags.name' => $tagName]);
		});
	}

	public function findByQuestionOption(Query $query, $options = []) {
		$name = $options['optionName'];
		return $query
			->matching('QuestionTypes.QuestionTypeOptions', function($q) use ($name) {
				return $q->where(['QuestionTypeOptions.label' => $name]);
			});
	}

	public function addPreferences($id) {
		$entity = $this->get($id);
		$entity->preferences = ['foo' => 'bar', 'something' => 'crazy'];
		$this->save($entity);
	}

}
