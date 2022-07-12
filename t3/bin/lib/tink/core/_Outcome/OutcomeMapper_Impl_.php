<?php
/**
 */

namespace tink\core\_Outcome;

use \php\_Boot\HxAnon;
use \php\Boot;
use \haxe\ds\Either;
use \tink\core\Outcome;

final class OutcomeMapper_Impl_ {
	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function _new ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:154: character 3
		$this1 = new _HxAnon_OutcomeMapper_Impl_0($f);
		return $this1;
	}

	/**
	 * @param object $this
	 * @param Outcome $o
	 * 
	 * @return Outcome
	 */
	public static function apply ($this1, $o) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:156: characters 5-21
		return $this1->f($o);
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function withEitherError ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:168: lines 168-177
		return OutcomeMapper_Impl_::_new(function ($o) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:169: lines 169-176
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:170: characters 22-23
				$d = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:171: characters 18-22
				$_g = $f($d);
				$__hx__switch = ($_g->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:172: characters 26-27
					$d = $_g->params[0];
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:172: characters 30-40
					return Outcome::Success($d);
				} else if ($__hx__switch === 1) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:173: characters 26-27
					$f1 = $_g->params[0];
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:173: characters 30-47
					return Outcome::Failure(Either::Right($f1));
				}
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:175: characters 22-23
				$f1 = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:175: characters 26-42
				return Outcome::Failure(Either::Left($f1));
			}
		});
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function withSameError ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:159: lines 159-164
		return OutcomeMapper_Impl_::_new(function ($o) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:160: lines 160-163
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:161: characters 22-23
				$d = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:161: characters 26-30
				return $f($d);
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:162: characters 22-23
				$f1 = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:162: characters 26-36
				return Outcome::Failure($f1);
			}
		});
	}
}

class _HxAnon_OutcomeMapper_Impl_0 extends HxAnon {
	function __construct($f) {
		$this->f = $f;
	}
}

Boot::registerClass(OutcomeMapper_Impl_::class, 'tink.core._Outcome.OutcomeMapper_Impl_');
