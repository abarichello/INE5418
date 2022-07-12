<?php
/**
 */

namespace tink\core;

use \php\Boot;

/**
 * A disposable object that also exposes the means to dispose it.
 */
interface OwnedDisposable extends Disposable {
	/**
	 * @return void
	 */
	public function dispose () ;
}

Boot::registerClass(OwnedDisposable::class, 'tink.core.OwnedDisposable');
