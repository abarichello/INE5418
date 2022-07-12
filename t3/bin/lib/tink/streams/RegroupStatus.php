<?php
/**
 */

namespace tink\streams;

use \php\Boot;
use \tink\core\TypedError;
use \php\_Boot\HxEnum;

class RegroupStatus extends HxEnum {
	/**
	 * @return RegroupStatus
	 */
	static public function Ended () {
		static $inst = null;
		if (!$inst) $inst = new RegroupStatus('Ended', 2, []);
		return $inst;
	}

	/**
	 * @param TypedError $e
	 * 
	 * @return RegroupStatus
	 */
	static public function Errored ($e) {
		return new RegroupStatus('Errored', 1, [$e]);
	}

	/**
	 * @return RegroupStatus
	 */
	static public function Flowing () {
		static $inst = null;
		if (!$inst) $inst = new RegroupStatus('Flowing', 0, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			2 => 'Ended',
			1 => 'Errored',
			0 => 'Flowing',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'Ended' => 0,
			'Errored' => 1,
			'Flowing' => 0,
		];
	}
}

Boot::registerClass(RegroupStatus::class, 'tink.streams.RegroupStatus');
