<?php
/**
 */

use \php\Boot;

/**
 * This class provides advanced methods on Strings. It is ideally used with
 * `using StringTools` and then acts as an [extension](https://haxe.org/manual/lf-static-extension.html)
 * to the `String` class.
 * If the first argument to any of the methods is null, the result is
 * unspecified.
 */
class StringTools {
	/**
	 * Tells if the string `s` ends with the string `end`.
	 * If `end` is `null`, the result is unspecified.
	 * If `end` is the empty String `""`, the result is true.
	 * 
	 * @param string $s
	 * @param string $end
	 * 
	 * @return bool
	 */
	public static function endsWith ($s, $end) {
		#/usr/share/haxe/std/php/_std/StringTools.hx:53: characters 10-67
		if ($end !== "") {
			#/usr/share/haxe/std/php/_std/StringTools.hx:53: characters 23-67
			return substr($s, -strlen($end)) === $end;
		} else {
			#/usr/share/haxe/std/php/_std/StringTools.hx:53: characters 10-67
			return true;
		}
	}

	/**
	 * Returns the character code at position `index` of String `s`, or an
	 * end-of-file indicator at if `position` equals `s.length`.
	 * This method is faster than `String.charCodeAt()` on some platforms, but
	 * the result is unspecified if `index` is negative or greater than
	 * `s.length`.
	 * End of file status can be checked by calling `StringTools.isEof()` with
	 * the returned value as argument.
	 * This operation is not guaranteed to work if `s` contains the `\0`
	 * character.
	 * 
	 * @param string $s
	 * @param int $index
	 * 
	 * @return int
	 */
	public static function fastCodeAt ($s, $index) {
		#/usr/share/haxe/std/php/_std/StringTools.hx:121: characters 3-76
		$char = ($index === 0 ? $s : mb_substr($s, $index, 1));
		#/usr/share/haxe/std/php/_std/StringTools.hx:122: lines 122-123
		if ($char === "") {
			#/usr/share/haxe/std/php/_std/StringTools.hx:123: characters 4-12
			return 0;
		}
		#/usr/share/haxe/std/php/_std/StringTools.hx:124: characters 10-30
		$code = ord($char[0]);
		if ($code < 192) {
			return $code;
		} else if ($code < 224) {
			return (($code - 192) << 6) + ord($char[1]) - 128;
		} else if ($code < 240) {
			return (($code - 224) << 12) + ((ord($char[1]) - 128) << 6) + ord($char[2]) - 128;
		} else {
			return (($code - 240) << 18) + ((ord($char[1]) - 128) << 12) + ((ord($char[2]) - 128) << 6) + ord($char[3]) - 128;
		}
	}

	/**
	 * Encodes `n` into a hexadecimal representation.
	 * If `digits` is specified, the resulting String is padded with "0" until
	 * its `length` equals `digits`.
	 * 
	 * @param int $n
	 * @param int $digits
	 * 
	 * @return string
	 */
	public static function hex ($n, $digits = null) {
		#/usr/share/haxe/std/php/_std/StringTools.hx:111: characters 3-28
		$s = dechex($n);
		#/usr/share/haxe/std/php/_std/StringTools.hx:112: characters 3-15
		$len = 8;
		#/usr/share/haxe/std/php/_std/StringTools.hx:113: characters 7-23
		$tmp = strlen($s);
		#/usr/share/haxe/std/php/_std/StringTools.hx:113: characters 26-86
		$tmp1 = null;
		if (null === $digits) {
			$tmp1 = $len;
		} else {
			#/usr/share/haxe/std/php/_std/StringTools.hx:113: characters 57-84
			if ($digits > $len) {
				#/usr/share/haxe/std/php/_std/StringTools.hx:113: characters 72-78
				$len = $digits;
			}
			#/usr/share/haxe/std/php/_std/StringTools.hx:113: characters 26-86
			$tmp1 = $len;
		}
		#/usr/share/haxe/std/php/_std/StringTools.hx:113: lines 113-116
		if ($tmp > $tmp1) {
			#/usr/share/haxe/std/php/_std/StringTools.hx:114: characters 8-22
			$s = mb_substr($s, -$len, null);
		} else if ($digits !== null) {
			#/usr/share/haxe/std/php/_std/StringTools.hx:116: characters 4-28
			$s = StringTools::lpad($s, "0", $digits);
		}
		#/usr/share/haxe/std/php/_std/StringTools.hx:117: characters 3-25
		return mb_strtoupper($s);
	}

	/**
	 * Concatenates `c` to `s` until `s.length` is at least `l`.
	 * If `c` is the empty String `""` or if `l` does not exceed `s.length`,
	 * `s` is returned unchanged.
	 * If `c.length` is 1, the resulting String length is exactly `l`.
	 * Otherwise the length may exceed `l`.
	 * If `c` is null, the result is unspecified.
	 * 
	 * @param string $s
	 * @param string $c
	 * @param int $l
	 * 
	 * @return string
	 */
	public static function lpad ($s, $c, $l) {
		#/usr/share/haxe/std/php/_std/StringTools.hx:89: characters 3-26
		$cLength = mb_strlen($c);
		#/usr/share/haxe/std/php/_std/StringTools.hx:90: characters 3-26
		$sLength = mb_strlen($s);
		#/usr/share/haxe/std/php/_std/StringTools.hx:91: lines 91-92
		if (($cLength === 0) || ($sLength >= $l)) {
			#/usr/share/haxe/std/php/_std/StringTools.hx:92: characters 4-12
			return $s;
		}
		#/usr/share/haxe/std/php/_std/StringTools.hx:93: characters 3-31
		$padLength = $l - $sLength;
		#/usr/share/haxe/std/php/_std/StringTools.hx:94: characters 3-50
		$padCount = (int)(($padLength / $cLength));
		#/usr/share/haxe/std/php/_std/StringTools.hx:95: lines 95-100
		if ($padCount > 0) {
			#/usr/share/haxe/std/php/_std/StringTools.hx:96: characters 4-106
			$result = str_pad($s, strlen($s) + $padCount * strlen($c), $c, STR_PAD_LEFT);
			#/usr/share/haxe/std/php/_std/StringTools.hx:97: characters 11-80
			if (($padCount * $cLength) >= $padLength) {
				#/usr/share/haxe/std/php/_std/StringTools.hx:97: characters 47-53
				return $result;
			} else {
				#/usr/share/haxe/std/php/_std/StringTools.hx:97: characters 56-80
				return ($c . $result);
			}
		} else {
			#/usr/share/haxe/std/php/_std/StringTools.hx:99: characters 4-30
			return ($c . $s);
		}
	}

	/**
	 * Replace all occurrences of the String `sub` in the String `s` by the
	 * String `by`.
	 * If `sub` is the empty String `""`, `by` is inserted after each character
	 * of `s` except the last one. If `by` is also the empty String `""`, `s`
	 * remains unchanged.
	 * If `sub` or `by` are null, the result is unspecified.
	 * 
	 * @param string $s
	 * @param string $sub
	 * @param string $by
	 * 
	 * @return string
	 */
	public static function replace ($s, $sub, $by) {
		#/usr/share/haxe/std/php/_std/StringTools.hx:104: lines 104-106
		if ($sub === "") {
			#/usr/share/haxe/std/php/_std/StringTools.hx:105: characters 4-89
			return implode($by, preg_split("//u", $s, -1, PREG_SPLIT_NO_EMPTY));
		}
		#/usr/share/haxe/std/php/_std/StringTools.hx:107: characters 3-40
		return str_replace($sub, $by, $s);
	}

	/**
	 * Appends `c` to `s` until `s.length` is at least `l`.
	 * If `c` is the empty String `""` or if `l` does not exceed `s.length`,
	 * `s` is returned unchanged.
	 * If `c.length` is 1, the resulting String length is exactly `l`.
	 * Otherwise the length may exceed `l`.
	 * If `c` is null, the result is unspecified.
	 * 
	 * @param string $s
	 * @param string $c
	 * @param int $l
	 * 
	 * @return string
	 */
	public static function rpad ($s, $c, $l) {
		#/usr/share/haxe/std/php/_std/StringTools.hx:74: characters 3-26
		$cLength = mb_strlen($c);
		#/usr/share/haxe/std/php/_std/StringTools.hx:75: characters 3-26
		$sLength = mb_strlen($s);
		#/usr/share/haxe/std/php/_std/StringTools.hx:76: lines 76-77
		if (($cLength === 0) || ($sLength >= $l)) {
			#/usr/share/haxe/std/php/_std/StringTools.hx:77: characters 4-12
			return $s;
		}
		#/usr/share/haxe/std/php/_std/StringTools.hx:78: characters 3-31
		$padLength = $l - $sLength;
		#/usr/share/haxe/std/php/_std/StringTools.hx:79: characters 3-50
		$padCount = (int)(($padLength / $cLength));
		#/usr/share/haxe/std/php/_std/StringTools.hx:80: lines 80-85
		if ($padCount > 0) {
			#/usr/share/haxe/std/php/_std/StringTools.hx:81: characters 4-107
			$result = str_pad($s, strlen($s) + $padCount * strlen($c), $c, STR_PAD_RIGHT);
			#/usr/share/haxe/std/php/_std/StringTools.hx:82: characters 11-80
			if (($padCount * $cLength) >= $padLength) {
				#/usr/share/haxe/std/php/_std/StringTools.hx:82: characters 47-53
				return $result;
			} else {
				#/usr/share/haxe/std/php/_std/StringTools.hx:82: characters 56-80
				return ($result . $c);
			}
		} else {
			#/usr/share/haxe/std/php/_std/StringTools.hx:84: characters 4-30
			return ($s . $c);
		}
	}

	/**
	 * Tells if the string `s` starts with the string `start`.
	 * If `start` is `null`, the result is unspecified.
	 * If `start` is the empty String `""`, the result is true.
	 * 
	 * @param string $s
	 * @param string $start
	 * 
	 * @return bool
	 */
	public static function startsWith ($s, $start) {
		#/usr/share/haxe/std/php/_std/StringTools.hx:49: characters 10-75
		if ($start !== "") {
			#/usr/share/haxe/std/php/_std/StringTools.hx:49: characters 25-75
			return substr($s, 0, strlen($start)) === $start;
		} else {
			#/usr/share/haxe/std/php/_std/StringTools.hx:49: characters 10-75
			return true;
		}
	}

	/**
	 * Removes leading and trailing space characters of `s`.
	 * This is a convenience function for `ltrim(rtrim(s))`.
	 * 
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function trim ($s) {
		#/usr/share/haxe/std/php/_std/StringTools.hx:70: characters 3-24
		return trim($s);
	}

	/**
	 * Returns the character code at position `index` of String `s`, or an
	 * end-of-file indicator at if `position` equals `s.length`.
	 * This method is faster than `String.charCodeAt()` on some platforms, but
	 * the result is unspecified if `index` is negative or greater than
	 * `s.length`.
	 * This operation is not guaranteed to work if `s` contains the `\0`
	 * character.
	 * 
	 * @param string $s
	 * @param int $index
	 * 
	 * @return int
	 */
	public static function unsafeCodeAt ($s, $index) {
		#/usr/share/haxe/std/php/_std/StringTools.hx:128: characters 3-76
		$char = ($index === 0 ? $s : mb_substr($s, $index, 1));
		#/usr/share/haxe/std/php/_std/StringTools.hx:129: characters 10-30
		$code = ord($char[0]);
		if ($code < 192) {
			return $code;
		} else if ($code < 224) {
			return (($code - 192) << 6) + ord($char[1]) - 128;
		} else if ($code < 240) {
			return (($code - 224) << 12) + ((ord($char[1]) - 128) << 6) + ord($char[2]) - 128;
		} else {
			return (($code - 240) << 18) + ((ord($char[1]) - 128) << 12) + ((ord($char[2]) - 128) << 6) + ord($char[3]) - 128;
		}
	}
}

Boot::registerClass(StringTools::class, 'StringTools');
