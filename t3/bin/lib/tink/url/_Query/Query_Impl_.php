<?php
/**
 */

namespace tink\url\_Query;

use \php\Boot;
use \haxe\ds\StringMap;
use \tink\url\_Portion\Portion_Impl_;

final class Query_Impl_ {
	/**
	 * @return string[]|\Array_hx
	 */
	public static function build () {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:53: characters 12-36
		$this1 = new \Array_hx();
		return $this1;
	}

	/**
	 * @param string $this
	 * 
	 * @return QueryStringParser
	 */
	public static function iterator ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:34: characters 5-29
		return new QueryStringParser($this1, "&", "=", 0);
	}

	/**
	 * @param mixed $v
	 * 
	 * @return string
	 */
	public static function ofObj ($v) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:40: characters 15-39
		$this1 = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:40: lines 40-41
		$ret = $this1;
		$v1 = $v;
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:43: lines 43-44
		$_g = 0;
		$_g1 = \Reflect::fields($v1);
		while ($_g < $_g1->length) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:43: characters 10-11
			$k = ($_g1->arr[$_g] ?? null);
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:43: lines 43-44
			++$_g;
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:44: characters 7-23
			$name = Portion_Impl_::ofString($k);
			$value = Portion_Impl_::ofString(\Reflect::field($v1, $k));
			$ret->arr[$ret->length++] = ($name??'null') . "=" . ($value??'null');
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:46: characters 5-26
		return $ret->join("&");
	}

	/**
	 * @param string $this
	 * 
	 * @return QueryStringParser
	 */
	public static function parse ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:11: characters 5-22
		return new QueryStringParser($this1, "&", "=", 0);
	}

	/**
	 * @param string $s
	 * @param string $sep
	 * @param string $set
	 * @param int $pos
	 * 
	 * @return QueryStringParser
	 */
	public static function parseString ($s, $sep = "&", $set = "=", $pos = 0) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:56: characters 5-51
		if ($sep === null) {
			$sep = "&";
		}
		if ($set === null) {
			$set = "=";
		}
		if ($pos === null) {
			$pos = 0;
		}
		return new QueryStringParser($s, $sep, $set, $pos);
	}

	/**
	 * @param string $this
	 * 
	 * @return StringMap
	 */
	public static function toMap ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:37: characters 12-73
		$_g = new StringMap();
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:37: characters 23-33
		$p = new QueryStringParser($this1, "&", "=", 0);
		while ($p->hasNext()) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:37: characters 13-72
			$p1 = $p->next();
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:37: characters 35-72
			$_g->data[$p1->name] = $p1->value;
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:37: characters 12-73
		return $_g;
	}

	/**
	 * @param string $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:50: characters 5-16
		return $this1;
	}

	/**
	 * @param string $this
	 * @param StringMap $values
	 * 
	 * @return string
	 */
	public static function with ($this1, $values) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:14: characters 15-39
		$this2 = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:14: characters 5-40
		$ret = $this2;
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:16: characters 18-49
		$_g = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:16: characters 30-43
		$data = \array_values(\array_map("strval", \array_keys($values->data)));
		$key_current = 0;
		$key_length = \count($data);
		$key_data = $data;
		while ($key_current < $key_length) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:16: characters 19-48
			$key = $key_data[$key_current++];
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:16: characters 45-48
			$_g->arr[$_g->length++] = $key;
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:16: characters 5-50
		$insert = $_g;
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:18: characters 14-24
		$p = new QueryStringParser($this1, "&", "=", 0);
		while ($p->hasNext()) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:18: lines 18-25
			$p1 = $p->next();
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:19: lines 19-24
			if (\array_key_exists(Portion_Impl_::ofString($p1->name), $values->data)) {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:20: characters 9-40
				$name = Portion_Impl_::ofString($p1->name);
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:20: characters 25-39
				$key = Portion_Impl_::ofString($p1->name);
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:20: characters 9-40
				$value = ($values->data[$key] ?? null);
				$ret->arr[$ret->length++] = ($name??'null') . "=" . ($value??'null');
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:21: characters 9-30
				$insert->remove(Portion_Impl_::ofString($p1->name));
			} else {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:23: characters 9-33
				$name1 = Portion_Impl_::ofString($p1->name);
				$ret->arr[$ret->length++] = ($name1??'null') . "=" . ($p1->value??'null');
			}
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:27: characters 5-52
		$_g = 0;
		while ($_g < $insert->length) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:27: characters 9-13
			$name = ($insert->arr[$_g] ?? null);
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:27: characters 5-52
			++$_g;
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:27: characters 25-52
			$value = ($values->data[$name] ?? null);
			$ret->arr[$ret->length++] = ($name??'null') . "=" . ($value??'null');
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Query.hx:29: characters 5-26
		return $ret->join("&");
	}
}

Boot::registerClass(Query_Impl_::class, 'tink.url._Query.Query_Impl_');