<?php
/**
 */

namespace tink\core\_Future;

use \php\Boot;
use \tink\core\LinkObject;
use \tink\core\_Callback\Callback_Impl_;
use \tink\core\FutureStatus;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Callback\ListCell;
use \tink\core\CallbackList;
use \tink\core\_Lazy\Lazy_Impl_;

class SuspendableFuture implements FutureObject {
	/**
	 * @var CallbackList
	 */
	public $callbacks;
	/**
	 * @var LinkObject
	 */
	public $link;
	/**
	 * @var FutureStatus
	 */
	public $status;
	/**
	 * @var \Closure
	 */
	public $wakeup;

	/**
	 * @param \Closure $wakeup
	 * 
	 * @return void
	 */
	public function __construct ($wakeup) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:448: characters 32-41
		$this->status = FutureStatus::Suspended();
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:455: lines 455-468
		$_gthis = $this;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:456: characters 5-25
		$this->wakeup = $wakeup;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:457: characters 5-44
		$this->callbacks = new CallbackList(true);
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:459: lines 459-463
		$this->callbacks->ondrain = function () use (&$_gthis) {
			if ($_gthis->status === FutureStatus::Awaited()) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:460: characters 7-25
				$_gthis->status = FutureStatus::Suspended();
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:461: characters 7-20
				$this1 = $_gthis->link;
				if ($this1 !== null) {
					$this1->cancel();
				}
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:462: characters 7-18
				$_gthis->link = null;
			}
		};
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:464: lines 464-467
		$this->callbacks->onfill = function () use (&$_gthis) {
			if ($_gthis->status === FutureStatus::Suspended()) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:465: characters 7-23
				$_gthis->status = FutureStatus::Awaited();
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:466: characters 7-12
				$_gthis->arm();
			}
		};
	}

	/**
	 * @return void
	 */
	public function arm () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:492: characters 5-35
		$_gthis = $this;
		$this->link = ($this->wakeup)(function ($x) use (&$_gthis) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:492: characters 24-34
			$_gthis->trigger($x);
		});
	}

	/**
	 * @return void
	 */
	public function eager () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:495: characters 12-18
		$__hx__switch = ($this->status->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:497: characters 9-32
			$this->status = FutureStatus::EagerlyAwaited();
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:498: characters 9-14
			$this->arm();
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:500: characters 9-32
			$this->status = FutureStatus::EagerlyAwaited();
		} else {
		}
	}

	/**
	 * @return FutureStatus
	 */
	public function getStatus () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:453: characters 5-23
		return $this->status;
	}

	/**
	 * @param \Closure $callback
	 * 
	 * @return LinkObject
	 */
	public function handle ($callback) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:483: characters 19-25
		$_g = $this->status;
		if ($_g->index === 3) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:484: characters 18-24
			$result = $_g->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:485: characters 9-32
			Callback_Impl_::invoke($callback, Lazy_Impl_::get($result));
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:486: characters 9-13
			return null;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:488: characters 9-32
			$_this = $this->callbacks;
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
	 * @param mixed $value
	 * 
	 * @return void
	 */
	public function trigger ($value) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:471: characters 12-18
		$_g = $this->status;
		if ($_g->index === 3) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:472: characters 18-19
			$_g1 = $_g->params[0];
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:474: characters 9-30
			$this->status = FutureStatus::Ready(new LazyConst($value));
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:475: characters 9-30
			$link = $this->link;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:476: characters 9-25
			$this->link = null;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:477: characters 9-22
			$this->wakeup = null;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:478: characters 9-32
			$this->callbacks->invoke($value);
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:479: characters 9-22
			if ($link !== null) {
				$link->cancel();
			}
		}
	}
}

Boot::registerClass(SuspendableFuture::class, 'tink.core._Future.SuspendableFuture');
