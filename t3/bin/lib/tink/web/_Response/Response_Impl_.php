<?php
/**
 */

namespace tink\web\_Response;

use \php\Boot;
use \tink\http\ResponseHeaderBase;
use \tink\http\Message;

final class Response_Impl_ {
	/**
	 * @param ResponseHeaderBase $header
	 * @param mixed $body
	 * 
	 * @return Message
	 */
	public static function _new ($header, $body) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/Response.hx:10: character 2
		$this1 = new Message($header, $body);
		return $this1;
	}

	/**
	 * @param Message $this
	 * 
	 * @return mixed
	 */
	public static function getData ($this1) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/Response.hx:15: characters 3-19
		return $this1->body;
	}
}

Boot::registerClass(Response_Impl_::class, 'tink.web._Response.Response_Impl_');
