<?php
/**
 */

namespace tink\json\_Writer;

use \php\Boot;

class StringWriter {
	/**
	 * @param mixed $v
	 * 
	 * @return string
	 */
	public static function stringify ($v) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:130: characters 9-54
		return json_encode($v);
	}
}

Boot::registerClass(StringWriter::class, 'tink.json._Writer.StringWriter');
