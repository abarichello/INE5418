<?php
/**
 */

namespace tink\io\_Worker;

use \tink\core\_Future\SyncFuture;
use \tink\core\_Lazy\LazyObject;
use \php\Boot;
use \tink\io\WorkerObject;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Lazy\Lazy_Impl_;
use \tink\core\_Future\FutureObject;

class EagerWorker implements WorkerObject {
	/**
	 * @return void
	 */
	public function __construct () {
	}

	/**
	 * @param LazyObject $task
	 * 
	 * @return FutureObject
	 */
	public function work ($task) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Worker.hx:36: characters 12-35
		return new SyncFuture(new LazyConst(Lazy_Impl_::get($task)));
	}
}

Boot::registerClass(EagerWorker::class, 'tink.io._Worker.EagerWorker');
