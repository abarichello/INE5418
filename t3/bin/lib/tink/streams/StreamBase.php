<?php
/**
 */

namespace tink\streams;

use \tink\streams\_Stream\RegroupStream;
use \php\Boot;
use \haxe\Exception;
use \tink\streams\_Stream\Handler_Impl_;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Future\FutureObject;
use \tink\streams\_Stream\CompoundStream;

class StreamBase implements StreamObject {
	/**
	 * @var int
	 */
	public $retainCount;

	/**
	 * @return void
	 */
	public function __construct () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:345: characters 21-22
		$this->retainCount = 0;
	}

	/**
	 * @param StreamObject $other
	 * 
	 * @return StreamObject
	 */
	public function append ($other) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:385: lines 385-386
		if ($this->get_depleted()) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:385: characters 21-26
			return $other;
		} else {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:386: characters 12-44
			return CompoundStream::of(\Array_hx::wrap([
				$this,
				$other,
			]));
		}
	}

	/**
	 * @param StreamObject $other
	 * 
	 * @return StreamObject
	 */
	public function blend ($other) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:395: lines 395-396
		if ($this->get_depleted()) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:395: characters 21-26
			return $other;
		} else {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:396: characters 12-40
			return new BlendStream($this, $other);
		}
	}

	/**
	 * @param StreamObject[]|\Array_hx $into
	 * 
	 * @return void
	 */
	public function decompose ($into) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:399: lines 399-400
		if (!$this->get_depleted()) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:400: characters 7-22
			$into->arr[$into->length++] = $this;
		}
	}

	/**
	 * @return void
	 */
	public function destroy () {
	}

	/**
	 * @param object $f
	 * 
	 * @return StreamObject
	 */
	public function filter ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:379: characters 5-22
		return $this->regroup($f);
	}

	/**
	 * @param \Closure $handler
	 * 
	 * @return FutureObject
	 */
	public function forEach ($handler) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:424: characters 12-17
		throw Exception::thrown("not implemented");
	}

	/**
	 * @return bool
	 */
	public function get_depleted () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:343: characters 29-41
		return false;
	}

	/**
	 * @param \Closure $rescue
	 * 
	 * @return StreamObject
	 */
	public function idealize ($rescue) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:404: lines 404-405
		if ($this->get_depleted()) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:404: characters 21-33
			return Empty_hx::$inst;
		} else {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:405: characters 12-44
			return new IdealizeStream($this, $rescue);
		}
	}

	/**
	 * @param object $f
	 * 
	 * @return StreamObject
	 */
	public function map ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:376: characters 5-22
		return $this->regroup($f);
	}

	/**
	 * @return FutureObject
	 */
	public function next () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:360: characters 5-10
		throw Exception::thrown("not implemented");
	}

	/**
	 * @param StreamObject $other
	 * 
	 * @return StreamObject
	 */
	public function prepend ($other) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:390: lines 390-391
		if ($this->get_depleted()) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:390: characters 21-26
			return $other;
		} else {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:391: characters 12-44
			return CompoundStream::of(\Array_hx::wrap([
				$other,
				$this,
			]));
		}
	}

	/**
	 * @param mixed $initial
	 * @param \Closure $reducer
	 * 
	 * @return FutureObject
	 */
	public function reduce ($initial, $reducer) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:408: lines 408-421
		$_gthis = $this;
		return Future_Impl_::async(function ($cb) use (&$reducer, &$_gthis, &$initial) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:409: lines 409-420
			$_gthis->forEach(Handler_Impl_::ofUnknown(function ($item) use (&$reducer, &$initial) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:410: lines 410-414
				return Future_Impl_::map($reducer($initial, $item), function ($o) use (&$initial) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:411: lines 411-414
					$__hx__switch = ($o->index);
					if ($__hx__switch === 0) {
						#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:412: characters 27-28
						$v = $o->params[0];
						#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:412: characters 31-42
						$initial = $v;
						#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:412: characters 44-50
						return Handled::Resume();
					} else if ($__hx__switch === 1) {
						#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:413: characters 24-25
						$e = $o->params[0];
						#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:413: characters 28-35
						return Handled::Clog($e);
					}
				});
			}))->handle(function ($c) use (&$initial, &$cb) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:415: lines 415-420
				$__hx__switch = ($c->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:418: characters 21-22
					$_g = $c->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:418: characters 25-30
					throw Exception::thrown("assert");
				} else if ($__hx__switch === 1) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:419: characters 22-23
					$e = $c->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:419: characters 25-29
					$rest = $c->params[1];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:419: characters 32-52
					$cb(Reduction::Crashed($e, $rest));
				} else if ($__hx__switch === 2) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:416: characters 21-22
					$e = $c->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:416: characters 25-38
					$cb(Reduction::Failed($e));
				} else if ($__hx__switch === 3) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:417: characters 24-44
					$cb(Reduction::Reduced($initial));
				}
			});
		});
	}

	/**
	 * @param object $f
	 * 
	 * @return StreamObject
	 */
	public function regroup ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:373: characters 5-38
		return new RegroupStream($this, $f);
	}

	/**
	 * @return \Closure
	 */
	public function retain () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:347: lines 347-357
		$_gthis = $this;
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:348: characters 5-18
		$this->retainCount++;
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:349: characters 5-25
		$retained = true;
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:350: lines 350-356
		return function () use (&$retained, &$_gthis) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:351: lines 351-355
			if ($retained) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:352: characters 9-25
				$retained = false;
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:353: lines 353-354
				if (--$_gthis->retainCount === 0) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:354: characters 11-20
					$_gthis->destroy();
				}
			}
		};
	}
}

Boot::registerClass(StreamBase::class, 'tink.streams.StreamBase');
Boot::registerGetters('tink\\streams\\StreamBase', [
	'depleted' => true
]);
