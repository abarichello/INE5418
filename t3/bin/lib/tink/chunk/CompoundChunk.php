<?php
/**
 */

namespace tink\chunk;

use \php\Boot;
use \haxe\io\Bytes;
use \tink\_Chunk\Chunk_Impl_;

class CompoundChunk extends ChunkBase implements ChunkObject {
	/**
	 * @var ChunkObject[]|\Array_hx
	 */
	public $chunks;
	/**
	 * @var int
	 */
	public $depth;
	/**
	 * @var int
	 */
	public $length;
	/**
	 * @var int[]|\Array_hx
	 */
	public $offsets;

	/**
	 * @param ChunkObject $c
	 * 
	 * @return CompoundChunk
	 */
	public static function asCompound ($c) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:20: characters 22-76
		if (($c instanceof CompoundChunk)) {
			return $c;
		} else {
			return null;
		}
	}

	/**
	 * @param ChunkObject $a
	 * @param ChunkObject $b
	 * 
	 * @return ChunkObject
	 */
	public static function cons ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:23: characters 20-28
		$_g = $a->getLength();
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:23: characters 30-38
		$_g1 = $b->getLength();
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:23: characters 20-28
		if ($_g === 0) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:23: characters 30-38
			if ($_g1 === 0) {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:24: characters 20-31
				return Chunk_Impl_::$EMPTY;
			} else {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:25: characters 20-21
				return $b;
			}
		} else if ($_g1 === 0) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:26: characters 20-21
			return $a;
		} else {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:27: characters 13-15
			$la = $_g;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:27: characters 17-19
			$lb = $_g1;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:28: characters 17-30
			$_g = CompoundChunk::asCompound($a);
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:28: characters 32-45
			$_g1 = CompoundChunk::asCompound($b);
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:29: lines 29-41
			if ($_g === null) {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:29: lines 29-38
				if ($_g1 === null) {
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:29: characters 30-47
					return CompoundChunk::create(\Array_hx::wrap([
						$a,
						$b,
					]), 2);
				} else {
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:30: characters 35-36
					$v = $_g1;
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:31: lines 31-38
					if ($v->depth < 100) {
						#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:32: characters 15-42
						return CompoundChunk::create(\Array_hx::wrap([
							$a,
							$b,
						]), $v->depth + 1);
					} else {
						#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:34: characters 15-29
						$flat = new \Array_hx();
						#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:35: characters 15-30
						$v->flatten($flat);
						#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:36: characters 15-44
						$b->flatten($flat);
						#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:37: characters 15-35
						return CompoundChunk::create($flat, 2);
					}
				}
			} else if ($_g1 === null) {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:30: characters 17-18
				$v = $_g;
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:31: lines 31-38
				if ($v->depth < 100) {
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:32: characters 15-42
					return CompoundChunk::create(\Array_hx::wrap([
						$a,
						$b,
					]), $v->depth + 1);
				} else {
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:34: characters 15-29
					$flat = new \Array_hx();
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:35: characters 15-30
					$v->flatten($flat);
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:36: characters 15-44
					$b->flatten($flat);
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:37: characters 15-35
					return CompoundChunk::create($flat, 2);
				}
			} else {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:39: characters 17-18
				$a = $_g;
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:39: characters 20-21
				$b = $_g1;
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:40: characters 13-69
				$depth = ($a->depth > $b->depth ? $a->depth : $b->depth);
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:41: characters 13-53
				return CompoundChunk::create($a->chunks->concat($b->chunks), $depth);
			}
		}
	}

	/**
	 * @param ChunkObject[]|\Array_hx $chunks
	 * @param int $depth
	 * 
	 * @return CompoundChunk
	 */
	public static function create ($chunks, $depth) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:46: characters 5-35
		$ret = new CompoundChunk();
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:47: lines 47-48
		$offsets = \Array_hx::wrap([0]);
		$length = 0;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:50: lines 50-51
		$_g = 0;
		while ($_g < $chunks->length) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:50: characters 10-11
			$c = ($chunks->arr[$_g] ?? null);
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:50: lines 50-51
			++$_g;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:51: characters 7-39
			$x = $length += $c->getLength();
			$offsets->arr[$offsets->length++] = $x;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:53: characters 5-24
		$ret->chunks = $chunks;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:54: characters 5-26
		$ret->offsets = $offsets;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:55: characters 5-24
		$ret->length = $length;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:56: characters 5-22
		$ret->depth = $depth;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:58: characters 5-15
		return $ret;
	}

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
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:108: characters 15-19
		$_g = 0;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:108: characters 19-32
		$_g1 = $this->chunks->length;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:108: lines 108-109
		while ($_g < $_g1) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:108: characters 15-32
			$i = $_g++;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:109: characters 7-52
			($this->chunks->arr[$i] ?? null)->blitTo($target, $offset + ($this->offsets->arr[$i] ?? null));
		}
	}

	/**
	 * @param int $target
	 * 
	 * @return int
	 */
	public function findChunk ($target) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:68: lines 68-69
		$min = 0;
		$max = $this->offsets->length - 1;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:71: lines 71-77
		while (($min + 1) < $max) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:72: characters 7-36
			$guess = ($min + $max) >> 1;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:73: lines 73-76
			if (($this->offsets->arr[$guess] ?? null) > $target) {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:74: characters 9-20
				$max = $guess;
			} else {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:76: characters 9-20
				$min = $guess;
			}
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:79: characters 5-15
		return $min;
	}

	/**
	 * @param ByteChunk[]|\Array_hx $into
	 * 
	 * @return void
	 */
	public function flatten ($into) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:83: characters 5-38
		$_g = 0;
		$_g1 = $this->chunks;
		while ($_g < $_g1->length) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:83: characters 10-11
			$c = ($_g1->arr[$_g] ?? null);
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:83: characters 5-38
			++$_g;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:83: characters 23-38
			$c->flatten($into);
		}
	}

	/**
	 * @param int $i
	 * 
	 * @return int
	 */
	public function getByte ($i) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:12: characters 5-30
		$index = $this->findChunk($i);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:13: characters 5-53
		return ($this->chunks->arr[$index] ?? null)->getByte($i - ($this->offsets->arr[$index] ?? null));
	}

	/**
	 * @return int
	 */
	public function getLength () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:17: characters 5-23
		return $this->length;
	}

	/**
	 * @param int $from
	 * @param int $to
	 * 
	 * @return ChunkObject
	 */
	public function slice ($from, $to) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:86: lines 86-87
		$idxFrom = $this->findChunk($from);
		$idxTo = $this->findChunk($to);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:89: lines 89-92
		if ($idxFrom === $idxTo) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:90: characters 7-37
			$offset = ($this->offsets->arr[$idxFrom] ?? null);
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:91: characters 7-63
			return ($this->chunks->arr[$idxFrom] ?? null)->slice($from - $offset, $to - $offset);
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:94: characters 5-48
		$ret = $this->chunks->slice($idxFrom, $idxTo + 1);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:96: characters 7-22
		$c = ($ret->arr[0] ?? null);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:97: characters 7-70
		$ret->offsetSet(0, $c->slice($from - ($this->offsets->arr[$idxFrom] ?? null), ($this->offsets->arr[$idxFrom + 1] ?? null)));
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:100: characters 7-35
		$c = ($ret->arr[$ret->length - 1] ?? null);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:101: characters 7-60
		$ret->offsetSet($ret->length - 1, $c->slice(0, $to - ($this->offsets->arr[$idxTo] ?? null)));
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:104: characters 5-30
		return CompoundChunk::create($ret, $this->depth);
	}

	/**
	 * @return Bytes
	 */
	public function toBytes () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:115: characters 5-40
		$ret = Bytes::alloc($this->length);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:116: characters 5-19
		$this->blitTo($ret, 0);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:117: characters 5-15
		return $ret;
	}

	/**
	 * @return string
	 */
	public function toString () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/CompoundChunk.hx:112: characters 5-32
		return $this->toBytes()->toString();
	}

	public function __toString() {
		return $this->toString();
	}
}

Boot::registerClass(CompoundChunk::class, 'tink.chunk.CompoundChunk');