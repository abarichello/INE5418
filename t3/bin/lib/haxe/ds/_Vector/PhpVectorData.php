<?php
/**
 */

namespace haxe\ds\_Vector;

use \php\Boot;

class PhpVectorData {
	/**
	 * @var mixed[]
	 */
	public $data;
	/**
	 * @var int
	 */
	public $length;

	/**
	 * @param int $length
	 * 
	 * @return void
	 */
	public function __construct ($length) {
		#/usr/share/haxe/std/php/_std/haxe/ds/Vector.hx:32: characters 3-23
		$this->length = $length;
		#/usr/share/haxe/std/php/_std/haxe/ds/Vector.hx:33: characters 10-34
		$this1 = [];
		#/usr/share/haxe/std/php/_std/haxe/ds/Vector.hx:33: characters 3-34
		$this->data = $this1;
	}
}

Boot::registerClass(PhpVectorData::class, 'haxe.ds._Vector.PhpVectorData');
