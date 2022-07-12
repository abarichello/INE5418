<?php
/**
 */

namespace tink\url\_Query;

use \tink\core\NamedWith;
use \php\Boot;
use \php\_Boot\HxString;
use \tink\url\_Portion\Portion_Impl_;

class QueryStringParser {
	/**
	 * @var int
	 */
	public $pos;
	/**
	 * @var string
	 */
	public $s;
	/**
	 * @var string
	 */
	public $sep;
	/**
	 * @var string
	 */
	public $set;

	/**
	 * @param string $s
	 * @param int $start
	 * @param int $end
	 * 
	 * @return string
	 */
	public static function trimmedSub ($s, $start, $end) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:120: characters 5-49
		if ($start >= mb_strlen($s)) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:120: characters 34-49
			$this1 = "";
			return $this1;
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:122: lines 122-123
		while (\StringTools::fastCodeAt($s, $start) < 33) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:123: characters 7-14
			++$start;
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:125: lines 125-127
		if ($end < (mb_strlen($s) - 1)) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:126: lines 126-127
			while (\StringTools::fastCodeAt($s, $end - 1) < 33) {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:127: characters 9-14
				--$end;
			}
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:129: characters 12-48
		$this1 = HxString::substring($s, $start, $end);
		return $this1;
	}

	/**
	 * @param string $s
	 * @param string $sep
	 * @param string $set
	 * @param int $pos
	 * 
	 * @return void
	 */
	public function __construct ($s, $sep, $set, $pos) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:88: lines 88-91
		$this->s = ($s === null ? "" : $s);
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:92: characters 5-19
		$this->sep = $sep;
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:93: characters 5-19
		$this->set = $set;
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:94: characters 5-19
		$this->pos = $pos;
	}

	/**
	 * @return bool
	 */
	public function hasNext () {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:98: characters 5-26
		return $this->pos < mb_strlen($this->s);
	}

	/**
	 * @return NamedWith
	 */
	public function next () {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:101: characters 5-36
		$next = HxString::indexOf($this->s, $this->sep, $this->pos);
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:103: lines 103-104
		if ($next === -1) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:104: characters 7-22
			$next = mb_strlen($this->s);
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:106: characters 5-37
		$split = HxString::indexOf($this->s, $this->set, $this->pos);
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:107: characters 5-21
		$start = $this->pos;
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:109: characters 5-28
		$this->pos = $next + mb_strlen($this->sep);
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:112: lines 112-115
		if (($split === -1) || ($split > $next)) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:113: characters 30-56
			$tmp = Portion_Impl_::toString(QueryStringParser::trimmedSub($this->s, $start, $next));
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:113: characters 9-61
			return new NamedWith($tmp, Portion_Impl_::ofString(""));
		} else {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:115: characters 30-57
			$tmp = Portion_Impl_::toString(QueryStringParser::trimmedSub($this->s, $start, $split));
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:115: characters 9-99
			return new NamedWith($tmp, QueryStringParser::trimmedSub($this->s, $split + mb_strlen($this->set), $next));
		}
	}
}

Boot::registerClass(QueryStringParser::class, 'tink.url._Query.QueryStringParser');