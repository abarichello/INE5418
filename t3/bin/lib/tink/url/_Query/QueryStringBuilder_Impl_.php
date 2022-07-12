<?php
/**
 */

namespace tink\url\_Query;

use \php\Boot;

final class QueryStringBuilder_Impl_ {
	/**
	 * @return string[]|\Array_hx
	 */
	public static function _new () {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:62: character 3
		$this1 = new \Array_hx();
		return $this1;
	}

	/**
	 * @param string[]|\Array_hx $this
	 * @param string $name
	 * @param string $value
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function add ($this1, $name, $value) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:67: characters 5-42
		$this1->arr[$this1->length++] = ($name??'null') . "=" . ($value??'null');
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:68: characters 5-21
		return $this1;
	}

	/**
	 * @param string[]|\Array_hx $this
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function copy ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:75: characters 5-28
		return (clone $this1);
	}

	/**
	 * @param string[]|\Array_hx $this
	 * @param string $sep
	 * 
	 * @return string
	 */
	public static function toString ($this1, $sep = "&") {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:72: characters 5-26
		if ($sep === null) {
			$sep = "&";
		}
		return $this1->join($sep);
	}
}

Boot::registerClass(QueryStringBuilder_Impl_::class, 'tink.url._Query.QueryStringBuilder_Impl_');
