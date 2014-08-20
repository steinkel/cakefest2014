<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Organization Entity.
 */
class Organization extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'name' => true,
		'url' => true,
		'users' => true,
	];

}
