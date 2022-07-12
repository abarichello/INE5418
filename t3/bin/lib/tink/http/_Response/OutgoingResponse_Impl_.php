<?php
/**
 */

namespace tink\http\_Response;

use \tink\chunk\ChunkObject;
use \php\_Boot\HxAnon;
use \haxe\io\_BytesData\Container;
use \tink\http\HeaderField;
use \php\Boot;
use \tink\streams\Single;
use \tink\core\TypedError;
use \tink\streams\StreamObject;
use \tink\chunk\ByteChunk;
use \tink\http\ResponseHeaderBase;
use \tink\core\_Lazy\LazyConst;
use \haxe\Json;
use \httpstatus\_HttpStatusMessage\HttpStatusMessage_Impl_;
use \haxe\io\Bytes;

final class OutgoingResponse_Impl_ {
	/**
	 * @param ResponseHeaderBase $header
	 * @param StreamObject $body
	 * 
	 * @return OutgoingResponseData
	 */
	public static function _new ($header, $body) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:65: character 3
		$this1 = new OutgoingResponseData($header, $body);
		return $this1;
	}

	/**
	 * @param int $code
	 * @param ChunkObject $chunk
	 * @param string $contentType
	 * @param HeaderField[]|\Array_hx $headers
	 * 
	 * @return OutgoingResponseData
	 */
	public static function blob ($code, $chunk, $contentType, $headers = null) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:69: lines 69-82
		if ($code === null) {
			$code = 200;
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:73: characters 13-17
		$this1 = HttpStatusMessage_Impl_::fromCode($code);
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:75: characters 32-44
		$this2 = \mb_strtolower("Content-Type");
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:75: characters 15-59
		$fields = new HeaderField($this2, $contentType);
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:76: characters 32-46
		$this2 = \mb_strtolower("Content-Length");
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:76: characters 49-73
		$fields1 = \Std::string($chunk->getLength());
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:77: lines 77-80
		$fields2 = null;
		if ($headers === null) {
			$fields2 = new \Array_hx();
		} else {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:79: characters 20-21
			$v = $headers;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:77: lines 77-80
			$fields2 = $v;
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:71: lines 71-80
		$this3 = new ResponseHeaderBase($code, $this1, (\Array_hx::wrap([
			$fields,
			new HeaderField($this2, $fields1),
		]))->concat($fields2), "HTTP/1.1");
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:70: lines 70-82
		$this1 = new OutgoingResponseData($this3, new Single(new LazyConst($chunk)));
		return $this1;
	}

	/**
	 * @param string $contentType
	 * @param mixed $headers
	 * @param StreamObject $source
	 * 
	 * @return void
	 */
	public static function chunked ($contentType, $headers, $source) {
	}

	/**
	 * @param ChunkObject $c
	 * 
	 * @return OutgoingResponseData
	 */
	public static function ofChunk ($c) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:93: characters 5-47
		return OutgoingResponse_Impl_::blob(null, $c, "application/octet-stream");
	}

	/**
	 * @param string $s
	 * 
	 * @return OutgoingResponseData
	 */
	public static function ofString ($s) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:90: characters 17-18
		$b = \strlen($s);
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:90: characters 5-33
		return OutgoingResponse_Impl_::blob(null, ByteChunk::of(new Bytes($b, new Container($s))), "text/plain");
	}

	/**
	 * @param TypedError $e
	 * 
	 * @return OutgoingResponseData
	 */
	public static function reportError ($e) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:96: characters 5-27
		$code = $e->code;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:97: characters 5-44
		if (($code < 100) || ($code > 999)) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:97: characters 34-44
			$code = 500;
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:99: characters 7-92
		$reason = HttpStatusMessage_Impl_::fromCode($code);
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:99: characters 56-68
		$this1 = \mb_strtolower("Content-Type");
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:99: characters 7-92
		$this2 = new ResponseHeaderBase($code, $reason, \Array_hx::wrap([new HeaderField($this1, "application/json")]), "HTTP/1.1");
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:100: lines 100-104
		$s = Json::phpJsonEncode(new _HxAnon_OutgoingResponse_Impl_0($e->message, $e->data), null, null);
		$b = \strlen($s);
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:98: lines 98-105
		$this1 = new OutgoingResponseData($this2, new Single(new LazyConst(ByteChunk::of(new Bytes($b, new Container($s))))));
		return $this1;
	}
}

class _HxAnon_OutgoingResponse_Impl_0 extends HxAnon {
	function __construct($error, $details) {
		$this->error = $error;
		$this->details = $details;
	}
}

Boot::registerClass(OutgoingResponse_Impl_::class, 'tink.http._Response.OutgoingResponse_Impl_');