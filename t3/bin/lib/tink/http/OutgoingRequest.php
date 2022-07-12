<?php
/**
 */

namespace tink\http;

use \php\Boot;
use \tink\streams\StreamObject;

class OutgoingRequest extends Message {
	/**
	 * @param OutgoingRequestHeader $header
	 * @param StreamObject $body
	 * 
	 * @return void
	 */
	public function __construct ($header, $body) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:147: characters 1-77
		parent::__construct($header, $body);
	}
}

Boot::registerClass(OutgoingRequest::class, 'tink.http.OutgoingRequest');
