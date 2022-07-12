<?php
/**
 */

use \php\Boot;

/**
 * This class defines mathematical functions and constants.
 * @see https://haxe.org/manual/std-math.html
 */
class Math {
	/**
	 * @var float
	 * A special `Float` constant which denotes negative infinity.
	 * For example, this is the result of `-1.0 / 0.0`.
	 * Operations with `NEGATIVE_INFINITY` as an operand may result in
	 * `NEGATIVE_INFINITY`, `POSITIVE_INFINITY` or `NaN`.
	 * If this constant is converted to an `Int`, e.g. through `Std.int()`, the
	 * result is unspecified.
	 */
	static public $NEGATIVE_INFINITY;


	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$NEGATIVE_INFINITY = -INF;
	}
}

Boot::registerClass(Math::class, 'Math');
Math::__hx__init();