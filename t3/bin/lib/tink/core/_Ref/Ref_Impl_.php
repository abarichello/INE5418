<?php
/**
 */

namespace tink\core\_Ref;

use \php\Boot;
use \haxe\ds\_Vector\PhpVectorData;

final class Ref_Impl_ {

	/**
	 * @return PhpVectorData
	 */
	public static function _new () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Ref.hx:6: characters 32-53
		$this1 = new PhpVectorData(1);
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Ref.hx:6: character 3
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param PhpVectorData $this
	 * 
	 * @return mixed
	 */
	public static function get_value ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Ref.hx:8: characters 38-52
		return ($this1->data[0] ?? null);
	}

	/**
	 * @param PhpVectorData $this
	 * @param mixed $param
	 * 
	 * @return mixed
	 */
	public static function set_value ($this1, $param) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Ref.hx:9: characters 38-60
		return $this1->data[0] = $param;
	}

	/**
	 * @param mixed $v
	 * 
	 * @return PhpVectorData
	 */
	public static function to ($v) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Ref.hx:14: characters 15-24
		$this1 = new PhpVectorData(1);
		$this2 = $this1;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Ref.hx:14: characters 5-25
		$ret = $this2;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Ref.hx:15: characters 5-18
		$ret->data[0] = $v;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Ref.hx:16: characters 5-15
		return $ret;
	}

	/**
	 * @param PhpVectorData $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Ref.hx:11: characters 37-72
		return "@[" . \Std::string(($this1->data[0] ?? null)) . "]";
	}
}

Boot::registerClass(Ref_Impl_::class, 'tink.core._Ref.Ref_Impl_');
Boot::registerGetters('tink\\core\\_Ref\\Ref_Impl_', [
	'value' => true
]);
Boot::registerSetters('tink\\core\\_Ref\\Ref_Impl_', [
	'value' => true
]);
