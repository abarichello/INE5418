<?php
/**
 */

namespace tink\io\_Worker;

use \tink\core\_Lazy\LazyObject;
use \php\Boot;
use \tink\io\WorkerObject;
use \tink\core\_Future\FutureObject;

final class Worker_Impl_ {
	/**
	 * @var WorkerObject
	 */
	static public $EAGER;
	/**
	 * @var WorkerObject[]|\Array_hx
	 */
	static public $pool;

	/**
	 * @param WorkerObject $this
	 * 
	 * @return WorkerObject
	 */
	public static function ensure ($this1) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Worker.hx:17: characters 12-45
		if ($this1 === null) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Worker.hx:17: characters 30-35
			return Worker_Impl_::get();
		} else {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Worker.hx:17: characters 41-45
			return $this1;
		}
	}

	/**
	 * @return WorkerObject
	 */
	public static function get () {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Worker.hx:20: characters 17-40
		$x = Worker_Impl_::$pool->length;
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Worker.hx:20: characters 5-41
		return (Worker_Impl_::$pool->arr[($x <= 1 ? 0 : \mt_rand(0, $x - 1))] ?? null);
	}

	/**
	 * @param WorkerObject $this
	 * @param LazyObject $task
	 * 
	 * @return FutureObject
	 */
	public static function work ($this1, $task) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Worker.hx:23: characters 5-27
		return $this1->work($task);
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


		self::$EAGER = new EagerWorker();
		self::$pool = \Array_hx::wrap([Worker_Impl_::$EAGER]);
	}
}

Boot::registerClass(Worker_Impl_::class, 'tink.io._Worker.Worker_Impl_');
Worker_Impl_::__hx__init();
