<?php
/**
 */

namespace tink\streams;

use \php\Boot;
use \tink\core\TypedError;
use \php\_Boot\HxEnum;

class Conclusion extends HxEnum {
	/**
	 * @param TypedError $error
	 * @param StreamObject $at
	 * 
	 * @return Conclusion
	 */
	static public function Clogged ($error, $at) {
		return new Conclusion('Clogged', 1, [$error, $at]);
	}

	/**
	 * @return Conclusion
	 */
	static public function Depleted () {
		static $inst = null;
		if (!$inst) $inst = new Conclusion('Depleted', 3, []);
		return $inst;
	}

	/**
	 * @param TypedError $error
	 * 
	 * @return Conclusion
	 */
	static public function Failed ($error) {
		return new Conclusion('Failed', 2, [$error]);
	}

	/**
	 * @param StreamObject $rest
	 * 
	 * @return Conclusion
	 */
	static public function Halted ($rest) {
		return new Conclusion('Halted', 0, [$rest]);
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			1 => 'Clogged',
			3 => 'Depleted',
			2 => 'Failed',
			0 => 'Halted',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'Clogged' => 2,
			'Depleted' => 0,
			'Failed' => 1,
			'Halted' => 1,
		];
	}
}

Boot::registerClass(Conclusion::class, 'tink.streams.Conclusion');
