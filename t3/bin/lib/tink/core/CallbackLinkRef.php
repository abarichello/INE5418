<?php
/**
 */

namespace tink\core;

use \php\Boot;

class CallbackLinkRef implements LinkObject {
	/**
	 * @var LinkObject
	 */
	public $link;

	/**
	 * @return void
	 */
	public function __construct () {
	}

	/**
	 * @return void
	 */
	public function cancel () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:63: characters 5-18
		$this1 = $this->link;
		if ($this1 !== null) {
			$this1->cancel();
		}
	}
}

Boot::registerClass(CallbackLinkRef::class, 'tink.core.CallbackLinkRef');
