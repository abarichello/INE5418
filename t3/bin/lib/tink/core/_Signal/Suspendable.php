<?php
/**
 */

namespace tink\core\_Signal;

use \php\Boot;
use \tink\core\LinkObject;
use \tink\core\_Callback\Callback_Impl_;
use \tink\core\OwnedDisposable;
use \tink\core\_Callback\ListCell;
use \tink\core\CallbackList;

class Suspendable implements OwnedDisposable, SignalObject {
	/**
	 * @var \Closure
	 */
	public $activate;
	/**
	 * @var CallbackList
	 */
	public $handlers;
	/**
	 * @var \Closure
	 */
	public $init;
	/**
	 * @var LinkObject
	 */
	public $subscription;

	/**
	 * @param SignalObject $s
	 * @param \Closure $activate
	 * 
	 * @return SignalObject
	 */
	public static function over ($s, $activate) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:201: lines 201-206
		if ($s->get_disposed()) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:201: characters 23-36
			return Signal_Impl_::dead();
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:203: characters 9-50
			$ret = new Suspendable($activate);
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:204: characters 9-33
			$s->ondispose(Boot::getInstanceClosure($ret, 'dispose'));
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:205: characters 9-12
			return $ret;
		}
	}

	/**
	 * @param \Closure $activate
	 * @param \Closure $init
	 * 
	 * @return void
	 */
	public function __construct ($activate, $init = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:165: characters 20-41
		$this->handlers = new CallbackList();
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:180: lines 180-194
		$_gthis = $this;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:181: characters 5-29
		$this->activate = $activate;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:182: characters 5-21
		$this->init = $init;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:184: characters 5-57
		$this->handlers->ondrain = function () use (&$_gthis) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:184: characters 36-57
			$this1 = $_gthis->subscription;
			if ($this1 !== null) {
				$this1->cancel();
			}
		};
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:185: lines 185-193
		$this->handlers->onfill = function () use (&$activate, &$_gthis, &$init) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:186: lines 186-191
			if ($init !== null) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:188: characters 14-15
				$f = $init;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:189: characters 11-22
				$init = null;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:190: characters 11-18
				$f($_gthis);
			}
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:192: characters 7-47
			$_gthis->subscription = $activate(Boot::getInstanceClosure($_gthis->handlers, 'invoke'));
		};
	}

	/**
	 * @return void
	 */
	public function dispose () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:175: characters 5-23
		$this->handlers->dispose();
	}

	/**
	 * @return bool
	 */
	public function get_disposed () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:172: characters 36-60
		return $this->handlers->disposeHandlers === null;
	}

	/**
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	public function listen ($cb) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:197: characters 12-28
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
	 * @param \Closure $handler
	 * 
	 * @return void
	 */
	public function ondispose ($handler) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:178: characters 5-32
		$this->handlers->ondispose($handler);
	}
}

Boot::registerClass(Suspendable::class, 'tink.core._Signal.Suspendable');
Boot::registerGetters('tink\\core\\_Signal\\Suspendable', [
	'disposed' => true
]);
