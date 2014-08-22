<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\AnswersTable;
use Cake\TestSuite\TestCase;
use Cake\Event\Event;
use App\Model\Entity\Answer;

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


	public function testSendEmail() {
		$emailMock = $this->getMockBuilder('Email')
				->setMethods(['from', 'to', 'subject', 'send'])
				->getMock();
		$emailMock->expects($this->at(0))
				->method('from')
				->with($this->equalTo('noreply@factionquestions.org'))
				->will($this->returnSelf());
		$emailMock->expects($this->at(1))
				->method('to')
				->with($this->equalTo('admin@factionquestions.org'))
				->will($this->returnSelf());
		$emailMock->expects($this->at(2))
				->method('subject')
				->with($this->equalTo('New answer!!'))
				->will($this->returnSelf());
		$emailMock->expects($this->at(3))
				->method('send')
				->with($this->equalTo('Check the new answer here ...'))
				->will($this->returnSelf());
		$this->Answers->Email = $emailMock;
		$this->Answers->sendEmail();
	}


}
