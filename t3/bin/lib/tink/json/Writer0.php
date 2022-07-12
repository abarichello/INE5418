<?php
/**
 */

namespace tink\json;

use \php\Boot;

class Writer0 extends BasicWriter {
	/**
	 * @return void
	 */
	public function __construct () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/Macro.hx:147: characters 29-36
		parent::__construct();
	}

	/**
	 * @param object $value
	 * 
	 * @return void
	 */
	public function process0 ($value) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenWriter.hx:127: characters 9-28
		$__first = true;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenWriter.hx:128: characters 9-28
		$_this = $this->buf;
		$_this->b = ($_this->b??'null') . (\mb_chr(123)??'null');
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenWriter.hx:159: characters 19-59
		$value1 = $value->result;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenWriter.hx:135: lines 135-136
		if ($__first) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenWriter.hx:135: characters 25-40
			$__first = false;
		} else {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenWriter.hx:136: characters 18-37
			$_this = $this->buf;
			$_this->b = ($_this->b??'null') . (\mb_chr(44)??'null');
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenWriter.hx:137: characters 13-35
		$this->buf->add("\"result\":");
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenWriter.hx:30: characters 18-38
		$s = \Std::string($value1);
		$this->buf->add($s);
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenWriter.hx:164: characters 9-28
		$_this = $this->buf;
		$_this->b = ($_this->b??'null') . (\mb_chr(125)??'null');
	}

	/**
	 * @param object $value
	 * 
	 * @return string
	 */
	public function write ($value) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/Macro.hx:159: characters 9-20
		$this->init();
		#Server.hx:45: lines 45-50
		$this->process0($value);
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/Macro.hx:161: characters 9-40
		return $this->buf->b;
	}
}

Boot::registerClass(Writer0::class, 'tink.json.Writer0');
