<?php
/**
 */

namespace tink\streams\_Stream;

use \tink\streams\StreamBase;
use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\streams\Step;
use \tink\core\TypedError;
use \tink\streams\StreamObject;
use \tink\core\_Lazy\LazyConst;
use \tink\streams\Conclusion;
use \tink\core\_Future\FutureObject;

class CloggedStream extends StreamBase {
	/**
	 * @var TypedError
	 */
	public $error;
	/**
	 * @var StreamObject
	 */
	public $rest;

	/**
	 * @param StreamObject $rest
	 * @param TypedError $error
	 * 
	 * @return void
	 */
	public function __construct ($rest, $error) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:178: lines 178-181
		parent::__construct();
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:179: characters 5-21
		$this->rest = $rest;
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:180: characters 5-23
		$this->error = $error;
	}

	/**
	 * @param \Closure $handler
	 * 
	 * @return FutureObject
	 */
	public function forEach ($handler) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:187: characters 12-61
		return new SyncFuture(new LazyConst(Conclusion::Clogged($this->error, $this->rest)));
	}

	/**
	 * @return FutureObject
	 */
	public function next () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:184: characters 12-41
		return new SyncFuture(new LazyConst(Step::Fail($this->error)));
	}
}

Boot::registerClass(CloggedStream::class, 'tink.streams._Stream.CloggedStream');