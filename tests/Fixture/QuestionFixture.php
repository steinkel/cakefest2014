<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuestionFixture
 *
 */
class QuestionFixture extends TestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = [
		'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
		'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'text' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'question_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'_constraints' => [
			'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
		],
		'_options' => [
'engine' => 'InnoDB', 'collation' => 'utf8_unicode_ci'
		],
	];

/**
 * Records
 *
 * @var array
 */
	public $records = [
		[
			'user_id' => 1,
			'text' => 'This is the first question',
			'question_type_id' => 1
		],
		[
			'user_id' => 2,
			'text' => 'This is the second question',
			'question_type_id' => 2
		],
		[
			'user_id' => 1,
			'text' => 'This is the third question',
			'question_type_id' => 3
		],
	];

}
