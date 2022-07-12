<?php
/**
 */

namespace tink\json;

use \php\_Boot\HxAnon;
use \haxe\io\_BytesData\Container;
use \tink\core\NamedWith;
use \php\Boot;
use \tink\core\Annex;
use \tink\core\TypedError;
use \tink\json\_Parser\RawData_Impl_;
use \tink\json\_Parser\JsonString_Impl_;
use \haxe\format\JsonParser;
use \haxe\io\Bytes;
use \tink\json\_Parser\SliceData;

class BasicParser {
	/**
	 * @var int
	 */
	static public $DBQT;

	/**
	 * @var \Closure[]|\Array_hx
	 */
	public $afterParsing;
	/**
	 * @var int
	 */
	public $max;
	/**
	 * @var Annex
	 */
	public $plugins;
	/**
	 * @var int
	 */
	public $pos;
	/**
	 * @var Container
	 */
	public $source;

	/**
	 * @param int $char
	 * 
	 * @return bool
	 */
	public static function isDigit ($char) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:264: characters 12-34
		if ($char < 58) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:264: characters 25-34
			return $char > 47;
		} else {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:264: characters 12-34
			return false;
		}
	}

	/**
	 * @param int $char
	 * 
	 * @return bool
	 */
	public static function startsNumber ($char) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:267: characters 12-65
		if (!(($char === 46) || ($char === 45))) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:267: characters 52-65
			if ($char < 58) {
				return $char > 47;
			} else {
				return false;
			}
		} else {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:267: characters 12-65
			return true;
		}
	}

	/**
	 * @return void
	 */
	public function __construct () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:183: characters 22-45
		$this->afterParsing = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:186: characters 5-35
		$this->plugins = new Annex($this);
	}

	/**
	 * @param mixed $target
	 * @param mixed $source
	 * 
	 * @return mixed
	 */
	public function copyFields ($target, $source) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:211: lines 211-212
		$_g = 0;
		$_g1 = \Reflect::fields($source);
		while ($_g < $_g1->length) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:211: characters 12-13
			$f = ($_g1->arr[$_g] ?? null);
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:211: lines 211-212
			++$_g;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:212: characters 9-62
			\Reflect::setField($target, $f, \Reflect::field($source, $f));
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:214: characters 5-18
		return $target;
	}

	/**
	 * @param string $s
	 * @param int $pos
	 * @param int $end
	 * 
	 * @return mixed
	 */
	public function die ($s, $pos = -1, $end = -1) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:446: lines 446-473
		if ($pos === null) {
			$pos = -1;
		}
		if ($end === null) {
			$end = -1;
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:447: lines 447-450
		if ($pos === -1) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:448: characters 13-27
			$pos = $this->pos;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:448: characters 7-27
			$end = $pos;
		} else if ($end === -1) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:450: characters 7-21
			$end = $this->pos;
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:452: lines 452-453
		if ($end <= $pos) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:453: characters 7-20
			$end = $pos + 1;
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:455: lines 455-457
		$range = ($end > ($pos + 1) ? "characters " . ($pos??'null') . " - " . ($end??'null') : "character " . ($pos??'null'));
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:459: lines 459-467
		$clip = function ($s, $maxLength, $left) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:461: lines 461-467
			if (mb_strlen($s) > $maxLength) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:462: lines 462-465
				if ($left) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:463: characters 13-52
					return "... " . (\mb_substr($s, mb_strlen($s) - $maxLength, null)??'null');
				} else {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:465: characters 13-44
					return (\mb_substr($s, 0, $maxLength)??'null') . " ...";
				}
			} else {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:467: characters 11-12
				return $s;
			}
		};
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:469: characters 5-35
		$center = ($pos + $end) >> 1;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:470: characters 5-231
		$context = ($clip(RawData_Impl_::substring($this->source, 0, $pos), 20, true)??'null') . "  ---->  " . ($clip(RawData_Impl_::substring($this->source, $pos, $center), 20, false)??'null') . ($clip(RawData_Impl_::substring($this->source, $center, $end), 20, true)??'null') . "  <----  " . ($clip(RawData_Impl_::substring($this->source, $end, $this->max), 20, false)??'null');
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:472: characters 5-129
		return TypedError::withData(422, ($s??'null') . (" at " . ($range??'null') . " in " . ($context??'null')), new _HxAnon_BasicParser0($this->source, $pos, $end), new _HxAnon_BasicParser1("tink/json/Parser.hx", 472, "tink.json.BasicParser", "die"))->throwSelf();
	}

	/**
	 * @return SliceData
	 */
	public function doParseNumber () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:277: characters 5-57
		return $this->slice($this->skipNumber(\ord($this->source->s[$this->pos++])), $this->pos);
	}

	/**
	 * @param Class $cls
	 * 
	 * @return mixed
	 */
	public function emptyInstance ($cls) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:218: lines 218-222
		return \Type::createEmptyInstance($cls);
	}

	/**
	 * @param string $source
	 * 
	 * @return void
	 */
	public function init ($source) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:189: characters 5-17
		$this->pos = 0;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:190: characters 19-65
		$b = \strlen($source);
		$b1 = new Bytes($b, new Container($source));
		$this1 = $b1->b;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:190: characters 52-64
		$this->max = $b1->length;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:190: characters 5-65
		$this->source = $this1;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:191: characters 5-18
		while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
			$this->pos++;
		}
	}

	/**
	 * @param int $c
	 * 
	 * @return Value
	 */
	public function invalidChar ($c) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:444: characters 5-52
		return $this->die("invalid char " . (\StringTools::hex($c, 2)??'null'), $this->pos - 1);
	}

	/**
	 * @param int $start
	 * 
	 * @return mixed
	 */
	public function invalidNumber ($start) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:280: characters 5-72
		return $this->die("Invalid number " . (RawData_Impl_::substring($this->source, $start, $this->pos)??'null'), $start);
	}

	/**
	 * @return int
	 */
	public function next () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:326: characters 12-33
		return \ord($this->source->s[$this->pos++]);
	}

	/**
	 * @return bool
	 */
	public function parseBool () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
		while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
			$this->pos++;
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
		$tmp = null;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
		if ((\ord($this->source->s[$this->pos]) === 116) && (\ord($this->source->s[$this->pos + 1]) === 114) && (\ord($this->source->s[$this->pos + 2]) === 117) && (\ord($this->source->s[$this->pos + 3]) === 101)) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
			$this->pos += 4;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
			while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
				$this->pos++;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
			$tmp = true;
		} else {
			$tmp = false;
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:495: lines 495-497
		if ($tmp) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:495: characters 31-35
			return true;
		} else {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
			while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
				$this->pos++;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
			$tmp = null;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
			if ((\ord($this->source->s[$this->pos]) === 102) && (\ord($this->source->s[$this->pos + 1]) === 97) && (\ord($this->source->s[$this->pos + 2]) === 108) && (\ord($this->source->s[$this->pos + 3]) === 115) && (\ord($this->source->s[$this->pos + 4]) === 101)) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
				$this->pos += 5;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
				while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
					$this->pos++;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
				$tmp = true;
			} else {
				$tmp = false;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:496: lines 496-497
			if ($tmp) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:496: characters 37-42
				return false;
			} else {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:497: characters 12-41
				return $this->die("expected boolean value");
			}
		}
	}

	/**
	 * @return mixed
	 */
	public function parseDynamic () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:200: characters 5-21
		$start = $this->pos;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:201: characters 5-16
		$this->skipValue();
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:202: characters 12-62
		return (new JsonParser(RawData_Impl_::substring($this->source, $start, $this->pos)))->doParse();
	}

	/**
	 * @return SliceData
	 */
	public function parseNumber () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:271: characters 11-44
		$char = \ord($this->source->s[$this->pos]);
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:271: lines 271-274
		if (($char === 46) || ($char === 45) || (($char < 58) && ($char > 47))) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:272: characters 9-24
			return $this->doParseNumber();
		} else {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:274: characters 9-31
			return $this->die("number expected");
		}
	}

	/**
	 * @return SliceData
	 */
	public function parseRestOfString () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:230: characters 5-40
		return $this->slice($this->skipString(), $this->pos - 1);
	}

	/**
	 * @return string
	 */
	public function parseSerialized () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:336: characters 5-21
		$start = $this->pos;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:337: characters 5-16
		$this->skipValue();
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:338: characters 5-45
		return RawData_Impl_::substring($this->source, $start, $this->pos);
	}

	/**
	 * @return SliceData
	 */
	public function parseString () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
		while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
			$this->pos++;
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
		$e = null;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
		if (\ord($this->source->s[$this->pos]) === 34) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
			$this->pos += 1;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
			$e = true;
		} else {
			$e = false;
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:227: characters 12-68
		$e1 = (!$e ? $this->die("Expected " . "string") : null);
		return $this->parseRestOfString();
	}

	/**
	 * @return Value
	 */
	public function parseValue () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:342: lines 342-392
		$_gthis = $this;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:342: characters 19-25
		$_g = \ord($this->source->s[$this->pos++]);
		if ($_g === 34) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:379: characters 9-48
			return Value::VString(JsonString_Impl_::toString($this->parseRestOfString()));
		} else if ($_g === 91) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:367: characters 9-38
			$ret = new \Array_hx();
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
			while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
				$this->pos++;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
			$tmp = null;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
			if (\ord($this->source->s[$this->pos]) === 93) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
				$this->pos += 1;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
				while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
					$this->pos++;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
				$tmp = true;
			} else {
				$tmp = false;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:369: lines 369-374
			if (!$tmp) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:370: lines 370-372
				while (true) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:371: characters 13-35
					$x = $this->parseValue();
					$ret->arr[$ret->length++] = $x;
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
					while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
						$this->pos++;
					}
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
					$tmp = null;
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
					if (\ord($this->source->s[$this->pos]) === 44) {
						#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
						$this->pos += 1;
						#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
						while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
							$this->pos++;
						}
						#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
						$tmp = true;
					} else {
						$tmp = false;
					}
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:370: lines 370-372
					if (!$tmp) {
						break;
					}
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
				while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
					$this->pos++;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
				$tmp = null;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
				if (\ord($this->source->s[$this->pos]) === 93) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
					$this->pos += 1;
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
					$tmp = true;
				} else {
					$tmp = false;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 18-160
				if (!$tmp) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 76-114
					$this->die("Expected " . "]");
				}
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:376: characters 9-20
			return Value::VArray($ret);
		} else if ($_g === 102) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
			$e = null;
			if ((\ord($this->source->s[$this->pos]) === 97) && (\ord($this->source->s[$this->pos + 1]) === 108) && (\ord($this->source->s[$this->pos + 2]) === 115) && (\ord($this->source->s[$this->pos + 3]) === 101)) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
				$this->pos += 4;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
				$e = true;
			} else {
				$e = false;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:383: characters 9-52
			$e1 = (!$e ? $this->die("Expected " . "alse") : null);
			return Value::VBool(false);
		} else if ($_g === 110) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
			$e = null;
			if ((\ord($this->source->s[$this->pos]) === 117) && (\ord($this->source->s[$this->pos + 1]) === 108) && (\ord($this->source->s[$this->pos + 2]) === 108)) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
				$this->pos += 3;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
				$e = true;
			} else {
				$e = false;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:385: characters 39-44
			$e1 = (!$e ? $this->die("Expected " . "ull") : null);
			return Value::VNull();
		} else if ($_g === 116) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
			$e = null;
			if ((\ord($this->source->s[$this->pos]) === 114) && (\ord($this->source->s[$this->pos + 1]) === 117) && (\ord($this->source->s[$this->pos + 2]) === 101)) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
				$this->pos += 3;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
				$e = true;
			} else {
				$e = false;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:381: characters 9-50
			$e1 = (!$e ? $this->die("Expected " . "rue") : null);
			return Value::VBool(true);
		} else if ($_g === 123) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:344: characters 9-48
			$fields = new \Array_hx();
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
			while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
				$this->pos++;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
			$tmp = null;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
			if (\ord($this->source->s[$this->pos]) === 125) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
				$this->pos += 1;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
				while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
					$this->pos++;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
				$tmp = true;
			} else {
				$tmp = false;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:345: lines 345-361
			if (!$tmp) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:356: lines 356-358
				while (true) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:357: characters 13-19
					if (\ord($_gthis->source->s[$_gthis->pos++]) !== 34) {
						$_gthis->die("expected string", $_gthis->pos - 1);
					}
					$x = JsonString_Impl_::toString($_gthis->parseRestOfString());
					while (($_gthis->pos < $_gthis->max) && (\ord($_gthis->source->s[$_gthis->pos]) < 33)) {
						$_gthis->pos++;
					}
					$e = null;
					if (\ord($_gthis->source->s[$_gthis->pos]) === 58) {
						$_gthis->pos += 1;
						while (($_gthis->pos < $_gthis->max) && (\ord($_gthis->source->s[$_gthis->pos]) < 33)) {
							$_gthis->pos++;
						}
						$e = true;
					} else {
						$e = false;
					}
					$e1 = (!$e ? $_gthis->die("Expected " . ":") : null);
					$x1 = new NamedWith($x, $_gthis->parseValue());
					$fields->arr[$fields->length++] = $x1;
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
					while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
						$this->pos++;
					}
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
					$tmp = null;
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
					if (\ord($this->source->s[$this->pos]) === 44) {
						#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
						$this->pos += 1;
						#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
						while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
							$this->pos++;
						}
						#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
						$tmp = true;
					} else {
						$tmp = false;
					}
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:356: lines 356-358
					if (!$tmp) {
						break;
					}
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
				while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
					$this->pos++;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
				$tmp = null;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
				if (\ord($this->source->s[$this->pos]) === 125) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
					$this->pos += 1;
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
					$tmp = true;
				} else {
					$tmp = false;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 18-160
				if (!$tmp) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 76-114
					$this->die("Expected " . "}");
				}
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:363: characters 9-24
			return Value::VObject($fields);
		} else {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:386: characters 12-16
			$char = $_g;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:387: lines 387-391
			if (($char === 46) || ($char === 45) || (($char < 58) && ($char > 47))) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:388: characters 11-16
				$this->pos--;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:389: characters 19-44
				$this1 = $this->doParseNumber();
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:389: characters 11-45
				return Value::VNumber(\Std::parseFloat(RawData_Impl_::substring($this1->source, $this1->min, $this1->max)));
			} else {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:391: characters 14-31
				return $this->invalidChar($char);
			}
		}
	}

	/**
	 * @return void
	 */
	public function skipArray () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
		while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
			$this->pos++;
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
		$tmp = null;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
		if (\ord($this->source->s[$this->pos]) === 93) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
			$this->pos += 1;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
			while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
				$this->pos++;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
			$tmp = true;
		} else {
			$tmp = false;
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:395: lines 395-396
		if ($tmp) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:396: characters 7-13
			return;
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:398: lines 398-400
		while (true) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:399: characters 7-18
			$this->skipValue();
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
			while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
				$this->pos++;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
			$tmp = null;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
			if (\ord($this->source->s[$this->pos]) === 44) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
				$this->pos += 1;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
				while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
					$this->pos++;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
				$tmp = true;
			} else {
				$tmp = false;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:398: lines 398-400
			if (!$tmp) {
				break;
			}
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
		while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
			$this->pos++;
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
		$tmp = null;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
		if (\ord($this->source->s[$this->pos]) === 93) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
			$this->pos += 1;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
			$tmp = true;
		} else {
			$tmp = false;
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 18-160
		if (!$tmp) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 76-114
			$this->die("Expected " . "]");
		}
	}

	/**
	 * @return void
	 */
	public function skipIgnored () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:197: characters 5-69
		while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:197: characters 64-69
			$this->pos++;
		}
	}

	/**
	 * @param int $c
	 * 
	 * @return int
	 */
	public function skipNumber ($c) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:284: characters 5-25
		$start = $this->pos - 1;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:285: characters 5-69
		$minus = $c === 45;
		$digit = !$minus;
		$zero = $c === 48;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:286: characters 5-59
		$point = false;
		$e = false;
		$pm = false;
		$end = false;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:287: lines 287-315
		while ($this->pos < $this->max) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:288: characters 11-17
			$c = \ord($this->source->s[$this->pos++]);
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:289: lines 289-313
			if ($c === 43 || $c === 45) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:307: characters 11-45
				if (!$e || $pm) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:307: characters 25-45
					$this->invalidNumber($start);
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:308: characters 11-24
				$digit = false;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:308: characters 26-35
				$pm = true;
			} else if ($c === 46) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:301: characters 11-51
				if ($minus || $point) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:301: characters 31-51
					$this->invalidNumber($start);
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:302: characters 11-24
				$digit = false;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:302: characters 26-38
				$point = true;
			} else if ($c === 48) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:291: characters 11-51
				if ($zero && !$point) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:291: characters 31-51
					$this->invalidNumber($start);
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:292: lines 292-294
				if ($minus) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:293: characters 13-26
					$minus = false;
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:293: characters 28-39
					$zero = true;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:295: characters 11-23
				$digit = true;
			} else if ($c === 49 || $c === 50 || $c === 51 || $c === 52 || $c === 53 || $c === 54 || $c === 55 || $c === 56 || $c === 57) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:297: characters 11-51
				if ($zero && !$point) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:297: characters 31-51
					$this->invalidNumber($start);
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:298: characters 11-35
				if ($minus) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:298: characters 22-35
					$minus = false;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:299: characters 11-23
				$digit = true;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:299: characters 25-37
				$zero = false;
			} else if ($c === 69 || $c === 101) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:304: characters 11-55
				if ($minus || $zero || $e) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:304: characters 35-55
					$this->invalidNumber($start);
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:305: characters 11-24
				$digit = false;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:305: characters 26-34
				$e = true;
			} else {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:310: characters 11-43
				if (!$digit) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:310: characters 23-43
					$this->invalidNumber($start);
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:311: characters 11-16
				$this->pos--;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:312: characters 11-21
				$end = true;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:314: characters 7-21
			if ($end) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:314: characters 16-21
				break;
			}
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:316: characters 5-17
		return $start;
	}

	/**
	 * @return int
	 */
	public function skipString () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:233: characters 5-21
		$start = $this->pos;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:235: lines 235-257
		while (true) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:243: characters 14-44
			$_g = RawData_Impl_::charPos($this->source, BasicParser::$DBQT, $this->pos, $this->max);
			if ($_g === -1) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:246: characters 11-44
				$this->die("unterminated string", $start);
			} else {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:248: characters 14-15
				$v = $_g;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:250: characters 11-22
				$this->pos = $v + 1;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:252: characters 11-27
				$p = $this->pos - 2;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:254: characters 11-53
				while (\ord($this->source->s[$p]) === 92) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:254: characters 50-53
					--$p;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:255: lines 255-256
				if ((($p - $this->pos) & 1) === 0) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:256: characters 13-18
					break;
				}
			}
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:260: characters 5-17
		return $start;
	}

	/**
	 * @return void
	 */
	public function skipValue () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:406: lines 406-441
		$_gthis = $this;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:406: characters 12-18
		$_g = \ord($this->source->s[$this->pos++]);
		if ($_g === 34) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:429: characters 9-21
			$this->skipString();
		} else if ($_g === 91) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:427: characters 9-20
			$this->skipArray();
		} else if ($_g === 102) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
			$tmp = null;
			if ((\ord($this->source->s[$this->pos]) === 97) && (\ord($this->source->s[$this->pos + 1]) === 108) && (\ord($this->source->s[$this->pos + 2]) === 115) && (\ord($this->source->s[$this->pos + 3]) === 101)) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
				$this->pos += 4;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
				$tmp = true;
			} else {
				$tmp = false;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 18-160
			if (!$tmp) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 76-114
				$this->die("Expected " . "alse");
			}
		} else if ($_g === 110) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
			$tmp = null;
			if ((\ord($this->source->s[$this->pos]) === 117) && (\ord($this->source->s[$this->pos + 1]) === 108) && (\ord($this->source->s[$this->pos + 2]) === 108)) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
				$this->pos += 3;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
				$tmp = true;
			} else {
				$tmp = false;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 18-160
			if (!$tmp) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 76-114
				$this->die("Expected " . "ull");
			}
		} else if ($_g === 116) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
			$tmp = null;
			if ((\ord($this->source->s[$this->pos]) === 114) && (\ord($this->source->s[$this->pos + 1]) === 117) && (\ord($this->source->s[$this->pos + 2]) === 101)) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
				$this->pos += 3;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
				$tmp = true;
			} else {
				$tmp = false;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 18-160
			if (!$tmp) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 76-114
				$this->die("Expected " . "rue");
			}
		} else if ($_g === 123) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
			while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
				$this->pos++;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
			$tmp = null;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
			if (\ord($this->source->s[$this->pos]) === 125) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
				$this->pos += 1;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
				while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
					$this->pos++;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
				$tmp = true;
			} else {
				$tmp = false;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:408: lines 408-409
			if ($tmp) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:409: characters 11-17
				return;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:420: lines 420-422
			while (true) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:421: characters 11-17
				if (\ord($_gthis->source->s[$_gthis->pos++]) !== 34) {
					$_gthis->die("expected string", $_gthis->pos - 1);
				}
				$_gthis->skipString();
				while (($_gthis->pos < $_gthis->max) && (\ord($_gthis->source->s[$_gthis->pos]) < 33)) {
					$_gthis->pos++;
				}
				$tmp = null;
				if (\ord($_gthis->source->s[$_gthis->pos]) === 58) {
					$_gthis->pos += 1;
					while (($_gthis->pos < $_gthis->max) && (\ord($_gthis->source->s[$_gthis->pos]) < 33)) {
						$_gthis->pos++;
					}
					$tmp = true;
				} else {
					$tmp = false;
				}
				if (!$tmp) {
					$_gthis->die("Expected " . ":");
				}
				$_gthis->skipValue();
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
				while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
					$this->pos++;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
				$tmp1 = null;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
				if (\ord($this->source->s[$this->pos]) === 44) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
					$this->pos += 1;
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
					while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
						$this->pos++;
					}
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
					$tmp1 = true;
				} else {
					$tmp1 = false;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:420: lines 420-422
				if (!$tmp1) {
					break;
				}
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
			while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
				$this->pos++;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
			$tmp = null;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
			if (\ord($this->source->s[$this->pos]) === 125) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
				$this->pos += 1;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
				$tmp = true;
			} else {
				$tmp = false;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 18-160
			if (!$tmp) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 76-114
				$this->die("Expected " . "}");
			}
		} else {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:436: characters 12-16
			$char = $_g;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:437: lines 437-440
			if (($char === 46) || ($char === 45) || (($char < 58) && ($char > 47))) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:438: characters 11-27
				$this->skipNumber($char);
			} else {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:440: characters 11-28
				$this->invalidChar($char);
			}
		}
	}

	/**
	 * @param int $from
	 * @param int $to
	 * 
	 * @return SliceData
	 */
	public function slice ($from, $to) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:320: characters 12-49
		$this1 = new SliceData($this->source, $from, $to);
		return $this1;
	}

	/**
	 * @param int $code
	 * @param string $expected
	 * 
	 * @return void
	 */
	public function toChar ($code, $expected) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:329: lines 329-333
		while (true) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:329: characters 25-31
			$_g = \ord($this->source->s[$this->pos++]);
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:331: characters 12-18
			$_hx_tmp = null;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:330: characters 12-21
			if (($_g === $code) === true) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:330: characters 31-36
				break;
			} else {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:331: characters 12-18
				$_hx_tmp = $_g < 33;
				if ($_hx_tmp !== true) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:332: characters 16-41
					$this->die("expected " . ($expected??'null'));
				}
			}
		}
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


		$this1 = 34;
		self::$DBQT = $this1;
	}
}

class _HxAnon_BasicParser0 extends HxAnon {
	function __construct($source, $start, $end) {
		$this->source = $source;
		$this->start = $start;
		$this->end = $end;
	}
}

class _HxAnon_BasicParser1 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(BasicParser::class, 'tink.json.BasicParser');
BasicParser::__hx__init();