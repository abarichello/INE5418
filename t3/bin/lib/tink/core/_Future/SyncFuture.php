<?php
/**
 */

namespace tink\core\_Future;

use \tink\core\_Lazy\LazyObject;
use \php\Boot;
use \tink\core\LinkObject;
use \tink\core\_Callback\Callback_Impl_;
use \tink\core\FutureStatus;
use \tink\core\_Lazy\Lazy_Impl_;

class SyncFuture implements FutureObject {
	/**
	 * @var LazyObject
	 */
	public $value;

	/**
	 * @param LazyObject $value
	 * 
	 * @return void
	 */
	public function __construct ($value) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:385: characters 5-23
		$this->value = $value;
	}

	/**
	 * @return void
	 */
	public function eager () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:393: lines 393-394
		if (!$this->value->isComputed()) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:394: characters 7-18
			Lazy_Impl_::get($this->value);
		}
	}

	/**
	 * @return FutureStatus
	 */
	public function getStatus () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:382: characters 5-24
		return FutureStatus::Ready($this->value);
	}

	/**
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	public function handle ($cb) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:388: characters 5-21
		Callback_Impl_::invoke($cb, Lazy_Impl_::get($this->value));
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:389: characters 5-16
		return null;
	}
}

Boot::registerClass(SyncFuture::class, 'tink.core._Future.SyncFuture');
