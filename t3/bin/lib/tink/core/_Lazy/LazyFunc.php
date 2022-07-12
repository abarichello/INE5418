<?php
/**
 */

namespace tink\core\_Lazy;

use \php\Boot;

class LazyFunc implements LazyObject {
	/**
	 * @var \Closure
	 */
	public $f;
	/**
	 * @var Computable
	 */
	public $from;
	/**
	 * @var mixed
	 */
	public $result;

	/**
	 * @param \Closure $f
	 * @param Computable $from
	 * 
	 * @return void
	 */
	public function __construct ($f, $from = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:71: characters 5-15
		$this->f = $f;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:72: characters 5-21
		$this->from = $from;
	}

	/**
	 * @return void
	 */
	public function compute () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:86: characters 12-13
		$_g = $this->f;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:87: lines 87-106
		if ($_g !== null) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:88: characters 12-13
			$v = $_g;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:90: characters 9-17
			$this->f = null;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:91: characters 16-25
			$_g = $this->from;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:92: lines 92-102
			if ($_g !== null) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:93: characters 16-19
				$cur = $_g;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:94: characters 13-24
				$this->from = null;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:95: characters 13-28
				$stack = new \Array_hx();
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:96: lines 96-99
				while (($cur !== null) && !$cur->isComputed()) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:97: characters 15-30
					$stack->arr[$stack->length++] = $cur;
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:98: characters 15-37
					$cur = $cur->underlying();
				}
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:100: characters 13-28
				$stack->arr = \array_reverse($stack->arr);
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:101: lines 101-102
				$_g = 0;
				while ($_g < $stack->length) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:101: characters 18-19
					$c = ($stack->arr[$_g] ?? null);
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:101: lines 101-102
					++$_g;
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:102: characters 15-26
					$c->compute();
				}
			}
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:106: characters 9-21
			$this->result = $v();
		}
	}

	/**
	 * @return mixed
	 */
	public function get () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:82: characters 5-18
		return $this->result;
	}

	/**
	 * @return bool
	 */
	public function isComputed () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:79: characters 5-26
		return $this->f === null;
	}

	/**
	 * @return Computable
	 */
	public function underlying () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:76: characters 5-16
		return $this->from;
	}
}

Boot::registerClass(LazyFunc::class, 'tink.core._Lazy.LazyFunc');
