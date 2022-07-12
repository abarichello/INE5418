<?php
/**
 */

namespace tink\http\_Handler;

use \php\Boot;
use \tink\http\SimpleHandler;
use \tink\http\HandlerObject;

final class Handler_Impl_ {
	/**
	 * @param \Closure $f
	 * 
	 * @return HandlerObject
	 */
	public static function ofFunc ($f) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Handler.hx:29: characters 5-32
		return new SimpleHandler($f);
	}
}

Boot::registerClass(Handler_Impl_::class, 'tink.http._Handler.Handler_Impl_');
