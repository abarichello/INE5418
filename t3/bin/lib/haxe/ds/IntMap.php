<?php
/**
 */

namespace haxe\ds;

use \php\Boot;
use \haxe\IMap;
use \php\_NativeIndexedArray\NativeIndexedArrayIterator;

/**
 * IntMap allows mapping of Int keys to arbitrary values.
 * See `Map` for documentation details.
 * @see https://haxe.org/manual/std-Map.html
 */
class IntMap implements IMap {
	/**
	 * @var mixed[]
	 */
	public $data;

	/**
	 * Creates a new IntMap.
	 * 
	 * @return void
	 */
	public function __construct () {
		#/usr/share/haxe/std/php/_std/haxe/ds/IntMap.hx:34: characters 10-34
		$this1 = [];
		#/usr/share/haxe/std/php/_std/haxe/ds/IntMap.hx:34: characters 3-34
		$this->data = $this1;
	}

	/**
	 * See `Map.exists`
	 * 
	 * @param int $key
	 * 
	 * @return bool
	 */
	public function exists ($key) {
		#/usr/share/haxe/std/php/_std/haxe/ds/IntMap.hx:46: characters 3-44
		return \array_key_exists($key, $this->data);
	}

	/**
	 * See `Map.get`
	 * 
	 * @param int $key
	 * 
	 * @return mixed
	 */
	public function get ($key) {
		#/usr/share/haxe/std/php/_std/haxe/ds/IntMap.hx:42: characters 3-42
		return ($this->data[$key] ?? null);
	}

	/**
	 * See `Map.iterator`
	 * (cs, java) Implementation detail: Do not `set()` any new value while
	 * iterating, as it may cause a resize, which will break iteration.
	 * 
	 * @return object
	 */
	public function iterator () {
		#/usr/share/haxe/std/php/_std/haxe/ds/IntMap.hx:64: characters 10-46
		return new NativeIndexedArrayIterator(\array_values($this->data));
	}

	/**
	 * See `Map.keys`
	 * (cs, java) Implementation detail: Do not `set()` any new value while
	 * iterating, as it may cause a resize, which will break iteration.
	 * 
	 * @return object
	 */
	public function keys () {
		#/usr/share/haxe/std/php/_std/haxe/ds/IntMap.hx:59: characters 10-44
		return new NativeIndexedArrayIterator(\array_keys($this->data));
	}
}

Boot::registerClass(IntMap::class, 'haxe.ds.IntMap');
