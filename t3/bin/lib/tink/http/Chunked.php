<?php
/**
 */

namespace tink\http;

use \php\Boot;
use \tink\streams\StreamObject;

class Chunked {
	/**
	 * @var ChunkedDecoder
	 */
	static public $_decoder;
	/**
	 * @var ChunkedEncoder
	 */
	static public $_encoder;

	/**
	 * @param StreamObject $source
	 * 
	 * @return StreamObject
	 */
	public static function decode ($source) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:31: characters 3-37
		return Chunked::decoder()->transform($source);
	}

	/**
	 * @return ChunkedDecoder
	 */
	public static function decoder () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:23: characters 3-55
		if (Chunked::$_decoder === null) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:23: characters 24-55
			Chunked::$_decoder = new ChunkedDecoder();
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:24: characters 3-23
		return Chunked::$_decoder;
	}

	/**
	 * @param StreamObject $source
	 * 
	 * @return StreamObject
	 */
	public static function encode ($source) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:28: characters 3-37
		return Chunked::encoder()->transform($source);
	}

	/**
	 * @return ChunkedEncoder
	 */
	public static function encoder () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:18: characters 3-55
		if (Chunked::$_encoder === null) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:18: characters 24-55
			Chunked::$_encoder = new ChunkedEncoder();
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:19: characters 3-23
		return Chunked::$_encoder;
	}
}

Boot::registerClass(Chunked::class, 'tink.http.Chunked');
