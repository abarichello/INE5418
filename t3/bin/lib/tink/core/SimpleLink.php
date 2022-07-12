<?php
/**
 */

namespace tink\core;

use \php\Boot;

class SimpleLink implements LinkObject {
	/**
	 * @var \Closure
	 */
	public $f;

	/**
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public function __construct ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:106: characters 5-15
		$this->f = $f;
	}

	/**
	 * @return void
	 */
	public function cancel () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:109: lines 109-112
		if ($this->f !== null) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:110: characters 7-10
			($this->f)();
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:111: characters 7-15
			$this->f = null;
		}
	}
}

Boot::registerClass(SimpleLink::class, 'tink.core.SimpleLink');
