<?php
/**
 */

namespace tink\http\_Header;

use \php\Boot;
use \haxe\IMap;

final class ReadonlyMap_Impl_ {
	/**
	 * @param IMap $this
	 * @param mixed $key
	 * 
	 * @return bool
	 */
	public static function exists ($this1, $key) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:17: characters 5-28
		return $this1->exists($key);
	}

	/**
	 * @param IMap $this
	 * @param mixed $key
	 * 
	 * @return mixed
	 */
	public static function get ($this1, $key) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:14: characters 5-25
		return $this1->get($key);
	}

	/**
	 * @param IMap $this
	 * 
	 * @return object
	 */
	public static function iterator ($this1) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:20: characters 5-27
		return $this1->iterator();
	}

	/**
	 * @param IMap $this
	 * 
	 * @return object
	 */
	public static function keys ($this1) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:23: characters 5-23
		return $this1->keys();
	}
}

Boot::registerClass(ReadonlyMap_Impl_::class, 'tink.http._Header.ReadonlyMap_Impl_');