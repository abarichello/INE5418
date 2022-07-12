<?php
/**
 */

namespace tink\json\_Writer;

use \php\Boot;
use \haxe\format\JsonPrinter;

class StdWriter {
	/**
	 * @param mixed $v
	 * 
	 * @return string
	 */
	public static function stringify ($v) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Writer.hx:143: characters 5-44
		return JsonPrinter::print($v);
	}
}

Boot::registerClass(StdWriter::class, 'tink.json._Writer.StdWriter');
