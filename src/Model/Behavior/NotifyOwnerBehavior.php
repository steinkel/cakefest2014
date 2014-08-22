<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\Network\Email\Email;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Debugger;

class NotifyOwnerBehavior extends Behavior {

	protected $_defaultConfig = [
		'ownerTable' => 'Users',
		'ownerField' => 'user_id',
		'log' => false,
	];

	public function afterSave(Event $event, Entity $entity, $options) {
		$config = $this->config();
		$email = $this->_getEmail();
		$singularName = Inflector::singularize($entity->source());
		$owner = TableRegistry::get($config['ownerTable'])->get($entity->$config['ownerField']);
		$result = $email->from('noreply@factionquestions.org')
			->to($owner->email)
			->subject(__('New {0}!!', $singularName))
			->send(__("Check the new {0} here {1}", $singularName, Router::url([
				'controller' => $entity->source(),
				'action' => 'view',
				$entity->id,
			], true)));

		if ($config['log']) {
			Debugger::log($result);
		}
	}

	protected function _getEmail() {
		return new Email('default');
	}

}
