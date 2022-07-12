<?php
/**
 */

use \php\_Boot\HxAnon;
use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \haxe\Log;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Promise\Recover_Impl_;
use \tink\web\routing\Router0;
use \tink\http\containers\PhpContainer;
use \tink\core\_Future\Future_Impl_;
use \tink\http\SimpleHandler;
use \tink\http\_Response\OutgoingResponse_Impl_;
use \tink\web\routing\Context;

class Server {
	/**
	 * @return void
	 */
	public static function main () {
		#Server.hx:17: characters 3-37
		$container = PhpContainer::$inst;
		#Server.hx:19: characters 3-45
		$router = new Router0(new \Root());
		#Server.hx:21: lines 21-23
		$container->run(new SimpleHandler(function ($req) use (&$router) {
			#Server.hx:22: characters 11-85
			$this1 = $router->route(Context::ofRequest($req));
			$f = Recover_Impl_::ofSync(Boot::getStaticClosure(OutgoingResponse_Impl_::class, 'reportError'));
			return Future_Impl_::flatMap($this1, function ($o) use (&$f) {
				$__hx__switch = ($o->index);
				if ($__hx__switch === 0) {
					$d = $o->params[0];
					return new SyncFuture(new LazyConst($d));
				} else if ($__hx__switch === 1) {
					$e = $o->params[0];
					return $f($e);
				}
			});
		}));
		#Server.hx:25: characters 3-8
		(Log::$trace)("Server is listening at port 8080", new _HxAnon_Server0("Server.hx", 25, "Server", "main"));
	}
}

class _HxAnon_Server0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(Server::class, 'Server');
