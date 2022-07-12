<?php
/**
 */

namespace tink\http;

use \php\Boot;
use \php\_Boot\HxEnum;

class BodyPart extends HxEnum {
	/**
	 * @param object $handle
	 * 
	 * @return BodyPart
	 */
	static public function File ($handle) {
		return new BodyPart('File', 1, [$handle]);
	}

	/**
	 * @param string $v
	 * 
	 * @return BodyPart
	 */
	static public function Value ($v) {
		return new BodyPart('Value', 0, [$v]);
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			1 => 'File',
			0 => 'Value',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'File' => 1,
			'Value' => 1,
		];
	}
}

Boot::registerClass(BodyPart::class, 'tink.http.BodyPart');
