<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuestionTypeOption Entity.
 */
class QuestionTypeOption extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'question_type_id' => true,
		'label' => true,
		'question_type' => true,
		'answers' => true,
	];

}
