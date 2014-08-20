<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\QuestionTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionTypesTable Test Case
 */
class QuestionTypesTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.question_type',
		'app.question_type_option',
		'app.answer',
		'app.question',
		'app.user',
		'app.organization',
		'app.tag',
		'app.questions_tag'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('QuestionTypes') ? [] : ['className' => 'App\Model\Table\QuestionTypesTable'];
		$this->QuestionTypes = TableRegistry::get('QuestionTypes', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuestionTypes);

		parent::tearDown();
	}

}
