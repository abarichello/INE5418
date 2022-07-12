<?php
/**
 */

namespace tink\json\_Parser;

use \haxe\io\_BytesData\Container;
use \php\Boot;

class SliceData {
	/**
	 * @var int
	 */
	public $max;
	/**
	 * @var int
	 */
	public $min;
	/**
	 * @var Container
	 */
	public $source;

	/**
	 * @param Container $source
	 * @param int $min
	 * @param int $max
	 * 
	 * @return void
	 */
	public function __construct ($source, $min, $max) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:88: characters 5-25
		$this->source = $source;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:89: characters 5-19
		$this->min = $min;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.hx:90: characters 5-19
		$this->max = $max;
	}
}

Boot::registerClass(SliceData::class, 'tink.json._Parser.SliceData');