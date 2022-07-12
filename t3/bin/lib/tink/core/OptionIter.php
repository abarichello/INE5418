<?php
/**
 */

namespace tink\core;

use \php\Boot;
use \haxe\ds\Option as DsOption;

class OptionIter {
	/**
	 * @var bool
	 */
	public $alive;
	/**
	 * @var mixed
	 */
	public $value;

	/**
	 * @param DsOption $o
	 * 
	 * @return void
	 */
	public function __construct ($o) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:127: characters 15-19
		$this->alive = true;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:130: lines 130-133
		if ($o->index === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:131: characters 17-18
			$v = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:131: characters 21-30
			$this->value = $v;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:132: characters 16-29
			$this->alive = false;
		}
	}

	/**
	 * @return bool
	 */
	public function hasNext () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:136: characters 5-17
		return $this->alive;
	}

	/**
	 * @return mixed
	 */
	public function next () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:139: characters 5-18
		$this->alive = false;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:141: characters 5-17
		return $this->value;
	}
}

Boot::registerClass(OptionIter::class, 'tink.core.OptionIter');
