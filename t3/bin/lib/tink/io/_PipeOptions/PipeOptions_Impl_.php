<?php
/**
 */

namespace tink\io\_PipeOptions;

use \php\Boot;

final class PipeOptions_Impl_ {

	/**
	 * @param object $this
	 * 
	 * @return bool
	 */
	public static function get_destructive ($this1) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeOptions.hx:16: characters 14-46
		if ($this1 !== null) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeOptions.hx:16: characters 30-46
			return $this1->destructive;
		} else {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeOptions.hx:16: characters 14-46
			return false;
		}
	}

	/**
	 * @param object $this
	 * 
	 * @return bool
	 */
	public static function get_end ($this1) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeOptions.hx:12: characters 14-38
		if ($this1 !== null) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeOptions.hx:12: characters 30-38
			return $this1->end;
		} else {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeOptions.hx:12: characters 14-38
			return false;
		}
	}
}

Boot::registerClass(PipeOptions_Impl_::class, 'tink.io._PipeOptions.PipeOptions_Impl_');
Boot::registerGetters('tink\\io\\_PipeOptions\\PipeOptions_Impl_', [
	'destructive' => true,
	'end' => true
]);
