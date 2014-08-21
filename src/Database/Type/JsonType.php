<?php
namespace App\Database\Type;

use Cake\Database\Type;

use Cake\Database\Driver;

class JsonType extends Type {

	public function toPHP($value, Driver $driver) {
		if ($value === null) {
			return null;
		}
		return json_decode($value, true);
	}

	public function toDatabase($value, Driver $driver) {
		return json_encode($value);
	}

}
