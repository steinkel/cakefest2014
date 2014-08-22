<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\NotifyOwnerBehavior;
use Cake\Event\Event;
use Cake\Network\Email\Email;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\BoundaryBehavior Test Case
 */
class NotifyOwnerBehaviorTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.question',
		'app.user'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->table = TableRegistry::get('Questions');
		$this->behavior = $this->getMock(
			'App\Model\Behavior\NotifyOwnerBehavior',
			['_getEmail'],
			[$this->table]
		);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Boundary);

		parent::tearDown();
	}

	public function testAfterSaveSendEmail() {
		$email = $this->getMock('Cake\Network\Email\Email', ['send']);
		$this->behavior
			->expects($this->once())
			->method('_getEmail')
			->will($this->returnValue($email));

		$email->expects($this->once())
			->method('send')
			->with($this->stringContains('/questions/view/1'))
			->will($this->returnValue('foo'));

		$entity = $this->table->newEntity();
		$event = new Event('Model.afterSave');
		$entity->id = 1;
		$entity->user_id = 1;
		$this->behavior->afterSave($event, $entity, []);
	}
}
