<?php
/**
 */

namespace tink\url\_Host;

use \php\Boot;
use \haxe\Exception;
use \php\_Boot\HxString;

final class Host_Impl_ {

	/**
	 * @param string $name
	 * @param int $port
	 * 
	 * @return string
	 */
	public static function _new ($name, $port = null) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:13: character 3
		$this1 = null;
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:15: lines 15-17
		if ($port === null) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:15: characters 25-29
			$this1 = $name;
		} else if (($port > 65535) || ($port <= 0)) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:16: characters 43-48
			throw Exception::thrown("Invalid port");
		} else {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:17: characters 13-24
			$this1 = "" . ($name??'null') . ":" . ($port??'null');
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:13: character 3
		return $this1;
	}

	/**
	 * @param string $this
	 * 
	 * @return string
	 */
	public static function get_name ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:21: lines 21-26
		if ($this1 === null) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:21: characters 25-29
			return null;
		} else {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:22: characters 19-34
			$_g = HxString::split($this1, "]");
			$__hx__switch = ($_g->length);
			if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:23: characters 17-18
				$v = ($_g->arr[0] ?? null);
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:23: characters 21-36
				return (HxString::split($v, ":")->arr[0] ?? null);
			} else if ($__hx__switch === 2) {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:22: characters 19-34
				$_g1 = ($_g->arr[1] ?? null);
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:24: characters 17-18
				$v = ($_g->arr[0] ?? null);
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:24: characters 24-31
				return ($v??'null') . "]";
			} else {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:25: characters 20-25
				throw Exception::thrown("assert");
			}
		}
	}

	/**
	 * @param string $this
	 * 
	 * @return int
	 */
	public static function get_port ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:30: lines 30-39
		if ($this1 === null) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:30: characters 25-29
			return null;
		} else {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:32: characters 16-31
			$_g = HxString::split($this1, "]");
			$__hx__switch = ($_g->length);
			if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:33: characters 17-18
				$v = ($_g->arr[0] ?? null);
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:34: characters 22-37
				$_g1 = (HxString::split($v, ":")->arr[1] ?? null);
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:35: lines 35-36
				if ($_g1 === null) {
					#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:35: characters 30-34
					return null;
				} else {
					#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:36: characters 24-25
					$p = $_g1;
					#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:36: characters 27-42
					return \Std::parseInt($p);
				}
			} else if ($__hx__switch === 2) {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:32: characters 16-31
				$_g1 = ($_g->arr[0] ?? null);
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:33: characters 26-27
				$v = ($_g->arr[1] ?? null);
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:34: characters 22-37
				$_g = (HxString::split($v, ":")->arr[1] ?? null);
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:35: lines 35-36
				if ($_g === null) {
					#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:35: characters 30-34
					return null;
				} else {
					#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:36: characters 24-25
					$p = $_g;
					#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:36: characters 27-42
					return \Std::parseInt($p);
				}
			} else {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:38: characters 20-25
				throw Exception::thrown("assert");
			}
		}
	}

	/**
	 * @param string $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Host.hx:42: characters 5-16
		return $this1;
	}
}

Boot::registerClass(Host_Impl_::class, 'tink.url._Host.Host_Impl_');
Boot::registerGetters('tink\\url\\_Host\\Host_Impl_', [
	'port' => true,
	'name' => true
]);
