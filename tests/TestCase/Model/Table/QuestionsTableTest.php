<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\QuestionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionsTable Test Case
 */
class QuestionsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.question',
		'app.user',
		'app.organization',
		'app.answer',
		'app.question_type_option',
		'app.question_type',
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
		$config = TableRegistry::exists('Questions') ? [] : ['className' => 'App\Model\Table\QuestionsTable'];
		$this->Questions = TableRegistry::get('Questions', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Questions);

		parent::tearDown();
	}

/**
 * Tests that failing to pass a user will throw exception
 *
 * @expectedException InvalidArgumentException
 */
	public function testFindByUserError() {
		$result = $this->Questions->find('byUser');
	}

	public function testFindByUser() {
		$result = $this->Questions->find('byUser', ['user' => 1]);
		$users = $result->extract('user_id')->toArray();
		$this->assertEquals([1], array_unique($users));
	}

	public function testFindByUserNoDatabaseAccess() {
		$expected = $this->Questions->query();
		$expected
			->where(['user_id IN' => 1])
			->applyOptions(['user' => 1]);

		$result = $this->Questions->find('byUser', ['user' => 1]);
		$this->assertEquals($expected, $result);
	}

}
