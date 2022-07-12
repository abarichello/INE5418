<?php
/**
 */

namespace tink\core\_Promise;

use \php\_Boot\HxAnon;
use \tink\core\_Lazy\LazyObject;
use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\core\LinkObject;
use \tink\core\_Future\SuspendableFuture;
use \tink\core\TypedError;
use \tink\core\Outcome;
use \tink\core\FutureTrigger;
use \tink\core\_Lazy\LazyConst;
use \tink\core\OutcomeTools;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Lazy\Lazy_Impl_;
use \tink\core\MPair;
use \tink\core\_Future\FutureObject;

final class Promise_Impl_ {
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
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public static function _new ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:29: characters 12-73
		$this1 = new SuspendableFuture(function ($cb) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:29: characters 29-72
			return $f(function ($v) use (&$cb) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:29: characters 36-50
				$cb(Outcome::Success($v));
			}, function ($e) use (&$cb) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:29: characters 57-71
				$cb(Outcome::Failure($e));
			});
		});
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:28: character 3
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param FutureObject $a
	 * @param FutureObject $b
	 * 
	 * @return FutureObject
	 */
	public static function and ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:89: characters 5-48
		return Promise_Impl_::merge($a, $b, function ($a, $b) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:89: characters 33-47
			$this1 = new MPair($a, $b);
			return new SyncFuture(new LazyConst(Outcome::Success($this1)));
		});
	}

	/**
	 * @param \Closure $gen
	 * 
	 * @return \Closure
	 */
	public static function cache ($gen) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:239: characters 5-18
		$p = null;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:240: lines 240-257
		return function () use (&$gen, &$p) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:241: characters 7-19
			$ret = $p;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:242: lines 242-252
			if ($ret === null) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:243: characters 9-26
				$sync = false;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:244: lines 244-250
				$ret = Promise_Impl_::next($gen(), function ($o) use (&$sync, &$p) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:245: lines 245-248
					$o->b->handle(function ($_) use (&$sync, &$p) {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:246: characters 13-24
						$sync = true;
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:247: characters 13-21
						$p = null;
					});
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:249: characters 11-21
					return new SyncFuture(new LazyConst(Outcome::Success($o->a)));
				});
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:251: characters 9-26
				if (!$sync) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:251: characters 19-26
					$p = $ret;
				}
			}
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:253: lines 253-256
			return Future_Impl_::map($ret, function ($o) use (&$p) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:254: characters 9-36
				if (!OutcomeTools::isSuccess($o)) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:254: characters 28-36
					$p = null;
				}
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:255: characters 9-17
				return $o;
			});
		};
	}

	/**
	 * @param FutureObject $this
	 * 
	 * @return FutureObject
	 */
	public static function eager ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:32: characters 12-24
		$this1->eager();
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:32: characters 5-24
		return $this1;
	}

	/**
	 * @param FutureObject $this
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public static function flatMap ($this1, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:38: characters 5-27
		return Future_Impl_::flatMap($this1, $f);
	}

	/**
	 * @param FutureObject $l
	 * 
	 * @return FutureObject
	 */
	public static function fromNever ($l) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:201: characters 5-18
		return $l;
	}

	/**
	 * @param FutureObject $this
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	public static function handle ($this1, $cb) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:59: characters 5-27
		return $this1->handle($cb);
	}

	/**
	 * @param FutureObject[]|\Array_hx $a
	 * @param int $concurrency
	 * 
	 * @return FutureObject
	 */
	public static function inParallel ($a, $concurrency = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:227: characters 5-32
		return Promise_Impl_::many($a, $concurrency);
	}

	/**
	 * @param FutureObject[]|\Array_hx $a
	 * 
	 * @return FutureObject
	 */
	public static function inSequence ($a) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:234: characters 5-22
		return Promise_Impl_::many($a, 1);
	}

	/**
	 * @param FutureObject $this
	 * 
	 * @return FutureObject
	 */
	public static function isSuccess ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:67: characters 5-55
		return Future_Impl_::map($this1, function ($o) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:67: characters 34-54
			return OutcomeTools::isSuccess($o);
		});
	}

	/**
	 * Given an Iterable (e.g. Array) of Promises, handle them one by one with the `yield` function until one of them yields `Some` value
	 * and the returned promise will resolve that value. If all of them yields `None`, the returned promise will resolve to the `fallback` promise.
	 * In a nutshell, it is the async version of the following code:
	 * ```haxe
	 * for(promise in promises) {
	 *   switch yield(promise) {
	 *     case Some(v): return v;
	 *     case None:
	 *   }
	 * }
	 * return fallback;
	 * ```
	 * @param promises An Iterable (e.g. Array) of Promises
	 * @param yield A function used to handle the promises and should return an Option
	 * @param fallback A value to be used when all yields `None`
	 * @return Promise<T>
	 * 
	 * @param object $promises
	 * @param \Closure $yield
	 * @param FutureObject $fallback
	 * 
	 * @return FutureObject
	 */
	public static function iterate ($promises, $yield, $fallback) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:111: lines 111-129
		return Future_Impl_::irreversible(function ($cb) use (&$yield, &$fallback, &$promises) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:112: characters 7-38
			$iter = $promises->iterator();
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:113: lines 113-127
			$next = null;
			$next = function () use (&$yield, &$next, &$iter, &$fallback, &$cb) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:114: lines 114-126
				if ($iter->hasNext()) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:115: lines 115-124
					$iter->next()->handle(function ($o) use (&$yield, &$next, &$cb) {
						$__hx__switch = ($o->index);
						if ($__hx__switch === 0) {
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:116: characters 26-27
							$v = $o->params[0];
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:117: lines 117-121
							$yield($v)->handle(function ($o) use (&$next, &$cb) {
								$__hx__switch = ($o->index);
								if ($__hx__switch === 0) {
									#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:119: characters 30-34
									$_g = $o->params[0];
									$__hx__switch = ($_g->index);
									if ($__hx__switch === 0) {
										#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:118: characters 35-38
										$ret = $_g->params[0];
										#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:118: characters 42-58
										$cb(Outcome::Success($ret));
									} else if ($__hx__switch === 1) {
										#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:119: characters 37-43
										$next();
									}
								} else if ($__hx__switch === 1) {
									#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:120: characters 30-31
									$e = $o->params[0];
									#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:120: characters 34-48
									$cb(Outcome::Failure($e));
								}
							});
						} else if ($__hx__switch === 1) {
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:122: characters 26-27
							$e = $o->params[0];
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:123: characters 15-29
							$cb(Outcome::Failure($e));
						}
					});
				} else {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:126: characters 11-30
					$fallback->handle($cb);
				}
			};
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:128: characters 7-13
			$next();
		});
	}

	/**
	 * @param LazyObject $p
	 * 
	 * @return FutureObject
	 */
	public static function lazy ($p) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:223: characters 12-48
		$this1 = new SuspendableFuture(function ($cb) use (&$p) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:223: characters 29-47
			return Lazy_Impl_::get($p)->handle($cb);
		});
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:223: characters 12-48
		return $this1;
	}

	/**
	 * @param FutureObject $p
	 * 
	 * @return FutureObject
	 */
	public static function lift ($p) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:263: characters 5-13
		return $p;
	}

	/**
	 * @param FutureObject[]|\Array_hx $a
	 * @param int $concurrency
	 * 
	 * @return FutureObject
	 */
	public static function many ($a, $concurrency = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:230: characters 5-111
		return Future_Impl_::processMany($a, $concurrency, function ($o) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:230: characters 101-102
			return $o;
		}, function ($o) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:230: characters 109-110
			return $o;
		});
	}

	/**
	 * @param FutureObject $this
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public static function map ($this1, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:35: characters 5-23
		return Future_Impl_::map($this1, $f);
	}

	/**
	 * @param FutureObject $this
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public static function mapError ($this1, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:53: lines 53-56
		return Future_Impl_::map($this1, function ($o) use (&$f) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:54: characters 20-21
				$_g = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:54: characters 24-25
				return $o;
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:55: characters 20-21
				$e = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:55: characters 24-37
				return Outcome::Failure($f($e));
			}
		});
	}

	/**
	 * @param FutureObject $this
	 * @param FutureObject $other
	 * @param \Closure $merger
	 * @param bool $gather
	 * 
	 * @return FutureObject
	 */
	public static function merge ($this1, $other, $merger, $gather = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:82: lines 82-85
		return Future_Impl_::flatMap(Future_Impl_::merge($this1, $other, function ($a, $b) use (&$merger) {
			$__hx__switch = ($a->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:83: characters 21-22
				$_g = $a->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:82: characters 51-52
				$__hx__switch = ($b->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:83: characters 33-34
					$b1 = $b->params[0];
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:83: characters 21-22
					$a1 = $_g;
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:83: characters 38-50
					return $merger($a1, $b1);
				} else if ($__hx__switch === 1) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:84: characters 42-43
					$e = $b->params[0];
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:84: characters 47-64
					return new SyncFuture(new LazyConst(Outcome::Failure($e)));
				}
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:84: characters 21-22
				$e = $a->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:84: characters 47-64
				return new SyncFuture(new LazyConst(Outcome::Failure($e)));
			}
		}), function ($o) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:85: characters 21-22
			return $o;
		});
	}

	/**
	 * @param FutureObject $this
	 * @param \Closure $f
	 * @param bool $gather
	 * 
	 * @return FutureObject
	 */
	public static function next ($this1, $f, $gather = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:70: lines 70-73
		return Future_Impl_::flatMap($this1, function ($o) use (&$f) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:71: characters 20-21
				$d = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:71: characters 24-28
				return $f($d);
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:72: characters 20-21
				$f1 = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:72: characters 24-47
				return new SyncFuture(new LazyConst(Outcome::Failure($f1)));
			}
		});
	}

	/**
	 * @param FutureObject $this
	 * 
	 * @return FutureObject
	 */
	public static function noise ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:63: lines 63-64
		if ($this1->getStatus()->index === 4) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:63: characters 41-51
			return Promise_Impl_::$NEVER;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:64: characters 12-61
			return Promise_Impl_::next($this1, function ($v) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:64: characters 48-60
				return new SyncFuture(new LazyConst(Outcome::Success(null)));
			});
		}
	}

	/**
	 * @param mixed $d
	 * 
	 * @return FutureObject
	 */
	public static function ofData ($d) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:219: characters 12-33
		return new SyncFuture(new LazyConst(Outcome::Success($d)));
	}

	/**
	 * @param TypedError $e
	 * 
	 * @return FutureObject
	 */
	public static function ofError ($e) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:216: characters 12-33
		return new SyncFuture(new LazyConst(Outcome::Failure($e)));
	}

	/**
	 * @param FutureObject $f
	 * 
	 * @return FutureObject
	 */
	public static function ofFuture ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:210: characters 5-26
		return Future_Impl_::map($f, Boot::getStaticClosure(Outcome::class, 'Success'));
	}

	/**
	 * @param FutureTrigger $f
	 * 
	 * @return FutureObject
	 */
	public static function ofHappyTrigger ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:207: characters 5-34
		return Future_Impl_::map($f, Boot::getStaticClosure(Outcome::class, 'Success'));
	}

	/**
	 * @param Outcome $o
	 * 
	 * @return FutureObject
	 */
	public static function ofOutcome ($o) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:213: characters 5-26
		return new SyncFuture(new LazyConst($o));
	}

	/**
	 * @param FutureObject $s
	 * 
	 * @return FutureObject
	 */
	public static function ofSpecific ($s) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:198: characters 5-41
		return $s;
	}

	/**
	 * @param FutureTrigger $f
	 * 
	 * @return FutureObject
	 */
	public static function ofTrigger ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:204: characters 5-24
		return $f;
	}

	/**
	 * @param FutureObject $this
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public static function recover ($this1, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:47: lines 47-50
		return Future_Impl_::flatMap($this1, function ($o) use (&$f) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:48: characters 20-21
				$d = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:48: characters 24-38
				return new SyncFuture(new LazyConst($d));
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:49: characters 20-21
				$e = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:49: characters 24-28
				return $f($e);
			}
		});
	}

	/**
	 * @param TypedError $e
	 * 
	 * @return FutureObject
	 */
	public static function reject ($e) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:278: characters 12-35
		return new SyncFuture(new LazyConst(Outcome::Failure($e)));
	}

	/**
	 * @param mixed $v
	 * 
	 * @return FutureObject
	 */
	public static function resolve ($v) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:274: characters 12-35
		return new SyncFuture(new LazyConst(Outcome::Success($v)));
	}

	/**
	 * Retry a promise generator repeatedly
	 *
	 * @param gen A function that returns a `Promise`, this function will be called multiple times during the retry process
	 * @param next A callback to be called when an attempt failed. An object will be received containing the info of the last attempt:
	 *   `attempt` is the number of attempts tried, starting from `1`
	 *   `error` is the error produced from the last attempt
	 *   `elasped` is the amount of time (in ms) elapsed since the beginning of the `retry` call
	 *
	 *   If this function's returned promised resolves to an `Error`, this retry will abort with such error. Otherwise if it resolves to a `Success(Noise)`, the retry will continue.
	 *
	 *   Some usage examples:
	 *     - wait longer for later attempts and stop after a limit:
	 *     ```haxe
	 *     function (info) return switch info.attempt {
	 *         case 10: info.error;
	 *         case v: Future.delay(v * 1000, Noise);
	 *     }
	 *     ```
	 *
	 *     - bail out on error codes that are fatal:
	 *     ```haxe
	 *     function (info) return switch info.error.code {
	 *       case Forbidden : info.error; // in this case new attempts probably make no sense
	 *       default: Future.delay(1000, Noise);
	 *     }
	 *     ```
	 *
	 *     - and also actually timeout:
	 *     ```haxe
	 *     // with using DateTools
	 *     function (info) return
	 *       if (info.elapsed > 2.minutes()) info.error
	 *       else Future.delay(1000, Noise);
	 *     ```
	 *
	 * @return Promise<T>
	 * 
	 * @param \Closure $gen
	 * @param \Closure $next
	 * 
	 * @return FutureObject
	 */
	public static function retry ($gen, $next) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:172: characters 5-54
		$stamp = function () {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:172: characters 22-54
			return \microtime(true) * 1000;
		};
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:173: characters 5-25
		$start = $stamp();
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:174: lines 174-181
		$attempt = null;
		$attempt = function ($count) use (&$next, &$stamp, &$start, &$gen, &$attempt) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:175: lines 175-180
			$f = function ($error) use (&$count, &$next, &$stamp, &$start, &$attempt) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:177: characters 34-39
				$count1 = $count;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:177: lines 177-178
				return Promise_Impl_::next($next(new _HxAnon_Promise_Impl_0($count1, $error, $stamp() - $start)), function ($_) use (&$count, &$attempt) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:178: characters 32-57
					return $attempt($count + 1);
				});
			};
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:175: lines 175-180
			return Future_Impl_::flatMap($gen(), function ($o) use (&$f) {
				$__hx__switch = ($o->index);
				if ($__hx__switch === 0) {
					$d = $o->params[0];
					return new SyncFuture(new LazyConst($o));
				} else if ($__hx__switch === 1) {
					$e = $o->params[0];
					return $f($e);
				}
			});
		};
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:174: lines 174-181
		return $attempt(1);
	}

	/**
	 * @param FutureObject $this
	 * @param mixed $v
	 * 
	 * @return FutureObject
	 */
	public static function swap ($this1, $v) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:76: characters 5-24
		return Promise_Impl_::next($this1, function ($_) use (&$v) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:76: characters 22-23
			return new SyncFuture(new LazyConst(Outcome::Success($v)));
		});
	}

	/**
	 * @param FutureObject $this
	 * @param TypedError $e
	 * 
	 * @return FutureObject
	 */
	public static function swapError ($this1, $e) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:79: characters 5-28
		return Promise_Impl_::mapError($this1, function ($_) use (&$e) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:79: characters 26-27
			return $e;
		});
	}

	/**
	 *  Creates a new `PromiseTrigger`
	 * 
	 * @return FutureTrigger
	 */
	public static function trigger () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:270: characters 12-32
		$this1 = new FutureTrigger();
		return $this1;
	}

	/**
	 * @param FutureObject $this
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public static function tryRecover ($this1, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:41: lines 41-44
		return Future_Impl_::flatMap($this1, function ($o) use (&$f) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:42: characters 20-21
				$d = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:42: characters 24-38
				return new SyncFuture(new LazyConst($o));
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:43: characters 20-21
				$e = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:43: characters 24-28
				return $f($e);
			}
		});
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


		self::$NOISE = new SyncFuture(new LazyConst(Outcome::Success(null)));
		self::$NULL = Promise_Impl_::$NOISE;
		self::$NEVER = Future_Impl_::$NEVER;
	}
}

class _HxAnon_Promise_Impl_0 extends HxAnon {
	function __construct($attempt, $error, $elapsed) {
		$this->attempt = $attempt;
		$this->error = $error;
		$this->elapsed = $elapsed;
	}
}

Boot::registerClass(Promise_Impl_::class, 'tink.core._Promise.Promise_Impl_');
Promise_Impl_::__hx__init();
