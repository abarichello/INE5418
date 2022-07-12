<?php
/**
 */

namespace tink\querystring;

use \php\_Boot\HxAnon;
use \tink\core\NamedWith;
use \php\Boot;
use \tink\web\forms\_FormField\FormField_Impl_;
use \tink\http\BodyPart;

class Parser0 extends ParserBase {
	/**
	 * @param \Closure $onError
	 * @param object $pos
	 * 
	 * @return void
	 */
	public function __construct ($onError = null, $pos = null) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:114: lines 114-125
		parent::__construct($onError, $pos);
	}

	/**
	 * @param NamedWith $p
	 * 
	 * @return string
	 */
	public function getName ($p) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:116: characters 58-71
		return $p->name;
	}

	/**
	 * @param NamedWith $p
	 * 
	 * @return BodyPart
	 */
	public function getValue ($p) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:117: characters 59-73
		return $p->value;
	}

	/**
	 * @param object $input
	 * 
	 * @return object
	 */
	public function parse ($input) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:120: characters 9-25
		$prefix = "";
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:121: characters 9-44
		$this->init($input, Boot::getInstanceClosure($this, 'getName'), Boot::getInstanceClosure($this, 'getValue'));
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:122: characters 9-29
		return $this->process0($prefix);
	}

	/**
	 * @param string $prefix
	 * 
	 * @return object
	 */
	public function process0 ($prefix) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:194: characters 26-29
		$prefix1 = null;
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:194: lines 194-197
		if ($prefix === "") {
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:194: characters 26-29
			$prefix1 = "operands";
		} else {
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:196: characters 14-15
			$v = $prefix;
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:194: characters 26-29
			$prefix1 = ($v??'null') . ".operands";
		}
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:235: lines 235-236
		$counter = 0;
		$ret = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:238: lines 238-246
		while (true) {
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:239: characters 9-51
			$prefix = ($prefix1??'null') . "[" . ($counter??'null') . "]";
			#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:241: lines 241-245
			if (($this->exists->data[$prefix] ?? null)) {
				#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:242: characters 11-23
				$x = (($this->exists->data[$prefix] ?? null) ? FormField_Impl_::toInt(($this->params->data[$prefix] ?? null)) : $this->missing($prefix));
				$ret->arr[$ret->length++] = $x;
				#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:243: characters 11-20
				++$counter;
			} else {
				#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:245: characters 14-19
				break;
			}
		}
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:226: characters 7-46
		$__o = new _HxAnon_Parser00($ret);
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/macros/GenParser.hx:228: characters 7-10
		return $__o;
	}
}

class _HxAnon_Parser00 extends HxAnon {
	function __construct($_0) {
		$this->_0 = $_0;
	}
}

Boot::registerClass(Parser0::class, 'tink.querystring.Parser0');
