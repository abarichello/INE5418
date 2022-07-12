<?php
/**
 */

namespace tink\http;

use \php\_Boot\HxAnon;
use \tink\core\_Future\SyncFuture;
use \tink\io\RealSourceTools;
use \php\Boot;
use \haxe\io\_BytesData\Container as _BytesDataContainer;
use \tink\streams\Single;
use \tink\core\TypedError;
use \tink\streams\StreamObject;
use \tink\chunk\ByteChunk;
use \tink\core\Outcome;
use \tink\core\_Lazy\LazyConst;
use \haxe\Json;
use \httpstatus\_HttpStatusMessage\HttpStatusMessage_Impl_;
use \tink\core\_Promise\Promise_Impl_;
use \haxe\io\Bytes;
use \tink\core\_Future\FutureObject;

class IncomingResponse extends Message {
	/**
	 * @param IncomingResponse $res
	 * 
	 * @return FutureObject
	 */
	public static function readAll ($res) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:112: lines 112-118
		return Promise_Impl_::next(RealSourceTools::all($res->body), function ($b) use (&$res) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:114: lines 114-117
			if ($res->header->statusCode >= 400) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:115: characters 11-90
				return new SyncFuture(new LazyConst(Outcome::Failure(TypedError::withData($res->header->statusCode, $res->header->reason, $b->toString(), new _HxAnon_IncomingResponse0("tink/http/Response.hx", 115, "tink.http.IncomingResponse", "readAll")))));
			} else {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:117: characters 11-21
				return new SyncFuture(new LazyConst(Outcome::Success($b)));
			}
		});
	}

	/**
	 * @param TypedError $e
	 * 
	 * @return IncomingResponse
	 */
	public static function reportError ($e) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:122: characters 7-96
		$statusCode = $e->code;
		$reason = HttpStatusMessage_Impl_::fromCode($e->code);
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:122: characters 60-72
		$this1 = \mb_strtolower("Content-Type");
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:122: characters 7-96
		$this2 = new ResponseHeaderBase($statusCode, $reason, \Array_hx::wrap([new HeaderField($this1, "application/json")]), "HTTP/1.1");
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:123: lines 123-127
		$s = Json::phpJsonEncode(new _HxAnon_IncomingResponse1($e->message, $e->data), null, null);
		$b = \strlen($s);
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:121: lines 121-128
		return new IncomingResponse($this2, new Single(new LazyConst(ByteChunk::of(new Bytes($b, new _BytesDataContainer($s))))));
	}

	/**
	 * @param ResponseHeaderBase $header
	 * @param StreamObject $body
	 * 
	 * @return void
	 */
	public function __construct ($header, $body) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Response.hx:109: lines 109-131
		parent::__construct($header, $body);
	}
}

class _HxAnon_IncomingResponse0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

class _HxAnon_IncomingResponse1 extends HxAnon {
	function __construct($error, $details) {
		$this->error = $error;
		$this->details = $details;
	}
}

Boot::registerClass(IncomingResponse::class, 'tink.http.IncomingResponse');
