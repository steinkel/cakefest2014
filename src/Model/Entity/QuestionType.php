<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuestionType Entity.
 */
class QuestionType extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'name' => true,
		'description' => true,
		'question_type_options' => true,
		'questions' => true,
	];

}
