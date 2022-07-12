<?php
/**
 */

namespace tink\http;

use \php\_Boot\HxAnon;
use \php\Boot;
use \tink\core\TypedError;
use \tink\core\Outcome;
use \php\_Boot\HxString;
use \tink\core\OutcomeTools;
use \tink\http\_Header\HeaderValue_Impl_;
use \haxe\iterators\ArrayIterator;

class Header {
	/**
	 * @var HeaderField[]|\Array_hx
	 */
	public $fields;

	/**
	 * @param HeaderField[]|\Array_hx $fields
	 * 
	 * @return void
	 */
	public function __construct ($fields = null) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:70: lines 70-73
		$tmp = null;
		if ($fields === null) {
			$tmp = new \Array_hx();
		} else {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:72: characters 12-13
			$v = $fields;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:70: lines 70-73
			$tmp = $v;
		}
		$this->fields = $tmp;
	}

	/**
	 * @param string $type
	 * 
	 * @return Outcome
	 */
	public function accepts ($type) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:126: characters 5-37
		$prefix = (HxString::split($type, "/")->arr[0] ?? null);
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:127: lines 127-136
		return OutcomeTools::map($this->byName("accept"), function ($v) use (&$prefix, &$type) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:128: lines 128-134
			$_g = 0;
			$_g1 = HeaderValue_Impl_::parse($v);
			while ($_g < $_g1->length) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:128: characters 11-16
				$entry = ($_g1->arr[$_g] ?? null);
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:128: lines 128-134
				++$_g;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:129: characters 9-68
				if (($entry->value === "*/*") || ($entry->value === $type)) {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:129: characters 57-68
					return true;
				}
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:130: characters 16-38
				$_g2 = HxString::split($entry->value, "/");
				if ($_g2->length === 2) {
					if (($_g2->arr[1] ?? null) === "*") {
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:131: characters 17-18
						$p = ($_g2->arr[0] ?? null);
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:131: lines 131-132
						if ($prefix === $p) {
							#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:131: characters 42-53
							return true;
						}
					}
				}
			}
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:135: characters 7-19
			return false;
		});
	}

	/**
	 *  Get a header
	 *  @param name - Header name to retrieve
	 *  @return `Success(header)` if there is exactly one entry of the given header name, `Failure(err)` otherwise
	 * 
	 * @param string $name
	 * 
	 * @return Outcome
	 */
	public function byName ($name) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:89: characters 19-28
		$_g = $this->get($name);
		$__hx__switch = ($_g->length);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:91: characters 9-70
			return Outcome::Failure(new TypedError(422, "No " . ($name??'null') . " header found", new _HxAnon_Header0("tink/http/Header.hx", 91, "tink.http.Header", "byName")));
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:92: characters 13-14
			$v = ($_g->arr[0] ?? null);
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:93: characters 9-19
			return Outcome::Success($v);
		} else {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:94: characters 12-13
			$v = $_g;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:95: characters 9-85
			return Outcome::Failure(new TypedError(422, "Multiple entries for " . ($name??'null') . " header", new _HxAnon_Header0("tink/http/Header.hx", 95, "tink.http.Header", "byName")));
		}
	}

	/**
	 *  Clone this header with additional header fields
	 *  @param fields - Header fields to be added
	 *  @return Header with additional fields
	 * 
	 * @param HeaderField[]|\Array_hx $fields
	 * 
	 * @return Header
	 */
	public function concat ($fields) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:113: characters 5-50
		return new Header($this->fields->concat($fields));
	}

	/**
	 *  Get the content type header
	 * 
	 * @return Outcome
	 */
	public function contentType () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:102: characters 5-58
		return OutcomeTools::map($this->byName("content-type"), Boot::getStaticClosure(ContentType::class, 'ofString'));
	}

	/**
	 *  Get all headers of the given name
	 *  @param name - Header name to retrieve
	 *  @return Array of headers of the given name
	 * 
	 * @param string $name
	 * 
	 * @return string[]|\Array_hx
	 */
	public function get ($name) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:81: characters 12-59
		$_g = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:81: characters 13-58
		$_g1 = 0;
		$_g2 = $this->fields;
		while ($_g1 < $_g2->length) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:81: characters 18-19
			$f = ($_g2->arr[$_g1] ?? null);
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:81: characters 13-58
			++$_g1;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:81: characters 31-58
			if ($f->name === $name) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:81: characters 51-58
				$_g->arr[$_g->length++] = $f->value;
			}
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:81: characters 12-59
		return $_g;
	}

	/**
	 *  Get content length. Assumes zero if content-length header is missing
	 * 
	 * @return Outcome
	 */
	public function getContentLength () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:119: characters 19-41
		$_g = $this->byName("content-length");
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:120: characters 20-35
			$_hx_tmp = \Std::parseInt($_g->params[0]);
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:120: lines 120-121
			if ($_hx_tmp === null) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:120: characters 46-118
				return Outcome::Failure(new TypedError(422, "Invalid Content-Length Header", new _HxAnon_Header0("tink/http/Header.hx", 120, "tink.http.Header", "getContentLength")));
			} else {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:121: characters 39-40
				$v = $_hx_tmp;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:121: characters 43-53
				return Outcome::Success($v);
			}
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:122: characters 20-21
			$e = $_g->params[0];
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:122: characters 24-34
			return Outcome::Failure($e);
		}
	}

	/**
	 * @return string
	 */
	public function get_LINEBREAK () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:140: characters 37-50
		return "\x0D\x0A";
	}

	/**
	 * @param string $name
	 * 
	 * @return string
	 */
	public function headerNotFound ($name) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:146: characters 5-35
		return "No " . ($name??'null') . " header found";
	}

	/**
	 * @return ArrayIterator
	 */
	public function iterator () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:105: characters 12-29
		return new ArrayIterator($this->fields);
	}

	/**
	 * @return string
	 */
	public function toString () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:143: characters 12-44
		$_g = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:143: characters 13-43
		$_g1 = 0;
		$_g2 = $this->fields;
		while ($_g1 < $_g2->length) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:143: characters 18-19
			$f = ($_g2->arr[$_g1] ?? null);
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:143: characters 13-43
			++$_g1;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:143: characters 31-43
			$x = $f->toString();
			$_g->arr[$_g->length++] = $x;
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:143: characters 5-84
		return ($_g->join("\x0D\x0A")??'null') . "\x0D\x0A" . "\x0D\x0A";
	}

	public function __toString() {
		return $this->toString();
	}
}

class _HxAnon_Header0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(Header::class, 'tink.http.Header');
Boot::registerGetters('tink\\http\\Header', [
	'LINEBREAK' => true
]);
