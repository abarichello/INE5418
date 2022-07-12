<?php
/**
 */

namespace tink\json;

use \php\Boot;
use \tink\core\Annex;
use \haxe\Exception;
use \php\_Boot\HxString;
use \haxe\format\JsonPrinter;

class BasicWriter {
	/**
	 * @var \StringBuf
	 */
	public $buf;
	/**
	 * @var Annex
	 */
	public $plugins;

	/**
	 * @return void
	 */
	public function __construct () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:17: characters 5-35
		$this->plugins = new Annex($this);
	}

	/**
	 * @param int $c
	 * 
	 * @return void
	 */
	public function char ($c) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:27: characters 5-19
		$_this = $this->buf;
		$_this->b = ($_this->b??'null') . (\mb_chr($c)??'null');
	}

	/**
	 * @param string $v
	 * 
	 * @return string
	 */
	public function expandScientificNotation ($v) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:83: characters 19-45
		$_g = HxString::split(\mb_strtolower($v), "e");
		$__hx__switch = ($_g->length);
		if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:84: characters 13-14
			$d = ($_g->arr[0] ?? null);
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:84: characters 17-18
			return $d;
		} else if ($__hx__switch === 2) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:85: characters 13-14
			$d = ($_g->arr[0] ?? null);
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:85: characters 16-17
			$e = ($_g->arr[1] ?? null);
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:86: characters 16-28
			$_g = HxString::split($d, ".");
			$__hx__switch = ($_g->length);
			if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:87: characters 17-18
				$v = ($_g->arr[0] ?? null);
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:87: characters 21-67
				return ($v??'null') . (\StringTools::rpad("", "0", \Std::parseInt($e))??'null');
			} else if ($__hx__switch === 2) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:88: characters 17-18
				$d = ($_g->arr[0] ?? null);
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:88: characters 20-21
				$f = ($_g->arr[1] ?? null);
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:88: characters 24-69
				return ($d??'null') . (\StringTools::rpad($f, "0", \Std::parseInt($e))??'null');
			} else {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:89: characters 19-24
				throw Exception::thrown("Invalid value");
			}
		} else {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:91: characters 15-20
			throw Exception::thrown("Invalid value");
		}
	}

	/**
	 * @return void
	 */
	public function init () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:20: characters 5-26
		$this->buf = new \StringBuf();
	}

	/**
	 * @param string $s
	 * 
	 * @return void
	 */
	public function output ($s) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:24: characters 5-15
		$this->buf->add($s);
	}

	/**
	 * @param bool $b
	 * 
	 * @return void
	 */
	public function writeBool ($b) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:36: characters 5-39
		$this->buf->add(($b ? "true" : "false"));
	}

	/**
	 * @param mixed $value
	 * 
	 * @return void
	 */
	public function writeDynamic ($value) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:42: characters 5-43
		$s = JsonPrinter::print($value);
		$this->buf->add($s);
	}

	/**
	 * @param float $v
	 * 
	 * @return void
	 */
	public function writeFloat ($v) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:33: characters 5-34
		$s = \Std::string($v);
		$this->buf->add($s);
	}

	/**
	 * @param int $v
	 * 
	 * @return void
	 */
	public function writeInt ($v) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:30: characters 5-32
		$s = \Std::string($v);
		$this->buf->add($s);
	}

	/**
	 * @param string $s
	 * 
	 * @return void
	 */
	public function writeString ($s) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:39: characters 5-38
		$s1 = json_encode($s);
		$this->buf->add($s1);
	}

	/**
	 * @param Value $value
	 * 
	 * @return void
	 */
	public function writeValue ($value) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:45: lines 45-80
		$_gthis = $this;
		$__hx__switch = ($value->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:46: characters 20-21
			$f = $value->params[0];
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:46: characters 24-37
			$s = \Std::string($f);
			$this->buf->add($s);
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:47: characters 20-21
			$s = $value->params[0];
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:47: characters 24-38
			$s1 = json_encode($s);
			$this->buf->add($s1);
		} else if ($__hx__switch === 2) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:48: characters 19-33
			$this->buf->add("null");
		} else if ($__hx__switch === 3) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:49: characters 18-19
			$b = $value->params[0];
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:49: characters 22-56
			$this->buf->add(($b ? "true" : "false"));
		} else if ($__hx__switch === 4) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:51: characters 19-20
			$_g = $value->params[0];
			if ($_g->length === 0) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:50: characters 24-36
				$this->buf->add("[]");
			} else {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:51: characters 19-20
				$a = $_g;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:53: characters 9-23
				$_this = $this->buf;
				$_this->b = ($_this->b??'null') . (\mb_chr(91)??'null');
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:54: characters 9-25
				$this->writeValue(($a->arr[0] ?? null));
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:56: characters 19-23
				$_g = 1;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:56: characters 23-31
				$_g1 = $a->length;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:56: lines 56-59
				while ($_g < $_g1) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:56: characters 19-31
					$i = $_g++;
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:57: characters 11-25
					$_this = $this->buf;
					$_this->b = ($_this->b??'null') . (\mb_chr(44)??'null');
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:58: characters 11-27
					$this->writeValue(($a->arr[$i] ?? null));
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:60: characters 9-23
				$_this = $this->buf;
				$_this->b = ($_this->b??'null') . (\mb_chr(93)??'null');
			}
		} else if ($__hx__switch === 5) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:63: characters 20-21
			$_g = $value->params[0];
			if ($_g->length === 0) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:62: characters 25-37
				$this->buf->add("{}");
			} else {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:63: characters 20-21
				$a = $_g;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:65: characters 9-23
				$_this = $this->buf;
				$_this->b = ($_this->b??'null') . (\mb_chr(123)??'null');
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:72: characters 9-20
				$p = ($a->arr[0] ?? null);
				$s = json_encode($p->name);
				$_gthis->buf->add($s);
				$_this = $_gthis->buf;
				$_this->b = ($_this->b??'null') . (\mb_chr(58)??'null');
				$_gthis->writeValue($p->value);
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:73: characters 19-23
				$_g = 1;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:73: characters 23-31
				$_g1 = $a->length;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:73: lines 73-76
				while ($_g < $_g1) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:73: characters 19-31
					$i = $_g++;
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:74: characters 11-25
					$_this = $this->buf;
					$_this->b = ($_this->b??'null') . (\mb_chr(44)??'null');
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:75: characters 11-22
					$p = ($a->arr[$i] ?? null);
					$s = json_encode($p->name);
					$_gthis->buf->add($s);
					$_this1 = $_gthis->buf;
					$_this1->b = ($_this1->b??'null') . (\mb_chr(58)??'null');
					$_gthis->writeValue($p->value);
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:78: characters 9-23
				$_this = $this->buf;
				$_this->b = ($_this->b??'null') . (\mb_chr(125)??'null');
			}
		}
	}
}

Boot::registerClass(BasicWriter::class, 'tink.json.BasicWriter');
