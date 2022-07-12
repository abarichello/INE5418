<?php
/**
 */

namespace tink\core\_Callback;

use \php\Boot;
use \tink\core\LinkObject;
use \tink\core\SimpleLink;

final class CallbackLink_Impl_ {
	/**
	 * @param \Closure $link
	 * 
	 * @return LinkObject
	 */
	public static function _new ($link) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:69: character 3
		$this1 = new SimpleLink($link);
		return $this1;
	}

	/**
	 * @param LinkObject $this
	 * 
	 * @return void
	 */
	public static function cancel ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:73: characters 5-36
		if ($this1 !== null) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:73: characters 23-36
			$this1->cancel();
		}
	}

	/**
	 * @param LinkObject $this
	 * 
	 * @return void
	 */
	public static function dissolve ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:77: characters 5-13
		if ($this1 !== null) {
			$this1->cancel();
		}
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return LinkObject
	 */
	public static function fromFunction ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:88: characters 12-31
		$this1 = new SimpleLink($f);
		return $this1;
	}

	/**
	 * @param LinkObject[]|\Array_hx $callbacks
	 * 
	 * @return LinkObject
	 */
	public static function fromMany ($callbacks) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:94: lines 94-99
		$this1 = new SimpleLink(function () use (&$callbacks) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:95: lines 95-98
			if ($callbacks !== null) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:96: characters 9-42
				$_g = 0;
				while ($_g < $callbacks->length) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:96: characters 14-16
					$cb = ($callbacks->arr[$_g] ?? null);
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:96: characters 9-42
					++$_g;
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:96: characters 31-42
					if ($cb !== null) {
						$cb->cancel();
					}
				}
			} else {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:98: characters 9-25
				$callbacks = null;
			}
		});
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:94: lines 94-99
		return $this1;
	}

	/**
	 * @param LinkObject $this
	 * @param LinkObject $b
	 * 
	 * @return LinkObject
	 */
	public static function join ($this1, $b) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:91: characters 5-33
		return new LinkPair($this1, $b);
	}

	/**
	 * @return void
	 */
	public static function noop () {
	}

	/**
	 * @param LinkObject $this
	 * 
	 * @return \Closure
	 */
	public static function toCallback ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:85: characters 12-51
		if ($this1 === null) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:85: characters 30-34
			return function ($_) {
				CallbackLink_Impl_::noop();
			};
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:85: characters 40-51
			$f = Boot::getInstanceClosure($this1, 'cancel');
			return function ($_) use (&$f) {
				$f();
			};
		}
	}

	/**
	 * @param LinkObject $this
	 * 
	 * @return \Closure
	 */
	public static function toFunction ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:82: characters 12-51
		if ($this1 === null) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:82: characters 30-34
			return Boot::getStaticClosure(CallbackLink_Impl_::class, 'noop');
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:82: characters 40-51
			return Boot::getInstanceClosure($this1, 'cancel');
		}
	}
}

Boot::registerClass(CallbackLink_Impl_::class, 'tink.core._Callback.CallbackLink_Impl_');
