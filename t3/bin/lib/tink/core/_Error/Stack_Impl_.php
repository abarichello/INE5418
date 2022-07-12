<?php
/**
 */

namespace tink\core\_Error;

use \php\Boot;
use \haxe\StackItem;

final class Stack_Impl_ {
	/**
	 * @param StackItem[]|\Array_hx $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:189: lines 189-193
		return "Error stack not available. Compile with -D error_stack.";
	}
}

Boot::registerClass(Stack_Impl_::class, 'tink.core._Error.Stack_Impl_');
