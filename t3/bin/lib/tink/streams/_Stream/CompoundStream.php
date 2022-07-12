<?php
/**
 */

namespace tink\streams\_Stream;

use \tink\streams\StreamBase;
use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\streams\Step;
use \tink\streams\StreamObject;
use \tink\core\_Lazy\LazyConst;
use \tink\streams\Empty_hx;
use \tink\core\_Future\Future_Impl_;
use \tink\streams\Conclusion;
use \tink\core\_Future\FutureObject;

class CompoundStream extends StreamBase {
	/**
	 * @var StreamObject[]|\Array_hx
	 */
	public $parts;

	/**
	 * @param StreamObject[]|\Array_hx $parts
	 * @param \Closure $handler
	 * @param \Closure $cb
	 * 
	 * @return void
	 */
	public static function consumeParts ($parts, $handler, $cb) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:596: lines 596-625
		if ($parts->length === 0) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:597: characters 7-19
			$cb(Conclusion::Depleted());
		} else {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:599: lines 599-625
			($parts->arr[0] ?? null)->forEach($handler)->handle(function ($o) use (&$parts, &$handler, &$cb) {
				$__hx__switch = ($o->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:604: characters 21-25
					$rest = $o->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:606: characters 11-31
					$parts = (clone $parts);
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:607: characters 11-26
					$parts->offsetSet(0, $rest);
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:608: characters 11-48
					$cb(Conclusion::Halted(new CompoundStream($parts)));
				} else if ($__hx__switch === 1) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:610: characters 22-23
					$e = $o->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:610: characters 25-27
					$at = $o->params[1];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:612: lines 612-617
					if ($at->get_depleted()) {
						#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:613: characters 13-35
						$parts = $parts->slice(1);
					} else {
						#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:615: characters 13-33
						$parts = (clone $parts);
						#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:616: characters 13-26
						$parts->offsetSet(0, $at);
					}
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:619: characters 11-52
					$cb(Conclusion::Clogged($e, new CompoundStream($parts)));
				} else if ($__hx__switch === 2) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:621: characters 21-22
					$e = $o->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:623: characters 11-24
					$cb(Conclusion::Failed($e));
				} else if ($__hx__switch === 3) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:602: characters 11-52
					CompoundStream::consumeParts($parts->slice(1), $handler, $cb);
				}
			});
		}
	}

	/**
	 * @param StreamObject[]|\Array_hx $streams
	 * 
	 * @return StreamObject
	 */
	public static function of ($streams) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:629: characters 5-18
		$ret = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:631: lines 631-632
		$_g = 0;
		while ($_g < $streams->length) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:631: characters 10-11
			$s = ($streams->arr[$_g] ?? null);
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:631: lines 631-632
			++$_g;
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:632: characters 7-23
			$s->decompose($ret);
		}
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:635: lines 635-636
		if ($ret->length === 0) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:635: characters 28-40
			return Empty_hx::$inst;
		} else {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:636: characters 12-35
			return new CompoundStream($ret);
		}
	}

	/**
	 * @param StreamObject[]|\Array_hx $parts
	 * 
	 * @return void
	 */
	public function __construct ($parts) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:567: characters 5-23
		parent::__construct();
		$this->parts = $parts;
	}

	/**
	 * @param StreamObject[]|\Array_hx $into
	 * 
	 * @return void
	 */
	public function decompose ($into) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:589: lines 589-590
		$_g = 0;
		$_g1 = $this->parts;
		while ($_g < $_g1->length) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:589: characters 10-11
			$p = ($_g1->arr[$_g] ?? null);
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:589: lines 589-590
			++$_g;
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:590: characters 7-24
			$p->decompose($into);
		}
	}

	/**
	 * @param \Closure $handler
	 * 
	 * @return FutureObject
	 */
	public function forEach ($handler) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:593: characters 43-53
		$parts = $this->parts;
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:593: characters 55-62
		$handler1 = $handler;
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:593: characters 5-67
		return Future_Impl_::async(function ($cb) use (&$handler1, &$parts) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:593: characters 25-42
			CompoundStream::consumeParts($parts, $handler1, $cb);
		});
	}

	/**
	 * @return bool
	 */
	public function get_depleted () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:570: characters 19-31
		$__hx__switch = ($this->parts->length);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:571: characters 15-19
			return true;
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:572: characters 15-32
			return ($this->parts->arr[0] ?? null)->get_depleted();
		} else {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:573: characters 16-21
			return false;
		}
	}

	/**
	 * @return FutureObject
	 */
	public function next () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:576: lines 576-586
		$_gthis = $this;
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:577: lines 577-585
		if ($this->parts->length === 0) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:577: characters 34-55
			return new SyncFuture(new LazyConst(Step::End()));
		} else {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:578: lines 578-585
			return Future_Impl_::flatMap(($this->parts->arr[0] ?? null)->next(), function ($v) use (&$_gthis) {
				$__hx__switch = ($v->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:580: characters 17-18
					$v1 = $v->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:580: characters 20-24
					$rest = $v->params[1];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:581: characters 9-33
					$copy = (clone $_gthis->parts);
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:582: characters 9-23
					$copy->offsetSet(0, $rest);
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:583: characters 9-55
					return new SyncFuture(new LazyConst(Step::Link($v1, new CompoundStream($copy))));
				} else if ($__hx__switch === 2) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:579: lines 579-584
					if ($_gthis->parts->length > 1) {
						#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:579: characters 38-53
						return ($_gthis->parts->arr[1] ?? null)->next();
					} else {
						#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:584: characters 16-30
						return new SyncFuture(new LazyConst($v));
					}
				} else {
					return new SyncFuture(new LazyConst($v));
				}
			});
		}
	}
}

Boot::registerClass(CompoundStream::class, 'tink.streams._Stream.CompoundStream');
