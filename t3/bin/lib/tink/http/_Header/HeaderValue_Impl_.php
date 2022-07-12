<?php
/**
 */

namespace tink\http\_Header;

use \php\_Boot\HxAnon;
use \haxe\io\_BytesData\Container;
use \php\Boot;
use \tink\url\_Query\QueryStringParser;
use \php\_Boot\HxString;
use \haxe\ds\StringMap;
use \haxe\io\Bytes;
use \tink\url\_Portion\Portion_Impl_;

final class HeaderValue_Impl_ {
	/**
	 * @var string[]|\Array_hx
	 */
	static public $DAYS;
	/**
	 * @var string[]|\Array_hx
	 */
	static public $MONTHS;

	/**
	 * @param string $username
	 * @param string $password
	 * 
	 * @return string
	 */
	public static function basicAuth ($username, $password) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:188: characters 37-74
		$s = "" . ($username??'null') . ":" . ($password??'null');
		$bytes = \strlen($s);
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:188: characters 23-75
		$result = \base64_encode((new Bytes($bytes, new Container($s)))->toString());
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:188: characters 5-86
		return "Basic " . ($result??'null');
	}

	/**
	 * @param string $this
	 * 
	 * @return StringMap
	 */
	public static function getExtension ($this1) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:158: characters 5-33
		return (HeaderValue_Impl_::parse($this1)->arr[0] ?? null)->extensions;
	}

	/**
	 * @param \Date $d
	 * 
	 * @return string
	 */
	public static function ofDate ($d) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:193: characters 5-103
		return \DateTools::format($d, ((HeaderValue_Impl_::$DAYS->arr[$d->getDay()] ?? null)??'null') . ", %d " . ((HeaderValue_Impl_::$MONTHS->arr[$d->getMonth()] ?? null)??'null') . " %Y %H:%M:%S GMT");
	}

	/**
	 * @param int $i
	 * 
	 * @return string
	 */
	public static function ofInt ($i) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:196: characters 5-25
		return \Std::string($i);
	}

	/**
	 *  Parse the value of this header in to `{value:String, extensions:Map<String, String>}` form
	 * 
	 * @param string $this
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function parse ($this1) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:164: lines 164-167
		return HeaderValue_Impl_::parseWith($this1, function ($_, $params) {
			$_g = new StringMap();
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:164: characters 59-65
			$p = $params;
			while ($p->hasNext()) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:164: lines 164-167
				$p1 = $p->next();
				$key = $p1->name;
				$value = null;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:164: characters 84-102
				$_g1 = Portion_Impl_::toString($p1->value);
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:165: characters 12-18
				$quoted = $_g1;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:165: lines 165-166
				if (HxString::charCodeAt($quoted, 0) === 34) {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:164: lines 164-167
					$value = \mb_substr($quoted, 1, mb_strlen($quoted) - 2);
				} else {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:166: characters 12-13
					$v = $_g1;
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:164: lines 164-167
					$value = $v;
				}
				$_g->data[$key] = $value;
			}
			return $_g;
		});
	}

	/**
	 *  Parse the value of this header, using the given function to parse the extensions
	 *  @param parseExtension - function to parse the extension
	 * 
	 * @param string $this
	 * @param \Closure $parseExtension
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function parseWith ($this1, $parseExtension) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:174: lines 174-185
		$_g = new \Array_hx();
		$_g1 = 0;
		$_g2 = HxString::split($this1, ",");
		while ($_g1 < $_g2->length) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:174: characters 17-18
			$v = ($_g2->arr[$_g1] ?? null);
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:174: lines 174-185
			++$_g1;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:175: characters 7-19
			$v = \trim($v);
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:176: lines 176-179
			$i = null;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:176: characters 22-36
			$_g3 = HxString::indexOf($v, ";");
			if ($_g3 === -1) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:176: lines 176-179
				$i = mb_strlen($v);
			} else {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:178: characters 14-15
				$i1 = $_g3;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:176: lines 176-179
				$i = $i1;
			}
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:180: characters 7-34
			$value = \mb_substr($v, 0, $i);
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:183: characters 43-75
			$sep = ";";
			$pos = $i + 1;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:183: characters 69-74
			if ($pos === null) {
				$pos = 0;
			}
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:183: characters 65-66
			if ($sep === null) {
				$sep = "&";
			}
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:181: lines 181-184
			$x = new _HxAnon_HeaderValue_Impl_0($value, $parseExtension($value, new QueryStringParser($v, $sep, "=", $pos)));
			$_g->arr[$_g->length++] = $x;
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:174: lines 174-185
		return $_g;
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$DAYS = HxString::split("Sun,Mon,Tue,Wen,Thu,Fri,Sat", ",");
		self::$MONTHS = HxString::split("Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec", ",");
	}
}

class _HxAnon_HeaderValue_Impl_0 extends HxAnon {
	function __construct($value, $extensions) {
		$this->value = $value;
		$this->extensions = $extensions;
	}
}

Boot::registerClass(HeaderValue_Impl_::class, 'tink.http._Header.HeaderValue_Impl_');
HeaderValue_Impl_::__hx__init();