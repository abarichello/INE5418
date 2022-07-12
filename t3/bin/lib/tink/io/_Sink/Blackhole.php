<?php
/**
 */

namespace tink\io\_Sink;

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \haxe\Exception;
use \tink\streams\StreamObject;
use \tink\streams\Handled;
use \tink\core\_Lazy\LazyConst;
use \tink\streams\_Stream\Handler_Impl_;
use \tink\io\PipeResult;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Future\FutureObject;
use \tink\io\SinkBase;

class Blackhole extends SinkBase {
	/**
	 * @var Blackhole
	 */
	static public $inst;

	/**
	 * @return void
	 */
	public function __construct () {
	}

	/**
	 * @param StreamObject $source
	 * @param object $options
	 * 
	 * @return FutureObject
	 */
	public function consume ($source, $options) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:73: lines 73-77
		return Future_Impl_::map($source->forEach(Handler_Impl_::ofSafe(function ($_) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:73: characters 39-52
			return new SyncFuture(new LazyConst(Handled::Resume()));
		})), function ($o) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:73: lines 73-77
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:75: characters 19-20
				$_g = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:75: characters 23-28
				throw Exception::thrown("unreachable");
			} else if ($__hx__switch === 2) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:76: characters 19-20
				$e = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:76: characters 23-38
				return PipeResult::SourceFailed($e);
			} else if ($__hx__switch === 3) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:74: characters 22-32
				return PipeResult::AllWritten();
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


		self::$inst = new Blackhole();
	}
}

Boot::registerClass(Blackhole::class, 'tink.io._Sink.Blackhole');
Blackhole::__hx__init();
