<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\AnswersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnswersTable Test Case
 */
class AnswersTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.answer',
		'app.question',
		'app.user',
		'app.organization',
		'app.question_type',
		'app.question_type_option',
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
		$config = TableRegistry::exists('Answers') ? [] : ['className' => 'App\Model\Table\AnswersTable'];
		$this->Answers = TableRegistry::get('Answers', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Answers);

		parent::tearDown();
	}

}
