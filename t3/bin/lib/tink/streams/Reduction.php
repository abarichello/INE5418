<?php
/**
 */

namespace tink\streams;

use \php\Boot;
use \tink\core\TypedError;
use \php\_Boot\HxEnum;

class Reduction extends HxEnum {
	/**
	 * @param TypedError $error
	 * @param StreamObject $at
	 * 
	 * @return Reduction
	 */
	static public function Crashed ($error, $at) {
		return new Reduction('Crashed', 0, [$error, $at]);
	}

	/**
	 * @param TypedError $error
	 * 
	 * @return Reduction
	 */
	static public function Failed ($error) {
		return new Reduction('Failed', 1, [$error]);
	}

	/**
	 * @param mixed $result
	 * 
	 * @return Reduction
	 */
	static public function Reduced ($result) {
		return new Reduction('Reduced', 2, [$result]);
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			0 => 'Crashed',
			1 => 'Failed',
			2 => 'Reduced',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'Crashed' => 2,
			'Failed' => 1,
			'Reduced' => 1,
		];
	}
}

Boot::registerClass(Reduction::class, 'tink.streams.Reduction');
