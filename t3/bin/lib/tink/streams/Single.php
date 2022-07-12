<?php
/**
 */

namespace tink\streams;

use \tink\core\_Future\SyncFuture;
use \tink\core\_Lazy\LazyObject;
use \php\Boot;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Lazy\Lazy_Impl_;
use \tink\core\_Future\FutureObject;

class Single extends StreamBase {
	/**
	 * @var LazyObject
	 */
	public $value;

	/**
	 * @param LazyObject $value
	 * 
	 * @return void
	 */
	public function __construct ($value) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:467: characters 5-23
		parent::__construct();
		$this->value = $value;
	}

	/**
	 * @param \Closure $handle
	 * 
	 * @return FutureObject
	 */
	public function forEach ($handle) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:473: lines 473-482
		$_gthis = $this;
		return Future_Impl_::map($handle(Lazy_Impl_::get($this->value)), function ($step) use (&$_gthis) {
			$__hx__switch = ($step->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:475: characters 9-21
				return Conclusion::Halted($_gthis);
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:477: characters 9-29
				return Conclusion::Halted(Empty_hx::$inst);
			} else if ($__hx__switch === 2) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:479: characters 9-17
				return Conclusion::Depleted();
			} else if ($__hx__switch === 3) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:480: characters 17-18
				$e = $step->params[0];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:481: characters 9-25
				return Conclusion::Clogged($e, $_gthis);
			}
		});
	}

	/**
	 * @return FutureObject
	 */
	public function next () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:470: characters 29-40
		$v = Lazy_Impl_::get($this->value);
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:470: characters 12-56
		return new SyncFuture(new LazyConst(Step::Link($v, Empty_hx::$inst)));
	}
}

Boot::registerClass(Single::class, 'tink.streams.Single');
