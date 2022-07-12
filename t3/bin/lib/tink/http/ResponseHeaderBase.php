<?php
/**
 */

namespace tink\http;

use \php\_Boot\HxAnon;
use \tink\io\StreamParserObject;
use \php\Boot;
use \tink\core\TypedError;
use \tink\core\Outcome;
use \php\_Boot\HxString;
use \httpstatus\_HttpStatusMessage\HttpStatusMessage_Impl_;

class ResponseHeaderBase extends Header {
	/**
	 * @var string
	 */
	public $protocol;
	/**
	 * @var string
	 */
	public $reason;
	/**
	 * @var int
	 */
	public $statusCode;

	/**
	 * @return StreamParserObject
	 */
	public static function parser () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:51: lines 51-58
		return new HeaderParser(function ($line, $headers) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:53: characters 14-15
			$v = HxString::split($line, " ");
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:53: lines 53-56
			if ($v->length >= 3) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:54: characters 19-94
				$statusCode = \Std::parseInt(($v->arr[1] ?? null));
				$reason = $v->slice(2)->join(" ");
				$protocol = ($v->arr[0] ?? null);
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:54: characters 89-93
				if ($protocol === null) {
					$protocol = "HTTP/1.1";
				}
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:54: characters 19-94
				$this1 = new ResponseHeaderBase($statusCode, $reason, $headers, $protocol);
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:54: characters 11-95
				return Outcome::Success($this1);
			} else {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:56: characters 11-82
				return Outcome::Failure(new TypedError(422, "Invalid HTTP response header", new _HxAnon_ResponseHeaderBase0("tink/http/Response.hx", 56, "tink.http.ResponseHeaderBase", "parser")));
			}
		});
	}

	/**
	 * @param int $statusCode
	 * @param string $reason
	 * @param HeaderField[]|\Array_hx $fields
	 * @param string $protocol
	 * 
	 * @return void
	 */
	public function __construct ($statusCode, $reason = null, $fields = null, $protocol = "HTTP/1.1") {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:37: lines 37-42
		if ($protocol === null) {
			$protocol = "HTTP/1.1";
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:38: characters 5-33
		$this->statusCode = $statusCode;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:39: characters 19-55
		$tmp = null;
		if ($reason === null) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:39: characters 36-46
			$this1 = HttpStatusMessage_Impl_::fromCode($statusCode);
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:39: characters 19-55
			$tmp = $this1;
		} else {
			$tmp = $reason;
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:39: characters 5-55
		$this->reason = $tmp;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:40: characters 5-29
		$this->protocol = $protocol;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:41: characters 5-18
		parent::__construct($fields);
	}

	/**
	 * @param HeaderField[]|\Array_hx $fields
	 * 
	 * @return ResponseHeaderBase
	 */
	public function concat ($fields) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:45: characters 12-88
		$statusCode = $this->statusCode;
		$reason = $this->reason;
		$fields1 = $this->fields->concat($fields);
		$protocol = $this->protocol;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:45: characters 79-87
		if ($protocol === null) {
			$protocol = "HTTP/1.1";
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:45: characters 12-88
		$this1 = new ResponseHeaderBase($statusCode, $reason, $fields1, $protocol);
		return $this1;
	}

	/**
	 * @return string
	 */
	public function toString () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:48: characters 5-82
		return "" . ($this->protocol??'null') . " " . ($this->statusCode??'null') . " " . ($this->reason??'null') . "\x0D\x0A" . (parent::toString()??'null');
	}

	public function __toString() {
		return $this->toString();
	}
}

class _HxAnon_ResponseHeaderBase0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(ResponseHeaderBase::class, 'tink.http.ResponseHeaderBase');
