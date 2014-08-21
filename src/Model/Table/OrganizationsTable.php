<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Organizations Model
 */
class OrganizationsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('organizations');
		$this->displayField('name');
		$this->primaryKey('id');

		$this->hasMany('Users', [
			'foreignKey' => 'organization_id',
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
			->validatePresence('url', 'create')
			->notEmpty('url');

		return $validator;
	}

	public function findWithTotalAnswers(Query $query) {
		return $query
			->contain('Users.Answers')
			->formatResults(function($results) {
				return $results->map(function($row) {
					$row->total_answers = collection($row->users)
						->extract('answers')
						->count();
					return $row;
				});
			});
	}
	
}
