<?php
/**
 */

namespace tink\http;

use \php\Boot;
use \php\_Boot\HxString;
use \tink\http\_Header\HeaderValue_Impl_;
use \haxe\ds\StringMap;

class ContentType {
	/**
	 * @var StringMap
	 */
	public $extensions;
	/**
	 * @var string
	 */
	public $raw;
	/**
	 * @var string
	 */
	public $subtype;
	/**
	 * @var string
	 */
	public $type;

	/**
	 * @param string $s
	 * 
	 * @return ContentType
	 */
	public static function ofString ($s) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:47: characters 5-33
		$ret = new ContentType();
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:49: characters 5-16
		$ret->raw = $s;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:50: characters 5-42
		$parsed = HeaderValue_Impl_::parse($s);
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:51: characters 5-33
		$value = ($parsed->arr[0] ?? null)->value;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:52: characters 12-30
		$_g = HxString::indexOf($value, "/");
		if ($_g === -1) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:54: characters 9-25
			$ret->type = $value;
		} else {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:55: characters 12-15
			$pos = $_g;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:56: characters 9-43
			$ret->type = HxString::substring($value, 0, $pos);
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:57: characters 9-47
			$ret->subtype = HxString::substring($value, $pos + 1);
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:59: characters 5-42
		$ret->extensions = ($parsed->arr[0] ?? null)->extensions;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:61: characters 5-15
		return $ret;
	}

	/**
	 * @return void
	 */
	public function __construct () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:35: characters 47-48
		$this->subtype = "*";
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:34: characters 44-45
		$this->type = "*";
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:40: characters 5-27
		$this->extensions = new StringMap();
	}

	/**
	 * @return string
	 */
	public function get_fullType () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:32: characters 7-30
		return "" . ($this->type??'null') . "/" . ($this->subtype??'null');
	}

	/**
	 * @return string
	 */
	public function toString () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:44: characters 5-15
		return $this->raw;
	}

	public function __toString() {
		return $this->toString();
	}
}

Boot::registerClass(ContentType::class, 'tink.http.ContentType');
Boot::registerGetters('tink\\http\\ContentType', [
	'fullType' => true
]);
