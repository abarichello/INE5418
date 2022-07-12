<?php
/**
 */

namespace tink\_Chunk;

use \tink\chunk\ChunkObject;
use \php\Boot;
use \tink\chunk\ChunkBase;
use \haxe\io\Bytes;

class EmptyChunk extends ChunkBase implements ChunkObject {
	/**
	 * @var Bytes
	 */
	static public $EMPTY;

	/**
	 * @return void
	 */
	public function __construct () {
	}

	/**
	 * @param Bytes $target
	 * @param int $offset
	 * 
	 * @return void
	 */
	public function blitTo ($target, $offset) {
	}

	/**
	 * @param int $i
	 * 
	 * @return int
	 */
	public function getByte ($i) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:15: characters 5-13
		return 0;
	}

	/**
	 * @return int
	 */
	public function getLength () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:18: characters 5-13
		return 0;
	}

	/**
	 * @param int $from
	 * @param int $to
	 * 
	 * @return ChunkObject
	 */
	public function slice ($from, $to) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:21: characters 5-16
		return $this;
	}

	/**
	 * @return Bytes
	 */
	public function toBytes () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:29: characters 5-17
		return EmptyChunk::$EMPTY;
	}

	/**
	 * @return string
	 */
	public function toString () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/Chunk.hx:26: characters 5-14
		return "";
	}

	public function __toString() {
		return $this->toString();
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


		self::$EMPTY = Bytes::alloc(0);
	}
}

Boot::registerClass(EmptyChunk::class, 'tink._Chunk.EmptyChunk');
EmptyChunk::__hx__init();