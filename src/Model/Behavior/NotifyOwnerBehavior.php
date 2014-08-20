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

	public function afterSave(Event $event, Entity $entity, $options) {
		$email = new Email('default');
		$singularName = Inflector::singularize($entity->source());
		$owner = TableRegistry::get('Users')->get($entity->user_id);
		$result = $email->from('noreply@factionquestions.org')
			->to($owner->email)
			->subject(__('New {0}!!', $singularName))
			->send(__("Check the new {0} here {1}", $singularName, Router::url([
				'controller' => $entity->source(),
				'action' => 'view',
				$entity->id,
			], true)));
		Debugger::log($result);
	}
}
