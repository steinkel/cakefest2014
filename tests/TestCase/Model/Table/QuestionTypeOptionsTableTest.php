<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\QuestionTypeOptionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionTypeOptionsTable Test Case
 */
class QuestionTypeOptionsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.question_type_option',
		'app.question_type',
		'app.question',
		'app.user',
		'app.organization',
		'app.answer',
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
		$config = TableRegistry::exists('QuestionTypeOptions') ? [] : ['className' => 'App\Model\Table\QuestionTypeOptionsTable'];
		$this->QuestionTypeOptions = TableRegistry::get('QuestionTypeOptions', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuestionTypeOptions);

		parent::tearDown();
	}

}
