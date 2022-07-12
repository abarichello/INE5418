<?php
/**
 */

namespace tink\querystring;

use \php\_Boot\HxAnon;
use \php\Boot;
use \haxe\Exception;
use \tink\core\_Callback\Callback_Impl_;
use \tink\core\TypedError;
use \tink\core\Outcome;
use \php\_Boot\HxString;
use \haxe\ds\StringMap;

class ParserBase {
	/**
	 * @var StringMap
	 */
	public $exists;
	/**
	 * @var \Closure
	 */
	public $onError;
	/**
	 * @var StringMap
	 */
	public $params;
	/**
	 * @var object
	 */
	public $pos;
	/**
	 * @var Outcome
	 */
	public $result;

	/**
	 * @param \Closure $onError
	 * @param object $pos
	 * 
	 * @return void
	 */
	public function __construct ($onError = null, $pos = null) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:20: characters 5-19
		$this->pos = $pos;
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:21: lines 21-24
		$tmp = null;
		if ($onError === null) {
			$tmp = Boot::getInstanceClosure($this, 'abort');
		} else {
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:23: characters 12-13
			$v = $onError;
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:21: lines 21-24
			$tmp = $v;
		}
		$this->onError = $tmp;
	}

	/**
	 * @param object $e
	 * 
	 * @return void
	 */
	public function abort ($e) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:55: characters 5-10
		throw Exception::thrown($this->error("" . ($e->reason??'null') . " for " . ($e->name??'null')));
	}

	/**
	 * @param string $field
	 * @param Outcome $o
	 * 
	 * @return mixed
	 */
	public function attempt ($field, $o) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:67: lines 67-70
		$__hx__switch = ($o->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:68: characters 20-21
			$v = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:68: characters 24-25
			return $v;
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:69: characters 20-21
			$e = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:69: characters 24-46
			return $this->fail($field, $e->message);
		}
	}

	/**
	 * @param string $reason
	 * @param mixed $data
	 * 
	 * @return TypedError
	 */
	public function error ($reason, $data = null) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:73: characters 5-66
		return TypedError::withData(422, $reason, $data, $this->pos);
	}

	/**
	 * @param string $field
	 * @param string $reason
	 * 
	 * @return mixed
	 */
	public function fail ($field, $reason) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:76: characters 5-51
		Callback_Impl_::invoke($this->onError, new _HxAnon_ParserBase0($field, $reason));
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:77: characters 5-16
		return null;
	}

	/**
	 * @param object $input
	 * @param \Closure $name
	 * @param \Closure $value
	 * 
	 * @return void
	 */
	public function init ($input, $name, $value) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:28: characters 5-28
		$this->params = new StringMap();
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:29: characters 5-28
		$this->exists = new StringMap();
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:31: lines 31-50
		if ($input !== null) {
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:32: characters 20-25
			$pair = $input;
			while ($pair->hasNext()) {
				#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:32: lines 32-50
				$pair1 = $pair->next();
				#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:33: characters 9-31
				$name1 = $name($pair1);
				#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:34: characters 9-35
				$this1 = $this->params;
				$v = $value($pair1);
				$this1->data[$name1] = $v;
				#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:35: characters 9-31
				$end = mb_strlen($name1);
				#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:37: lines 37-49
				while ($end > 0) {
					#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:39: characters 11-40
					$name1 = HxString::substring($name1, 0, $end);
					#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:41: characters 11-34
					if (($this->exists->data[$name1] ?? null)) {
						#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:41: characters 29-34
						break;
					}
					#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:43: characters 11-30
					$this->exists->data[$name1] = true;
					#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:45: characters 51-81
					$_g = HxString::lastIndexOf($name1, ".", $end - 1);
					#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:46: characters 19-20
					$a = HxString::lastIndexOf($name1, "[", $end - 1);
					#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:46: characters 22-23
					$b = $_g;
					#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:46: lines 46-47
					if ($a > $b) {
						#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:46: characters 37-44
						$end = $a;
					} else {
						#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:47: characters 22-23
						$b1 = $_g;
						#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:47: characters 26-33
						$end = $b1;
					}
				}
			}
		}
	}

	/**
	 * @param string $name
	 * 
	 * @return mixed
	 */
	public function missing ($name) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:81: characters 5-39
		return $this->fail($name, "Missing value");
	}

	/**
	 * @param mixed $input
	 * 
	 * @return mixed
	 */
	public function parse ($input) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:58: characters 12-17
		throw Exception::thrown(TypedError::withData(501, "not implemented", $this->pos, new _HxAnon_ParserBase1("tink/querystring/Parser.hx", 58, "tink.querystring.ParserBase", "parse")));
	}

	/**
	 * @param mixed $input
	 * 
	 * @return Outcome
	 */
	public function tryParse ($input) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:62: lines 62-64
		try {
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:62: characters 11-32
			return Outcome::Success($this->parse($input));
		} catch(\Throwable $_g) {
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:63: characters 14-15
			$_g1 = Exception::caught($_g)->unwrap();
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:62: lines 62-64
			if (($_g1 instanceof TypedError)) {
				#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:63: characters 14-15
				$e = $_g1;
				#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:63: characters 23-33
				return Outcome::Failure($e);
			} else {
				#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:64: characters 14-15
				$e = $_g1;
				#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Parser.hx:64: characters 25-57
				return Outcome::Failure($this->error("Parse Error", $e));
			}
		}
	}
}

class _HxAnon_ParserBase0 extends HxAnon {
	function __construct($name, $reason) {
		$this->name = $name;
		$this->reason = $reason;
	}
}

class _HxAnon_ParserBase1 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(ParserBase::class, 'tink.querystring.ParserBase');
