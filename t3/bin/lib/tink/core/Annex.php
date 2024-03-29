<?php
/**
 */

namespace tink\core;

use \php\Boot;
use \haxe\ds\ObjectMap;

class Annex {
	/**
	 * @var ObjectMap
	 */
	public $registry;
	/**
	 * @var mixed
	 */
	public $target;

	/**
	 * @param mixed $target
	 * 
	 * @return void
	 */
	public function __construct ($target) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Annex.hx:12: characters 4-24
		$this->target = $target;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Annex.hx:13: characters 5-49
		$this->registry = new ObjectMap();
	}
}

Boot::registerClass(Annex::class, 'tink.core.Annex');
