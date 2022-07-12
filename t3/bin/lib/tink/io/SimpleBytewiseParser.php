<?php
/**
 */

namespace tink\io;

use \php\Boot;

class SimpleBytewiseParser extends BytewiseParser {
	/**
	 * @var \Closure
	 */
	public $_read;

	/**
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public function __construct ($f) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:152: characters 5-19
		$this->_read = $f;
	}

	/**
	 * @param int $char
	 * 
	 * @return ParseStep
	 */
	public function read ($char) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:155: characters 5-23
		return ($this->_read)($char);
	}
}

Boot::registerClass(SimpleBytewiseParser::class, 'tink.io.SimpleBytewiseParser');
