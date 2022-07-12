<?php
/**
 */

namespace tink\http;

use \php\Boot;

class RequestHeader extends Header {
	/**
	 * @var string
	 */
	public $method;
	/**
	 * @var string
	 */
	public $protocol;
	/**
	 * @var object
	 */
	public $url;

	/**
	 * @param string $method
	 * @param object $url
	 * @param string $protocol
	 * @param HeaderField[]|\Array_hx $fields
	 * 
	 * @return void
	 */
	public function __construct ($method, $url, $protocol, $fields) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:20: lines 20-25
		if ($protocol === null) {
			$protocol = "HTTP/1.1";
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:21: characters 5-25
		$this->method = $method;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:22: characters 5-19
		$this->url = $url;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:23: characters 5-29
		$this->protocol = $protocol;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:24: characters 5-18
		parent::__construct($fields);
	}

	/**
	 * @param HeaderField[]|\Array_hx $fields
	 * 
	 * @return RequestHeader
	 */
	public function concat ($fields) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:28: characters 30-36
		$tmp = $this->method;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:28: characters 38-41
		$tmp1 = $this->url;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:28: characters 43-51
		$tmp2 = $this->protocol;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:28: characters 5-80
		return new RequestHeader($tmp, $tmp1, $tmp2, $this->fields->concat($fields));
	}

	/**
	 * @return string
	 */
	public function toString () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:31: characters 23-40
		$this1 = $this->url;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:31: characters 5-79
		return "" . ($this->method??'null') . " " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null') . " " . ($this->protocol??'null') . "\x0D\x0A" . (parent::toString()??'null');
	}

	public function __toString() {
		return $this->toString();
	}
}

Boot::registerClass(RequestHeader::class, 'tink.http.RequestHeader');
