<?php
/**
 */

namespace tink\core;

use \php\Boot;

class NamedWith {
	/**
	 * @var mixed
	 */
	public $name;
	/**
	 * @var mixed
	 */
	public $value;

	/**
	 * @param mixed $name
	 * @param mixed $value
	 * 
	 * @return void
	 */
	public function __construct ($name, $value) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Named.hx:12: characters 5-21
		$this->name = $name;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Named.hx:13: characters 5-23
		$this->value = $value;
	}
}

Boot::registerClass(NamedWith::class, 'tink.core.NamedWith');
