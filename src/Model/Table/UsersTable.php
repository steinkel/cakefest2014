<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\Hash;

/**
 * Users Model
 */
class UsersTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('users');
		$this->displayField('full_name');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Organizations', [
			'foreignKey' => 'organization_id',
		]);
		$this->hasMany('Answers', [
			'foreignKey' => 'user_id',
		]);
		$this->hasMany('Questions', [
			'foreignKey' => 'user_id',
		]);
		$this->hasMany('ShortCommentAnswers', [
			'className' => 'Answers',
			'foreignKey' => 'user_id',
			'conditions' => ['CHAR_LENGTH(ShortCommentAnswers.comment) <' => 20]
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
			->add('email', 'valid', ['rule' => 'email'])
			->validatePresence('email', 'create')
			->notEmpty('email')
			->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'])
			->add('email', 'validOrg', ['rule' => 'validOrganizationEmail', 'provider' => 'table'])
			->validatePresence('password', 'create')
			->notEmpty('password')
			->validatePresence('role', 'create')
			->notEmpty('role')
			->add('active', 'valid', ['rule' => 'boolean'])
			->validatePresence('active', 'create')
			->notEmpty('active')
			->allowEmpty('first_name')
			->allowEmpty('last_name')
			->add('organization_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('organization_id');

		return $validator;
	}

	public function validOrganizationEmail($value, $context) {
		$validDomain = 'org.com';
		if (Hash::get($context, 'data.organization_id')) {
			$tokens = explode('@', $value);
			if ($validDomain !== $tokens[1]) {
				return "The provided email should be a valid @$validDomain email";
			}
		}
		return true;
	}
}
