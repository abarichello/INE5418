<?php
/**
 */

namespace tink\http;

use \php\Boot;
use \tink\core\_Future\FutureObject;

class SimpleHandler implements HandlerObject {
	/**
	 * @var \Closure
	 */
	public $f;

	/**
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public function __construct ($f) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Handler.hx:102: characters 5-15
		$this->f = $f;
	}

	/**
	 * @param IncomingRequest $req
	 * 
	 * @return FutureObject
	 */
	public function process ($req) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Handler.hx:105: characters 5-18
		return ($this->f)($req);
	}
}

Boot::registerClass(SimpleHandler::class, 'tink.http.SimpleHandler');
