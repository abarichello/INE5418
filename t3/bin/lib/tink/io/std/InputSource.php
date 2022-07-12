<?php
/**
 */

namespace tink\io\std;

use \php\_Boot\HxAnon;
use \tink\core\_Lazy\LazyFunc;
use \php\Boot;
use \haxe\Exception;
use \tink\streams\Step;
use \haxe\io\Eof;
use \tink\streams\Generator;
use \tink\core\TypedError;
use \tink\io\_Worker\Worker_Impl_;
use \tink\chunk\ByteChunk;
use \haxe\io\Error;
use \tink\io\WorkerObject;
use \haxe\io\Input;
use \tink\core\_Future\Future_Impl_;
use \tink\_Chunk\Chunk_Impl_;
use \haxe\io\Bytes;

class InputSource extends Generator {
	/**
	 * @param string $name
	 * @param Input $target
	 * @param WorkerObject $worker
	 * @param Bytes $buf
	 * @param int $offset
	 * 
	 * @return void
	 */
	public function __construct ($name, $target, $worker, $buf, $offset) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:10: lines 10-11
		$next = function ($buf, $offset) use (&$name, &$worker, &$target) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:11: characters 7-64
			return new InputSource($name, $target, $worker, $buf, $offset);
		};
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:13: characters 5-36
		$free = $buf->length - $offset;
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:15: lines 15-61
		parent::__construct(Future_Impl_::async(function ($cb) use (&$name, &$free, &$buf, &$next, &$worker, &$target, &$offset) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:16: lines 16-60
			Worker_Impl_::work($worker, new LazyFunc(function () use (&$name, &$free, &$buf, &$next, &$target, &$offset) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:17: lines 17-51
				try {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:18: characters 11-58
					$read = $target->readBytes($buf, $offset, $free);
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:20: lines 20-36
					if ($read === 0) {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:21: characters 18-34
						$this1 = Chunk_Impl_::$EMPTY;
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:21: characters 13-54
						return Step::Link($this1, $next($buf, $offset));
					} else {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:24: lines 24-26
						$nextOffset = (($free - $read) < 1024 ? 0 : $offset + $read);
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:28: lines 28-30
						$nextBuf = ($nextOffset === 0 ? Bytes::alloc($buf->length) : $buf);
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:33: characters 15-55
						$this1 = ByteChunk::of($buf)->slice($offset, $offset + $read);
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:32: lines 32-35
						return Step::Link($this1, $next($nextBuf, $nextOffset));
					}
				} catch(\Throwable $_g) {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:38: characters 16-17
					$_g1 = Exception::caught($_g)->unwrap();
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:17: lines 17-51
					if (($_g1 instanceof Eof)) {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:39: characters 11-14
						return Step::End();
					} else if (Boot::isOfType($_g1, Boot::getClass(Error::class))) {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:41: characters 16-17
						$e = $_g1;
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:42: lines 42-51
						if ($e->index === 0) {
							#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:44: characters 20-36
							$this1 = Chunk_Impl_::$EMPTY;
							#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:44: characters 15-56
							return Step::Link($this1, $next($buf, $offset));
						} else {
							#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:50: characters 15-67
							return Step::Fail(TypedError::withData(null, "Failed to read from " . ($name??'null'), $e, new _HxAnon_InputSource0("tink/io/std/InputSource.hx", 50, "tink.io.std.InputSource", "new")));
						}
					} else {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:17: lines 17-51
						throw $_g;
					}
				}
			}))->handle(function ($step) use (&$target, &$cb) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:53: lines 53-58
				$__hx__switch = ($step->index);
				if ($__hx__switch === 1) {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:54: characters 27-28
					$_g = $step->params[0];
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:55: lines 55-56
					try {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:55: characters 17-31
						$target->close();
					} catch(\Throwable $_g) {
					}
				} else if ($__hx__switch === 2) {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:55: lines 55-56
					try {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:55: characters 17-31
						$target->close();
					} catch(\Throwable $_g) {
					}
				} else {
				}
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/std/InputSource.hx:59: characters 9-17
				$cb($step);
			});
		}, true));
	}
}

class _HxAnon_InputSource0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(InputSource::class, 'tink.io.std.InputSource');
