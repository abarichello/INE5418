<?php
/**
 */

namespace tink\json\_Parser;

use \haxe\io\_BytesData\Container;
use \php\Boot;
use \haxe\format\JsonParser;

final class JsonString_Impl_ {
	/**
	 * @param Container $raw
	 * @param int $min
	 * @param int $max
	 * 
	 * @return SliceData
	 */
	public static function _new ($raw, $min, $max) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:132: character 3
		$this1 = new SliceData($raw, $min, $max);
		return $this1;
	}

	/**
	 * @param SliceData $a
	 * @param string $b
	 * 
	 * @return bool
	 */
	public static function equalsString ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:169: lines 169-170
		if (mb_strlen($b) === ($a->max - $a->min)) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:170: characters 7-38
			return RawData_Impl_::hasId($a->source, $b, $a->min, $a->max);
		} else {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:169: lines 169-170
			return false;
		}
	}

	/**
	 * @param SliceData $this
	 * 
	 * @return string
	 */
	public static function get ($this1) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:147: characters 5-53
		return RawData_Impl_::substring($this1->source, $this1->min, $this1->max);
	}

	/**
	 * @param SliceData $this
	 * 
	 * @return float
	 */
	public static function toFloat ($this1) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:160: characters 5-33
		return \Std::parseFloat(RawData_Impl_::substring($this1->source, $this1->min, $this1->max));
	}

	/**
	 * @param SliceData $this
	 * 
	 * @return int
	 */
	public static function toInt ($this1) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:150: characters 5-31
		return \Std::parseInt(RawData_Impl_::substring($this1->source, $this1->min, $this1->max));
	}

	/**
	 * @param SliceData $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:137: lines 137-139
		if (RawData_Impl_::charPos($this1->source, 92, $this1->min, $this1->max) !== -1) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:138: characters 9-75
			return (new JsonParser(RawData_Impl_::substring($this1->source, $this1->min - 1, $this1->max + 1)))->doParse();
		} else {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:139: characters 12-17
			return RawData_Impl_::substring($this1->source, $this1->min, $this1->max);
		}
	}

	/**
	 * @param SliceData $this
	 * 
	 * @return int
	 */
	public static function toUInt ($this1) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:153: characters 5-22
		$ret = 0;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:154: characters 5-19
		$v = RawData_Impl_::substring($this1->source, $this1->min, $this1->max);
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:155: characters 14-18
		$_g = 0;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:155: characters 18-26
		$_g1 = mb_strlen($v);
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:155: characters 5-102
		while ($_g < $_g1) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:155: characters 14-26
			$i = $_g++;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:155: characters 28-102
			$ret = $ret + \Std::parseInt(($i < 0 ? "" : \mb_substr($v, $i, 1))) * (int)((10 ** (mb_strlen($v) - $i - 1)));
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:156: characters 5-15
		return $ret;
	}
}

Boot::registerClass(JsonString_Impl_::class, 'tink.json._Parser.JsonString_Impl_');