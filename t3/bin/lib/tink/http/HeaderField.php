<?php
/**
 */

namespace tink\http;

use \php\_Boot\HxAnon;
use \tink\core\NamedWith;
use \php\Boot;
use \php\_Boot\HxString;
use \tink\http\_Header\HeaderValue_Impl_;

class HeaderField extends NamedWith {
	/**
	 * @param string $s
	 * 
	 * @return HeaderField
	 */
	public static function ofString ($s) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:257: characters 19-33
		$_g = HxString::indexOf($s, ":");
		if ($_g === -1) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:259: characters 25-26
			$this1 = \mb_strtolower($s);
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:259: characters 9-33
			return new HeaderField($this1, null);
		} else {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:260: characters 12-13
			$v = $_g;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:261: characters 25-39
			$this1 = \mb_strtolower(\mb_substr($s, 0, $v));
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:261: characters 9-64
			return new HeaderField($this1, \trim(\mb_substr($s, $v + 1, null)));
		}
	}

	/**
	 * Constructs a Set-Cookie header. Please note that cookies are HttpOnly by default.
	 * You can opt out of that behavior by setting `options.scriptable` to true.
	 * 
	 * @param string $key
	 * @param string $value
	 * @param object $options
	 * 
	 * @return HeaderField
	 */
	public static function setCookie ($key, $value, $options = null) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:270: lines 270-271
		if ($options === null) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:271: characters 7-20
			$options = new HxAnon();
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:273: characters 5-31
		$buf = new \StringBuf();
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:282: characters 5-55
		$buf->add((\rawurlencode($key)??'null') . "=" . (\rawurlencode($value)??'null'));
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:284: lines 284-285
		if ($options->expires !== null) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:285: characters 7-57
			$value = HeaderValue_Impl_::ofDate($options->expires);
			if ($value !== null) {
				$buf->add("; ");
				$buf->add("expires=");
				$buf->add($value);
			}
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:287: characters 5-39
		$value = $options->domain;
		if ($value !== null) {
			$buf->add("; ");
			$buf->add("domain=");
			$buf->add($value);
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:288: characters 5-35
		$value = $options->path;
		if ($value !== null) {
			$buf->add("; ");
			$buf->add("path=");
			$buf->add($value);
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:290: characters 5-46
		if ($options->secure) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:290: characters 25-46
			$buf->add("; ");
			$buf->add("secure");
			$buf->add("");
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:291: characters 5-60
		if ($options->scriptable !== true) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:291: characters 37-60
			$buf->add("; ");
			$buf->add("HttpOnly");
			$buf->add("");
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:293: characters 5-55
		return new HeaderField("set-cookie", $buf->b);
	}

	/**
	 * @param string $name
	 * @param string $value
	 * 
	 * @return void
	 */
	public function __construct ($name, $value) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:249: lines 249-295
		parent::__construct($name, $value);
	}

	/**
	 * @return string
	 */
	public function toString () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:253: lines 253-254
		if ($this->value === null) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:253: characters 26-30
			return $this->name;
		} else {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:254: characters 13-26
			return "" . ($this->name??'null') . ": " . ($this->value??'null');
		}
	}

	public function __toString() {
		return $this->toString();
	}
}

Boot::registerClass(HeaderField::class, 'tink.http.HeaderField');
