<?php
/**
 */

namespace tink\core\_Future;

use \tink\core\_Callback\LinkPair;
use \tink\core\_Lazy\LazyFunc;
use \haxe\Timer;
use \tink\core\_Lazy\LazyObject;
use \php\Boot;
use \haxe\ds\Either;
use \tink\core\LinkObject;
use \tink\core\FutureStatus;
use \tink\core\Outcome;
use \tink\core\CallbackLinkRef;
use \tink\core\FutureTrigger;
use \tink\core\_Lazy\LazyConst;
use \tink\core\OutcomeTools;
use \tink\core\_Lazy\Lazy_Impl_;
use \tink\core\MPair;
use \tink\core\_Callback\CallbackLink_Impl_;
use \tink\core\_Outcome\OutcomeMapper_Impl_;

final class Future_Impl_ {
	/**
	 * @var FutureObject
	 */
	static public $NEVER;
	/**
	 * @var FutureObject
	 */
	static public $NOISE;
	/**
	 * @var FutureObject
	 */
	static public $NULL;

	/**
	 * @param FutureObject $f
	 * @param \Closure $map
	 * 
	 * @return FutureObject
	 */
	public static function _flatMap ($f, $map) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:336: characters 5-26
		return Future_Impl_::flatMap($f, $map);
	}

	/**
	 * @param FutureObject $f
	 * @param \Closure $map
	 * 
	 * @return FutureObject
	 */
	public static function _map ($f, $map) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:339: characters 5-22
		return Future_Impl_::map($f, $map);
	}

	/**
	 * Create a lazy and suspendable `Future` instance from a given `wakeup` function.
	 * The `wakeup` function will be only called when the `Future` is handled for the first time
	 * by using either `handle` or `eager` methods.
	 * The `CallbackLink` returned by the `wakeup` function will be cancelled when the future
	 * is suspended: either before it is triggered or when the last `handle` callback is removed.
	 * 
	 * @param \Closure $wakeup
	 * 
	 * @return FutureObject
	 */
	public static function _new ($wakeup) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:47: character 3
		$this1 = new SuspendableFuture($wakeup);
		return $this1;
	}

	/**
	 * @param FutureObject $f
	 * @param \Closure $map
	 * 
	 * @return FutureObject
	 */
	public static function _tryFailingFlatMap ($f, $map) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:318: lines 318-321
		return Future_Impl_::flatMap($f, function ($o) use (&$map) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:319: characters 20-21
				$d = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:319: characters 24-30
				return $map($d);
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:320: characters 20-21
				$f = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:320: characters 24-47
				return new SyncFuture(new LazyConst(Outcome::Failure($f)));
			}
		});
	}

	/**
	 * @param FutureObject $f
	 * @param \Closure $map
	 * 
	 * @return FutureObject
	 */
	public static function _tryFailingMap ($f, $map) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:330: characters 5-53
		return Future_Impl_::map($f, function ($o) use (&$map) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:330: characters 31-52
			return OutcomeTools::flatMap($o, OutcomeMapper_Impl_::withSameError($map));
		});
	}

	/**
	 * @param FutureObject $f
	 * @param \Closure $map
	 * 
	 * @return FutureObject
	 */
	public static function _tryFlatMap ($f, $map) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:324: lines 324-327
		return Future_Impl_::flatMap($f, function ($o) use (&$map) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:325: characters 20-21
				$d = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:325: characters 24-43
				return Future_Impl_::map($map($d), Boot::getStaticClosure(Outcome::class, 'Success'));
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:326: characters 20-21
				$f = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:326: characters 24-47
				return new SyncFuture(new LazyConst(Outcome::Failure($f)));
			}
		});
	}

	/**
	 * @param FutureObject $f
	 * @param \Closure $map
	 * 
	 * @return FutureObject
	 */
	public static function _tryMap ($f, $map) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:333: characters 5-49
		return Future_Impl_::map($f, function ($o) use (&$map) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:333: characters 31-48
			return OutcomeTools::map($o, $map);
		});
	}

	/**
	 *  Uses `Pair` to merge two futures
	 * 
	 * @param FutureObject $a
	 * @param FutureObject $b
	 * 
	 * @return FutureObject
	 */
	public static function and ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:315: characters 5-61
		return Future_Impl_::merge($a, $b, function ($a, $b) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:315: characters 46-60
			$this1 = new MPair($a, $b);
			return $this1;
		});
	}

	/**
	 *  Casts a Surprise into a Promise
	 * 
	 * @param FutureObject $s
	 * 
	 * @return FutureObject
	 */
	public static function asPromise ($s) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:171: characters 5-13
		return $s;
	}

	/**
	 * @param \Closure $init
	 * @param bool $lazy
	 * 
	 * @return FutureObject
	 */
	public static function async ($init, $lazy = false) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:286: lines 286-289
		if ($lazy === null) {
			$lazy = false;
		}
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:287: characters 5-34
		$ret = Future_Impl_::irreversible($init);
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:288: characters 12-42
		if ($lazy) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:288: characters 22-25
			return $ret;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:288: characters 31-42
			$ret->eager();
			return $ret;
		}
	}

	/**
	 * @param int $ms
	 * @param LazyObject $value
	 * 
	 * @return FutureObject
	 */
	public static function delay ($ms, $value) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:350: characters 12-102
		$this1 = Future_Impl_::irreversible(function ($cb) use (&$ms, &$value) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:350: characters 45-93
			Timer::delay(function () use (&$cb, &$value) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:350: characters 73-88
				$cb(Lazy_Impl_::get($value));
			}, $ms);
		});
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:350: characters 12-102
		$this1->eager();
		return $this1;
	}

	/**
	 *  Makes this future eager.
	 *  Futures are lazy by default, i.e. it does not try to fetch the result until someone `handle` it
	 * 
	 * @param FutureObject $this
	 * 
	 * @return FutureObject
	 */
	public static function eager ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:64: characters 5-17
		$this1->eager();
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:65: characters 5-16
		return $this1;
	}

	/**
	 *  Same as `first`, but use `Either` to handle the two different types
	 * 
	 * @param FutureObject $a
	 * @param FutureObject $b
	 * 
	 * @return FutureObject
	 */
	public static function either ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:309: characters 5-57
		return Future_Impl_::first(Future_Impl_::map($a, Boot::getStaticClosure(Either::class, 'Left')), Future_Impl_::map($b, Boot::getStaticClosure(Either::class, 'Right')));
	}

	/**
	 *  Creates a future that contains the first result from `this` or `that`
	 * 
	 * @param FutureObject $this
	 * @param FutureObject $that
	 * 
	 * @return FutureObject
	 */
	public static function first ($this1, $that) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:77: characters 20-36
		$_g = $this1;
		$_g1 = $_g->getStatus();
		$__hx__switch = ($_g1->index);
		if ($__hx__switch === 3) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:80: characters 33-34
			$_g2 = $_g1->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:77: characters 38-42
			$_g1 = $that->getStatus();
			$__hx__switch = ($_g1->index);
			if ($__hx__switch === 3) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:81: characters 36-37
				$_g2 = $_g1->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:80: characters 13-37
				$v = $_g;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:82: characters 10-11
				return $v;
			} else if ($__hx__switch === 4) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:80: characters 13-37
				$v = $_g;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:82: characters 10-11
				return $v;
			} else {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:80: characters 13-37
				$v = $_g;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:82: characters 10-11
				return $v;
			}
		} else if ($__hx__switch === 4) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:78: characters 36-37
			$v = $that;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:82: characters 10-11
			return $v;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:77: characters 38-42
			$_g1 = $that->getStatus();
			$__hx__switch = ($_g1->index);
			if ($__hx__switch === 3) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:81: characters 36-37
				$_g2 = $_g1->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:78: characters 36-37
				$v = $that;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:82: characters 10-11
				return $v;
			} else if ($__hx__switch === 4) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:80: characters 13-37
				$v = $_g;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:82: characters 10-11
				return $v;
			} else {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:84: characters 9-80
				return new SuspendableFuture(function ($fire) use (&$that, &$this1) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:84: characters 42-79
					$this2 = $this1->handle($fire);
					return new LinkPair($this2, $that->handle($fire));
				});
			}
		}
	}

	/**
	 *  Creates a new future by applying a transform function to the result.
	 *  Different from `map`, the transform function of `flatMap` returns a `Future`
	 * 
	 * @param FutureObject $this
	 * @param \Closure $next
	 * @param bool $gather
	 * 
	 * @return FutureObject
	 */
	public static function flatMap ($this1, $next, $gather = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:103: characters 19-25
		$_g = $this1->getStatus();
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 3) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:105: characters 18-19
			$l = $_g->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:106: characters 9-77
			return new SuspendableFuture(function ($fire) use (&$next, &$l) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:106: characters 42-76
				return $next(Lazy_Impl_::get($l))->handle(function ($v) use (&$fire) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:106: characters 68-75
					$fire($v);
				});
			});
		} else if ($__hx__switch === 4) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:104: characters 23-33
			return Future_Impl_::$NEVER;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:108: lines 108-112
			return new SuspendableFuture(function ($yield) use (&$next, &$this1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:109: characters 11-47
				$inner = new CallbackLinkRef();
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:110: characters 11-78
				$outer = $this1->handle(function ($v) use (&$yield, &$next, &$inner) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:110: characters 55-76
					$outer = $next($v)->handle($yield);
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:110: characters 42-76
					$inner->link = $outer;
				});
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:111: characters 11-35
				return new LinkPair($outer, $inner);
			});
		}
	}

	/**
	 *  Flattens `Future<Future<A>>` into `Future<A>`
	 * 
	 * @param FutureObject $f
	 * 
	 * @return FutureObject
	 */
	public static function flatten ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:150: characters 5-29
		return Future_Impl_::flatMap($f, function ($v) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:150: characters 27-28
			return $v;
		});
	}

	/**
	 * @param FutureObject $this
	 * 
	 * @return FutureObject
	 */
	public static function gather ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:124: characters 5-16
		return $this1;
	}

	/**
	 * @param FutureObject $this
	 * 
	 * @return FutureStatus
	 */
	public static function get_status ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:36: characters 7-30
		return $this1->getStatus();
	}

	/**
	 *  Registers a callback to handle the future result.
	 *  If the result is already available, the callback will be invoked immediately.
	 *  @return A `CallbackLink` instance that can be used to cancel the callback, no effect if the callback is already invoked
	 * 
	 * @param FutureObject $this
	 * @param \Closure $callback
	 * 
	 * @return LinkObject
	 */
	public static function handle ($this1, $callback) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:56: characters 5-33
		return $this1->handle($callback);
	}

	/**
	 * Merges multiple futures into a `Future<Array<A>>`
	 * The futures are processed simultaneously. Set concurrency to limit how many are processed at a time.
	 * 
	 * @param FutureObject[]|\Array_hx $futures
	 * @param int $concurrency
	 * 
	 * @return FutureObject
	 */
	public static function inParallel ($futures, $concurrency = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:183: characters 5-38
		return Future_Impl_::many($futures, $concurrency);
	}

	/**
	 * Merges multiple futures into a `Future<Array<A>>`
	 * The futures are processed one at a time.
	 * 
	 * @param FutureObject[]|\Array_hx $futures
	 * 
	 * @return FutureObject
	 */
	public static function inSequence ($futures) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:190: characters 5-28
		return Future_Impl_::many($futures, 1);
	}

	/**
	 * Creates an irreversible future:
	 * `init` gets called, when the first handler is registered or `eager()` is called.
	 * The future is never suspended again. When possible, use `new Future()` instead.
	 * 
	 * @param \Closure $init
	 * 
	 * @return FutureObject
	 */
	public static function irreversible ($init) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:297: characters 5-66
		return new SuspendableFuture(function ($yield) use (&$init) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:297: characters 45-56
			$init($yield);
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:297: characters 58-62
			return null;
		});
	}

	/**
	 * @param mixed $maybeFuture
	 * 
	 * @return bool
	 */
	public static function isFuture ($maybeFuture) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:282: characters 5-41
		return ($maybeFuture instanceof FutureObject);
	}

	/**
	 * @param LazyObject $l
	 * 
	 * @return FutureObject
	 */
	public static function lazy ($l) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:272: characters 5-29
		return new SyncFuture($l);
	}

	/**
	 * @param FutureObject[]|\Array_hx $a
	 * @param int $concurrency
	 * 
	 * @return FutureObject
	 */
	public static function many ($a, $concurrency = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:193: characters 5-65
		return Future_Impl_::processMany($a, $concurrency, Boot::getStaticClosure(Outcome::class, 'Success'), function ($o) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:193: characters 54-64
			return OutcomeTools::orNull($o);
		});
	}

	/**
	 *  Creates a new future by applying a transform function to the result.
	 *  Different from `flatMap`, the transform function of `map` returns a sync value
	 * 
	 * @param FutureObject $this
	 * @param \Closure $f
	 * @param bool $gather
	 * 
	 * @return FutureObject
	 */
	public static function map ($this1, $f, $gather = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:92: characters 19-25
		$_g = $this1->getStatus();
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 3) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:94: characters 18-19
			$l = $_g->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:94: characters 40-48
			$this2 = $l;
			$f1 = $f;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:94: characters 22-49
			return new SyncFuture(new LazyFunc(function () use (&$f1, &$this2) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:94: characters 40-48
				return $f1($this2->get());
			}, $this2));
		} else if ($__hx__switch === 4) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:93: characters 23-33
			return Future_Impl_::$NEVER;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:95: characters 16-78
			return new SuspendableFuture(function ($fire) use (&$f, &$this1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:95: characters 49-77
				return $this1->handle(function ($v) use (&$f, &$fire) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:95: characters 66-76
					$fire($f($v));
				});
			});
		}
	}

	/**
	 *  Merges two futures into one by applying `combine` on the two future values
	 * 
	 * @param FutureObject $this
	 * @param FutureObject $that
	 * @param \Closure $combine
	 * 
	 * @return FutureObject
	 */
	public static function merge ($this1, $that, $combine) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:130: characters 20-26
		$_g = $this1->getStatus();
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:130: characters 28-39
		$_g1 = $that->getStatus();
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:130: characters 20-26
		if ($_g->index === 4) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:131: characters 45-55
			return Future_Impl_::$NEVER;
		} else if ($_g1->index === 4) {
			return Future_Impl_::$NEVER;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:133: lines 133-142
			return new SuspendableFuture(function ($yield) use (&$that, &$this1, &$combine) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:134: lines 134-139
				$check = function ($v = null) use (&$yield, &$that, &$this1, &$combine) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:135: characters 28-34
					$_g = $this1->getStatus();
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:135: characters 36-47
					$_g1 = $that->getStatus();
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:135: characters 28-34
					if ($_g->index === 3) {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:135: characters 36-47
						if ($_g1->index === 3) {
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:136: characters 37-38
							$b = $_g1->params[0];
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:136: characters 27-28
							$a = $_g->params[0];
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:137: characters 17-37
							$yield($combine(Lazy_Impl_::get($a), Lazy_Impl_::get($b)));
						}
					}
				};
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:141: characters 11-50
				$this2 = $this1->handle($check);
				return new LinkPair($this2, $that->handle($check));
			});
		}
	}

	/**
	 * @param FutureObject $l
	 * 
	 * @return FutureObject
	 */
	public static function neverToAny ($l) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:162: characters 5-18
		return $l;
	}

	/**
	 *  Like `map` and `flatMap` but with a polymorphic transformer and return a `Promise`
	 *  @see `Next`
	 * 
	 * @param FutureObject $this
	 * @param \Closure $n
	 * 
	 * @return FutureObject
	 */
	public static function next ($this1, $n) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:120: characters 5-22
		return Future_Impl_::flatMap($this1, $n);
	}

	/**
	 * @param FutureObject $this
	 * 
	 * @return FutureObject
	 */
	public static function noise ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:70: lines 70-71
		if ($this1->getStatus()->index === 4) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:70: characters 36-46
			return Future_Impl_::$NEVER;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:71: characters 12-27
			return Future_Impl_::map($this1, function ($_) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:71: characters 21-26
				return null;
			});
		}
	}

	/**
	 * @param mixed $v
	 * 
	 * @return FutureObject
	 */
	public static function ofAny ($v) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:165: characters 5-26
		return new SyncFuture(new LazyConst($v));
	}

	/**
	 * @param FutureObject[]|\Array_hx $futures
	 * @param bool $gather
	 * 
	 * @return FutureObject
	 */
	public static function ofMany ($futures, $gather = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:175: characters 5-31
		return Future_Impl_::inSequence($futures);
	}

	/**
	 *  Same as `first`
	 * 
	 * @param FutureObject $a
	 * @param FutureObject $b
	 * 
	 * @return FutureObject
	 */
	public static function or ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:303: characters 5-22
		return Future_Impl_::first($a, $b);
	}

	/**
	 * @param FutureObject[]|\Array_hx $a
	 * @param int $concurrency
	 * @param \Closure $fn
	 * @param \Closure $lift
	 * 
	 * @return FutureObject
	 */
	public static function processMany ($a, $concurrency, $fn, $lift) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:196: lines 196-268
		if ($a->length === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:197: characters 16-46
			return new SyncFuture(new LazyConst($lift(Outcome::Success(new \Array_hx()))));
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:198: lines 198-266
			$this1 = new SuspendableFuture(function ($yield) use (&$lift, &$fn, &$concurrency, &$a) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:199: lines 199-210
				$links = new \Array_hx();
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:200: characters 19-42
				$_g = new \Array_hx();
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:200: characters 20-41
				$_g1 = 0;
				while ($_g1 < $a->length) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:200: characters 25-26
					$x = ($a->arr[$_g1] ?? null);
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:200: characters 20-41
					++$_g1;
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:200: characters 33-41
					$_g->arr[$_g->length++] = null;
				}
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:199: lines 199-210
				$ret = $_g;
				$index = 0;
				$pending = 0;
				$done = false;
				$concurrency1 = null;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:204: lines 204-210
				if ($concurrency === null) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:199: lines 199-210
					$concurrency1 = $a->length;
				} else {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:206: characters 20-21
					$v = $concurrency;
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:199: lines 199-210
					$concurrency1 = ($v < 1 ? 1 : ($v > $a->length ? $a->length : $v));
				}
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:217: lines 217-225
				$fireWhenReady = function () use (&$yield, &$lift, &$pending, &$index, &$ret, &$done) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:219: lines 219-225
					if ($index === $ret->length) {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:220: lines 220-224
						if ($pending === 0) {
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:221: characters 17-41
							$v = $lift(Outcome::Success($ret));
							$done = true;
							$yield($v);
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:222: characters 17-21
							return true;
						} else {
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:224: characters 20-25
							return false;
						}
					} else {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:225: characters 18-23
						return false;
					}
				};
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:227: lines 227-260
				$step = null;
				$step = function () use (&$step, &$yield, &$lift, &$pending, &$index, &$fireWhenReady, &$fn, &$ret, &$done, &$links, &$a) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:228: lines 228-260
					if (!$done && !$fireWhenReady()) {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:229: lines 229-260
						while ($index < $ret->length) {
							unset($index1, $check);
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:231: characters 27-34
							$index += 1;
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:231: characters 15-35
							$index1 = $index - 1;
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:232: characters 15-32
							$p = ($a->arr[$index1] ?? null);
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:234: lines 234-243
							$check = function ($o) use (&$yield, &$lift, &$index1, &$fireWhenReady, &$fn, &$ret, &$done, &$links) {
								#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:235: characters 24-29
								$_g = $fn($o);
								$__hx__switch = ($_g->index);
								if ($__hx__switch === 0) {
									#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:236: characters 32-33
									$v = $_g->params[0];
									#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:237: characters 21-35
									$ret->offsetSet($index1, $v);
									#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:238: characters 21-36
									$fireWhenReady();
								} else if ($__hx__switch === 1) {
									#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:239: characters 32-33
									$e = $_g->params[0];
									#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:240: lines 240-241
									$_g = 0;
									while ($_g < $links->length) {
										#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:240: characters 26-27
										$l = ($links->arr[$_g] ?? null);
										#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:240: lines 240-241
										++$_g;
										#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:241: characters 23-33
										if ($l !== null) {
											$l->cancel();
										}
									}
									#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:242: characters 21-43
									$v = $lift(Outcome::Failure($e));
									$done = true;
									$yield($v);
								}
							};
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:245: characters 22-30
							$_g = $p->getStatus();
							if ($_g->index === 3) {
								#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:246: characters 28-35
								$_hx_tmp = null;
								$_hx_tmp = Lazy_Impl_::get($_g->params[0]);
								#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:246: characters 39-40
								$v = $_hx_tmp;
								#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:247: characters 19-27
								$check($v);
								#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:248: characters 19-38
								if (!$done) {
									#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:248: characters 30-38
									continue;
								}
							} else {
								#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:250: characters 19-28
								$pending += 1;
								#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:251: lines 251-257
								$x = $p->handle(function ($o) use (&$step, &$pending, &$done, &$check) {
									#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:253: characters 23-32
									$pending -= 1;
									#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:254: characters 23-31
									$check($o);
									#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:255: characters 23-40
									if (!$done) {
										#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:255: characters 34-40
										$step();
									}
								});
								#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:251: lines 251-257
								$links->arr[$links->length++] = $x;
							}
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:259: characters 15-20
							break;
						}
					}
				};
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:262: characters 19-23
				$_g = 0;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:262: characters 23-34
				$_g1 = $concurrency1;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:262: lines 262-263
				while ($_g < $_g1) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:262: characters 19-34
					$i = $_g++;
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:263: characters 11-17
					$step();
				}
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:265: characters 9-21
				return CallbackLink_Impl_::fromMany($links);
			});
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:198: lines 198-266
			return $this1;
		}
	}

	/**
	 *  Creates a sync future.
	 *  Example: `var i = Future.sync(1); // Future<Int>`
	 * 
	 * @param mixed $v
	 * 
	 * @return FutureObject
	 */
	public static function sync ($v) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:279: characters 12-19
		return new SyncFuture(new LazyConst($v));
	}

	/**
	 *  Creates a new `FutureTrigger`
	 * 
	 * @return FutureTrigger
	 */
	public static function trigger () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Future.hx:346: characters 5-31
		return new FutureTrigger();
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$NOISE = new SyncFuture(new LazyConst(null));
		self::$NULL = Future_Impl_::$NOISE;
		self::$NEVER = new NeverFuture();
	}
}

Boot::registerClass(Future_Impl_::class, 'tink.core._Future.Future_Impl_');
Boot::registerGetters('tink\\core\\_Future\\Future_Impl_', [
	'status' => true
]);
Future_Impl_::__hx__init();
