<?php
/**
 */

namespace tink\querystring\_Pairs;

use \php\Boot;
use \tink\url\_Query\QueryStringParser;

final class Pairs_Impl_ {
	/**
	 * @param object $i
	 * 
	 * @return object
	 */
	public static function ofIterable ($i) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Pairs.hx:16: characters 5-24
		return $i->iterator();
	}

	/**
	 * @param string $s
	 * 
	 * @return object
	 */
	public static function portions ($s) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Pairs.hx:10: characters 5-61
		return new QueryStringParser($s, "&", "=", 0);
	}

	/**
	 * @param object $u
	 * 
	 * @return object
	 */
	public static function portionsOfUrl ($u) {
		#/home/barichello/.local/share/haxelib/tink_querystring/0,7,0/src/tink/querystring/Pairs.hx:13: characters 5-29
		return Pairs_Impl_::portions($u->query);
	}
}

Boot::registerClass(Pairs_Impl_::class, 'tink.querystring._Pairs.Pairs_Impl_');