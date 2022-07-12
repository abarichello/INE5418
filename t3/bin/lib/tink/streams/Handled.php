<?php
/**
 */

namespace tink\streams;

use \php\Boot;
use \tink\core\TypedError;
use \php\_Boot\HxEnum;

class Handled extends HxEnum {
	/**
	 * @return Handled
	 */
	static public function BackOff () {
		static $inst = null;
		if (!$inst) $inst = new Handled('BackOff', 0, []);
		return $inst;
	}

	/**
	 * @param TypedError $e
	 * 
	 * @return Handled
	 */
	static public function Clog ($e) {
		return new Handled('Clog', 3, [$e]);
	}

	/**
	 * @return Handled
	 */
	static public function Finish () {
		static $inst = null;
		if (!$inst) $inst = new Handled('Finish', 1, []);
		return $inst;
	}

	/**
	 * @return Handled
	 */
	static public function Resume () {
		static $inst = null;
		if (!$inst) $inst = new Handled('Resume', 2, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			0 => 'BackOff',
			3 => 'Clog',
			1 => 'Finish',
			2 => 'Resume',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'BackOff' => 0,
			'Clog' => 1,
			'Finish' => 0,
			'Resume' => 0,
		];
	}
}

Boot::registerClass(Handled::class, 'tink.streams.Handled');
