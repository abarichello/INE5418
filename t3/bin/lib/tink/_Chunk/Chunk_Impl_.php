<?php
/**
 */

namespace tink\_Chunk;

use \tink\chunk\CompoundChunk;
use \tink\chunk\ChunkObject;
use \haxe\io\_BytesData\Container;
use \php\Boot;
use \tink\chunk\ByteChunk;
use \tink\chunk\ChunkIterator;
use \haxe\io\Bytes;
use \tink\chunk\ChunkCursor;

final class Chunk_Impl_ {
	/**
	 * @var ChunkObject
	 */
	static public $EMPTY;

	/**
	 * @param ChunkObject $this
	 * @param Bytes $target
	 * @param int $offset
	 * 
	 * @return void
	 */
	public static function blitTo ($this1, $target, $offset) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:69: characters 12-39
		$this1->blitTo($target, $offset);
	}

	/**
	 * @param ChunkObject $a
	 * @param ChunkObject $b
	 * 
	 * @return ChunkObject
	 */
	public static function catChunk ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:145: characters 5-23
		return Chunk_Impl_::concat($a, $b);
	}

	/**
	 * @param ChunkObject $this
	 * @param ChunkObject $that
	 * 
	 * @return ChunkObject
	 */
	public static function concat ($this1, $that) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:54: characters 5-42
		return CompoundChunk::cons($this1, $that);
	}

	/**
	 * @param ChunkObject $this
	 * 
	 * @return ChunkCursor
	 */
	public static function cursor ($this1) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:57: characters 5-28
		return $this1->getCursor();
	}

	/**
	 * @param ChunkObject $a
	 * @param ChunkObject $b
	 * 
	 * @return bool
	 */
	public static function eqChunk ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:160: characters 5-40
		return $a->toString() === $b->toString();
	}

	/**
	 * @param ChunkObject $this
	 * @param int $i
	 * 
	 * @return int
	 */
	public static function getByte ($this1, $i) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:51: characters 5-27
		return $this1->getByte($i);
	}

	/**
	 * @param ChunkObject $this
	 * 
	 * @return int
	 */
	public static function get_length ($this1) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:47: characters 7-30
		return $this1->getLength();
	}

	/**
	 * @param ChunkObject $this
	 * 
	 * @return ChunkIterator
	 */
	public static function iterator ($this1) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:60: characters 5-47
		return new ChunkIterator($this1->getCursor());
	}

	/**
	 * @param ChunkObject[]|\Array_hx $chunks
	 * 
	 * @return ChunkObject
	 */
	public static function join ($chunks) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:94: lines 94-102
		if ($chunks === null) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:95: characters 23-28
			return Chunk_Impl_::$EMPTY;
		} else {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:94: characters 19-25
			$__hx__switch = ($chunks->length);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:95: characters 23-28
				return Chunk_Impl_::$EMPTY;
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:96: characters 13-14
				$v = ($chunks->arr[0] ?? null);
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:96: characters 17-18
				return $v;
			} else {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:97: characters 12-13
				$v = $chunks;
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:98: characters 9-31
				$ret = Chunk_Impl_::concat(($v->arr[0] ?? null), ($v->arr[1] ?? null));
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:99: characters 19-23
				$_g = 2;
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:99: characters 23-31
				$_g1 = $v->length;
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:99: lines 99-100
				while ($_g < $_g1) {
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:99: characters 19-31
					$i = $_g++;
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:100: characters 11-27
					$ret = Chunk_Impl_::concat($ret, ($v->arr[$i] ?? null));
				}
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:101: characters 9-12
				return $ret;
			}
		}
	}

	/**
	 * @param Bytes $a
	 * @param ChunkObject $b
	 * 
	 * @return ChunkObject
	 */
	public static function lcatBytes ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:154: characters 12-26
		return Chunk_Impl_::concat(ByteChunk::of($a), $b);
	}

	/**
	 * @param string $a
	 * @param ChunkObject $b
	 * 
	 * @return ChunkObject
	 */
	public static function lcatString ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:151: characters 21-22
		$b1 = \strlen($a);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:151: characters 12-26
		return Chunk_Impl_::concat(ByteChunk::of(new Bytes($b1, new Container($a))), $b);
	}

	/**
	 * @param Bytes $a
	 * @param ChunkObject $b
	 * 
	 * @return bool
	 */
	public static function leqBytes ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:169: characters 5-40
		return $a->toString() === $b->toString();
	}

	/**
	 * @param string $a
	 * @param ChunkObject $b
	 * 
	 * @return bool
	 */
	public static function leqString ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:166: characters 5-40
		return $a === $b->toString();
	}

	/**
	 * @param int $byte
	 * 
	 * @return ChunkObject
	 */
	public static function ofByte ($byte) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:122: characters 5-32
		$bytes = Bytes::alloc(1);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:123: characters 5-23
		$bytes->b->s[0] = \chr($byte);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:124: characters 5-17
		return ByteChunk::of($bytes);
	}

	/**
	 * @param Bytes $b
	 * 
	 * @return ChunkObject
	 */
	public static function ofBytes ($b) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:105: characters 5-43
		return ByteChunk::of($b);
	}

	/**
	 * @param string $s
	 * 
	 * @return ChunkObject
	 */
	public static function ofHex ($s) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:128: characters 5-32
		$length = mb_strlen($s) >> 1;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:129: characters 5-37
		$bytes = Bytes::alloc($length);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:130: characters 14-18
		$_g = 0;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:130: characters 18-24
		$_g1 = $length;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:130: characters 5-68
		while ($_g < $_g1) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:130: characters 14-24
			$i = $_g++;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:130: characters 26-68
			$v = \Std::parseInt("0x" . (\mb_substr($s, $i * 2, 2)??'null'));
			$bytes->b->s[$i] = \chr($v);
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:131: characters 5-17
		return ByteChunk::of($bytes);
	}

	/**
	 * @param string $s
	 * 
	 * @return ChunkObject
	 */
	public static function ofString ($s) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:108: characters 20-37
		$b = \strlen($s);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:108: characters 12-38
		return ByteChunk::of(new Bytes($b, new Container($s)));
	}

	/**
	 * @param string $v
	 * 
	 * @return int
	 */
	public static function parseHex ($v) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:140: characters 5-34
		return \Std::parseInt("0x" . ($v??'null'));
	}

	/**
	 * @param ChunkObject $a
	 * @param Bytes $b
	 * 
	 * @return ChunkObject
	 */
	public static function rcatBytes ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:157: characters 12-26
		return Chunk_Impl_::concat($a, ByteChunk::of($b));
	}

	/**
	 * @param ChunkObject $a
	 * @param string $b
	 * 
	 * @return ChunkObject
	 */
	public static function rcatString ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:148: characters 24-25
		$b1 = \strlen($b);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:148: characters 12-26
		return Chunk_Impl_::concat($a, ByteChunk::of(new Bytes($b1, new Container($b))));
	}

	/**
	 * @param ChunkObject $a
	 * @param Bytes $b
	 * 
	 * @return bool
	 */
	public static function reqBytes ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:172: characters 5-40
		return $a->toString() === $b->toString();
	}

	/**
	 * @param ChunkObject $a
	 * @param string $b
	 * 
	 * @return bool
	 */
	public static function reqString ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:163: characters 5-40
		return $a->toString() === $b;
	}

	/**
	 * @param ChunkObject $this
	 * @param int $from
	 * @param int $to
	 * 
	 * @return ChunkObject
	 */
	public static function slice ($this1, $from, $to) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:66: characters 5-32
		return $this1->slice($from, $to);
	}

	/**
	 * @param ChunkObject $this
	 * @param int $pos
	 * @param int $len
	 * 
	 * @return ChunkObject
	 */
	public static function sub ($this1, $pos, $len) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:63: characters 5-38
		return $this1->slice($pos, $pos + $len);
	}

	/**
	 * @param ChunkObject $this
	 * 
	 * @return Bytes
	 */
	public static function toBytes ($this1) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:78: characters 5-26
		return $this1->toBytes();
	}

	/**
	 * @param ChunkObject $this
	 * 
	 * @return string
	 */
	public static function toHex ($this1) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:72: characters 12-34
		return \bin2hex($this1->toBytes()->b->s);
	}

	/**
	 * @param ChunkObject $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:75: characters 5-27
		return $this1->toString();
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


		self::$EMPTY = new EmptyChunk();
	}
}

Boot::registerClass(Chunk_Impl_::class, 'tink._Chunk.Chunk_Impl_');
Boot::registerGetters('tink\\_Chunk\\Chunk_Impl_', [
	'length' => true
]);
Chunk_Impl_::__hx__init();