<?php
/**
 */

namespace tink\core;

use \tink\core\_Lazy\LazyObject;
use \php\Boot;
use \php\_Boot\HxEnum;

class FutureStatus extends HxEnum {
	/**
	 * @return FutureStatus
	 */
	static public function Awaited () {
		static $inst = null;
		if (!$inst) $inst = new FutureStatus('Awaited', 1, []);
		return $inst;
	}

	/**
	 * @return FutureStatus
	 */
	static public function EagerlyAwaited () {
		static $inst = null;
		if (!$inst) $inst = new FutureStatus('EagerlyAwaited', 2, []);
		return $inst;
	}

	/**
	 * @return FutureStatus
	 */
	static public function NeverEver () {
		static $inst = null;
		if (!$inst) $inst = new FutureStatus('NeverEver', 4, []);
		return $inst;
	}

	/**
	 * @param LazyObject $result
	 * 
	 * @return FutureStatus
	 */
	static public function Ready ($result) {
		return new FutureStatus('Ready', 3, [$result]);
	}

	/**
	 * @return FutureStatus
	 */
	static public function Suspended () {
		static $inst = null;
		if (!$inst) $inst = new FutureStatus('Suspended', 0, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			1 => 'Awaited',
			2 => 'EagerlyAwaited',
			4 => 'NeverEver',
			3 => 'Ready',
			0 => 'Suspended',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'Awaited' => 0,
			'EagerlyAwaited' => 0,
			'NeverEver' => 0,
			'Ready' => 1,
			'Suspended' => 0,
		];
	}
}

Boot::registerClass(FutureStatus::class, 'tink.core.FutureStatus');