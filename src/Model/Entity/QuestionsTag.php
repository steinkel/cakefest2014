<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuestionsTag Entity.
 */
class QuestionsTag extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'question' => true,
		'tag' => true,
	];

}
