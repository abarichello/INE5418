<?php
/**
 */

namespace tink\core;

use \php\Boot;
use \tink\core\_Callback\Callback_Impl_;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Callback\ListCell;
use \tink\core\_Lazy\Lazy_Impl_;
use \tink\core\_Future\FutureObject;

final class FutureTrigger implements FutureObject {
	/**
	 * @var CallbackList
	 */
	public $list;
	/**
	 * @var FutureStatus
	 */
	public $status;

	/**
	 * @return void
	 */
	public function __construct () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:399: characters 32-39
		$this->status = FutureStatus::Awaited();
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:403: characters 5-39
		$this->list = new CallbackList(true);
	}

	/**
	 * @return FutureObject
	 */
	public function asFuture () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:420: characters 5-16
		return $this;
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
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:406: characters 5-18
		return $this->status;
	}

	/**
	 * @param \Closure $callback
	 * 
	 * @return LinkObject
	 */
	public function handle ($callback) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:409: characters 19-25
		$_g = $this->status;
		if ($_g->index === 3) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:410: characters 18-24
			$result = $_g->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:411: characters 9-32
			Callback_Impl_::invoke($callback, Lazy_Impl_::get($result));
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:412: characters 9-13
			return null;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:413: characters 12-13
			$v = $_g;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:414: characters 9-27
			$_this = $this->list;
			if ($_this->disposeHandlers === null) {
				return null;
			} else {
				$node = new ListCell($callback, $_this);
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
	}

	/**
	 *  Triggers a value for this future
	 * 
	 * @param mixed $result
	 * 
	 * @return bool
	 */
	public function trigger ($result) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:426: characters 19-25
		$_g = $this->status;
		if ($_g->index === 3) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:427: characters 18-19
			$_g1 = $_g->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:427: characters 22-27
			return false;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:429: characters 9-31
			$this->status = FutureStatus::Ready(new LazyConst($result));
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:430: characters 9-28
			$this->list->invoke($result);
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:431: characters 9-13
			return true;
		}
	}
}

Boot::registerClass(FutureTrigger::class, 'tink.core.FutureTrigger');
