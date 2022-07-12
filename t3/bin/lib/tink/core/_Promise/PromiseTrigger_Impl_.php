<?php
/**
 */

namespace tink\core\_Promise;

use \php\Boot;
use \tink\core\TypedError;
use \tink\core\Outcome;
use \tink\core\FutureTrigger;
use \tink\core\_Future\FutureObject;

final class PromiseTrigger_Impl_ {
	/**
	 * @return FutureTrigger
	 */
	public static function _new () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:329: character 3
		$this1 = new FutureTrigger();
		return $this1;
	}

	/**
	 * @param FutureTrigger $this
	 * 
	 * @return FutureObject
	 */
	public static function asPromise ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:338: characters 54-76
		return $this1;
	}

	/**
	 * @param FutureTrigger $this
	 * @param TypedError $e
	 * 
	 * @return bool
	 */
	public static function reject ($this1, $e) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:336: characters 5-36
		return $this1->trigger(Outcome::Failure($e));
	}

	/**
	 * @param FutureTrigger $this
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function resolve ($this1, $v) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:333: characters 5-36
		return $this1->trigger(Outcome::Success($v));
	}
}

Boot::registerClass(PromiseTrigger_Impl_::class, 'tink.core._Promise.PromiseTrigger_Impl_');
