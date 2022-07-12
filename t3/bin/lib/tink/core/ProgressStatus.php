<?php
/**
 */

namespace tink\core;

use \php\Boot;
use \php\_Boot\HxEnum;

class ProgressStatus extends HxEnum {
	/**
	 * @param mixed $v
	 * 
	 * @return ProgressStatus
	 */
	static public function Finished ($v) {
		return new ProgressStatus('Finished', 1, [$v]);
	}

	/**
	 * @param MPair $v
	 * 
	 * @return ProgressStatus
	 */
	static public function InProgress ($v) {
		return new ProgressStatus('InProgress', 0, [$v]);
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			1 => 'Finished',
			0 => 'InProgress',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'Finished' => 1,
			'InProgress' => 1,
		];
	}
}

Boot::registerClass(ProgressStatus::class, 'tink.core.ProgressStatus');
