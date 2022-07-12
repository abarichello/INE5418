<?php
/**
 */

namespace tink\core;

use \php\Boot;

class AlreadyDisposed implements OwnedDisposable {
	/**
	 * @var OwnedDisposable
	 */
	static public $INST;


	/**
	 * @return void
	 */
	public function __construct () {
	}

	/**
	 * @return void
	 */
	public function dispose () {
	}

	/**
	 * @return bool
	 */
	public function get_disposed () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:80: characters 29-40
		return true;
	}

	/**
	 * @param \Closure $d
	 * 
	 * @return void
	 */
	public function ondispose ($d) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:82: characters 41-44
		$d();
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


		self::$INST = new AlreadyDisposed();
	}
}

Boot::registerClass(AlreadyDisposed::class, 'tink.core.AlreadyDisposed');
Boot::registerGetters('tink\\core\\AlreadyDisposed', [
	'disposed' => true
]);
AlreadyDisposed::__hx__init();