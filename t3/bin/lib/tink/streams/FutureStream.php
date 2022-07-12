<?php
/**
 */

namespace tink\streams;

use \php\Boot;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Future\FutureObject;

class FutureStream extends StreamBase {
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
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:644: characters 5-15
		parent::__construct();
		$this->f = $f;
	}

	/**
	 * @param \Closure $handler
	 * 
	 * @return FutureObject
	 */
	public function forEach ($handler) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:649: lines 649-653
		$_gthis = $this;
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:650: lines 650-652
		return Future_Impl_::async(function ($cb) use (&$_gthis, &$handler) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:651: characters 7-59
			$_gthis->f->handle(function ($s) use (&$handler, &$cb) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:651: characters 29-58
				$s->forEach($handler)->handle($cb);
			});
		});
	}

	/**
	 * @return FutureObject
	 */
	public function next () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:647: characters 5-50
		return Future_Impl_::flatMap($this->f, function ($s) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:647: characters 34-49
			return $s->next();
		});
	}
}

Boot::registerClass(FutureStream::class, 'tink.streams.FutureStream');
