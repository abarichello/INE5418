<?php
/**
 */

namespace tink\web\routing;

use \tink\http\IncomingRequest;
use \tink\core\_Lazy\LazyFunc;
use \tink\core\_Lazy\LazyObject;
use \php\Boot;
use \haxe\ds\StringMap;

class AuthedContext extends Context {
	/**
	 * @var LazyObject
	 */
	public $session;
	/**
	 * @var LazyObject
	 */
	public $user;

	/**
	 * @param Context $parent
	 * @param \Closure $accepts
	 * @param IncomingRequest $request
	 * @param int $depth
	 * @param string[]|\Array_hx $parts
	 * @param StringMap $params
	 * @param LazyObject $session
	 * @param LazyObject $user
	 * 
	 * @return void
	 */
	public function __construct ($parent, $accepts, $request, $depth, $parts, $params, $session, $user = null) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:179: characters 5-27
		$this->session = $session;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:180: lines 180-184
		$tmp = null;
		if ($user === null) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:182: characters 9-53
			$this1 = $session;
			$f = function ($s) {
				#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:182: characters 34-52
				return $s->getUser();
			};
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:180: lines 180-184
			$tmp = new LazyFunc(function () use (&$f, &$this1) {
				#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:182: characters 9-53
				return $f($this1->get());
			}, $this1);
		} else {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:183: characters 12-13
			$v = $user;
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:180: lines 180-184
			$tmp = $v;
		}
		$this->user = $tmp;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:186: characters 5-58
		parent::__construct($parent, $accepts, $request, $depth, $parts, $params);
	}

	/**
	 * @param int $descend
	 * 
	 * @return AuthedContext
	 */
	public function sub ($descend) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:190: characters 5-100
		return new AuthedContext($this, $this->accepts, $this->request, $this->depth + $descend, $this->parts, $this->params, $this->session, $this->user);
	}
}

Boot::registerClass(AuthedContext::class, 'tink.web.routing.AuthedContext');
