<?php
/**
 */

namespace tink\streams;

use \php\Boot;
use \tink\core\_Future\FutureObject;

interface StreamObject {
	/**
	 *  Append another stream after this
	 * 
	 * @param StreamObject $other
	 * 
	 * @return StreamObject
	 */
	public function append ($other) ;

	/**
	 * @param StreamObject $other
	 * 
	 * @return StreamObject
	 */
	public function blend ($other) ;

	/**
	 * @param StreamObject[]|\Array_hx $into
	 * 
	 * @return void
	 */
	public function decompose ($into) ;

	/**
	 *  Create a filtered stream
	 * 
	 * @param object $f
	 * 
	 * @return StreamObject
	 */
	public function filter ($f) ;

	/**
	 *  Iterate this stream.
	 *  The handler should return one of the following values (or a `Future` of it)
	 *  - Backoff: stop the iteration before the current item
	 *  - Finish: stop the iteration after the current item
	 *  - Resume: continue the iteration
	 *  - Clog(error): produce an error
	 *  @return A conclusion that indicates how the iteration was ended
	 *  - Depleted: there are no more data in the stream
	 *  - Failed(err): the stream produced an error
	 *  - Halted(rest): the iteration was halted by `Backoff` or `Finish`
	 *  - Clogged(err): the iteration was halted by `Clog(err)`
	 * 
	 * @param \Closure $handle
	 * 
	 * @return FutureObject
	 */
	public function forEach ($handle) ;

	/**
	 * @return bool
	 */
	public function get_depleted () ;

	/**
	 *  Create an IdealStream.
	 *  The stream returned from the `rescue` function will be recursively rescued by the same `rescue` function
	 * 
	 * @param \Closure $rescue
	 * 
	 * @return StreamObject
	 */
	public function idealize ($rescue) ;

	/**
	 *  Create a new stream by performing an 1-to-1 mapping
	 * 
	 * @param object $f
	 * 
	 * @return StreamObject
	 */
	public function map ($f) ;

	/**
	 * @return FutureObject
	 */
	public function next () ;

	/**
	 *  Prepend another stream before this
	 * 
	 * @param StreamObject $other
	 * 
	 * @return StreamObject
	 */
	public function prepend ($other) ;

	/**
	 *  Think Lambda.fold()
	 * 
	 * @param mixed $initial
	 * @param \Closure $reducer
	 * 
	 * @return FutureObject
	 */
	public function reduce ($initial, $reducer) ;

	/**
	 *  Create a new stream by performing an N-to-M mapping
	 * 
	 * @param object $f
	 * 
	 * @return StreamObject
	 */
	public function regroup ($f) ;

	/**
	 * @return \Closure
	 */
	public function retain () ;
}

Boot::registerClass(StreamObject::class, 'tink.streams.StreamObject');
Boot::registerGetters('tink\\streams\\StreamObject', [
	'depleted' => true
]);
