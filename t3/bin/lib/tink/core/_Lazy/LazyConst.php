<?php
/**
 */

namespace tink\core\_Lazy;

use \php\Boot;

class LazyConst implements LazyObject {
	/**
	 * @var mixed
	 */
	public $value;

	/**
	 * @param mixed $value
	 * 
	 * @return void
	 */
	public function __construct ($value) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:52: characters 5-23
		$this->value = $value;
	}

	/**
	 * @return void
	 */
	public function compute () {
	}

	/**
	 * @return mixed
	 */
	public function get () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:55: characters 5-17
		return $this->value;
	}

	/**
	 * @return bool
	 */
	public function isComputed () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:49: characters 5-16
		return true;
	}

	/**
	 * @return Computable
	 */
	public function underlying () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:60: characters 5-16
		return null;
	}
}

Boot::registerClass(LazyConst::class, 'tink.core._Lazy.LazyConst');
