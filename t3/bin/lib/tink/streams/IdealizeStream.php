<?php
/**
 */

namespace tink\streams;

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Future\FutureObject;

class IdealizeStream extends IdealStreamBase {
	/**
	 * @var \Closure
	 */
	public $rescue;
	/**
	 * @var StreamObject
	 */
	public $target;

	/**
	 * @param StreamObject $target
	 * @param \Closure $rescue
	 * 
	 * @return void
	 */
	public function __construct ($target, $rescue) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:432: lines 432-435
		parent::__construct();
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:433: characters 5-25
		$this->target = $target;
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:434: characters 5-25
		$this->rescue = $rescue;
	}

	/**
	 * @param \Closure $handler
	 * 
	 * @return FutureObject
	 */
	public function forEach ($handler) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:447: lines 447-459
		$_gthis = $this;
		return Future_Impl_::async(function ($cb) use (&$_gthis, &$handler) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:449: lines 449-458
			$_gthis->target->forEach($handler)->handle(function ($end) use (&$_gthis, &$handler, &$cb) {
				$__hx__switch = ($end->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:452: characters 23-27
					$rest = $end->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:453: characters 13-46
					$cb(Conclusion::Halted($rest->idealize($_gthis->rescue)));
				} else if ($__hx__switch === 1) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:454: characters 24-25
					$e = $end->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:454: characters 27-29
					$at = $end->params[1];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:455: characters 13-48
					$cb(Conclusion::Clogged($e, $at->idealize($_gthis->rescue)));
				} else if ($__hx__switch === 2) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:456: characters 23-24
					$e = $end->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:457: characters 13-67
					($_gthis->rescue)($e)->idealize($_gthis->rescue)->forEach($handler)->handle($cb);
				} else if ($__hx__switch === 3) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:451: characters 13-25
					$cb(Conclusion::Depleted());
				}
			});
		});
	}

	/**
	 * @return bool
	 */
	public function get_depleted () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:438: characters 12-27
		return $this->target->get_depleted();
	}

	/**
	 * @return FutureObject
	 */
	public function next () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:441: lines 441-444
		$_gthis = $this;
		return Future_Impl_::flatMap($this->target->next(), function ($v) use (&$_gthis) {
			if ($v->index === 1) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:442: characters 17-18
				$e = $v->params[0];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:442: characters 21-54
				return ($_gthis->rescue)($e)->idealize($_gthis->rescue)->next();
			} else {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:443: characters 16-35
				return new SyncFuture(new LazyConst($v));
			}
		});
	}
}

Boot::registerClass(IdealizeStream::class, 'tink.streams.IdealizeStream');
