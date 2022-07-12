<?php
/**
 */

namespace tink\http;

use \php\_Boot\HxAnon;
use \haxe\ds\Option;
use \php\Boot;
use \php\_Boot\HxString;
use \tink\http\_Header\HeaderValue_Impl_;
use \tink\_Url\Url_Impl_;

class OutgoingRequestHeader extends RequestHeader {
	/**
	 * @param object $url
	 * 
	 * @return Option
	 */
	public static function extractAuth ($url) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:129: characters 19-27
		$_g = $url->auth;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:130: lines 130-140
		if ($_g === null) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:130: characters 18-22
			return Option::None();
		} else {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:131: characters 12-13
			$v = $_g;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:133: characters 20-95
			$tmp = \Array_hx::wrap([new HeaderField("authorization", HeaderValue_Impl_::basicAuth(($v === null ? null : (HxString::split($v, ":")->arr[0] ?? null)), ($v === null ? null : (HxString::split($v, ":")->arr[1] ?? null))))]);
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:135: characters 21-31
			$url1 = $url->scheme;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:136: characters 20-49
			$_g = new \Array_hx();
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:136: characters 21-48
			$_g1 = 0;
			$_g2 = $url->hosts;
			while ($_g1 < $_g2->length) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:136: characters 25-29
				$host = ($_g2->arr[$_g1] ?? null);
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:136: characters 21-48
				++$_g1;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:136: characters 44-48
				$_g->arr[$_g->length++] = $host;
			}
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:132: lines 132-140
			return Option::Some(new _HxAnon_OutgoingRequestHeader0($tmp, Url_Impl_::make(new _HxAnon_OutgoingRequestHeader1($url1, $_g, $url->path, $url->query))));
		}
	}

	/**
	 * @param string $method
	 * @param object $url
	 * @param string $protocol
	 * @param HeaderField[]|\Array_hx $fields
	 * 
	 * @return void
	 */
	public function __construct ($method, $url, $protocol, $fields) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:118: lines 118-126
		if ($protocol === null) {
			$protocol = "HTTP/1.1";
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:119: characters 13-29
		$_g = OutgoingRequestHeader::extractAuth($url);
		if ($_g->index === 0) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:120: characters 17-18
			$v = $_g->params[0];
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:121: characters 9-20
			$url = $v->url;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:122: characters 9-42
			$fields = $fields->concat($v->headers);
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:125: characters 5-41
		parent::__construct($method, $url, $protocol, $fields);
	}

	/**
	 * @param HeaderField[]|\Array_hx $fields
	 * 
	 * @return OutgoingRequestHeader
	 */
	public function concat ($fields) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:144: characters 38-44
		$tmp = $this->method;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:144: characters 46-49
		$tmp1 = $this->url;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:144: characters 51-59
		$tmp2 = $this->protocol;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:144: characters 5-88
		return new OutgoingRequestHeader($tmp, $tmp1, $tmp2, $this->fields->concat($fields));
	}
}

class _HxAnon_OutgoingRequestHeader1 extends HxAnon {
	function __construct($scheme, $hosts, $path, $query) {
		$this->scheme = $scheme;
		$this->hosts = $hosts;
		$this->path = $path;
		$this->query = $query;
	}
}

class _HxAnon_OutgoingRequestHeader0 extends HxAnon {
	function __construct($headers, $url) {
		$this->headers = $headers;
		$this->url = $url;
	}
}

Boot::registerClass(OutgoingRequestHeader::class, 'tink.http.OutgoingRequestHeader');
