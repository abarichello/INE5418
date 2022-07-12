<?php
/**
 */

namespace tink\core;

use \php\Boot;

class MPair {
	/**
	 * @var mixed
	 */
	public $a;
	/**
	 * @var mixed
	 */
	public $b;

	/**
	 * @param mixed $a
	 * @param mixed $b
	 * 
	 * @return void
	 */
	public function __construct ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Pair.hx:28: characters 5-15
		$this->a = $a;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Pair.hx:29: characters 5-15
		$this->b = $b;
	}
}

Boot::registerClass(MPair::class, 'tink.core.MPair');
