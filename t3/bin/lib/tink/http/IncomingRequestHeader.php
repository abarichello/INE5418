<?php
/**
 */

namespace tink\http;

use \php\_Boot\HxAnon;
use \tink\io\StreamParserObject;
use \php\Boot;
use \haxe\Exception;
use \tink\url\_Query\QueryStringParser;
use \haxe\io\_BytesData\Container as _BytesDataContainer;
use \tink\core\TypedError;
use \tink\core\Outcome;
use \php\_Boot\HxString;
use \tink\core\OutcomeTools;
use \haxe\ds\StringMap;
use \tink\_Url\Url_Impl_;
use \haxe\io\Bytes;
use \php\_NativeIndexedArray\NativeIndexedArrayIterator;
use \tink\core\_Outcome\OutcomeMapper_Impl_;
use \tink\url\_Portion\Portion_Impl_;

class IncomingRequestHeader extends RequestHeader {
	/**
	 * @var StringMap
	 */
	public $cookies;

	/**
	 *  Get a StreamParser which can parse a Source into an IncomingRequestHeader
	 * 
	 * @return StreamParserObject
	 */
	public static function parser () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:90: lines 90-97
		return new HeaderParser(function ($line, $headers) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:91: characters 21-36
			$_g = HxString::split($line, " ");
			if ($_g->length === 3) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:92: characters 15-21
				$method = ($_g->arr[0] ?? null);
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:92: characters 23-26
				$url = ($_g->arr[1] ?? null);
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:92: characters 28-36
				$protocol = ($_g->arr[2] ?? null);
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:93: characters 11-82
				return Outcome::Success(new IncomingRequestHeader($method, Url_Impl_::fromString($url), $protocol, $headers));
			} else {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:95: characters 11-73
				return Outcome::Failure(new TypedError(422, "Invalid HTTP header", new _HxAnon_IncomingRequestHeader0("tink/http/Request.hx", 95, "tink.http.IncomingRequestHeader", "parser")));
			}
		});
	}

	/**
	 * @param string $method
	 * @param object $url
	 * @param string $protocol
	 * @param HeaderField[]|\Array_hx $fields
	 * 
	 * @return void
	 */
	public function __construct ($method, $url, $protocol, $fields) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:35: lines 35-111
		parent::__construct($method, $url, $protocol, $fields);
	}

	/**
	 * @param HeaderField[]|\Array_hx $fields
	 * 
	 * @return IncomingRequestHeader
	 */
	public function concat ($fields) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:47: characters 38-44
		$tmp = $this->method;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:47: characters 46-49
		$tmp1 = $this->url;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:47: characters 51-59
		$tmp2 = $this->protocol;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:47: characters 5-88
		return new IncomingRequestHeader($tmp, $tmp1, $tmp2, $this->fields->concat($fields));
	}

	/**
	 *  List all cookie names
	 * 
	 * @return object
	 */
	public function cookieNames () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:53: characters 12-26
		return new NativeIndexedArrayIterator(\array_values(\array_map("strval", \array_keys($this->cookies->data))));
	}

	/**
	 *  Get the Authorization header as an Enum
	 * 
	 * @return Outcome
	 */
	public function getAuth () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:65: lines 65-76
		return $this->getAuthWith(function ($s, $p) {
			if ($s === "Basic") {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:67: characters 9-138
				$decoded = null;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:67: characters 23-137
				try {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:67: characters 27-43
					$str = $p;
					$s1 = \base64_decode($str, true);
					$decoded1 = \strlen($s1);
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:67: characters 9-138
					$decoded = (new Bytes($decoded1, new _BytesDataContainer($s1)))->toString();
				} catch(\Throwable $_g) {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:67: characters 61-62
					$e = Exception::caught($_g)->unwrap();
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:67: characters 72-137
					return Outcome::Failure(TypedError::withData(null, "Error in decoding basic auth", $e, new _HxAnon_IncomingRequestHeader0("tink/http/Request.hx", 67, "tink.http.IncomingRequestHeader", "getAuth")));
				}
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:68: characters 16-36
				$_g = HxString::indexOf($decoded, ":");
				if ($_g === -1) {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:69: characters 20-99
					return Outcome::Failure(new TypedError(null, "Cannot parse username and password because \":\" is missing", new _HxAnon_IncomingRequestHeader0("tink/http/Request.hx", 69, "tink.http.IncomingRequestHeader", "getAuth")));
				} else {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:70: characters 16-17
					$i = $_g;
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:70: characters 33-53
					$tmp = \mb_substr($decoded, 0, $i);
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:70: characters 19-78
					return Outcome::Success(Authorization::Basic($tmp, \mb_substr($decoded, $i + 1, null)));
				}
			} else if ($s === "Bearer") {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:73: characters 9-27
				return Outcome::Success(Authorization::Bearer($p));
			} else {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:74: characters 12-13
				$s1 = $s;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:75: characters 9-30
				return Outcome::Success(Authorization::Others($s1, $p));
			}
		});
	}

	/**
	 * @param \Closure $parser
	 * 
	 * @return Outcome
	 */
	public function getAuthWith ($parser) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:79: lines 79-84
		return OutcomeTools::flatMap($this->byName("authorization"), OutcomeMapper_Impl_::withSameError(function ($v) use (&$parser) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:79: characters 75-89
			$_g = HxString::indexOf($v, " ");
			if ($_g === -1) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:81: characters 11-82
				return Outcome::Failure(new TypedError(422, "Invalid Authorization Header", new _HxAnon_IncomingRequestHeader0("tink/http/Request.hx", 81, "tink.http.IncomingRequestHeader", "getAuthWith")));
			} else {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:82: characters 14-15
				$i = $_g;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:83: characters 11-50
				return $parser(\mb_substr($v, 0, $i), \mb_substr($v, $i + 1, null));
			}
		}));
	}

	/**
	 *  Get a single cookie
	 * 
	 * @param string $name
	 * 
	 * @return string
	 */
	public function getCookie ($name) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:59: characters 12-30
		return ($this->getCookies()->data[$name] ?? null);
	}

	/**
	 * @return StringMap
	 */
	public function getCookies () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:40: lines 40-41
		if ($this->cookies === null) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:41: characters 17-131
			$_g = new StringMap();
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:41: characters 18-130
			$_g1 = 0;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:41: characters 38-44
			$this1 = \mb_strtolower("cookie");
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:41: characters 18-130
			$_g2 = $this->get($this1);
			while ($_g1 < $_g2->length) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:41: characters 23-29
				$header = ($_g2->arr[$_g1] ?? null);
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:41: characters 18-130
				++$_g1;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:41: characters 62-92
				$sep = ";";
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:41: characters 89-90
				if ($sep === null) {
					$sep = "&";
				}
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:41: characters 62-92
				$entry = new QueryStringParser($header, $sep, "=", 0);
				while ($entry->hasNext()) {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:41: characters 48-130
					$entry1 = $entry->next();
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:41: characters 94-130
					$key = $entry1->name;
					$value = Portion_Impl_::toString($entry1->value);
					$_g->data[$key] = $value;
				}
			}
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:41: characters 7-131
			$this->cookies = $_g;
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Request.hx:43: characters 5-19
		return $this->cookies;
	}
}

class _HxAnon_IncomingRequestHeader0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(IncomingRequestHeader::class, 'tink.http.IncomingRequestHeader');
