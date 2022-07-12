<?php
/**
 */

namespace tink\streams;

use \php\Boot;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Future\FutureObject;

class Generator extends StreamBase {
	/**
	 * @var FutureObject
	 */
	public $upcoming;

	/**
	 * @param \Closure $step
	 * 
	 * @return Generator
	 */
	public static function stream ($step) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:717: characters 5-45
		return new Generator(Future_Impl_::async($step));
	}

	/**
	 * @param FutureObject $upcoming
	 * 
	 * @return void
	 */
	public function __construct ($upcoming) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:690: characters 5-29
		parent::__construct();
		$this->upcoming = $upcoming;
	}

	/**
	 * @param \Closure $handler
	 * 
	 * @return FutureObject
	 */
	public function forEach ($handler) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:696: lines 696-714
		$_gthis = $this;
		return Future_Impl_::async(function ($cb) use (&$_gthis, &$handler) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:697: lines 697-713
			$_gthis->upcoming->handle(function ($e) use (&$_gthis, &$handler, &$cb) {
				$__hx__switch = ($e->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:698: characters 19-20
					$v = $e->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:698: characters 22-26
					$then = $e->params[1];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:699: lines 699-708
					$handler($v)->handle(function ($s) use (&$then, &$_gthis, &$handler, &$cb) {
						$__hx__switch = ($s->index);
						if ($__hx__switch === 0) {
							#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:701: characters 15-31
							$cb(Conclusion::Halted($_gthis));
						} else if ($__hx__switch === 1) {
							#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:703: characters 15-31
							$cb(Conclusion::Halted($then));
						} else if ($__hx__switch === 2) {
							#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:705: characters 15-47
							$then->forEach($handler)->handle($cb);
						} else if ($__hx__switch === 3) {
							#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:706: characters 23-24
							$e = $s->params[0];
							#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:707: characters 15-35
							$cb(Conclusion::Clogged($e, $_gthis));
						}
					});
				} else if ($__hx__switch === 1) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:709: characters 19-20
					$e1 = $e->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:710: characters 11-24
					$cb(Conclusion::Failed($e1));
				} else if ($__hx__switch === 2) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:712: characters 11-23
					$cb(Conclusion::Depleted());
				}
			});
		});
	}

	/**
	 * @return FutureObject
	 */
	public function next () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:693: characters 5-20
		return $this->upcoming;
	}
}

Boot::registerClass(Generator::class, 'tink.streams.Generator');
