<?php
/**
 */

namespace tink\core\_Progress;

use \tink\core\_Signal\Signal_Impl_;
use \php\Boot;
use \tink\core\ProgressStatus;
use \tink\core\AlreadyDisposed;
use \tink\core\_Signal\Suspendable;

class SuspendableProgress extends ProgressObject {
	/**
	 * @param \Closure $wakeup
	 * @param ProgressStatus $status
	 * 
	 * @return void
	 */
	public function __construct ($wakeup, $status = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:75: lines 75-76
		if ($status === null) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:76: characters 7-46
			$status = ProgressStatus::InProgress(ProgressValue_Impl_::$ZERO);
		}
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:77: characters 5-43
		$disposable = AlreadyDisposed::$INST;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:78: lines 78-86
		$changed = null;
		$__hx__switch = ($status->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:81: characters 23-24
			$_g = $status->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:82: lines 82-85
			$this1 = new Suspendable(function ($fire) use (&$wakeup, &$status) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:83: characters 19-48
				return $wakeup(function ($s) use (&$fire, &$status) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:83: characters 36-46
					$status = $s;
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:83: characters 31-47
					$fire($status);
				});
			}, function ($d) use (&$disposable) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:84: characters 16-30
				$disposable = $d;
			});
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:78: lines 78-86
			$changed = $this1;
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:79: characters 21-22
			$_g = $status->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:78: lines 78-86
			$changed = Signal_Impl_::dead();
		}
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:87: lines 87-90
		parent::__construct($changed, function () use (&$status) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:89: characters 13-19
			return $status;
		});
	}

	/**
	 * @param mixed $_
	 * @param mixed $_
	 * 
	 * @return mixed
	 */
	public function noop ($_, $_1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:73: characters 23-34
		return null;
	}
}

Boot::registerClass(SuspendableProgress::class, 'tink.core._Progress.SuspendableProgress');
