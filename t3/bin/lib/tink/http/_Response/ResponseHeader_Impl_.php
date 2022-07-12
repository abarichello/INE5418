<?php
/**
 */

namespace tink\http\_Response;

use \tink\http\HeaderField;
use \tink\io\StreamParserObject;
use \php\Boot;
use \tink\http\ResponseHeaderBase;

final class ResponseHeader_Impl_ {
	/**
	 * @param int $statusCode
	 * @param string $reason
	 * @param HeaderField[]|\Array_hx $fields
	 * @param string $protocol
	 * 
	 * @return ResponseHeaderBase
	 */
	public static function _new ($statusCode, $reason = null, $fields = null, $protocol = "HTTP/1.1") {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:16: character 3
		if ($protocol === null) {
			$protocol = "HTTP/1.1";
		}
		$this1 = new ResponseHeaderBase($statusCode, $reason, $fields, $protocol);
		return $this1;
	}

	/**
	 * @param HeaderField[]|\Array_hx $fields
	 * 
	 * @return ResponseHeaderBase
	 */
	public static function fromHeaderFields ($fields) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:25: characters 12-42
		$this1 = new ResponseHeaderBase(200, null, $fields, "HTTP/1.1");
		return $this1;
	}

	/**
	 * @param int $code
	 * 
	 * @return ResponseHeaderBase
	 */
	public static function fromStatusCode ($code) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:21: characters 12-36
		$this1 = new ResponseHeaderBase($code, null, null, "HTTP/1.1");
		return $this1;
	}

	/**
	 * @return StreamParserObject
	 */
	public static function parser () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:28: characters 5-39
		return ResponseHeaderBase::parser();
	}
}

Boot::registerClass(ResponseHeader_Impl_::class, 'tink.http._Response.ResponseHeader_Impl_');
