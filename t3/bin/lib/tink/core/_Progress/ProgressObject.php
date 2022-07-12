<?php
/**
 */

namespace tink\core\_Progress;

use \php\Boot;
use \tink\core\_Future\SuspendableFuture;
use \tink\core\ProgressStatus;
use \tink\core\_Signal\SignalObject;
use \tink\core\_Signal\Suspendable;
use \tink\core\_Future\FutureObject;

class ProgressObject {
	/**
	 * @var SignalObject
	 */
	public $changed;
	/**
	 * @var \Closure
	 */
	public $getStatus;
	/**
	 * @var SignalObject
	 */
	public $progressed;
	/**
	 * @var FutureObject
	 */
	public $result;

	/**
	 * @param SignalObject $changed
	 * @param \Closure $getStatus
	 * 
	 * @return void
	 */
	public function __construct ($changed, $getStatus) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:106: characters 5-27
		$this->changed = $changed;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:107: lines 107-110
		$this1 = new Suspendable(function ($fire) use (&$changed) {
			return $changed->listen(function ($s) use (&$fire) {
				if ($s->index === 0) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:108: characters 23-24
					$v = $s->params[0];
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:108: characters 27-34
					$fire($v);
				}
			});
		}, null);
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:107: lines 107-110
		$this->progressed = $this1;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:111: characters 5-31
		$this->getStatus = $getStatus;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:112: lines 112-119
		$this1 = new SuspendableFuture(function ($fire) use (&$changed, &$getStatus) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:112: characters 45-56
			$_g = $getStatus();
			if ($_g->index === 1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:113: characters 21-22
				$v = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:113: characters 25-32
				$fire($v);
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:113: characters 34-38
				return null;
			} else {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:115: lines 115-118
				return $changed->listen(function ($s) use (&$fire) {
					if ($s->index === 1) {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:117: characters 25-26
						$v = $s->params[0];
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:117: characters 29-36
						$fire($v);
					}
				});
			}
		});
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:112: lines 112-119
		$this->result = $this1;
	}

	/**
	 * @return ProgressStatus
	 */
	public function get_status () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:97: characters 34-52
		return ($this->getStatus)();
	}
}

Boot::registerClass(ProgressObject::class, 'tink.core._Progress.ProgressObject');
Boot::registerGetters('tink\\core\\_Progress\\ProgressObject', [
	'status' => true
]);
