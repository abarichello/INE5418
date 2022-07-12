<?php
/**
 */

namespace tink\_Url;

use \php\_Boot\HxAnon;
use \php\Boot;

final class SingleHostUrl_Impl_ {
	/**
	 * @param object $v
	 * 
	 * @return object
	 */
	public static function _new ($v) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/Url.hx:190: character 3
		$this1 = $v;
		return $this1;
	}

	/**
	 * @param string $s
	 * 
	 * @return object
	 */
	public static function ofString ($s) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/Url.hx:207: characters 5-20
		return SingleHostUrl_Impl_::ofUrl(Url_Impl_::fromString($s));
	}

	/**
	 * @param object $u
	 * 
	 * @return object
	 */
	public static function ofUrl ($u) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/Url.hx:193: lines 193-204
		$v = null;
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/Url.hx:193: characters 37-60
		$_g = $u->hosts;
		$__hx__switch = ($_g->length);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/Url.hx:193: lines 193-204
			$v = $u;
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/Url.hx:193: characters 37-60
			$_g1 = ($_g->arr[0] ?? null);
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/Url.hx:193: lines 193-204
			$v = $u;
		} else {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/Url.hx:195: characters 12-13
			$v1 = $_g;
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/Url.hx:193: lines 193-204
			$v = Url_Impl_::make(new _HxAnon_SingleHostUrl_Impl_0($u->path, $u->query, \Array_hx::wrap([($u->hosts->arr[0] ?? null)]), $u->auth, $u->scheme, $u->hash));
		}
		$this1 = $v;
		return $this1;
	}
}

class _HxAnon_SingleHostUrl_Impl_0 extends HxAnon {
	function __construct($path, $query, $hosts, $auth, $scheme, $hash) {
		$this->path = $path;
		$this->query = $query;
		$this->hosts = $hosts;
		$this->auth = $auth;
		$this->scheme = $scheme;
		$this->hash = $hash;
	}
}

Boot::registerClass(SingleHostUrl_Impl_::class, 'tink._Url.SingleHostUrl_Impl_');
