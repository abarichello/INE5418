<?php
/**
 */

namespace tink\core\_Signal;

use \tink\core\_Callback\LinkPair;
use \haxe\ds\Option;
use \php\Boot;
use \tink\core\LinkObject;
use \tink\core\FutureTrigger;
use \tink\core\SimpleLink;
use \tink\core\SignalTrigger;
use \tink\core\_Callback\CallbackLink_Impl_;
use \tink\core\_Future\FutureObject;

final class Signal_Impl_ {
	/**
	 * Creates a new Signal. Any immediate calls to `fire`
	 * will be passed to the first registered `Callback<T>` only.
	 * 
	 * @param \Closure $f
	 * @param \Closure $init
	 * 
	 * @return SignalObject
	 */
	public static function _new ($f, $init = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:22: character 3
		$this1 = new Suspendable($f, $init);
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return SignalObject
	 */
	public static function create ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:126: characters 12-28
		$this1 = new Suspendable($f, null);
		return $this1;
	}

	/**
	 * @return SignalObject
	 */
	public static function dead () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:152: characters 5-30
		return Disposed::$INST;
	}

	/**
	 *  Creates a new signal whose values will only be emitted when the filter function evalutes to `true`
	 * 
	 * @param SignalObject $this
	 * @param \Closure $f
	 * @param bool $gather
	 * 
	 * @return SignalObject
	 */
	public static function filter ($this1, $f, $gather = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:46: characters 5-74
		return Suspendable::over($this1, function ($fire) use (&$f, &$this1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:46: characters 43-73
			return $this1->listen(function ($v) use (&$f, &$fire) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:46: characters 55-72
				if ($f($v)) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:46: characters 65-72
					$fire($v);
				}
			});
		});
	}

	/**
	 *  Creates a new signal by applying a transform function to the result.
	 *  Different from `map`, the transform function of `flatMap` returns a `Future`
	 * 
	 * @param SignalObject $this
	 * @param \Closure $f
	 * @param bool $gather
	 * 
	 * @return SignalObject
	 */
	public static function flatMap ($this1, $f, $gather = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:40: characters 5-74
		return Suspendable::over($this1, function ($fire) use (&$f, &$this1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:40: characters 43-73
			return $this1->listen(function ($v) use (&$f, &$fire) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:40: characters 55-72
				$f($v)->handle($fire);
			});
		});
	}

	/**
	 *  Creates a new signal which stores the result internally.
	 *  Useful for tranformed signals, such as product of `map` and `flatMap`,
	 *  so that the transformation function will not be invoked for every callback
	 * 
	 * @param SignalObject $this
	 * 
	 * @return SignalObject
	 */
	public static function gather ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:122: characters 5-16
		return $this1;
	}

	/**
	 * An alternative to `new Signal()` if you have no `CallbackLink` to return.
	 * Other than that, it behaves exactly the same.
	 * 
	 * @param \Closure $generator
	 * @param \Closure $init
	 * 
	 * @return SignalObject
	 */
	public static function generate ($generator, $init = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:133: characters 12-67
		$this1 = new Suspendable(function ($fire) use (&$generator) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:133: characters 36-51
			$generator($fire);
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:133: characters 53-57
			return null;
		}, $init);
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:133: characters 12-67
		return $this1;
	}

	/**
	 * @param SignalObject $this
	 * @param \Closure $handler
	 * 
	 * @return LinkObject
	 */
	public static function handle ($this1, $handler) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:26: characters 5-32
		return $this1->listen($handler);
	}

	/**
	 *  Creates a new signal by joining `this` and `that`,
	 *  the new signal will be triggered whenever either of the two triggers
	 * 
	 * @param SignalObject $this
	 * @param SignalObject $that
	 * @param bool $gather
	 * 
	 * @return SignalObject
	 */
	public static function join ($this1, $that, $gather = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:60: lines 60-73
		if ($this1->get_disposed()) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:60: characters 26-30
			return $that;
		} else if ($that->get_disposed()) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:61: characters 31-35
			return $this1;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:62: lines 62-73
			return new Suspendable(function ($fire) use (&$that, &$this1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:64: characters 11-37
				$cb = $fire;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:65: characters 11-39
				$this2 = $this1->listen($cb);
				return new LinkPair($this2, $that->listen($cb));
			}, function ($self) use (&$that, &$this1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:68: lines 68-69
				$release = function () use (&$that, &$self, &$this1) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:69: characters 13-63
					if ($this1->get_disposed() && $that->get_disposed()) {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:69: characters 49-63
						$self->dispose();
					}
				};
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:70: characters 11-34
				$this1->ondispose($release);
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:71: characters 11-34
				$that->ondispose($release);
			});
		}
	}

	/**
	 *  Creates a new signal by applying a transform function to the result.
	 *  Different from `flatMap`, the transform function of `map` returns a sync value
	 * 
	 * @param SignalObject $this
	 * @param \Closure $f
	 * @param bool $gather
	 * 
	 * @return SignalObject
	 */
	public static function map ($this1, $f, $gather = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:33: characters 5-67
		return Suspendable::over($this1, function ($fire) use (&$f, &$this1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:33: characters 43-66
			return $this1->listen(function ($v) use (&$f, &$fire) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:33: characters 55-65
				$fire($f($v));
			});
		});
	}

	/**
	 * @param SignalObject $this
	 * @param \Closure $condition
	 * 
	 * @return FutureObject
	 */
	public static function next ($this1, $condition = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:107: characters 5-31
		return Signal_Impl_::nextTime($this1, $condition);
	}

	/**
	 *  Gets the next emitted value as a Future
	 * 
	 * @param SignalObject $this
	 * @param \Closure $condition
	 * 
	 * @return FutureObject
	 */
	public static function nextTime ($this1, $condition = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:79: characters 5-83
		return Signal_Impl_::pickNext($this1, function ($v) use (&$condition) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:79: characters 26-82
			if (($condition === null) || $condition($v)) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:79: characters 65-72
				return Option::Some($v);
			} else {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:79: characters 78-82
				return Option::None();
			}
		});
	}

	/**
	 *  Transforms this signal and makes it emit `Noise`
	 * 
	 * @param SignalObject $this
	 * 
	 * @return SignalObject
	 */
	public static function noise ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:113: characters 5-42
		return Signal_Impl_::map($this1, function ($_) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:113: characters 29-41
			return null;
		});
	}

	/**
	 *  Creates a `Signal` from classic signals that has the semantics of `addListener` and `removeListener`
	 *  Example: `var signal = Signal.ofClassical(emitter.addListener.bind(eventType), emitter.removeListener.bind(eventType));`
	 * 
	 * @param \Closure $add
	 * @param \Closure $remove
	 * @param bool $gather
	 * 
	 * @return SignalObject
	 */
	public static function ofClassical ($add, $remove, $gather = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:146: lines 146-149
		return new Suspendable(function ($fire) use (&$remove, &$add) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:147: characters 7-16
			$add($fire);
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:148: characters 14-20
			$_g = $remove;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:148: characters 26-30
			$a1 = $fire;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:148: characters 7-31
			$this1 = new SimpleLink(function () use (&$_g, &$a1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:148: characters 14-25
				$_g($a1);
			});
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:148: characters 7-31
			return $this1;
		});
	}

	/**
	 * Creates a future that yields the next value matched by the provided selector.
	 * 
	 * @param SignalObject $this
	 * @param \Closure $selector
	 * 
	 * @return FutureObject
	 */
	public static function pickNext ($this1, $selector) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:85: lines 85-86
		$ret = new FutureTrigger();
		$link = null;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:88: lines 88-92
		$link = $this1->listen(function ($v) use (&$selector, &$ret) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:88: characters 36-47
			$_g = $selector($v);
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:90: characters 17-18
				$v = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:91: characters 9-23
				$ret->trigger($v);
			} else if ($__hx__switch === 1) {
			}
		});
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:94: characters 16-20
		$tmp = null;
		if ($link === null) {
			$tmp = function ($_) {
				CallbackLink_Impl_::noop();
			};
		} else {
			$f = Boot::getInstanceClosure($link, 'cancel');
			$tmp = function ($_) use (&$f) {
				$f();
			};
		}
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:94: characters 5-21
		$ret->handle($tmp);
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:96: characters 5-26
		return $ret;
	}

	/**
	 * @param SignalObject $this
	 * @param \Closure $selector
	 * @param bool $gather
	 * 
	 * @return SignalObject
	 */
	public static function select ($this1, $selector, $gather = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:49: lines 49-52
		return Suspendable::over($this1, function ($fire) use (&$selector, &$this1) {
			return $this1->listen(function ($v) use (&$selector, &$fire) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:49: characters 62-73
				$_g = $selector($v);
				if ($_g->index === 0) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:50: characters 17-18
					$v = $_g->params[0];
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:50: characters 21-28
					$fire($v);
				}
			});
		});
	}

	/**
	 *  Creates a new `SignalTrigger`
	 * 
	 * @return SignalTrigger
	 */
	public static function trigger () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:139: characters 5-31
		return new SignalTrigger();
	}

	/**
	 * @param SignalObject $this
	 * @param FutureObject $end
	 * 
	 * @return SignalObject
	 */
	public static function until ($this1, $end) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:100: lines 100-103
		return new Suspendable(function ($yield) use (&$this1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:101: characters 16-34
			return $this1->listen($yield);
		}, function ($self) use (&$end) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:102: characters 26-38
			$f = Boot::getInstanceClosure($self, 'dispose');
			$tmp = function ($_) use (&$f) {
				$f();
			};
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:102: characters 15-39
			$end->handle($tmp);
		});
	}
}

Boot::registerClass(Signal_Impl_::class, 'tink.core._Signal.Signal_Impl_');
