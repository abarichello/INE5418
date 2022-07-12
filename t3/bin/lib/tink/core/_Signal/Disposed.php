<?php
/**
 */

namespace tink\core\_Signal;

use \php\Boot;
use \tink\core\LinkObject;
use \tink\core\AlreadyDisposed;

class Disposed extends AlreadyDisposed implements SignalObject {
	/**
	 * @var SignalObject
	 */
	static public $INST;

	/**
	 * @return void
	 */
	public function __construct () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:155: lines 155-161
		parent::__construct();
	}

	/**
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	public function listen ($cb) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Signal.hx:160: characters 5-16
		return null;
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


		self::$INST = new Disposed();
	}
}

Boot::registerClass(Disposed::class, 'tink.core._Signal.Disposed');
Disposed::__hx__init();
