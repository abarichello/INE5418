<?php
/**
 */

namespace tink\chunk;

use \php\Boot;

class ChunkBase {
	/**
	 * @var ByteChunk[]|\Array_hx
	 */
	public $flattened;

	/**
	 * @param ByteChunk[]|\Array_hx $into
	 * 
	 * @return void
	 */
	public function flatten ($into) {
	}

	/**
	 * @return ChunkCursor
	 */
	public function getCursor () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkBase.hx:9: lines 9-10
		if ($this->flattened === null) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkBase.hx:10: characters 7-35
			$this->flatten($this->flattened = new \Array_hx());
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkBase.hx:11: characters 5-48
		return ChunkCursor::create((clone $this->flattened));
	}
}

Boot::registerClass(ChunkBase::class, 'tink.chunk.ChunkBase');
