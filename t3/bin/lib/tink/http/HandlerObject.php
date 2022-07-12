<?php
/**
 */

namespace tink\http;

use \php\Boot;
use \tink\core\_Future\FutureObject;

interface HandlerObject {
	/**
	 * @param IncomingRequest $req
	 * 
	 * @return FutureObject
	 */
	public function process ($req) ;
}

Boot::registerClass(HandlerObject::class, 'tink.http.HandlerObject');
