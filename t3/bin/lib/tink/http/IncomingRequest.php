<?php
/**
 */

namespace tink\http;

use \php\_Boot\HxAnon;
use \tink\core\_Future\SyncFuture;
use \tink\io\RealSourceTools;
use \php\Boot;
use \tink\io\_Source\Source_Impl_;
use \tink\core\TypedError;
use \tink\streams\StreamObject;
use \tink\core\Outcome;
use \tink\core\_Lazy\LazyConst;
use \php\_Boot\HxString;
use \tink\core\_Promise\Promise_Impl_;
use \tink\core\_Future\FutureObject;

class IncomingRequest extends Message {
	/**
	 * @var string
	 */
	public $clientIp;

	/**
	 * @param string $clientIp
	 * @param StreamObject $source
	 * 
	 * @return FutureObject
	 */
	public static function parse ($clientIp, $source) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:159: lines 159-174
		return Promise_Impl_::next(RealSourceTools::parse($source, IncomingRequestHeader::parser()), function ($parts) use (&$clientIp) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:162: characters 11-19
			$clientIp1 = $clientIp;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:163: characters 11-18
			$parts1 = $parts->a;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:164: characters 24-50
			$_g = $parts->a->getContentLength();
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:164: lines 164-173
			$d = null;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:164: characters 24-50
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:165: characters 26-29
				$len = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:164: lines 164-173
				$d = Source_Impl_::limit($parts->b, $len);
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:167: characters 26-27
				$_g1 = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:168: characters 23-37
				$_g = $parts->a->method;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:168: characters 39-72
				$_g1 = $parts->a->byName("transfer-encoding");
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:168: characters 23-37
				if ($_g === "GET" || $_g === "OPTIONS") {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:164: lines 164-173
					$d = Source_Impl_::$EMPTY;
				} else {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:168: characters 39-72
					if ($_g1->index === 0) {
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:170: characters 34-77
						$_this = HxString::split($_g1->params[0], ",");
						$f = Boot::getStaticClosure(\StringTools::class, 'trim');
						$result = [];
						$data = $_this->arr;
						$_g_current = 0;
						$_g_length = \count($data);
						$_g_data = $data;
						while ($_g_current < $_g_length) {
							$item = $_g_data[$_g_current++];
							$result[] = $f($item);
						}
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:170: characters 81-90
						$encodings = \Array_hx::wrap($result);
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:170: lines 170-171
						if ($encodings->indexOf("chunked") !== -1) {
							#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:170: characters 133-156
							$source = $parts->b;
							#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:164: lines 164-173
							$d = Chunked::decoder()->transform($source);
						} else {
							#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:171: characters 25-79
							return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(411, "Content-Length header missing", new _HxAnon_IncomingRequest0("tink/http/Request.hx", 171, "tink.http.IncomingRequest", "parse")))));
						}
					} else {
						return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(411, "Content-Length header missing", new _HxAnon_IncomingRequest0("tink/http/Request.hx", 171, "tink.http.IncomingRequest", "parse")))));
					}
				}
			}
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:161: lines 161-174
			return new SyncFuture(new LazyConst(Outcome::Success(new IncomingRequest($clientIp1, $parts1, IncomingRequestBody::Plain($d)))));
		});
	}

	/**
	 * @param string $clientIp
	 * @param IncomingRequestHeader $header
	 * @param IncomingRequestBody $body
	 * 
	 * @return void
	 */
	public function __construct ($clientIp, $header, $body) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:154: characters 5-29
		$this->clientIp = $clientIp;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:155: characters 5-24
		parent::__construct($header, $body);
	}
}

class _HxAnon_IncomingRequest0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(IncomingRequest::class, 'tink.http.IncomingRequest');