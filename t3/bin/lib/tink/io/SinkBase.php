<?php
/**
 */

namespace tink\io;

use \php\Boot;
use \haxe\Exception;
use \tink\streams\StreamObject;
use \tink\core\_Future\FutureObject;

class SinkBase implements SinkObject {

	/**
	 * @param StreamObject $source
	 * @param object $options
	 * 
	 * @return FutureObject
	 */
	public function consume ($source, $options) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:116: characters 12-17
		throw Exception::thrown("not implemented");
	}

	/**
	 * @return bool
	 */
	public function get_sealed () {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:113: characters 27-38
		return true;
	}
}

Boot::registerClass(SinkBase::class, 'tink.io.SinkBase');
Boot::registerGetters('tink\\io\\SinkBase', [
	'sealed' => true
]);
