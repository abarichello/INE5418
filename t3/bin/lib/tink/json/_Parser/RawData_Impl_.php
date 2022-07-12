<?php
/**
 */

namespace tink\json\_Parser;

use \haxe\io\_BytesData\Container;
use \php\Boot;
use \haxe\Exception;
use \haxe\io\Error;
use \haxe\io\Bytes;

final class RawData_Impl_ {
	/**
	 * @param string $s
	 * @param \Closure $setLength
	 * 
	 * @return Container
	 */
	public static function _new ($s, $setLength) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:16: characters 13-30
		$b = \strlen($s);
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:16: characters 5-31
		$b1 = new Bytes($b, new Container($s));
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:15: character 3
		$this1 = $b1->b;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:18: characters 5-24
		$setLength($b1->length);
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:15: character 3
		return $this1;
	}

	/**
	 * @param Container $this
	 * @param int $char
	 * @param int $start
	 * @param int $end
	 * 
	 * @return int
	 */
	public static function charPos ($this1, $char, $start, $end) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:31: characters 17-22
		$_g = $start;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:31: characters 25-28
		$_g1 = $end;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:31: lines 31-32
		while ($_g < $_g1) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:31: characters 17-28
			$pos = $_g++;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:32: characters 7-43
			if (\ord($this1->s[$pos]) === $char) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:32: characters 33-43
				return $pos;
			}
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:33: characters 5-14
		return -1;
	}

	/**
	 * @param Container $this
	 * @param int $i
	 * 
	 * @return int
	 */
	public static function getChar ($this1, $i) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:28: characters 5-34
		return \ord($this1->s[$i]);
	}

	/**
	 * @param Container $this
	 * @param int $min
	 * @param int $max
	 * 
	 * @return bool
	 */
	public static function hasBackslash ($this1, $min, $max) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:25: characters 5-46
		return RawData_Impl_::charPos($this1, 92, $min, $max) !== -1;
	}

	/**
	 * @param Container $this
	 * @param string $s
	 * @param int $min
	 * @param int $max
	 * 
	 * @return bool
	 */
	public static function hasId ($this1, $s, $min, $max) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:37: characters 5-36
		return RawData_Impl_::substring($this1, $min, $max) === $s;
	}

	/**
	 * @param Container $this
	 * @param int $min
	 * @param int $max
	 * 
	 * @return string
	 */
	public static function substring ($this1, $min, $max) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:22: characters 12-56
		$_this = new Bytes(\strlen($this1->s), $this1);
		$len = $max - $min;
		if (($min < 0) || ($len < 0) || (($min + $len) > $_this->length)) {
			throw Exception::thrown(Error::OutsideBounds());
		} else {
			return \substr($_this->b->s, $min, $len);
		}
	}
}

Boot::registerClass(RawData_Impl_::class, 'tink.json._Parser.RawData_Impl_');
