<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\TagsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TagsTable Test Case
 */
class TagsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.tag',
		'app.question',
		'app.user',
		'app.organization',
		'app.answer',
		'app.question_type_option',
		'app.question_type',
		'app.questions_tag'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Tags') ? [] : ['className' => 'App\Model\Table\TagsTable'];
		$this->Tags = TableRegistry::get('Tags', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tags);

		parent::tearDown();
	}

}
