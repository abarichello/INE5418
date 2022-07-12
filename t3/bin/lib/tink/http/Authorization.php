<?php
/**
 */

namespace tink\http;

use \php\Boot;
use \php\_Boot\HxEnum;

class Authorization extends HxEnum {
	/**
	 * @param string $user
	 * @param string $pass
	 * 
	 * @return Authorization
	 */
	static public function Basic ($user, $pass) {
		return new Authorization('Basic', 0, [$user, $pass]);
	}

	/**
	 * @param string $token
	 * 
	 * @return Authorization
	 */
	static public function Bearer ($token) {
		return new Authorization('Bearer', 1, [$token]);
	}

	/**
	 * @param string $scheme
	 * @param string $param
	 * 
	 * @return Authorization
	 */
	static public function Others ($scheme, $param) {
		return new Authorization('Others', 2, [$scheme, $param]);
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			0 => 'Basic',
			1 => 'Bearer',
			2 => 'Others',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'Basic' => 2,
			'Bearer' => 1,
			'Others' => 2,
		];
	}
}

Boot::registerClass(Authorization::class, 'tink.http.Authorization');
