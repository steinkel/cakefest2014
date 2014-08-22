<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

/**
 * Boundary behavior
 */
class BoundaryBehavior extends Behavior {

/**
 * Default configuration.
 *
 * @var array
 */
	protected $_defaultConfig = [];


	public function beforeFind($event, $query, $options) {
		if (!empty($query->getOptions()['no-boundary'])) {
			return;
		}
		$query->where(['user_id' => 1]);
	}

}
