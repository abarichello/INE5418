<?php
/**
 */

namespace tink\io;

use \tink\core\_Lazy\LazyObject;
use \php\Boot;
use \tink\core\_Future\FutureObject;

interface WorkerObject {
	/**
	 * @param LazyObject $task
	 * 
	 * @return FutureObject
	 */
	public function work ($task) ;
}

Boot::registerClass(WorkerObject::class, 'tink.io.WorkerObject');
