<?php
/**
 */

namespace tink\io\_Sink;

use \php\Boot;
use \tink\streams\StreamObject;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Future\FutureObject;
use \tink\io\SinkBase;

class FutureSink extends SinkBase {
	/**
	 * @var FutureObject
	 */
	public $f;

	/**
	 * @param FutureObject $f
	 * 
	 * @return void
	 */
	public function __construct ($f) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:83: characters 5-15
		$this->f = $f;
	}

	/**
	 * @param StreamObject $source
	 * @param object $options
	 * 
	 * @return FutureObject
	 */
	public function consume ($source, $options) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:86: characters 5-75
		return Future_Impl_::flatMap($this->f, function ($sink) use (&$source, &$options) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Sink.hx:86: characters 38-74
			return $sink->consume($source, $options);
		});
	}
}

Boot::registerClass(FutureSink::class, 'tink.io._Sink.FutureSink');