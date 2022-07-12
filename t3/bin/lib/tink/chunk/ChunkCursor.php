<?php
/**
 */

namespace tink\chunk;

use \haxe\ds\Option;
use \php\Boot;
use \tink\_Chunk\Chunk_Impl_;

class ChunkCursor {
	/**
	 * @var int
	 */
	public $curLength;
	/**
	 * @var int
	 */
	public $curOffset;
	/**
	 * @var ByteChunk
	 */
	public $curPart;
	/**
	 * @var int
	 */
	public $curPartIndex;
	/**
	 * @var int
	 */
	public $currentByte;
	/**
	 * @var int
	 */
	public $currentPos;
	/**
	 * @var int
	 */
	public $length;
	/**
	 * @var ByteChunk[]|\Array_hx
	 */
	public $parts;

	/**
	 * @param ByteChunk[]|\Array_hx $parts
	 * 
	 * @return ChunkCursor
	 */
	public static function create ($parts) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:19: characters 5-33
		$ret = new ChunkCursor();
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:20: characters 5-22
		$ret->parts = $parts;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:21: characters 5-16
		$ret->reset();
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:22: characters 5-15
		return $ret;
	}

	/**
	 * @return void
	 */
	public function __construct () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:16: characters 47-49
		$this->currentByte = -1;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:15: characters 46-47
		$this->currentPos = 0;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:14: characters 42-43
		$this->length = 0;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:12: characters 23-24
		$this->curLength = 0;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:11: characters 23-24
		$this->curOffset = 0;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:10: characters 26-27
		$this->curPartIndex = 0;
	}

	/**
	 *  Add a chunk to the end and reset `currentPos` to zero.
	 *  @param chunk - Chunk to be added
	 * 
	 * @param ChunkObject $chunk
	 * 
	 * @return void
	 */
	public function add ($chunk) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:81: characters 5-41
		$chunk->flatten($this->parts);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:82: characters 5-12
		$this->reset();
	}

	/**
	 *  Clear all data of this cursor
	 * 
	 * @return void
	 */
	public function clear () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:115: characters 5-15
		$this->parts = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:116: characters 5-12
		$this->reset();
	}

	/**
	 *  Creates a cloned cursor
	 *  @return cloned cursor
	 * 
	 * @return ChunkCursor
	 */
	public function clone () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:30: characters 5-33
		$ret = new ChunkCursor();
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:31: characters 5-34
		$ret->parts = (clone $this->parts);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:32: characters 5-31
		$ret->curPart = $this->curPart;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:33: characters 5-41
		$ret->curPartIndex = $this->curPartIndex;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:34: characters 5-35
		$ret->curOffset = $this->curOffset;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:35: characters 5-35
		$ret->curLength = $this->curLength;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:36: characters 5-29
		$ret->length = $this->length;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:37: characters 5-37
		$ret->currentPos = $this->currentPos;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:38: characters 5-39
		$ret->currentByte = $this->currentByte;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:39: characters 5-15
		return $ret;
	}

	/**
	 * @return void
	 */
	public function ffwd () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:274: characters 5-21
		$this->currentByte = -1;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:275: characters 5-18
		$this->curLength = 0;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:276: characters 5-18
		$this->curOffset = 0;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:277: characters 5-19
		$this->curPart = null;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:278: characters 5-32
		$this->curPartIndex = $this->parts->length;
	}

	/**
	 *  Like prune(), but returns the removed chunk
	 *  @return Removed chunk (chunk to the left of current position)
	 * 
	 * @return ChunkObject
	 */
	public function flush () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:65: characters 5-22
		$ret = $this->left();
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:66: characters 5-12
		$this->shift();
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:67: characters 5-15
		return $ret;
	}

	/**
	 *  Return the chunk to the left of current position, excluding current byte
	 * 
	 * @return ChunkObject
	 */
	public function left () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:123: characters 5-44
		if ($this->curPart === null) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:123: characters 26-44
			return Chunk_Impl_::$EMPTY;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:124: characters 16-62
		$_g = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:124: characters 27-31
		$_g1 = 0;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:124: characters 31-43
		$_g2 = $this->curPartIndex;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:124: characters 17-61
		while ($_g1 < $_g2) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:124: characters 27-43
			$i = $_g1++;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:124: characters 45-61
			$x = ($this->parts->arr[$i] ?? null);
			$_g->arr[$_g->length++] = $x;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:124: characters 5-63
		$left = $_g;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:125: characters 5-43
		$x = $this->curPart->slice(0, $this->curOffset);
		$left->arr[$left->length++] = $x;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:126: characters 5-28
		return Chunk_Impl_::join($left);
	}

	/**
	 *  Move cursor position by specified amount.
	 *  @param delta - amount to move
	 *  @return new position
	 * 
	 * @param int $delta
	 * 
	 * @return int
	 */
	public function moveBy ($delta) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:235: characters 5-38
		return $this->moveTo($this->currentPos + $delta);
	}

	/**
	 *  Move to specified position.
	 *  If `position` is greater than length of cursor, it is set to `length - 1`.
	 *  If `position` is less than zero, it is set to zero.
	 *  @param position - the position to move to
	 *  @return new position
	 * 
	 * @param int $position
	 * 
	 * @return int
	 */
	public function moveTo ($position) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:246: characters 5-30
		if ($this->length === 0) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:246: characters 22-30
			return 0;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:248: characters 5-49
		if ($position > $this->length) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:248: characters 28-49
			$position = $this->length - 1;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:249: characters 5-35
		if ($position < 0) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:249: characters 23-35
			$position = 0;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:251: characters 5-31
		$this->currentPos = $position;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:253: lines 253-268
		if ($position === $this->length) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:253: characters 29-35
			$this->ffwd();
		} else {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:255: characters 17-21
			$_g = 0;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:255: characters 21-33
			$_g1 = $this->parts->length;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:255: lines 255-268
			while ($_g < $_g1) {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:255: characters 17-33
				$i = $_g++;
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:256: characters 9-26
				$c = ($this->parts->arr[$i] ?? null);
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:257: characters 16-29
				$_g2 = $c->to - $c->from;
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:258: characters 16-22
				$enough = $_g2;
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:258: lines 258-266
				if ($enough > $position) {
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:259: characters 13-29
					$this->curPart = $c;
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:260: characters 13-34
					$this->curPartIndex = $i;
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:261: characters 13-38
					$this->curOffset = $position;
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:262: characters 13-43
					$this->curLength = $c->to - $c->from;
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:263: characters 13-51
					$this->currentByte = \ord($c->data->s[$c->from + $position]);
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:264: characters 13-18
					break;
				} else {
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:265: characters 16-17
					$v = $_g2;
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:266: characters 13-26
					$position -= $v;
				}
			}
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:270: characters 5-27
		return $this->currentPos;
	}

	/**
	 *  Advance to next byte
	 *  @return `false` if there is no next byte
	 * 
	 * @return bool
	 */
	public function next () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:286: characters 5-43
		if ($this->currentPos === $this->length) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:286: characters 31-43
			return false;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:287: characters 5-17
		$this->currentPos++;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:288: lines 288-291
		if ($this->currentPos === $this->length) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:289: characters 7-13
			$this->ffwd();
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:290: characters 7-19
			return false;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:292: lines 292-300
		if ($this->curOffset === ($this->curLength - 1)) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:293: characters 7-20
			$this->curOffset = 0;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:294: characters 7-38
			$this->curPart = ($this->parts->arr[++$this->curPartIndex] ?? null);
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:295: characters 19-38
			$_this = $this->curPart;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:295: characters 7-38
			$this->curLength = $_this->to - $_this->from;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:296: characters 21-39
			$_this = $this->curPart;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:296: characters 7-39
			$this->currentByte = \ord($_this->data->s[$_this->from]);
		} else {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:299: characters 21-49
			$_this = $this->curPart;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:299: characters 7-49
			$this->currentByte = \ord($_this->data->s[$_this->from + ++$this->curOffset]);
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:301: characters 5-16
		return true;
	}

	/**
	 *  Remove chunk to the left of current position and reset `currentPos` to zero.
	 * 
	 * @return void
	 */
	public function prune () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:74: characters 5-12
		$this->shift();
	}

	/**
	 * @return void
	 */
	public function reset () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:45: characters 5-15
		$this->length = 0;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:46: characters 5-19
		$this->currentPos = 0;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:47: characters 5-21
		$this->currentByte = -1;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:48: characters 5-18
		$this->curOffset = 0;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:50: lines 50-51
		$_g = 0;
		$_g1 = $this->parts;
		while ($_g < $_g1->length) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:50: characters 10-11
			$p = ($_g1->arr[$_g] ?? null);
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:50: lines 50-51
			++$_g;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:51: characters 7-30
			$this->length += $p->to - $p->from;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:53: characters 5-48
		$this->curPart = ($this->parts->arr[$this->curPartIndex = 0] ?? null);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:54: lines 54-57
		if ($this->curPart !== null) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:55: characters 24-48
			$_this = $this->curPart;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:55: characters 7-48
			$this->curLength = $_this->to - $_this->from;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:56: characters 26-49
			$_this = $this->curPart;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:56: characters 7-49
			$this->currentByte = \ord($_this->data->s[$_this->from]);
		}
	}

	/**
	 *  Return the chunk to the right of current position, including current byte
	 * 
	 * @return ChunkObject
	 */
	public function right () {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:133: characters 5-44
		if ($this->curPart === null) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:133: characters 26-44
			return Chunk_Impl_::$EMPTY;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:134: characters 17-74
		$_g = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:134: characters 28-40
		$_g1 = $this->curPartIndex;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:134: characters 43-55
		$_g2 = $this->parts->length;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:134: characters 18-73
		while ($_g1 < $_g2) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:134: characters 28-55
			$i = $_g1++;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:134: characters 57-73
			$x = ($this->parts->arr[$i] ?? null);
			$_g->arr[$_g->length++] = $x;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:134: characters 5-75
		$right = $_g;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:135: lines 135-137
		if ($right->length > 0) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:136: characters 7-53
			$right->offsetSet(0, $this->curPart->slice($this->curOffset, $this->curLength));
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:138: characters 5-29
		return Chunk_Impl_::join($right);
	}

	/**
	 * @param int[]|\Array_hx $seekable
	 * @param object $options
	 * 
	 * @return Option
	 */
	public function seek ($seekable, $options = null) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:141: lines 141-208
		$_gthis = $this;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:143: lines 143-144
		if (($this->curPart === null) || ($seekable === null) || ($seekable->length === 0)) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:144: characters 7-18
			return Option::None();
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:146: lines 146-150
		$max = $seekable->length - 1;
		$first = ($seekable->arr[0] ?? null);
		$candidates = new \Array_hx();
		$count = 0;
		$copy = $this->clone();
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:152: characters 5-17
		$copy->shift();
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:154: lines 154-194
		$part = function ($b, $offset) use (&$count, &$copy, &$candidates, &$_gthis, &$first, &$max, &$seekable, &$options) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:155: characters 7-25
			$data = $b->data;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:157: characters 17-32
			$_g = $b->from + $offset;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:157: characters 37-41
			$_g1 = $b->to;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:157: lines 157-189
			while ($_g < $_g1) {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:157: characters 17-41
				$i = $_g++;
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:158: characters 9-36
				$byte = \ord($data->s[$i]);
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:160: lines 160-185
				if ($candidates->length > 0) {
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:161: characters 11-21
					$c = 0;
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:162: lines 162-184
					while ($c < $count) {
						#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:163: characters 13-37
						$pos = ($candidates->arr[$c] ?? null);
						#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:164: lines 164-182
						if (($seekable->arr[$pos] ?? null) === $byte) {
							#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:165: lines 165-176
							if ($pos === $max) {
								#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:166: characters 17-71
								$copy->moveTo($copy->currentPos + ($i - ($b->from + $offset) - $seekable->length + 1));
								#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:167: characters 17-42
								$before = $copy->left();
								#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:168: characters 17-61
								$delta = $before->getLength() + $seekable->length;
								$_gthis->moveTo($_gthis->currentPos + $delta);
								#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:169: lines 169-173
								if ($options === null) {
									#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:171: characters 21-33
									$_gthis->shift();
								} else {
									#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:169: characters 24-31
									$_g2 = $options->withoutPruning;
									#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:169: lines 169-171
									if ($_g2 === null) {
										#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:171: characters 21-33
										$_gthis->shift();
									} else if ($_g2 === false) {
										$_gthis->shift();
									}
								}
								#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:174: characters 17-36
								return Option::Some($before);
							} else {
								#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:176: characters 20-45
								$candidates->offsetSet($c++, $pos + 1);
							}
						} else {
							#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:178: characters 15-22
							$count -= 1;
							#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:179: characters 26-42
							if ($candidates->length > 0) {
								$candidates->length--;
							}
							#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:179: characters 15-43
							$last = \array_pop($candidates->arr);
							#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:180: lines 180-181
							if ($count > $c) {
								#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:181: characters 17-37
								$candidates->offsetSet($c, $last);
							}
						}
					}
				}
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:187: lines 187-188
				if ($byte === $first) {
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:188: characters 19-37
					$candidates->arr[$candidates->length++] = 1;
					$count = $candidates->length;
				}
			}
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:191: characters 7-44
			$copy->moveTo($copy->currentPos + ($b->to - ($b->from + $offset)));
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:193: characters 7-18
			return Option::None();
		};
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:196: characters 12-36
		$_g = $part($this->curPart, $this->curOffset);
		if ($_g->index === 1) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:199: characters 19-36
			$_g1 = $this->curPartIndex + 1;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:199: characters 36-48
			$_g2 = $this->parts->length;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:199: lines 199-203
			while ($_g1 < $_g2) {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:199: characters 19-48
				$i = $_g1++;
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:200: characters 18-35
				$_g3 = $part(($this->parts->arr[$i] ?? null), 0);
				$__hx__switch = ($_g3->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:201: characters 23-24
					$v = $_g3->params[0];
					#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:201: characters 27-41
					return Option::Some($v);
				} else if ($__hx__switch === 1) {
				}
			}
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:205: characters 9-20
			return Option::None();
		} else {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:206: characters 12-13
			$v = $_g;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:206: characters 15-23
			return $v;
		}
	}

	/**
	 *  Remove data to the left of current position and optionally add a chunk at the end.
	 *  Reset `currentPos` to zero.
	 *  @param chunk - Optional chunk to be added to the end
	 * 
	 * @param ChunkObject $chunk
	 * 
	 * @return void
	 */
	public function shift ($chunk = null) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:92: characters 5-34
		$this->parts->splice(0, $this->curPartIndex);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:94: characters 12-20
		$_g = ($this->parts->arr[0] ?? null);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:95: lines 95-102
		if ($_g !== null) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:96: characters 12-17
			$chunk1 = $_g;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:97: characters 16-52
			$_g = $chunk1->getSlice($this->curOffset, $this->curLength);
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:98: lines 98-101
			if ($_g === null) {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:99: characters 13-26
				$_this = $this->parts;
				if ($_this->length > 0) {
					$_this->length--;
				}
				\array_shift($_this->arr);
			} else {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:100: characters 16-20
				$rest = $_g;
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:101: characters 13-28
				$this->parts->offsetSet(0, $rest);
			}
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:105: lines 105-108
		if ($chunk !== null) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:106: characters 7-17
			$this->add($chunk);
		} else {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:108: characters 7-14
			$this->reset();
		}
	}

	/**
	 *  Like moveBy(), but returns the swept chunk instead of new position
	 *  @param len - length to sweep
	 *  @return the swept chunk
	 * 
	 * @param int $len
	 * 
	 * @return ChunkObject
	 */
	public function sweep ($len) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:216: characters 5-38
		$data = $this->right()->slice(0, $len);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:217: characters 5-16
		$this->moveTo($this->currentPos + $len);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:218: characters 5-16
		return $data;
	}

	/**
	 *  Like moveTo(), but returns the swept chunk instead of new position
	 *  @param pos - target position
	 *  @return the swept chunk
	 * 
	 * @param int $pos
	 * 
	 * @return ChunkObject
	 */
	public function sweepTo ($pos) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkCursor.hx:227: characters 5-35
		return $this->sweep($pos - $this->currentPos);
	}
}

Boot::registerClass(ChunkCursor::class, 'tink.chunk.ChunkCursor');