<?php
/**
 */

namespace tink\http\_Response;

use \php\Boot;
use \tink\streams\StreamObject;
use \tink\http\ResponseHeaderBase;
use \tink\http\Message;

class OutgoingResponseData extends Message {
	/**
	 * @param ResponseHeaderBase $header
	 * @param StreamObject $body
	 * 
	 * @return void
	 */
	public function __construct ($header, $body) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:61: characters 9-83
		parent::__construct($header, $body);
	}
}

Boot::registerClass(OutgoingResponseData::class, 'tink.http._Response.OutgoingResponseData');
