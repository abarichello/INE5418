<?php
/**
 */

namespace tink\core\_Signal;

use \php\Boot;
use \tink\core\LinkObject;
use \tink\core\Disposable;

interface SignalObject extends Disposable {
	/**
	 *  Registers a callback to be invoked every time the signal is triggered
	 *  @return A `CallbackLink` instance that can be used to unregister the callback
	 * 
	 * @param \Closure $handler
	 * 
	 * @return LinkObject
	 */
	public function listen ($handler) ;
}

Boot::registerClass(SignalObject::class, 'tink.core._Signal.SignalObject');