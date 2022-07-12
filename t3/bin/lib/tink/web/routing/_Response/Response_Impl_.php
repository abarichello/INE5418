<?php
/**
 */

namespace tink\web\routing\_Response;

use \tink\chunk\ChunkObject;
use \haxe\io\_BytesData\Container;
use \tink\http\HeaderField;
use \tink\io\RealSourceTools;
use \php\Boot;
use \tink\io\_Source\Source_Impl_;
use \tink\streams\Single;
use \tink\streams\StreamObject;
use \tink\chunk\ByteChunk;
use \tink\http\ResponseHeaderBase;
use \tink\core\_Lazy\LazyConst;
use \httpstatus\_HttpStatusMessage\HttpStatusMessage_Impl_;
use \tink\_Url\Url_Impl_;
use \tink\http\_Response\OutgoingResponseData;
use \tink\http\_Response\OutgoingResponse_Impl_;
use \tink\_Chunk\Chunk_Impl_;
use \haxe\io\Bytes;

final class Response_Impl_ {
	/**
	 * @var string
	 */
	const BINARY = "application/octet-stream";

	/**
	 * @param int $code
	 * @param string $contentType
	 * @param Bytes $bytes
	 * @param HeaderField[]|\Array_hx $headers
	 * 
	 * @return OutgoingResponseData
	 */
	public static function binary ($code, $contentType, $bytes, $headers = null) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:50: characters 5-68
		if ($code === null) {
			$code = 200;
		}
		return OutgoingResponse_Impl_::blob($code, ByteChunk::of($bytes), $contentType, $headers);
	}

	/**
	 * @param int $code
	 * 
	 * @return OutgoingResponseData
	 */
	public static function empty ($code = 200) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:54: characters 5-117
		if ($code === null) {
			$code = 200;
		}
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:54: characters 58-62
		$this1 = HttpStatusMessage_Impl_::fromCode($code);
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:54: characters 33-103
		$this2 = new ResponseHeaderBase($code, $this1, \Array_hx::wrap([new HeaderField("content-length", "0")]), "HTTP/1.1");
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:54: characters 12-117
		$this1 = new OutgoingResponseData($this2, new Single(new LazyConst(Chunk_Impl_::$EMPTY)));
		return $this1;
	}

	/**
	 * @param ChunkObject $c
	 * 
	 * @return OutgoingResponseData
	 */
	public static function fromChunk ($c) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:25: characters 5-22
		return Response_Impl_::ofChunk($c);
	}

	/**
	 * @param StreamObject $source
	 * 
	 * @return OutgoingResponseData
	 */
	public static function fromIdealSource ($source) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:37: characters 5-33
		return Response_Impl_::ofIdealSource($source);
	}

	/**
	 * @param StreamObject $source
	 * 
	 * @return OutgoingResponseData
	 */
	public static function fromRealSource ($source) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:34: characters 5-74
		return Response_Impl_::ofRealSource(RealSourceTools::idealize($source, function ($_) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:34: characters 53-72
			return Source_Impl_::$EMPTY;
		}));
	}

	/**
	 * @param Bytes $b
	 * 
	 * @return OutgoingResponseData
	 */
	public static function ofBytes ($b) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:22: characters 5-29
		return Response_Impl_::binary(null, "application/octet-stream", $b);
	}

	/**
	 * @param ChunkObject $c
	 * @param string $contentType
	 * 
	 * @return OutgoingResponseData
	 */
	public static function ofChunk ($c, $contentType = "application/octet-stream") {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:16: characters 5-40
		if ($contentType === null) {
			$contentType = "application/octet-stream";
		}
		return Response_Impl_::binary(null, $contentType, $c->toBytes());
	}

	/**
	 * @param StreamObject $source
	 * @param string $contentType
	 * 
	 * @return OutgoingResponseData
	 */
	public static function ofIdealSource ($source, $contentType = "application/octet-stream") {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:31: characters 5-114
		if ($contentType === null) {
			$contentType = "application/octet-stream";
		}
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:31: characters 56-58
		$this1 = HttpStatusMessage_Impl_::fromCode(200);
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:31: characters 33-105
		$this2 = new ResponseHeaderBase(200, $this1, \Array_hx::wrap([new HeaderField("content-type", $contentType)]), "HTTP/1.1");
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:31: characters 12-114
		$this1 = new OutgoingResponseData($this2, $source);
		return $this1;
	}

	/**
	 * @param StreamObject $source
	 * @param string $contentType
	 * 
	 * @return OutgoingResponseData
	 */
	public static function ofRealSource ($source, $contentType = "application/octet-stream") {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:28: characters 5-156
		if ($contentType === null) {
			$contentType = "application/octet-stream";
		}
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:28: characters 56-58
		$this1 = HttpStatusMessage_Impl_::fromCode(200);
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:28: characters 33-105
		$this2 = new ResponseHeaderBase(200, $this1, \Array_hx::wrap([new HeaderField("content-type", $contentType)]), "HTTP/1.1");
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:28: characters 12-156
		$this1 = new OutgoingResponseData($this2, RealSourceTools::idealize($source, function ($_) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:28: characters 135-154
			return Source_Impl_::$EMPTY;
		}));
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:28: characters 12-156
		return $this1;
	}

	/**
	 * @param string $s
	 * 
	 * @return OutgoingResponseData
	 */
	public static function ofString ($s) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:19: characters 5-36
		return Response_Impl_::textual(null, "text/plain", $s);
	}

	/**
	 * @param object $u
	 * 
	 * @return OutgoingResponseData
	 */
	public static function ofUrl ($u) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:45: characters 59-64
		$this1 = HttpStatusMessage_Impl_::fromCode(302);
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:45: characters 84-92
		$this2 = \mb_strtolower("location");
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:45: characters 33-99
		$this3 = new ResponseHeaderBase(302, $this1, \Array_hx::wrap([new HeaderField($this2, Url_Impl_::toString($u))]), "HTTP/1.1");
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:45: characters 12-113
		$this1 = new OutgoingResponseData($this3, new Single(new LazyConst(Chunk_Impl_::$EMPTY)));
		return $this1;
	}

	/**
	 * @param int $code
	 * @param string $contentType
	 * @param string $string
	 * @param HeaderField[]|\Array_hx $headers
	 * 
	 * @return OutgoingResponseData
	 */
	public static function textual ($code, $contentType, $string, $headers = null) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:58: characters 5-70
		if ($code === null) {
			$code = 200;
		}
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:58: characters 38-60
		$tmp = \strlen($string);
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Response.hx:58: characters 5-70
		return Response_Impl_::binary($code, $contentType, new Bytes($tmp, new Container($string)), $headers);
	}
}

Boot::registerClass(Response_Impl_::class, 'tink.web.routing._Response.Response_Impl_');
