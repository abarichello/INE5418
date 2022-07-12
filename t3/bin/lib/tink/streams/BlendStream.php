<?php
/**
 */

namespace tink\streams;

use \php\Boot;
use \tink\core\_Future\Future_Impl_;

class BlendStream extends Generator {
	/**
	 * @param StreamObject $a
	 * @param StreamObject $b
	 * 
	 * @return void
	 */
	public function __construct ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:659: characters 5-22
		$first = null;
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:661: lines 661-666
		$wait = function ($s) use (&$first) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:662: lines 662-665
			return Future_Impl_::map($s->next(), function ($o) use (&$first, &$s) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:663: characters 9-36
				if ($first === null) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:663: characters 27-36
					$first = $s;
				}
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:664: characters 9-17
				return $o;
			});
		};
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:668: characters 5-22
		$n1 = $wait($a);
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:669: characters 5-22
		$n2 = $wait($b);
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:671: lines 671-680
		parent::__construct(Future_Impl_::async(function ($cb) use (&$n2, &$n1, &$first, &$b, &$a) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:672: lines 672-679
			Future_Impl_::first($n1, $n2)->handle(function ($o) use (&$n2, &$n1, &$first, &$b, &$cb, &$a) {
				$__hx__switch = ($o->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:673: characters 19-23
					$item = $o->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:673: characters 25-29
					$rest = $o->params[1];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:674: characters 11-68
					$cb(Step::Link($item, new BlendStream($rest, ($first === $a ? $b : $a))));
				} else if ($__hx__switch === 1) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:677: characters 19-20
					$e = $o->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:678: characters 11-22
					$cb(Step::Fail($e));
				} else if ($__hx__switch === 2) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:676: characters 11-44
					Boot::deref((($first === $a ? $n2 : $n1)))->handle($cb);
				}
			});
		}));
	}
}

Boot::registerClass(BlendStream::class, 'tink.streams.BlendStream');
