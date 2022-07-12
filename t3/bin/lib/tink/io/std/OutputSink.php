<?php
/**
 */

namespace tink\io\std;

use \php\_Boot\HxAnon;
use \tink\io\PipeResultTools;
use \tink\core\_Lazy\LazyFunc;
use \php\Boot;
use \haxe\Exception;
use \haxe\io\Output;
use \haxe\io\Eof;
use \tink\core\TypedError;
use \tink\streams\StreamObject;
use \tink\io\_Worker\Worker_Impl_;
use \tink\chunk\ByteChunk;
use \haxe\io\Error;
use \tink\core\Outcome;
use \tink\io\WorkerObject;
use \tink\streams\Handled;
use \tink\streams\_Stream\Handler_Impl_;
use \tink\core\_Future\Future_Impl_;
use \tink\_Chunk\Chunk_Impl_;
use \tink\core\_Future\FutureObject;
use \tink\io\SinkBase;

class OutputSink extends SinkBase {
	/**
	 * @var string
	 */
	public $name;
	/**
	 * @var Output
	 */
	public $target;
	/**
	 * @var WorkerObject
	 */
	public $worker;

	/**
	 * @param string $name
	 * @param Output $target
	 * @param WorkerObject $worker
	 * 
	 * @return void
	 */
	public function __construct ($name, $target, $worker) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:15: characters 5-21
		$this->name = $name;
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:16: characters 5-25
		$this->target = $target;
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:17: characters 5-25
		$this->worker = $worker;
	}

	/**
	 * @param StreamObject $source
	 * @param object $options
	 * 
	 * @return FutureObject
	 */
	public function consume ($source, $options) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:20: lines 20-68
		$_gthis = $this;
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:21: characters 5-28
		$rest = Chunk_Impl_::$EMPTY;
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:23: lines 23-62
		$ret = $source->forEach(Handler_Impl_::ofUnknown(function ($c) use (&$rest, &$_gthis) {
			return Future_Impl_::async(function ($cb) use (&$c, &$rest, &$_gthis) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:25: lines 25-26
				$pos = 0;
				$bytes = $c->toBytes();
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:28: lines 28-59
				$write = null;
				$write = function () use (&$pos, &$write, &$bytes, &$rest, &$_gthis, &$cb) {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:29: lines 29-58
					if ($pos === $bytes->length) {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:29: characters 34-44
						$cb(Handled::Resume());
					} else {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:30: lines 30-58
						Worker_Impl_::work($_gthis->worker, new LazyFunc(function () use (&$pos, &$bytes, &$_gthis) {
							#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:32: lines 32-47
							try {
								#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:33: characters 15-73
								return Outcome::Success($_gthis->target->writeBytes($bytes, $pos, $bytes->length - $pos));
							} catch(\Throwable $_g) {
								#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:35: characters 20-21
								$_g1 = Exception::caught($_g)->unwrap();
								#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:32: lines 32-47
								if (($_g1 instanceof Eof)) {
									#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:36: characters 15-26
									return Outcome::Success(-1);
								} else if (Boot::isOfType($_g1, Boot::getClass(Error::class))) {
									#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:38: characters 20-21
									$e = $_g1;
									#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:38: lines 38-41
									if ($e->index === 0) {
										#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:39: characters 29-39
										return Outcome::Success(0);
									} else {
										#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:40: characters 24-76
										return Outcome::Failure(TypedError::withData(null, "Error writing to " . ($_gthis->name??'null'), $e, new _HxAnon_OutputSink0("tink/io/std/OutputSink.hx", 40, "tink.io.std.OutputSink", "consume")));
									}
								} else if (($_g1 instanceof TypedError)) {
									#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:42: characters 20-21
									$e = $_g1;
									#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:43: characters 15-30
									return Outcome::Failure($e);
								} else {
									#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:45: characters 20-21
									$e = $_g1;
									#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:46: characters 15-67
									return Outcome::Failure(TypedError::withData(null, "Error writing to " . ($_gthis->name??'null'), $e, new _HxAnon_OutputSink0("tink/io/std/OutputSink.hx", 46, "tink.io.std.OutputSink", "consume")));
								}
							}
						}))->handle(function ($o) use (&$pos, &$write, &$bytes, &$rest, &$cb) {
							#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:48: lines 48-58
							$__hx__switch = ($o->index);
							if ($__hx__switch === 0) {
								#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:52: characters 24-25
								$_g = $o->params[0];
								if ($_g === -1) {
									#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:50: characters 20-58
									$rest = ByteChunk::of($bytes)->slice($pos, $bytes->length);
									#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:51: characters 13-23
									$cb(Handled::Finish());
								} else {
									#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:52: characters 24-25
									$v = $_g;
									#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:53: characters 13-21
									$pos += $v;
									#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:54: lines 54-55
									if ($pos === $bytes->length) {
										#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:54: characters 38-48
										$cb(Handled::Resume());
									} else {
										#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:55: characters 18-25
										$write();
									}
								}
							} else if ($__hx__switch === 1) {
								#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:56: characters 24-25
								$e = $o->params[0];
								#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:57: characters 13-24
								$cb(Handled::Clog($e));
							}
						});
					}
				};
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:61: characters 7-14
				$write();
			});
		}));
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:64: lines 64-65
		if (($options !== null) && $options->end) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:65: characters 7-73
			$ret->handle(function ($end) use (&$_gthis) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:65: characters 33-72
				try {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:65: characters 37-51
					$_gthis->target->close();
				} catch(\Throwable $_g) {
				}
			});
		}
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:67: characters 5-64
		return Future_Impl_::map($ret, function ($c) use (&$rest) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/OutputSink.hx:67: characters 33-63
			return PipeResultTools::toResult($c, null, $rest);
		});
	}
}

class _HxAnon_OutputSink0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(OutputSink::class, 'tink.io.std.OutputSink');
