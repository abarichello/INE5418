<?php
/**
 */

namespace tink\core\_Progress;

use \tink\core\_Callback\LinkPair;
use \tink\core\_Signal\Signal_Impl_;
use \php\Boot;
use \tink\core\ProgressStatusTools;
use \tink\core\LinkObject;
use \tink\core\ProgressStatus;
use \tink\core\Outcome;
use \tink\core\CallbackLinkRef;
use \tink\core\_Future\Future_Impl_;
use \tink\core\ProgressTrigger;
use \tink\core\MPair;
use \tink\core\_Future\FutureObject;

final class Progress_Impl_ {
	/**
	 * @var MPair
	 */
	static public $INIT;

	/**
	 * @param ProgressObject $this
	 * 
	 * @return FutureObject
	 */
	public static function asFuture ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:38: characters 5-23
		return $this1->result;
	}

	/**
	 * @param FutureObject $v
	 * 
	 * @return ProgressObject
	 */
	public static function flatten ($v) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:54: lines 54-57
		return Progress_Impl_::map(Progress_Impl_::promise($v), function ($o) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:56: characters 33-43
				$_g = $o->params[0];
				$__hx__switch = ($_g->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:55: characters 28-29
					$v = $_g->params[0];
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:55: characters 33-43
					return Outcome::Success($v);
				} else if ($__hx__switch === 1) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:56: characters 41-42
					$e = $_g->params[0];
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:56: characters 46-56
					return Outcome::Failure($e);
				}
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:56: characters 20-21
				$e = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:56: characters 46-56
				return Outcome::Failure($e);
			}
		});
	}

	/**
	 * @param FutureObject $v
	 * 
	 * @return ProgressObject
	 */
	public static function future ($v) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:61: lines 61-64
		return new SuspendableProgress(function ($fire) use (&$v) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:62: characters 7-43
			$inner = new CallbackLinkRef();
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:63: characters 7-65
			$this1 = $v->handle(function ($p) use (&$inner, &$fire) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:63: characters 34-56
				$this1 = $p->changed->listen($fire);
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:63: characters 21-56
				$inner->link = $this1;
			});
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:63: characters 7-65
			return new LinkPair($this1, $inner);
		});
	}

	/**
	 * @param ProgressObject $this
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	public static function handle ($this1, $cb) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:21: characters 12-34
		return $this1->result->handle($cb);
	}

	/**
	 * @param ProgressObject $this
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	public static function listen ($this1, $cb) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:18: characters 12-38
		return $this1->progressed->listen($cb);
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return ProgressObject
	 */
	public static function make ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:28: lines 28-31
		return new SuspendableProgress(function ($fire) use (&$f) {
			return $f(function ($value, $total) use (&$fire) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:29: characters 25-29
				$fire1 = $fire;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:29: characters 41-72
				$this1 = new MPair($value, $total);
				$this2 = $this1;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:29: characters 25-74
				$fire1(ProgressStatus::InProgress($this2));
			}, function ($result) use (&$fire) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:30: characters 17-39
				$fire(ProgressStatus::Finished($result));
			});
		});
	}

	/**
	 * @param ProgressObject $this
	 * @param \Closure $f
	 * 
	 * @return ProgressObject
	 */
	public static function map ($this1, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:34: characters 5-89
		return new ProgressObject(Signal_Impl_::map($this1->changed, function ($s) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:34: characters 53-61
			return ProgressStatusTools::map($s, $f);
		}), function () use (&$f, &$this1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:34: characters 70-88
			return ProgressStatusTools::map(($this1->getStatus)(), $f);
		});
	}

	/**
	 * @param ProgressObject $this
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public static function next ($this1, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:67: characters 12-30
		return Future_Impl_::flatMap($this1->result, $f);
	}

	/**
	 * @param FutureObject $v
	 * 
	 * @return ProgressObject
	 */
	public static function promise ($v) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:42: lines 42-50
		return new SuspendableProgress(function ($fire) use (&$v) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:43: characters 7-43
			$inner = new CallbackLinkRef();
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:44: lines 44-49
			$this1 = $v->handle(function ($o) use (&$inner, &$fire) {
				$__hx__switch = ($o->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:45: characters 22-23
					$p = $o->params[0];
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:46: characters 24-67
					$this1 = $p->changed->listen(function ($s) use (&$fire) {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:46: characters 46-66
						$fire(ProgressStatusTools::map($s, Boot::getStaticClosure(Outcome::class, 'Success')));
					});
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:46: characters 11-67
					$inner->link = $this1;
				} else if ($__hx__switch === 1) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:47: characters 22-23
					$e = $o->params[0];
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:48: characters 11-37
					$fire(ProgressStatus::Finished(Outcome::Failure($e)));
				}
			});
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:44: lines 44-49
			return new LinkPair($this1, $inner);
		});
	}

	/**
	 * @return ProgressTrigger
	 */
	public static function trigger () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:24: characters 5-36
		return new ProgressTrigger();
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


		self::$INIT = ProgressValue_Impl_::$ZERO;
	}
}

Boot::registerClass(Progress_Impl_::class, 'tink.core._Progress.Progress_Impl_');
Progress_Impl_::__hx__init();
