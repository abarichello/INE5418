<?php
/**
 */

namespace tink\streams;

use \php\Boot;

class IdealStreamBase extends StreamBase {
	/**
	 * @return void
	 */
	public function __construct () {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/IdealStream.hx:28: lines 28-31
		parent::__construct();
	}

	/**
	 * @param \Closure $rescue
	 * 
	 * @return StreamObject
	 */
	public function idealize ($rescue) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/IdealStream.hx:30: characters 5-16
		return $this;
	}
}

Boot::registerClass(IdealStreamBase::class, 'tink.streams.IdealStreamBase');