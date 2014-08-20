<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\QuestionsTagsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionsTagsTable Test Case
 */
class QuestionsTagsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.questions_tag',
		'app.question',
		'app.user',
		'app.organization',
		'app.answer',
		'app.question_type_option',
		'app.question_type',
		'app.tag'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('QuestionsTags') ? [] : ['className' => 'App\Model\Table\QuestionsTagsTable'];
		$this->QuestionsTags = TableRegistry::get('QuestionsTags', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuestionsTags);

		parent::tearDown();
	}

}
