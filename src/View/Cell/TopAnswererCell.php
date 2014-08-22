<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * TopAnswerer cell
 */
class TopAnswererCell extends Cell {

/**
 * List of valid options that can be passed into this
 * cell's constructor.
 *
 * @var array
 */
	protected $_validCellOptions = [
		'limit', 'foo'
	];

/**
 * Default display method.
 *
 * @return void
 */
	public function display() {
		$this->loadModel('Users');
		$topUsers = $this->Users->find('topAnswerers');
		$this->set('topUsers', $topUsers->limit($this->limit));
	}

}
