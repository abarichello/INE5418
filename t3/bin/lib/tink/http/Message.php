<?php
/**
 */

namespace tink\http;

use \php\Boot;

class Message {
	/**
	 * @var mixed
	 */
	public $body;
	/**
	 * @var mixed
	 */
	public $header;

	/**
	 * @param mixed $header
	 * @param mixed $body
	 * 
	 * @return void
	 */
	public function __construct ($header, $body) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Message.hx:9: characters 5-25
		$this->header = $header;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Message.hx:10: characters 5-21
		$this->body = $body;
	}
}

Boot::registerClass(Message::class, 'tink.http.Message');
