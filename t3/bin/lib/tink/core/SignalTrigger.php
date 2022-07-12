<?php
/**
 */

namespace tink\core;

use \php\Boot;
use \tink\core\_Callback\Callback_Impl_;
use \tink\core\_Callback\ListCell;
use \tink\core\_Signal\SignalObject;

final class SignalTrigger implements OwnedDisposable, SignalObject {
	/**
	 * @var CallbackList
	 */
	public $handlers;

	/**
	 * @return void
	 */
	public function __construct () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:214: characters 20-41
		$this->handlers = new CallbackList();
	}

	/**
	 * @return SignalObject
	 */
	public function asSignal () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:246: characters 5-16
		return $this;
	}

	/**
	 *  Clear all handlers
	 * 
	 * @return void
	 */
	public function clear () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:243: characters 5-21
		$this->handlers->clear();
	}

	/**
	 * @return void
	 */
	public function dispose () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:219: characters 5-23
		$this->handlers->dispose();
	}

	/**
	 *  Gets the number of handlers registered
	 * 
	 * @return int
	 */
	public function getLength () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:234: characters 5-27
		return $this->handlers->used;
	}

	/**
	 * @return bool
	 */
	public function get_disposed () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:212: characters 7-31
		return $this->handlers->disposeHandlers === null;
	}

	/**
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	public function listen ($cb) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:237: characters 12-28
		$_this = $this->handlers;
		if ($_this->disposeHandlers === null) {
			return null;
		} else {
			$node = new ListCell($cb, $_this);
			$_this1 = $_this->cells;
			$_this1->arr[$_this1->length++] = $node;
			if ($_this->used++ === 0) {
				$fn = $_this->onfill;
				if (Callback_Impl_::$depth < 500) {
					Callback_Impl_::$depth++;
					$fn();
					Callback_Impl_::$depth--;
				} else {
					Callback_Impl_::defer($fn);
				}
			}
			return $node;
		}
	}

	/**
	 * @param \Closure $d
	 * 
	 * @return void
	 */
	public function ondispose ($d) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:222: characters 5-26
		$this->handlers->ondispose($d);
	}

	/**
	 *  Emits a value for this signal
	 * 
	 * @param mixed $event
	 * 
	 * @return void
	 */
	public function trigger ($event) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:228: characters 5-27
		$this->handlers->invoke($event);
	}
}

Boot::registerClass(SignalTrigger::class, 'tink.core.SignalTrigger');
Boot::registerGetters('tink\\core\\SignalTrigger', [
	'disposed' => true
]);
