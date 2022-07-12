<?php
/**
 */

namespace tink\chunk;

use \haxe\io\_BytesData\Container;
use \php\Boot;
use \haxe\Exception;
use \haxe\io\Error;
use \tink\_Chunk\Chunk_Impl_;
use \haxe\io\Bytes;

class ByteChunk extends ChunkBase implements ChunkObject {
	/**
	 * @var Container
	 */
	public $data;
	/**
	 * @var int
	 */
	public $from;
	/**
	 * @var int
	 */
	public $to;
	/**
	 * @var Bytes
	 */
	public $wrapped;

	/**
	 * @param Bytes $b
	 * 
	 * @return ChunkObject
	 */
	public static function of ($b) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:68: lines 68-69
		if ($b->length === 0) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:69: characters 7-25
			return Chunk_Impl_::$EMPTY;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:70: characters 5-55
		$ret = new ByteChunk($b->b, 0, $b->length);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:71: characters 5-20
		$ret->wrapped = $b;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:72: characters 5-29
		return $ret;
	}

	/**
	 * @param Container $data
	 * @param int $from
	 * @param int $to
	 * 
	 * @return void
	 */
	public function __construct ($data, $from, $to) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:24: characters 5-21
		$this->data = $data;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:25: characters 5-21
		$this->from = $from;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:26: characters 5-17
		$this->to = $to;
	}

	/**
	 * @param Bytes $target
	 * @param int $offset
	 * 
	 * @return void
	 */
	public function blitTo ($target, $offset) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:59: characters 25-32
		if ($this->wrapped === null) {
			$b = $this->data;
			$this->wrapped = new Bytes(\strlen($b->s), $b);
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:59: characters 5-52
		$src = $this->wrapped;
		$srcpos = $this->from;
		$len = $this->to - $this->from;
		if (($offset < 0) || ($srcpos < 0) || ($len < 0) || (($offset + $len) > $target->length) || (($srcpos + $len) > $src->length)) {
			throw Exception::thrown(Error::OutsideBounds());
		} else {
			$this1 = $target->b;
			$src1 = $src->b;
			$this1->s = ((\substr($this1->s, 0, $offset) . \substr($src1->s, $srcpos, $len)) . \substr($this1->s, $offset + $len));
		}
	}

	/**
	 * @param ByteChunk[]|\Array_hx $into
	 * 
	 * @return void
	 */
	public function flatten ($into) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:33: characters 5-20
		$into->arr[$into->length++] = $this;
	}

	/**
	 * @param int $index
	 * 
	 * @return int
	 */
	public function getByte ($index) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:30: characters 12-45
		return \ord($this->data->s[$this->from + $index]);
	}

	/**
	 * @return int
	 */
	public function getLength () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:36: characters 5-21
		return $this->to - $this->from;
	}

	/**
	 * @param int $from
	 * @param int $to
	 * 
	 * @return ByteChunk
	 */
	public function getSlice ($from, $to) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:39: lines 39-40
		if ($to > ($this->to - $this->from)) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:40: characters 7-28
			$to = $this->to - $this->from;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:42: lines 42-43
		if ($from < 0) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:43: characters 7-15
			$from = 0;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:46: lines 46-48
		if ($to <= $from) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:46: characters 23-27
			return null;
		} else if (($to === ($this->to - $this->from)) && ($from === 0)) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:47: characters 53-57
			return $this;
		} else {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:48: characters 12-65
			return new ByteChunk($this->data, $this->from + $from, $to + $this->from);
		}
	}

	/**
	 * @return Bytes
	 */
	public function get_wrapped () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:15: lines 15-16
		if ($this->wrapped === null) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:16: characters 19-37
			$b = $this->data;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:16: characters 9-37
			$this->wrapped = new Bytes(\strlen($b->s), $b);
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:17: characters 7-21
		return $this->wrapped;
	}

	/**
	 * @param int $from
	 * @param int $to
	 * 
	 * @return ChunkObject
	 */
	public function slice ($from, $to) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:53: characters 14-32
		$_g = $this->getSlice($from, $to);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:54: lines 54-55
		if ($_g === null) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:54: characters 20-31
			return Chunk_Impl_::$EMPTY;
		} else {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:55: characters 14-15
			$v = $_g;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:55: characters 17-18
			return $v;
		}
	}

	/**
	 * @return Bytes
	 */
	public function toBytes () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:62: characters 12-23
		if ($this->wrapped === null) {
			$b = $this->data;
			$this->wrapped = new Bytes(\strlen($b->s), $b);
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:62: characters 12-42
		$_this = $this->wrapped;
		$pos = $this->from;
		$len = $this->to - $this->from;
		if (($pos < 0) || ($len < 0) || (($pos + $len) > $_this->length)) {
			throw Exception::thrown(Error::OutsideBounds());
		} else {
			return new Bytes($len, new Container(\substr($_this->b->s, $pos, $len)));
		}
	}

	/**
	 * @return string
	 */
	public function toString () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:65: characters 12-29
		if ($this->wrapped === null) {
			$b = $this->data;
			$this->wrapped = new Bytes(\strlen($b->s), $b);
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ByteChunk.hx:65: characters 12-48
		$_this = $this->wrapped;
		$pos = $this->from;
		$len = $this->to - $this->from;
		if (($pos < 0) || ($len < 0) || (($pos + $len) > $_this->length)) {
			throw Exception::thrown(Error::OutsideBounds());
		} else {
			return \substr($_this->b->s, $pos, $len);
		}
	}

	public function __toString() {
		return $this->toString();
	}
}

Boot::registerClass(ByteChunk::class, 'tink.chunk.ByteChunk');
Boot::registerGetters('tink\\chunk\\ByteChunk', [
	'wrapped' => true
]);
