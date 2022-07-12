<?php
/**
 */

namespace tink\http;

use \php\Boot;
use \tink\core\TypedError;
use \php\_Boot\HxEnum;

class ContainerResult extends HxEnum {
	/**
	 * @param TypedError $e
	 * 
	 * @return ContainerResult
	 */
	static public function Failed ($e) {
		return new ContainerResult('Failed', 1, [$e]);
	}

	/**
	 * @param object $running
	 * 
	 * @return ContainerResult
	 */
	static public function Running ($running) {
		return new ContainerResult('Running', 0, [$running]);
	}

	/**
	 * @return ContainerResult
	 */
	static public function Shutdown () {
		static $inst = null;
		if (!$inst) $inst = new ContainerResult('Shutdown', 2, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			1 => 'Failed',
			0 => 'Running',
			2 => 'Shutdown',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'Failed' => 1,
			'Running' => 1,
			'Shutdown' => 0,
		];
	}
}

Boot::registerClass(ContainerResult::class, 'tink.http.ContainerResult');
