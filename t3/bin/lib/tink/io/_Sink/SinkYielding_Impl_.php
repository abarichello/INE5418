<?php
/**
 */

namespace tink\io\_Sink;

use \php\_Boot\HxAnon;
use \tink\core\_Future\SyncFuture;
use \tink\io\SinkObject;
use \php\Boot;
use \haxe\io\Output;
use \tink\io\_Source\Source_Impl_;
use \tink\core\TypedError;
use \tink\io\_Worker\Worker_Impl_;
use \tink\core\Outcome;
use \tink\io\std\OutputSink;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Future\FutureObject;

final class SinkYielding_Impl_ {
	/**
	 * @var SinkObject
	 */
	static public $BLACKHOLE;

	/**
	 * @param SinkObject $this
	 * 
	 * @return SinkObject
	 */
	public static function dirty ($this1) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:30: characters 5-21
		return $this1;
	}

	/**
	 * @param SinkObject $this
	 * 
	 * @return FutureObject
	 */
	public static function end ($this1) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:23: lines 23-27
		if ($this1->get_sealed()) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:23: characters 24-29
			return new SyncFuture(new LazyConst(Outcome::Success(false)));
		} else {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:24: lines 24-27
			return Future_Impl_::map($this1->consume(Source_Impl_::$EMPTY, new _HxAnon_SinkYielding_Impl_0(true)), function ($r) {
				$__hx__switch = ($r->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:25: characters 41-54
					return Outcome::Success(true);
				} else if ($__hx__switch === 1) {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:25: characters 37-38
					$_g = $r->params[0];
					$_g = $r->params[1];
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:25: characters 41-54
					return Outcome::Success(true);
				} else if ($__hx__switch === 2) {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:26: characters 28-29
					$_g = $r->params[1];
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:26: characters 25-26
					$e = $r->params[0];
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:26: characters 32-42
					return Outcome::Failure($e);
				}
			});
		}
	}

	/**
	 * @param TypedError $e
	 * 
	 * @return SinkObject
	 */
	public static function ofError ($e) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:33: characters 5-28
		return new ErrorSink($e);
	}

	/**
	 * @param string $name
	 * @param Output $target
	 * @param object $options
	 * 
	 * @return SinkObject
	 */
	public static function ofOutput ($name, $target, $options = null) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:59: lines 59-62
		$tmp = null;
		if ($options === null) {
			$tmp = Worker_Impl_::get();
		} else {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:59: characters 60-67
			$_g = $options->worker;
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:60: lines 60-61
			if ($_g === null) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:59: lines 59-62
				$tmp = Worker_Impl_::get();
			} else {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:61: characters 22-23
				$w = $_g;
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:59: lines 59-62
				$tmp = $w;
			}
		}
		return new OutputSink($name, $target, $tmp);
	}

	/**
	 * @param FutureObject $p
	 * 
	 * @return SinkObject
	 */
	public static function ofPromised ($p) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:36: lines 36-39
		return new FutureSink(Future_Impl_::map($p, function ($o) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:37: characters 20-21
				$v = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:37: characters 24-25
				return $v;
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:38: characters 20-21
				$e = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:38: characters 24-34
				return SinkYielding_Impl_::ofError($e);
			}
		}));
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


		self::$BLACKHOLE = Blackhole::$inst;
	}
}

class _HxAnon_SinkYielding_Impl_0 extends HxAnon {
	function __construct($end) {
		$this->end = $end;
	}
}

Boot::registerClass(SinkYielding_Impl_::class, 'tink.io._Sink.SinkYielding_Impl_');
SinkYielding_Impl_::__hx__init();