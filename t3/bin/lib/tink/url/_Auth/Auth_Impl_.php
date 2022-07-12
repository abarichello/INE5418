<?php
/**
 */

namespace tink\url\_Auth;

use \php\Boot;
use \php\_Boot\HxString;

final class Auth_Impl_ {

	/**
	 * @param string $user
	 * @param string $password
	 * 
	 * @return string
	 */
	public static function _new ($user, $password) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Auth.hx:11: character 3
		$this1 = "" . ($user??'null') . ":" . ($password??'null');
		return $this1;
	}

	/**
	 * @param string $this
	 * 
	 * @return string
	 */
	public static function get_password ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Auth.hx:21: lines 21-22
		if ($this1 === null) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Auth.hx:21: characters 25-29
			return null;
		} else {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Auth.hx:22: characters 12-30
			return (HxString::split($this1, ":")->arr[1] ?? null);
		}
	}

	/**
	 * @param string $this
	 * 
	 * @return string
	 */
	public static function get_user ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Auth.hx:16: lines 16-17
		if ($this1 === null) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Auth.hx:16: characters 25-29
			return null;
		} else {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Auth.hx:17: characters 12-30
			return (HxString::split($this1, ":")->arr[0] ?? null);
		}
	}

	/**
	 * @param string $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Auth.hx:25: characters 12-46
		if ($this1 === null) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Auth.hx:25: characters 30-32
			return "";
		} else {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Auth.hx:25: characters 39-45
			return "" . ($this1??'null') . "@";
		}
	}
}

Boot::registerClass(Auth_Impl_::class, 'tink.url._Auth.Auth_Impl_');
Boot::registerGetters('tink\\url\\_Auth\\Auth_Impl_', [
	'password' => true,
	'user' => true
]);