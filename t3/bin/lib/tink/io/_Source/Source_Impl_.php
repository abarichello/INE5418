<?php
/**
 */

namespace tink\io\_Source;

use \tink\chunk\ChunkObject;
use \haxe\io\_BytesData\Container;
use \php\_Boot\HxAnon;
use \tink\core\_Future\SyncFuture;
use \haxe\ds\Option;
use \tink\io\SinkObject;
use \tink\io\Transformer;
use \php\Boot;
use \tink\streams\_Stream\Regrouper_Impl_;
use \tink\io\std\InputSource;
use \tink\streams\_Stream\Stream_Impl_;
use \tink\streams\Single;
use \tink\core\TypedError;
use \tink\streams\RegroupResult;
use \tink\streams\ReductionStep;
use \tink\streams\StreamObject;
use \tink\io\_Worker\Worker_Impl_;
use \tink\chunk\ByteChunk;
use \haxe\io\Input;
use \tink\core\_Lazy\LazyConst;
use \tink\streams\Empty_hx;
use \tink\core\_Promise\Next_Impl_;
use \tink\core\_Future\Future_Impl_;
use \tink\streams\_Stream\Reducer_Impl_;
use \tink\core\_Promise\Promise_Impl_;
use \haxe\io\Bytes;
use \tink\_Chunk\Chunk_Impl_;
use \tink\core\_Future\FutureObject;

final class Source_Impl_ {
	/**
	 * @var StreamObject
	 */
	static public $EMPTY;

	/**
	 * @param StreamObject $this
	 * @param StreamObject $that
	 * 
	 * @return StreamObject
	 */
	public static function append ($this1, $that) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:110: characters 5-29
		return $this1->append($that);
	}

	/**
	 * @param StreamObject $this
	 * 
	 * @return StreamObject
	 */
	public static function chunked ($this1) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:101: characters 5-16
		return $this1;
	}

	/**
	 * @param StreamObject $s
	 * 
	 * @return FutureObject
	 */
	public static function concatAll ($s) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:104: characters 5-93
		return $s->reduce(Chunk_Impl_::$EMPTY, Reducer_Impl_::ofSafe(function ($res, $cur) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:104: characters 66-92
			return new SyncFuture(new LazyConst(ReductionStep::Progress(Chunk_Impl_::concat($res, $cur))));
		}));
	}

	/**
	 * @param StreamObject $this
	 * 
	 * @return StreamObject
	 */
	public static function dirty ($this1) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:23: characters 5-21
		return $this1;
	}

	/**
	 * @param StreamObject $this
	 * 
	 * @return bool
	 */
	public static function get_depleted ($this1) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:26: characters 36-56
		return $this1->get_depleted();
	}

	/**
	 * @param StreamObject $this
	 * @param int $len
	 * 
	 * @return StreamObject
	 */
	public static function limit ($this1, $len) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:130: characters 5-42
		if ($len === 0) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:130: characters 18-42
			return Source_Impl_::$EMPTY;
		}
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:131: lines 131-142
		return $this1->regroup(Regrouper_Impl_::ofIgnoranceSync(function ($chunks) use (&$len) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:132: characters 7-43
			if ($len <= 0) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:132: characters 20-43
				return RegroupResult::Terminated(Option::None());
			}
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:133: characters 7-29
			$chunk = ($chunks->arr[0] ?? null);
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:134: characters 7-33
			$length = $chunk->getLength();
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:135: lines 135-139
			$out = ($len === $length ? RegroupResult::Terminated(Option::Some(Stream_Impl_::single($chunk))) : RegroupResult::Converted(Stream_Impl_::single(($len < $length ? $chunk->slice(0, $len) : $chunk))));
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:140: characters 7-20
			$len -= $length;
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:141: characters 7-17
			return $out;
		}));
	}

	/**
	 * @param Bytes $b
	 * 
	 * @return StreamObject
	 */
	public static function ofBytes ($b) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:164: characters 12-22
		return new Single(new LazyConst(ByteChunk::of($b)));
	}

	/**
	 * @param ChunkObject $chunk
	 * 
	 * @return StreamObject
	 */
	public static function ofChunk ($chunk) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:158: characters 5-29
		return new Single(new LazyConst($chunk));
	}

	/**
	 * @param TypedError $e
	 * 
	 * @return StreamObject
	 */
	public static function ofError ($e) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:146: characters 5-38
		return Stream_Impl_::ofError($e);
	}

	/**
	 * @param FutureObject $f
	 * 
	 * @return StreamObject
	 */
	public static function ofFuture ($f) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:149: characters 5-64
		return Stream_Impl_::future($f);
	}

	/**
	 * @param FutureObject $b
	 * 
	 * @return StreamObject
	 */
	public static function ofFutureBytes ($b) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:173: characters 5-41
		return Source_Impl_::ofFuture(Future_Impl_::map($b, Boot::getStaticClosure(Source_Impl_::class, 'ofBytes')));
	}

	/**
	 * @param FutureObject $chunk
	 * 
	 * @return StreamObject
	 */
	public static function ofFutureChunk ($chunk) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:167: characters 5-45
		return Source_Impl_::ofFuture(Future_Impl_::map($chunk, Boot::getStaticClosure(Source_Impl_::class, 'ofChunk')));
	}

	/**
	 * @param FutureObject $s
	 * 
	 * @return StreamObject
	 */
	public static function ofFutureString ($s) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:170: characters 5-42
		return Source_Impl_::ofFuture(Future_Impl_::map($s, Boot::getStaticClosure(Source_Impl_::class, 'ofString')));
	}

	/**
	 * @param string $name
	 * @param Input $input
	 * @param object $options
	 * 
	 * @return StreamObject
	 */
	public static function ofInput ($name, $input, $options = null) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:92: lines 92-93
		if ($options === null) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:93: characters 7-19
			$options = new HxAnon();
		}
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:94: characters 53-76
		$tmp = Worker_Impl_::ensure($options->worker);
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:94: characters 105-122
		$_g = $options->chunkSize;
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:94: lines 94-97
		$tmp1 = null;
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:95: lines 95-96
		if ($_g === null) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:94: lines 94-97
			$tmp1 = 65536;
		} else {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:96: characters 12-13
			$v = $_g;
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:94: lines 94-97
			$tmp1 = $v;
		}
		return new InputSource($name, $input, $tmp, Bytes::alloc($tmp1), 0);
	}

	/**
	 * @param FutureObject $b
	 * 
	 * @return StreamObject
	 */
	public static function ofPromiseBytes ($b) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:182: characters 5-39
		return Source_Impl_::ofPromised(Promise_Impl_::next($b, Next_Impl_::ofSafeSync(Boot::getStaticClosure(Source_Impl_::class, 'ofBytes'))));
	}

	/**
	 * @param FutureObject $chunk
	 * 
	 * @return StreamObject
	 */
	public static function ofPromiseChunk ($chunk) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:176: characters 5-43
		return Source_Impl_::ofPromised(Promise_Impl_::next($chunk, Next_Impl_::ofSafeSync(Boot::getStaticClosure(Source_Impl_::class, 'ofChunk'))));
	}

	/**
	 * @param FutureObject $s
	 * 
	 * @return StreamObject
	 */
	public static function ofPromiseString ($s) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:179: characters 5-40
		return Source_Impl_::ofPromised(Promise_Impl_::next($s, Next_Impl_::ofSafeSync(Boot::getStaticClosure(Source_Impl_::class, 'ofString'))));
	}

	/**
	 * @param FutureObject $p
	 * 
	 * @return StreamObject
	 */
	public static function ofPromised ($p) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:152: lines 152-155
		return Stream_Impl_::future(Future_Impl_::map($p, function ($o) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:153: characters 20-21
				$s = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:153: characters 24-47
				return $s;
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:154: characters 20-21
				$e = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:154: characters 24-34
				return Source_Impl_::ofError($e);
			}
		}));
	}

	/**
	 * @param string $s
	 * 
	 * @return StreamObject
	 */
	public static function ofString ($s) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:161: characters 20-21
		$b = \strlen($s);
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:161: characters 12-22
		return new Single(new LazyConst(ByteChunk::of(new Bytes($b, new Container($s)))));
	}

	/**
	 * @param StreamObject $this
	 * @param SinkObject $target
	 * @param object $options
	 * 
	 * @return FutureObject
	 */
	public static function pipeTo ($this1, $target, $options = null) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:107: characters 5-41
		return $target->consume($this1, $options);
	}

	/**
	 * @param StreamObject $this
	 * @param StreamObject $that
	 * 
	 * @return StreamObject
	 */
	public static function prepend ($this1, $that) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:113: characters 5-30
		return $this1->prepend($that);
	}

	/**
	 * @param StreamObject $this
	 * @param int $len
	 * 
	 * @return StreamObject
	 */
	public static function skip ($this1, $len) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:119: lines 119-126
		return $this1->regroup(Regrouper_Impl_::ofIgnoranceSync(function ($chunks) use (&$len) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:120: characters 7-29
			$chunk = ($chunks->arr[0] ?? null);
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:121: characters 7-58
			if ($len <= 0) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:121: characters 20-58
				return RegroupResult::Converted(Stream_Impl_::single($chunk));
			}
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:122: characters 7-33
			$length = $chunk->getLength();
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:123: characters 7-103
			$out = RegroupResult::Converted(($len < $length ? Stream_Impl_::single($chunk->slice($len, $length)) : Empty_hx::$inst));
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:124: characters 7-20
			$len -= $length;
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:125: characters 7-17
			return $out;
		}));
	}

	/**
	 * @param StreamObject $this
	 * @param Transformer $transformer
	 * 
	 * @return StreamObject
	 */
	public static function transform ($this1, $transformer) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:116: characters 5-39
		return $transformer->transform($this1);
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


		self::$EMPTY = Empty_hx::$inst;
	}
}

Boot::registerClass(Source_Impl_::class, 'tink.io._Source.Source_Impl_');
Boot::registerGetters('tink\\io\\_Source\\Source_Impl_', [
	'depleted' => true
]);
Source_Impl_::__hx__init();
