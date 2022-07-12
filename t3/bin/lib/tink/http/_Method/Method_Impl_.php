<?php
/**
 */

namespace tink\http\_Method;

use \php\Boot;

final class Method_Impl_ {

	/**
	 * @param string $s
	 * @param \Closure $fallback
	 * 
	 * @return string
	 */
	public static function ofString ($s, $fallback) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Method.hx:14: characters 19-34
		$_g = \mb_strtoupper($s);
		if ($_g === "DELETE") {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Method.hx:21: characters 22-28
			return "DELETE";
		} else if ($_g === "GET") {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Method.hx:15: characters 19-22
			return "GET";
		} else if ($_g === "HEAD") {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Method.hx:16: characters 20-24
			return "HEAD";
		} else if ($_g === "OPTIONS") {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Method.hx:17: characters 23-30
			return "OPTIONS";
		} else if ($_g === "PATCH") {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Method.hx:20: characters 21-26
			return "PATCH";
		} else if ($_g === "POST") {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Method.hx:18: characters 20-24
			return "POST";
		} else if ($_g === "PUT") {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Method.hx:19: characters 19-22
			return "PUT";
		} else {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Method.hx:22: characters 12-13
			$v = $_g;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Method.hx:22: characters 15-26
			return $fallback($v);
		}
	}
}

Boot::registerClass(Method_Impl_::class, 'tink.http._Method.Method_Impl_');
