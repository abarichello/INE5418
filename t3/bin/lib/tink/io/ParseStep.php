<?php
/**
 */

namespace tink\io;

use \php\Boot;
use \tink\core\TypedError;
use \php\_Boot\HxEnum;

class ParseStep extends HxEnum {
	/**
	 * @param mixed $r
	 * 
	 * @return ParseStep
	 */
	static public function Done ($r) {
		return new ParseStep('Done', 1, [$r]);
	}

	/**
	 * @param TypedError $e
	 * 
	 * @return ParseStep
	 */
	static public function Failed ($e) {
		return new ParseStep('Failed', 2, [$e]);
	}

	/**
	 * @return ParseStep
	 */
	static public function Progressed () {
		static $inst = null;
		if (!$inst) $inst = new ParseStep('Progressed', 0, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			1 => 'Done',
			2 => 'Failed',
			0 => 'Progressed',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'Done' => 1,
			'Failed' => 1,
			'Progressed' => 0,
		];
	}
}

Boot::registerClass(ParseStep::class, 'tink.io.ParseStep');
