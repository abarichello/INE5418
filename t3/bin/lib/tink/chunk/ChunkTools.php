<?php
/**
 */

namespace tink\chunk;

use \php\Boot;
use \haxe\Exception;
use \haxe\io\FPHelper;
use \haxe\io\BytesInput;
use \haxe\io\Bytes;
use \tink\_Chunk\Chunk_Impl_;

class ChunkTools {
	/**
	 * @param ChunkObject $chunk
	 * @param int $offset
	 * @param int $length
	 * 
	 * @return void
	 */
	public static function check ($chunk, $offset, $length) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:179: characters 3-43
		if ($chunk->getLength() < ($offset + $length)) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:179: characters 38-43
			throw Exception::thrown("Out of range (chunk length = " . ($chunk->getLength()??'null') . ", read offset = " . ($offset??'null') . ", read length = " . ($length??'null') . ")");
		}
	}

	/**
	 * @param ChunkObject $chunk
	 * @param ChunkObject $pad
	 * @param int $length
	 * 
	 * @return ChunkObject
	 */
	public static function lpad ($chunk, $pad, $length) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:168: characters 3-71
		if ($pad->getLength() !== 0) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:168: characters 23-71
			while ($chunk->getLength() < $length) {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:168: characters 52-71
				$chunk = Chunk_Impl_::concat($pad, $chunk);
			}
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:169: characters 3-15
		return $chunk;
	}

	/**
	 * @param ChunkObject $chunk
	 * @param int $offset
	 * 
	 * @return float
	 */
	public static function readDoubleLE ($chunk, $offset) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:66: characters 3-33
		$l = ChunkTools::readInt32LE($chunk, 0);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:67: characters 3-33
		$h = ChunkTools::readInt32LE($chunk, 4);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:68: characters 3-36
		return \unpack("d", \pack("ii", (FPHelper::$isLittleEndian ? $l : $h), (FPHelper::$isLittleEndian ? $h : $l)))[1];
	}

	/**
	 * @param ChunkObject $chunk
	 * @param int $offset
	 * 
	 * @return int
	 */
	public static function readInt16LE ($chunk, $offset) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:30: characters 3-41
		$val = ChunkTools::readUInt16LE($chunk, $offset);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:31: characters 10-44
		if ($val > 32767) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:31: characters 25-38
			return $val - 65536;
		} else {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:31: characters 41-44
			return $val;
		}
	}

	/**
	 * @param ChunkObject $chunk
	 * @param int $offset
	 * 
	 * @return int
	 */
	public static function readInt24LE ($chunk, $offset) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:43: characters 3-41
		$val = ChunkTools::readUInt24LE($chunk, $offset);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:44: characters 10-48
		if ($val > 8388607) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:44: characters 27-42
			return $val - 16777216;
		} else {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:44: characters 45-48
			return $val;
		}
	}

	/**
	 * @param ChunkObject $chunk
	 * @param int $offset
	 * 
	 * @return int
	 */
	public static function readInt32LE ($chunk, $offset) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:48: characters 3-26
		if ($chunk->getLength() < ($offset + 4)) {
			throw Exception::thrown("Out of range (chunk length = " . ($chunk->getLength()??'null') . ", read offset = " . ($offset??'null') . ", read length = " . 4 . ")");
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:50: lines 50-53
		$val = $chunk->getByte($offset) + ($chunk->getByte($offset + 1) << 8) + ($chunk->getByte($offset + 2) << 16) + ($chunk->getByte($offset + 3) << 24);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:55: lines 55-61
		return $val;
	}

	/**
	 * @param ChunkObject $chunk
	 * @param int $offset
	 * 
	 * @return int
	 */
	public static function readInt8 ($chunk, $offset) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:18: characters 3-38
		$val = ChunkTools::readUInt8($chunk, $offset);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:19: characters 10-40
		if ($val > 127) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:19: characters 23-34
			return $val - 256;
		} else {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:19: characters 37-40
			return $val;
		}
	}

	/**
	 * @param ChunkObject $chunk
	 * @param int $offset
	 * 
	 * @return string
	 */
	public static function readNullTerminatedString ($chunk, $offset) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:72: characters 10-90
		try {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:72: characters 14-56
			return (new BytesInput($chunk->toBytes(), $offset))->readUntil(0);
		} catch(\Throwable $_g) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:72: characters 74-90
			return $chunk->toString();
		}
	}

	/**
	 * @param ChunkObject $chunk
	 * @param int $offset
	 * 
	 * @return int
	 */
	public static function readUInt16LE ($chunk, $offset) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:23: characters 3-26
		if ($chunk->getLength() < ($offset + 2)) {
			throw Exception::thrown("Out of range (chunk length = " . ($chunk->getLength()??'null') . ", read offset = " . ($offset??'null') . ", read length = " . 2 . ")");
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:24: characters 3-29
		$first = $chunk->getByte($offset);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:25: characters 3-32
		$last = $chunk->getByte($offset + 1);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:26: characters 3-29
		return $first + ($last << 8);
	}

	/**
	 * @param ChunkObject $chunk
	 * @param int $offset
	 * 
	 * @return int
	 */
	public static function readUInt24LE ($chunk, $offset) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:35: characters 3-26
		if ($chunk->getLength() < ($offset + 3)) {
			throw Exception::thrown("Out of range (chunk length = " . ($chunk->getLength()??'null') . ", read offset = " . ($offset??'null') . ", read length = " . 3 . ")");
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:36: characters 3-29
		$first = $chunk->getByte($offset);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:37: characters 3-31
		$mid = $chunk->getByte($offset + 1);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:38: characters 3-32
		$last = $chunk->getByte($offset + 2);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:39: characters 3-43
		return $first + ($mid << 8) + ($last << 16);
	}

	/**
	 * @param ChunkObject $chunk
	 * @param int $offset
	 * 
	 * @return int
	 */
	public static function readUInt8 ($chunk, $offset) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:12: characters 3-26
		if ($chunk->getLength() < ($offset + 1)) {
			throw Exception::thrown("Out of range (chunk length = " . ($chunk->getLength()??'null') . ", read offset = " . ($offset??'null') . ", read length = " . 1 . ")");
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:13: characters 3-27
		$val = $chunk->getByte($offset);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:14: characters 3-13
		return $val;
	}

	/**
	 * @param ChunkObject $chunk
	 * @param ChunkObject $pad
	 * @param int $length
	 * 
	 * @return ChunkObject
	 */
	public static function rpad ($chunk, $pad, $length) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:174: characters 3-71
		if ($pad->getLength() !== 0) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:174: characters 23-71
			while ($chunk->getLength() < $length) {
				#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:174: characters 52-71
				$chunk = Chunk_Impl_::concat($chunk, $pad);
			}
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:175: characters 3-15
		return $chunk;
	}

	/**
	 * @param float $v
	 * 
	 * @return ChunkObject
	 */
	public static function writeDoubleLE ($v) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:150: characters 3-30
		$bytes = Bytes::alloc(8);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:151: characters 3-37
		$i64 = FPHelper::doubleToI64($v);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:152: characters 3-19
		$l = $i64->low;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:153: characters 3-20
		$h = $i64->high;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:154: characters 3-25
		$bytes->b->s[0] = \chr($l & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:155: characters 3-33
		$bytes->b->s[1] = \chr(Boot::shiftRightUnsigned($l, 8) & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:156: characters 3-34
		$bytes->b->s[2] = \chr(Boot::shiftRightUnsigned($l, 16) & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:157: characters 3-34
		$bytes->b->s[3] = \chr(Boot::shiftRightUnsigned($l, 24) & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:158: characters 3-25
		$bytes->b->s[4] = \chr($h & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:159: characters 3-33
		$bytes->b->s[5] = \chr(Boot::shiftRightUnsigned($h, 8) & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:160: characters 3-34
		$bytes->b->s[6] = \chr(Boot::shiftRightUnsigned($h, 16) & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:161: characters 3-34
		$bytes->b->s[7] = \chr(Boot::shiftRightUnsigned($h, 24) & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:162: characters 3-15
		return ByteChunk::of($bytes);
	}

	/**
	 * @param int $v
	 * 
	 * @return ChunkObject
	 */
	public static function writeInt16LE ($v) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:112: characters 3-26
		return ChunkTools::writeUInt16LE($v);
	}

	/**
	 * @param int $v
	 * 
	 * @return ChunkObject
	 */
	public static function writeInt24LE ($v) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:125: characters 3-26
		return ChunkTools::writeUInt24LE($v);
	}

	/**
	 * @param int $v
	 * 
	 * @return ChunkObject
	 */
	public static function writeInt32LE ($v) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:132: characters 3-30
		$bytes = Bytes::alloc(4);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:133: characters 3-25
		$bytes->b->s[0] = \chr($v & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:134: characters 3-33
		$bytes->b->s[1] = \chr(Boot::shiftRightUnsigned($v, 8) & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:135: characters 3-34
		$bytes->b->s[2] = \chr(Boot::shiftRightUnsigned($v, 16) & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:136: characters 3-34
		$bytes->b->s[3] = \chr(Boot::shiftRightUnsigned($v, 24) & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:137: characters 3-15
		return ByteChunk::of($bytes);
	}

	/**
	 * @param int $v
	 * 
	 * @return ChunkObject
	 */
	public static function writeInt8 ($v) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:89: characters 3-30
		$bytes = Bytes::alloc(1);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:90: characters 3-15
		$v &= 255;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:91: characters 3-23
		if ($v < 0) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:91: characters 13-23
			$v += 256;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:92: characters 3-18
		$bytes->b->s[0] = \chr($v);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:93: characters 3-15
		return ByteChunk::of($bytes);
	}

	/**
	 * @param int $v
	 * 
	 * @return ChunkObject
	 */
	public static function writeUInt16LE ($v) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:101: characters 3-30
		$bytes = Bytes::alloc(2);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:102: characters 3-25
		$bytes->b->s[0] = \chr($v & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:103: characters 3-33
		$bytes->b->s[1] = \chr(Boot::shiftRightUnsigned($v, 8) & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:104: characters 3-15
		return ByteChunk::of($bytes);
	}

	/**
	 * @param int $v
	 * 
	 * @return ChunkObject
	 */
	public static function writeUInt24LE ($v) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:117: characters 3-30
		$bytes = Bytes::alloc(3);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:118: characters 3-25
		$bytes->b->s[0] = \chr($v & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:119: characters 3-33
		$bytes->b->s[1] = \chr(Boot::shiftRightUnsigned($v, 8) & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:120: characters 3-34
		$bytes->b->s[2] = \chr(Boot::shiftRightUnsigned($v, 16) & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:121: characters 3-15
		return ByteChunk::of($bytes);
	}

	/**
	 * @param int $v
	 * 
	 * @return ChunkObject
	 */
	public static function writeUInt8 ($v) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:79: characters 3-30
		$bytes = Bytes::alloc(1);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:80: characters 3-25
		$bytes->b->s[0] = \chr($v & 255);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/ChunkTools.hx:81: characters 3-15
		return ByteChunk::of($bytes);
	}
}

Boot::registerClass(ChunkTools::class, 'tink.chunk.ChunkTools');
