<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\UsersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.user',
		'app.organization',
		'app.answer',
		'app.question',
		'app.question_type',
		'app.question_type_option',
		'app.tag',
		'app.questions_tag',
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Users') ? [] : ['className' => 'App\Model\Table\UsersTable'];
		$this->Users = TableRegistry::get('Users', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Users);

		parent::tearDown();
	}

/**
 * testValidOrganizationEmail method
 *
 * @return void
 * @dataProvider validOrganizationEmailProvider
 */
	public function testValidOrganizationEmail($organization_id, $email, $expected) {
		$result = $this->Users->validOrganizationEmail($email, ['data' => ['organization_id' => $organization_id]]);
		$this->assertEquals($expected, $result);
	}

	public function validOrganizationEmailProvider() {
		return [
			[null, 'dont@care.com', true],
			[1, 'true@org.com', true],
			[1, 'fail@example.com', "The provided email should be a valid @org.com email"],
		];
	}

/**
 * testActiveUsers method
 *
 * @return void
 */
	public function testActiveUsers() {
		$this->assertEquals(2, $this->Users->activeUsers());
	}



}
