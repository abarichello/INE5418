<?php
/**
 */

namespace tink\web\routing\_Context;

use \php\Boot;
use \tink\url\_Portion\Portion_Impl_;

final class Path_Impl_ {
	/**
	 * @param string[]|\Array_hx $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:20: characters 16-44
		$_g = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:20: characters 17-43
		$_g1 = 0;
		while ($_g1 < $this1->length) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:20: characters 22-23
			$p = ($this1->arr[$_g1] ?? null);
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:20: characters 17-43
			++$_g1;
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:20: characters 33-43
			$x = Portion_Impl_::toString($p);
			$_g->arr[$_g->length++] = $x;
		}
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:20: characters 5-54
		return "/" . ($_g->join("/")??'null');
	}
}

Boot::registerClass(Path_Impl_::class, 'tink.web.routing._Context.Path_Impl_');