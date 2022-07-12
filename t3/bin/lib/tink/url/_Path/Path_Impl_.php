<?php
/**
 */

namespace tink\url\_Path;

use \php\Boot;
use \php\_Boot\HxString;

final class Path_Impl_ {
	/**
	 * @var string
	 */
	static public $root;

	/**
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function _new ($s) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:19: character 3
		$this1 = $s;
		return $this1;
	}

	/**
	 * @param string $this
	 * 
	 * @return bool
	 */
	public static function get_absolute ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:13: characters 7-35
		return \mb_substr($this1, 0, 1) === "/";
	}

	/**
	 * @param string $this
	 * 
	 * @return bool
	 */
	public static function get_isDir ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:17: characters 14-42
		$index = mb_strlen($this1) - 1;
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:17: characters 7-49
		return (($index < 0 ? "" : \mb_substr($this1, $index, 1))) === "/";
	}

	/**
	 * @param string $this
	 * @param string $that
	 * 
	 * @return string
	 */
	public static function join ($this1, $that) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:24: lines 24-31
		if ($that === "") {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:24: characters 23-32
			return $this1;
		} else if (\mb_substr($that, 0, 1) === "/") {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:25: characters 31-35
			return $that;
		} else {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:27: characters 13-18
			$index = mb_strlen($this1) - 1;
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:27: lines 27-31
			if ((($index < 0 ? "" : \mb_substr($this1, $index, 1))) === "/") {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:27: characters 20-52
				return Path_Impl_::ofString(($this1??'null') . ($that??'null'));
			} else {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:28: characters 21-42
				$_g = HxString::lastIndexOf($this1, "/");
				if ($_g === -1) {
					#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:29: characters 20-24
					return $that;
				} else {
					#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:30: characters 16-17
					$v = $_g;
					#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:30: characters 11-47
					return Path_Impl_::ofString((\mb_substr($this1, 0, $v + 1)??'null') . ((($that === null ? "null" : $that))??'null'));
				}
			}
		}
	}

	/**
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function normalize ($s) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:38: characters 9-36
		$s = \trim(\StringTools::replace($s, "\\", "/"));
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:39: lines 39-40
		if ($s === ".") {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:40: characters 7-18
			return "./";
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:42: characters 5-74
		$isDir = \StringTools::endsWith($s, "/..") || \StringTools::endsWith($s, "/") || \StringTools::endsWith($s, "/.");
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:44: lines 44-46
		$parts = new \Array_hx();
		$isAbsolute = \StringTools::startsWith($s, "/");
		$up = 0;
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:48: lines 48-55
		$_g = 0;
		$_g1 = HxString::split($s, "/");
		while ($_g < $_g1->length) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:48: characters 10-14
			$part = ($_g1->arr[$_g] ?? null);
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:48: lines 48-55
			++$_g;
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:49: characters 14-25
			$_g2 = \trim($part);
			if ($_g2 === "") {
			} else if ($_g2 === ".") {
			} else if ($_g2 === "..") {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:53: characters 15-26
				if ($parts->length > 0) {
					$parts->length--;
				}
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:53: characters 11-40
				if (\array_pop($parts->arr) === null) {
					#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:53: characters 36-40
					++$up;
				}
			} else {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:54: characters 14-15
				$v = $_g2;
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:54: characters 17-30
				$parts->arr[$parts->length++] = $v;
			}
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:57: lines 57-61
		if ($isAbsolute) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:58: characters 7-24
			$parts->length = \array_unshift($parts->arr, "");
		} else {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:60: characters 17-21
			$_g = 0;
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:60: characters 21-23
			$_g1 = $up;
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:60: lines 60-61
			while ($_g < $_g1) {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:60: characters 17-23
				$i = $_g++;
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:61: characters 9-28
				$parts->length = \array_unshift($parts->arr, "..");
			}
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:63: lines 63-64
		if ($isDir) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:64: characters 7-21
			$parts->arr[$parts->length++] = "";
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:67: characters 5-27
		return $parts->join("/");
	}

	/**
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function ofString ($s) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:34: characters 12-34
		$this1 = Path_Impl_::normalize($s);
		return $this1;
	}

	/**
	 * @param string $this
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function parts ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:9: characters 12-68
		$_g = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:9: characters 13-67
		$_g1 = 0;
		$_g2 = HxString::split($this1, "/");
		while ($_g1 < $_g2->length) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:9: characters 18-19
			$p = ($_g2->arr[$_g1] ?? null);
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:9: characters 13-67
			++$_g1;
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:9: characters 40-67
			if ($p !== "") {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:9: characters 53-67
				$this1 = $p;
				$_g->arr[$_g->length++] = $this1;
			}
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:9: characters 12-68
		return $_g;
	}

	/**
	 * @param string $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Path.hx:71: characters 5-16
		return $this1;
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


		$this1 = "/";
		self::$root = $this1;
	}
}

Boot::registerClass(Path_Impl_::class, 'tink.url._Path.Path_Impl_');
Boot::registerGetters('tink\\url\\_Path\\Path_Impl_', [
	'isDir' => true,
	'absolute' => true
]);
Path_Impl_::__hx__init();