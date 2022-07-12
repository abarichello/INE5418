<?php
/**
 */

namespace tink\streams;

use \tink\core\_Signal\Signal_Impl_;
use \php\Boot;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Signal\SignalObject;

class SignalStream extends Generator {
	/**
	 * @param SignalObject $signal
	 * 
	 * @return void
	 */
	public function __construct ($signal) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:731: lines 731-735
		$this1 = Future_Impl_::map(Signal_Impl_::nextTime($signal), function ($o) use (&$signal) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:732: characters 19-23
				$data = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:732: characters 26-62
				return Step::Link($data, new SignalStream($signal));
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:733: characters 19-20
				$e = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:733: characters 23-30
				return Step::Fail($e);
			} else if ($__hx__switch === 2) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:734: characters 19-22
				return Step::End();
			}
		});
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:731: lines 731-735
		$this1->eager();
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:730: lines 730-736
		parent::__construct($this1);
	}
}

Boot::registerClass(SignalStream::class, 'tink.streams.SignalStream');
