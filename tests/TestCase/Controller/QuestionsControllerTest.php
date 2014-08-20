<?php
namespace App\Test\TestCase\Controller;

use App\Controller\QuestionsController;
use Cake\TestSuite\ControllerTestCase;

/**
 * App\Controller\QuestionsController Test Case
 */
class QuestionsControllerTest extends ControllerTestCase {

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
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->markTestIncomplete('testIndex not implemented.');
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->markTestIncomplete('testView not implemented.');
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$this->markTestIncomplete('testAdd not implemented.');
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$this->markTestIncomplete('testEdit not implemented.');
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$this->markTestIncomplete('testDelete not implemented.');
	}

}
