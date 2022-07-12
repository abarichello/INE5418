<?php
/**
 */

namespace haxe\ds;

use \php\Boot;
use \haxe\IMap;
use \php\_NativeIndexedArray\NativeIndexedArrayIterator;

/**
 * ObjectMap allows mapping of object keys to arbitrary values.
 * On static targets, the keys are considered to be strong references. Refer
 * to `haxe.ds.WeakMap` for a weak reference version.
 * See `Map` for documentation details.
 * @see https://haxe.org/manual/std-Map.html
 */
class ObjectMap implements IMap {
	/**
	 * @var array
	 */
	public $_keys;
	/**
	 * @var array
	 */
	public $_values;

	/**
	 * Creates a new ObjectMap.
	 * 
	 * @return void
	 */
	public function __construct () {
		#/usr/share/haxe/std/php/_std/haxe/ds/ObjectMap.hx:33: characters 11-33
		$this1 = [];
		#/usr/share/haxe/std/php/_std/haxe/ds/ObjectMap.hx:33: characters 3-33
		$this->_keys = $this1;
		#/usr/share/haxe/std/php/_std/haxe/ds/ObjectMap.hx:34: characters 13-35
		$this1 = [];
		#/usr/share/haxe/std/php/_std/haxe/ds/ObjectMap.hx:34: characters 3-35
		$this->_values = $this1;
	}

	/**
	 * See `Map.exists`
	 * 
	 * @param mixed $key
	 * 
	 * @return bool
	 */
	public function exists ($key) {
		#/usr/share/haxe/std/php/_std/haxe/ds/ObjectMap.hx:49: characters 3-71
		return \array_key_exists(\spl_object_hash($key), $this->_values);
	}

	/**
	 * See `Map.get`
	 * 
	 * @param mixed $key
	 * 
	 * @return mixed
	 */
	public function get ($key) {
		#/usr/share/haxe/std/php/_std/haxe/ds/ObjectMap.hx:44: characters 3-40
		$id = \spl_object_hash($key);
		#/usr/share/haxe/std/php/_std/haxe/ds/ObjectMap.hx:45: characters 10-56
		if (isset($this->_values[$id])) {
			#/usr/share/haxe/std/php/_std/haxe/ds/ObjectMap.hx:45: characters 38-49
			return $this->_values[$id];
		} else {
			#/usr/share/haxe/std/php/_std/haxe/ds/ObjectMap.hx:45: characters 52-56
			return null;
		}
	}

	/**
	 * See `Map.iterator`
	 * (cs, java) Implementation detail: Do not `set()` any new value while
	 * iterating, as it may cause a resize, which will break iteration.
	 * 
	 * @return object
	 */
	public function iterator () {
		#/usr/share/haxe/std/php/_std/haxe/ds/ObjectMap.hx:68: characters 10-28
		return new NativeIndexedArrayIterator(\array_values($this->_values));
	}

	/**
	 * See `Map.keys`
	 * (cs, java) Implementation detail: Do not `set()` any new value while
	 * iterating, as it may cause a resize, which will break iteration.
	 * 
	 * @return object
	 */
	public function keys () {
		#/usr/share/haxe/std/php/_std/haxe/ds/ObjectMap.hx:63: characters 10-26
		return new NativeIndexedArrayIterator(\array_values($this->_keys));
	}
}

Boot::registerClass(ObjectMap::class, 'haxe.ds.ObjectMap');
