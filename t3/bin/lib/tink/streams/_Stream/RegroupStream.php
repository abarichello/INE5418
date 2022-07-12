<?php
/**
 */

namespace tink\streams\_Stream;

use \tink\core\_Lazy\LazyFunc;
use \tink\streams\RegroupStatus;
use \php\Boot;
use \tink\streams\StreamObject;
use \tink\streams\Handled;
use \tink\streams\Empty_hx;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Lazy\Lazy_Impl_;

class RegroupStream extends CompoundStream {
	/**
	 * @param StreamObject $source
	 * @param object $f
	 * @param StreamObject $prev
	 * @param mixed[]|\Array_hx $buf
	 * 
	 * @return void
	 */
	public function __construct ($source, $f, $prev = null, $buf = null) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:107: characters 5-41
		if ($prev === null) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:107: characters 22-41
			$prev = Empty_hx::$inst;
		}
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:108: characters 5-29
		if ($buf === null) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:108: characters 21-29
			$buf = new \Array_hx();
		}
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:110: characters 5-20
		$ret = null;
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:111: characters 5-28
		$terminated = false;
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:112: lines 112-141
		$next = Stream_Impl_::future(Future_Impl_::map($source->forEach(Handler_Impl_::ofUnknown(function ($item) use (&$terminated, &$f, &$buf, &$ret) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:113: characters 7-21
			$buf->arr[$buf->length++] = $item;
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:114: lines 114-127
			return Future_Impl_::map($f->apply($buf, RegroupStatus::Flowing()), function ($o) use (&$terminated, &$buf, &$ret) {
				$__hx__switch = ($o->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:115: characters 24-25
					$v = $o->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:115: characters 27-36
					$untouched = $o->params[1];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:116: characters 11-18
					$ret = $v;
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:117: characters 11-26
					$buf = $untouched;
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:118: characters 11-17
					return Handled::Finish();
				} else if ($__hx__switch === 1) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:119: characters 25-26
					$v = $o->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:120: characters 17-33
					$l = new LazyFunc(Boot::getStaticClosure(Empty_hx::class, 'make'));
					if ($v->index === 0) {
						$v1 = $v->params[0];
						$ret = $v1;
					} else {
						$ret = Lazy_Impl_::get($l);
					}
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:121: characters 11-28
					$terminated = true;
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:122: characters 11-17
					return Handled::Finish();
				} else if ($__hx__switch === 2) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:124: characters 11-17
					return Handled::Resume();
				} else if ($__hx__switch === 3) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:125: characters 22-23
					$e = $o->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:126: characters 11-18
					return Handled::Clog($e);
				}
			});
		})), function ($o) use (&$terminated, &$f, &$buf, &$ret) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:128: lines 128-141
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:138: lines 138-139
				if ($terminated) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:138: characters 38-41
					return $ret;
				} else {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:139: characters 19-23
					$rest = $o->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:139: characters 26-62
					return new RegroupStream($rest, $f, $ret, $buf);
				}
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:140: characters 23-24
				$_g = $o->params[1];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:140: characters 20-21
				$e = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:140: characters 27-50
				return new ErrorStream($e);
			} else if ($__hx__switch === 2) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:129: characters 19-20
				$e = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:129: characters 23-40
				return Stream_Impl_::ofError($e);
			} else if ($__hx__switch === 3) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:130: lines 130-137
				if ($buf->length === 0) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:130: characters 42-54
					return Empty_hx::$inst;
				} else {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:132: lines 132-137
					return Stream_Impl_::future(Future_Impl_::map($f->apply($buf, RegroupStatus::Ended()), function ($o) {
						$__hx__switch = ($o->index);
						if ($__hx__switch === 0) {
							#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:133: characters 16-28
							$_g = $o->params[1];
							#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:133: characters 26-27
							$v = $o->params[0];
							#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:133: characters 30-31
							return $v;
						} else if ($__hx__switch === 1) {
							#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:134: characters 27-28
							$v = $o->params[0];
							#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:134: characters 31-47
							$l = new LazyFunc(Boot::getStaticClosure(Empty_hx::class, 'make'));
							if ($v->index === 0) {
								$v1 = $v->params[0];
								return $v1;
							} else {
								return Lazy_Impl_::get($l);
							}
						} else if ($__hx__switch === 2) {
							#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:135: characters 27-39
							return Empty_hx::$inst;
						} else if ($__hx__switch === 3) {
							#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:136: characters 24-25
							$e = $o->params[0];
							#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:136: characters 28-50
							return Stream_Impl_::ofError($e);
						}
					}));
				}
			}
		}));
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:144: characters 5-24
		parent::__construct(\Array_hx::wrap([
			$prev,
			$next,
		]));
	}
}

Boot::registerClass(RegroupStream::class, 'tink.streams._Stream.RegroupStream');