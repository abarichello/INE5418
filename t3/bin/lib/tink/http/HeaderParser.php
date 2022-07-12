<?php
/**
 */

namespace tink\http;

use \php\_Boot\HxAnon;
use \php\Boot;
use \tink\core\TypedError;
use \tink\io\ParseStep;
use \tink\io\BytewiseParser;

class HeaderParser extends BytewiseParser {
	/**
	 * @var ParseStep
	 */
	static public $INVALID;

	/**
	 * @var \StringBuf
	 */
	public $buf;
	/**
	 * @var HeaderField[]|\Array_hx
	 */
	public $fields;
	/**
	 * @var mixed
	 */
	public $header;
	/**
	 * @var int
	 */
	public $last;
	/**
	 * @var \Closure
	 */
	public $makeHeader;

	/**
	 * @param \Closure $makeHeader
	 * 
	 * @return void
	 */
	public function __construct ($makeHeader) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:301: characters 18-20
		$this->last = -1;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:306: characters 5-31
		$this->buf = new \StringBuf();
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:307: characters 5-33
		$this->makeHeader = $makeHeader;
	}

	/**
	 * @return ParseStep
	 */
	public function nextLine () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:348: characters 5-31
		$line = $this->buf->b;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:350: characters 5-26
		$this->buf = new \StringBuf();
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:351: characters 5-14
		$this->last = -1;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:354: lines 354-375
		if ($line === "") {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:356: lines 356-359
			if ($this->header === null) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:357: characters 13-23
				return ParseStep::Progressed();
			} else {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:359: characters 13-25
				return ParseStep::Done($this->header);
			}
		} else if ($this->header === null) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:362: characters 20-49
			$_g = ($this->makeHeader)($line, $this->fields = new \Array_hx());
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:365: characters 28-29
				$_g1 = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:363: lines 363-367
				if ($_g1 === null) {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:364: characters 17-41
					return ParseStep::Done($this->header = null);
				} else {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:365: characters 28-29
					$v = $_g1;
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:366: characters 17-32
					$this->header = $v;
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:367: characters 17-27
					return ParseStep::Progressed();
				}
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:368: characters 28-29
				$e = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:369: characters 17-26
				return ParseStep::Failed($e);
			}
		} else {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:372: characters 13-52
			$_this = $this->fields;
			$x = HeaderField::ofString($line);
			$_this->arr[$_this->length++] = $x;
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:373: characters 13-23
			return ParseStep::Progressed();
		}
	}

	/**
	 * @param int $c
	 * 
	 * @return ParseStep
	 */
	public function read ($c) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:314: characters 15-19
		$_g = $this->last;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:314: characters 21-22
		if ($c === -1) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:317: characters 11-21
			return $this->nextLine();
		} else if ($c === 10) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:314: characters 15-19
			if ($_g === 13) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:321: characters 11-21
				return $this->nextLine();
			} else {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:340: characters 18-23
				$other = $c;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:342: characters 11-23
				$this->last = $other;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:343: characters 11-29
				$_this = $this->buf;
				$_this->b = ($_this->b??'null') . (\mb_chr($other)??'null');
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:344: characters 11-21
				return ParseStep::Progressed();
			}
		} else if ($c === 13) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:314: characters 15-19
			if ($_g === 13) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:325: characters 11-28
				$_this = $this->buf;
				$_this->b = ($_this->b??'null') . (\mb_chr($this->last)??'null');
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:326: characters 11-21
				return ParseStep::Progressed();
			} else {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:337: characters 11-27
				$this->last = 13;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:338: characters 11-21
				return ParseStep::Progressed();
			}
		} else {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:314: characters 15-19
			if ($_g === 13) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:328: characters 26-31
				$other = $c;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:330: characters 11-28
				$_this = $this->buf;
				$_this->b = ($_this->b??'null') . (\mb_chr($this->last)??'null');
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:331: characters 11-29
				$_this = $this->buf;
				$_this->b = ($_this->b??'null') . (\mb_chr($other)??'null');
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:332: characters 11-20
				$this->last = -1;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:333: characters 11-21
				return ParseStep::Progressed();
			} else {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:340: characters 18-23
				$other = $c;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:342: characters 11-23
				$this->last = $other;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:343: characters 11-29
				$_this = $this->buf;
				$_this->b = ($_this->b??'null') . (\mb_chr($other)??'null');
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:344: characters 11-21
				return ParseStep::Progressed();
			}
		}
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


		self::$INVALID = ParseStep::Failed(new TypedError(422, "Invalid HTTP header", new _HxAnon_HeaderParser0("tink/http/Header.hx", 310, "tink.http.HeaderParser", "INVALID")));
	}
}

class _HxAnon_HeaderParser0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(HeaderParser::class, 'tink.http.HeaderParser');
HeaderParser::__hx__init();
