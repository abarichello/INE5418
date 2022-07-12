<?php
/**
 */

namespace tink\core\_Callback;

use \php\Boot;
use \tink\core\LinkObject;

class LinkPair implements LinkObject {
	/**
	 * @var LinkObject
	 */
	public $a;
	/**
	 * @var LinkObject
	 */
	public $b;
	/**
	 * @var bool
	 */
	public $dissolved;

	/**
	 * @param LinkObject $a
	 * @param LinkObject $b
	 * 
	 * @return void
	 */
	public function __construct ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:119: characters 24-29
		$this->dissolved = false;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:121: characters 5-15
		$this->a = $a;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:122: characters 5-15
		$this->b = $b;
	}

	/**
	 * @return void
	 */
	public function cancel () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:126: lines 126-132
		if (!$this->dissolved) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:127: characters 7-23
			$this->dissolved = true;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:128: characters 7-17
			$this1 = $this->a;
			if ($this1 !== null) {
				$this1->cancel();
			}
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:129: characters 7-17
			$this1 = $this->b;
			if ($this1 !== null) {
				$this1->cancel();
			}
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:130: characters 7-15
			$this->a = null;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:131: characters 7-15
			$this->b = null;
		}
	}
}

Boot::registerClass(LinkPair::class, 'tink.core._Callback.LinkPair');
