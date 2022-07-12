<?php
/**
 */

namespace tink\core;

use \php\Boot;

/**
 *
 * An object that will be disposed at the end of life cycle.
 *
 * This interface only gives access to observing the disposed status,
 * but not allow disposing the object. For that @see OwnedDisposable
 *
 * Diposable objects should be satisfy the following conditions:
 *
 * - disposal should be implemented in such a way that the `disposed` property becomes `true`,
 *   then all handlers supplied to `ondispose` are invoked and then the actual teardown is performed
 *
 * - calling out from a disposable (e.g. by means of callbacks) to other objects mid-method may lead to disposal
 *   and therefore methods should be implemented in one of two ways:
 *
 *   - control should only be transferred outside at the end of a method
 *   - methods should be implemented in an abortable fashion, check for disposal when control is transferred back
 *   - and skip the remaining method (and possibly rollback already performed actions)
 *
 * - a diposable that is disposed should gracefully noop out any method calls performed on it:
 *
 *   - methods should return null objects
 *   - if the disposable has an error signaling mechanism, it can be used to communicate the occurence of such calls
 *   - methods returning promises should return failing promises
 *   - methods returning futures should preferably return futures yielding null objects, or alternatively
 */
interface Disposable {
	/**
	 * @return bool
	 */
	public function get_disposed () ;

	/**
	 * @param \Closure $d
	 * 
	 * @return void
	 */
	public function ondispose ($d) ;
}

Boot::registerClass(Disposable::class, 'tink.core.Disposable');
Boot::registerGetters('tink\\core\\Disposable', [
	'disposed' => true
]);
