<?php
/**
 */

namespace tink\core\_Callback;

use \php\Boot;
use \haxe\Exception;
use \tink\core\LinkObject;
use \tink\core\CallbackList;

class ListCell implements LinkObject {
	/**
	 * @var \Closure
	 */
	public $cb;
	/**
	 * @var CallbackList
	 */
	public $list;

	/**
	 * @param \Closure $cb
	 * @param CallbackList $list
	 * 
	 * @return void
	 */
	public function __construct ($cb, $list) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:140: characters 5-26
		if ($cb === null) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:140: characters 21-26
			throw Exception::thrown("callback expected but null received");
		}
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:141: characters 5-17
		$this->cb = $cb;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:142: characters 5-21
		$this->list = $list;
	}

	/**
	 * @return void
	 */
	public function cancel () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:155: lines 155-159
		if ($this->list !== null) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:156: characters 7-28
			$list = $this->list;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:157: characters 7-14
			$this->cb = null;
			$this->list = null;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:158: characters 23-37
			if (--$list->used <= ($list->cells->length >> 1)) {
				$list->compact();
			}
		}
	}

	/**
	 * @return void
	 */
	public function clear () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:150: characters 5-14
		$this->cb = null;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:151: characters 5-16
		$this->list = null;
	}

	/**
	 * @param mixed $data
	 * 
	 * @return void
	 */
	public function invoke ($data) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:146: lines 146-147
		if ($this->list !== null) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:147: characters 7-15
			($this->cb)($data);
		}
	}
}

Boot::registerClass(ListCell::class, 'tink.core._Callback.ListCell');
