<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity.
 */
class Question extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'user_id' => true,
		'text' => true,
		'question_type_id' => true,
		'user' => true,
		'question_type' => true,
		'answers' => true,
		'tags' => true,
		'questions_tags' => true,
	];

}