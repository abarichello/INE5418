<?php
/**
 */

namespace tink\streams;

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Future\FutureObject;

class Empty_hx extends StreamBase {
	/**
	 * @var Empty_hx
	 */
	static public $inst;

	/**
	 * @return StreamObject
	 */
	public static function make () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:276: characters 5-47
		return Empty_hx::$inst;
	}

	/**
	 * @return void
	 */
	public function __construct () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:262: characters 18-20
		parent::__construct();
	}

	/**
	 * @param \Closure $handler
	 * 
	 * @return FutureObject
	 */
	public function forEach ($handler) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:271: characters 5-33
		return new SyncFuture(new LazyConst(Conclusion::Depleted()));
	}

	/**
	 * @return bool
	 */
	public function get_depleted () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:265: characters 5-16
		return true;
	}

	/**
	 * @return FutureObject
	 */
	public function next () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:268: characters 5-33
		return new SyncFuture(new LazyConst(Step::End()));
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$inst = new Empty_hx();
	}
}

Boot::registerClass(Empty_hx::class, 'tink.streams.Empty');
Empty_hx::__hx__init();