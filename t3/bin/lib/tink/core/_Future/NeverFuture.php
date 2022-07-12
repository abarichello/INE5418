<?php
/**
 */

namespace tink\core\_Future;

use \php\Boot;
use \tink\core\LinkObject;
use \tink\core\FutureStatus;

class NeverFuture implements FutureObject {
	/**
	 * @return void
	 */
	public function __construct () {
	}

	/**
	 * @return void
	 */
	public function eager () {
	}

	/**
	 * @return FutureStatus
	 */
	public function getStatus () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:372: characters 5-21
		return FutureStatus::NeverEver();
	}

	/**
	 * @param \Closure $callback
	 * 
	 * @return LinkObject
	 */
	public function handle ($callback) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:373: characters 65-76
		return null;
	}
}

Boot::registerClass(NeverFuture::class, 'tink.core._Future.NeverFuture');
