<?php
/**
 */

namespace tink\core;

use \php\Boot;

/**
 * A simple implementation of the OwnedDisposable,
 * where actual disposal is passed in via the constructor.
 */
class SimpleDisposable implements OwnedDisposable {
	/**
	 * @var \Closure[]|\Array_hx
	 */
	public $disposeHandlers;
	/**
	 * @var \Closure
	 */
	public $f;

	/**
	 * @return void
	 */
	public static function noop () {
	}

	/**
	 * @param \Closure $dispose
	 * 
	 * @return void
	 */
	public function __construct ($dispose) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:47: characters 47-49
		$this->disposeHandlers = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:60: characters 5-21
		$this->f = $dispose;
	}

	/**
	 * @return void
	 */
	public function dispose () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:63: characters 12-27
		$_g = $this->disposeHandlers;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:64: lines 64-71
		if ($_g !== null) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:65: characters 12-13
			$v = $_g;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:66: characters 9-31
			$this->disposeHandlers = null;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:67: characters 9-19
			$f = $this->f;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:68: characters 9-22
			$this->f = Boot::getStaticClosure(SimpleDisposable::class, 'noop');
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:69: characters 9-12
			$f();
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:70: lines 70-71
			$_g = 0;
			while ($_g < $v->length) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:70: characters 14-15
				$h = ($v->arr[$_g] ?? null);
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:70: lines 70-71
				++$_g;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:71: characters 11-14
				$h();
			}
		}
	}

	/**
	 * @return bool
	 */
	public function get_disposed () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:51: characters 7-37
		return $this->disposeHandlers === null;
	}

	/**
	 * @param \Closure $d
	 * 
	 * @return void
	 */
	public function ondispose ($d) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:54: characters 12-27
		$_g = $this->disposeHandlers;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:55: lines 55-56
		if ($_g === null) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:55: characters 18-21
			$d();
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:56: characters 12-13
			$v = $_g;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Disposable.hx:56: characters 15-24
			$v->arr[$v->length++] = $d;
		}
	}
}

Boot::registerClass(SimpleDisposable::class, 'tink.core.SimpleDisposable');
Boot::registerGetters('tink\\core\\SimpleDisposable', [
	'disposed' => true
]);
