<?php
/**
 */

namespace haxe\io;

use \php\_Boot\HxAnon;
use \php\Boot;
use \haxe\Exception;
use \haxe\exceptions\NotImplementedException;

/**
 * An Output is an abstract write. A specific output implementation will only
 * have to override the `writeByte` and maybe the `write`, `flush` and `close`
 * methods. See `File.write` and `String.write` for two ways of creating an
 * Output.
 */
class Output {
	/**
	 * Close the output.
	 * Behaviour while writing after calling this method is unspecified.
	 * 
	 * @return void
	 */
	public function close () {
	}

	/**
	 * Write one byte.
	 * 
	 * @param int $c
	 * 
	 * @return void
	 */
	public function writeByte ($c) {
		#/usr/share/haxe/std/haxe/io/Output.hx:47: characters 3-8
		throw new NotImplementedException(null, null, new _HxAnon_Output0("haxe/io/Output.hx", 47, "haxe.io.Output", "writeByte"));
	}

	/**
	 * Write `len` bytes from `s` starting by position specified by `pos`.
	 * Returns the actual length of written data that can differ from `len`.
	 * See `writeFullBytes` that tries to write the exact amount of specified bytes.
	 * 
	 * @param Bytes $s
	 * @param int $pos
	 * @param int $len
	 * 
	 * @return int
	 */
	public function writeBytes ($s, $pos, $len) {
		#/usr/share/haxe/std/haxe/io/Output.hx:59: lines 59-60
		if (($pos < 0) || ($len < 0) || (($pos + $len) > $s->length)) {
			#/usr/share/haxe/std/haxe/io/Output.hx:60: characters 4-9
			throw Exception::thrown(Error::OutsideBounds());
		}
		#/usr/share/haxe/std/haxe/io/Output.hx:62: characters 3-61
		$b = $s->b;
		#/usr/share/haxe/std/haxe/io/Output.hx:63: characters 3-15
		$k = $len;
		#/usr/share/haxe/std/haxe/io/Output.hx:64: lines 64-78
		while ($k > 0) {
			#/usr/share/haxe/std/haxe/io/Output.hx:68: characters 4-25
			$this->writeByte(\ord($b->s[$pos]));
			#/usr/share/haxe/std/haxe/io/Output.hx:76: characters 4-9
			++$pos;
			#/usr/share/haxe/std/haxe/io/Output.hx:77: characters 4-7
			--$k;
		}
		#/usr/share/haxe/std/haxe/io/Output.hx:79: characters 3-13
		return $len;
	}
}

class _HxAnon_Output0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(Output::class, 'haxe.io.Output');
