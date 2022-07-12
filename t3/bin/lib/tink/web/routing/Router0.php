<?php
/**
 */

namespace tink\web\routing;

use \php\_Boot\HxAnon;
use \tink\core\_Future\SyncFuture;
use \tink\querystring\_Pairs\Pairs_Impl_;
use \php\Boot;
use \tink\core\TypedError;
use \tink\querystring\Parser3 as QuerystringParser3;
use \tink\core\Outcome;
use \tink\querystring\Parser0 as QuerystringParser0;
use \tink\json\Parser0;
use \tink\querystring\Parser1 as QuerystringParser1;
use \tink\core\_Lazy\LazyConst;
use \tink\json\Writer0;
use \tink\json\Parser3;
use \tink\web\routing\_Response\Response_Impl_;
use \tink\core\_Promise\Promise_Impl_;
use \tink\json\Parser2;
use \tink\querystring\Parser2 as QuerystringParser2;
use \tink\core\_Future\FutureObject;
use \tink\json\Parser1;

class Router0 {
	/**
	 * @var \Root
	 */
	public $target;

	/**
	 * @param \Root $target
	 * 
	 * @return void
	 */
	public function __construct ($target) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:193: characters 11-31
		$this->target = $target;
	}

	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function division ($ctx) {
		#Server.hx:73: lines 73-87
		$_gthis = $this;
		$_g = null;
		$_g1 = $ctx->request->header->contentType();
		if ($_g1->index === 0) {
			$v = $_g1->params[0];
			$_g = "" . ($v->type??'null') . "/" . ($v->subtype??'null');
		} else {
			$_g = "application/json";
		}
		$tmp = null;
		if ($_g === "application/json") {
			$tmp = Promise_Impl_::next($ctx->allRaw(), function ($b) {
				return new SyncFuture(new LazyConst((new Parser3())->tryParse($b->toString())));
			});
		} else if ($_g === "application/x-www-form-urlencoded") {
			$tmp = Promise_Impl_::next($ctx->parse(), function ($pairs) {
				return new SyncFuture(new LazyConst((new QuerystringParser3(null, new _HxAnon_Router00("Server.hx", 73, "tink.web.routing.Router0", "division")))->tryParse(Pairs_Impl_::ofIterable($pairs))));
			});
		} else {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:673: characters 22-29
			$invalid = $_g;
			#Server.hx:73: lines 73-87
			$tmp = new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(406, "Cannot process Content-Type " . ($invalid??'null'), new _HxAnon_Router00("tink/web/macros/Routing.hx", 674, "tink.web.routing.Router0", "division")))));
		}
		return Promise_Impl_::next($tmp, function ($__body__) use (&$_gthis) {
			#Server.hx:19: characters 20-32
			$body = new _HxAnon_Router01($__body__->_3);
			#Server.hx:73: lines 73-87
			return Promise_Impl_::next(new SyncFuture(new LazyConst(Outcome::Success($_gthis->target->division($body)))), function ($v) {
				return new SyncFuture(new LazyConst(Outcome::Success($v)));
			});
		});
	}

	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function hello ($ctx) {
		#Server.hx:39: lines 39-42
		return Promise_Impl_::next(new SyncFuture(new LazyConst(Outcome::Success($this->target->hello()))), function ($v) {
			return new SyncFuture(new LazyConst(Outcome::Success(Response_Impl_::ofString($v))));
		});
	}

	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function multiplication ($ctx) {
		#Server.hx:63: lines 63-70
		$_gthis = $this;
		$_g = null;
		$_g1 = $ctx->request->header->contentType();
		if ($_g1->index === 0) {
			$v = $_g1->params[0];
			$_g = "" . ($v->type??'null') . "/" . ($v->subtype??'null');
		} else {
			$_g = "application/json";
		}
		$tmp = null;
		if ($_g === "application/json") {
			$tmp = Promise_Impl_::next($ctx->allRaw(), function ($b) {
				return new SyncFuture(new LazyConst((new Parser2())->tryParse($b->toString())));
			});
		} else if ($_g === "application/x-www-form-urlencoded") {
			$tmp = Promise_Impl_::next($ctx->parse(), function ($pairs) {
				return new SyncFuture(new LazyConst((new QuerystringParser2(null, new _HxAnon_Router00("Server.hx", 63, "tink.web.routing.Router0", "multiplication")))->tryParse(Pairs_Impl_::ofIterable($pairs))));
			});
		} else {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:673: characters 22-29
			$invalid = $_g;
			#Server.hx:63: lines 63-70
			$tmp = new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(406, "Cannot process Content-Type " . ($invalid??'null'), new _HxAnon_Router00("tink/web/macros/Routing.hx", 674, "tink.web.routing.Router0", "multiplication")))));
		}
		return Promise_Impl_::next($tmp, function ($__body__) use (&$_gthis, &$ctx) {
			#Server.hx:19: characters 20-32
			$body = new _HxAnon_Router01($__body__->_2);
			#Server.hx:63: lines 63-70
			return Promise_Impl_::next(new SyncFuture(new LazyConst(Outcome::Success($_gthis->target->multiplication($body)))), function ($__data__) use (&$ctx) {
				if (($ctx->accepts)("application/json")) {
					return new SyncFuture(new LazyConst(Outcome::Success(Response_Impl_::textual(200, "application/json", (new Writer0())->write($__data__), new \Array_hx()))));
				}
				return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(415, "Unsupported Media Type", new _HxAnon_Router00("Server.hx", 63, "tink.web.routing.Router0", "multiplication")))));
			});
		});
	}

	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function route ($ctx) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:197: characters 11-34
		$l = $ctx->parts->length - $ctx->depth;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:130: characters 22-39
		$_g = $ctx->request->header->method;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:133: characters 22-41
		$_g1 = $ctx->part(0);
		$_g2 = $ctx->part(1);
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:136: characters 22-31
		$_g3 = $l > 0;
		$_g4 = $l > 1;
		$_g5 = $l > 2;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:130: characters 22-39
		if ($_g === "GET") {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:133: characters 22-41
			if ($_g1 === "hello") {
				#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:136: characters 22-31
				if ($_g3 === true) {
					if ($_g4 === false) {
						#Server.hx:38: characters 8-16
						return $this->hello($ctx);
					} else {
						#Server.hx:19: characters 20-32
						$this1 = $ctx->request->header->url;
						return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
					}
				} else {
					$this1 = $ctx->request->header->url;
					return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
				}
			} else {
				$this1 = $ctx->request->header->url;
				return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
			}
		} else if ($_g === "POST") {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:133: characters 22-41
			if ($_g1 === "calculate") {
				if ($_g2 === "division") {
					#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:136: characters 22-31
					if ($_g3 === true) {
						if ($_g4 === true) {
							if ($_g5 === false) {
								#Server.hx:72: characters 9-30
								return $this->division($ctx);
							} else {
								#Server.hx:19: characters 20-32
								$this1 = $ctx->request->header->url;
								return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
							}
						} else {
							$this1 = $ctx->request->header->url;
							return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
						}
					} else {
						$this1 = $ctx->request->header->url;
						return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
					}
				} else if ($_g2 === "multiplication") {
					#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:136: characters 22-31
					if ($_g3 === true) {
						if ($_g4 === true) {
							if ($_g5 === false) {
								#Server.hx:62: characters 9-36
								return $this->multiplication($ctx);
							} else {
								#Server.hx:19: characters 20-32
								$this1 = $ctx->request->header->url;
								return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
							}
						} else {
							$this1 = $ctx->request->header->url;
							return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
						}
					} else {
						$this1 = $ctx->request->header->url;
						return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
					}
				} else if ($_g2 === "subtraction") {
					#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:136: characters 22-31
					if ($_g3 === true) {
						if ($_g4 === true) {
							if ($_g5 === false) {
								#Server.hx:52: characters 9-33
								return $this->subtraction($ctx);
							} else {
								#Server.hx:19: characters 20-32
								$this1 = $ctx->request->header->url;
								return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
							}
						} else {
							$this1 = $ctx->request->header->url;
							return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
						}
					} else {
						$this1 = $ctx->request->header->url;
						return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
					}
				} else if ($_g2 === "sum") {
					#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:136: characters 22-31
					if ($_g3 === true) {
						if ($_g4 === true) {
							if ($_g5 === false) {
								#Server.hx:44: characters 9-25
								return $this->sum($ctx);
							} else {
								#Server.hx:19: characters 20-32
								$this1 = $ctx->request->header->url;
								return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
							}
						} else {
							$this1 = $ctx->request->header->url;
							return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
						}
					} else {
						$this1 = $ctx->request->header->url;
						return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
					}
				} else {
					$this1 = $ctx->request->header->url;
					return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
				}
			} else {
				$this1 = $ctx->request->header->url;
				return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
			}
		} else {
			$this1 = $ctx->request->header->url;
			return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ((($this1->path === null ? "null" : $this1->path))??'null') . "?" . ((($this1->query === null ? "null" : $this1->query))??'null')))??'null'), new _HxAnon_Router00("Server.hx", 19, "tink.web.routing.Router0", "route")))));
		}
	}

	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function subtraction ($ctx) {
		#Server.hx:53: lines 53-60
		$_gthis = $this;
		$_g = null;
		$_g1 = $ctx->request->header->contentType();
		if ($_g1->index === 0) {
			$v = $_g1->params[0];
			$_g = "" . ($v->type??'null') . "/" . ($v->subtype??'null');
		} else {
			$_g = "application/json";
		}
		$tmp = null;
		if ($_g === "application/json") {
			$tmp = Promise_Impl_::next($ctx->allRaw(), function ($b) {
				return new SyncFuture(new LazyConst((new Parser1())->tryParse($b->toString())));
			});
		} else if ($_g === "application/x-www-form-urlencoded") {
			$tmp = Promise_Impl_::next($ctx->parse(), function ($pairs) {
				return new SyncFuture(new LazyConst((new QuerystringParser1(null, new _HxAnon_Router00("Server.hx", 53, "tink.web.routing.Router0", "subtraction")))->tryParse(Pairs_Impl_::ofIterable($pairs))));
			});
		} else {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:673: characters 22-29
			$invalid = $_g;
			#Server.hx:53: lines 53-60
			$tmp = new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(406, "Cannot process Content-Type " . ($invalid??'null'), new _HxAnon_Router00("tink/web/macros/Routing.hx", 674, "tink.web.routing.Router0", "subtraction")))));
		}
		return Promise_Impl_::next($tmp, function ($__body__) use (&$_gthis, &$ctx) {
			#Server.hx:19: characters 20-32
			$body = new _HxAnon_Router01($__body__->_1);
			#Server.hx:53: lines 53-60
			return Promise_Impl_::next(new SyncFuture(new LazyConst(Outcome::Success($_gthis->target->subtraction($body)))), function ($__data__) use (&$ctx) {
				if (($ctx->accepts)("application/json")) {
					return new SyncFuture(new LazyConst(Outcome::Success(Response_Impl_::textual(200, "application/json", (new Writer0())->write($__data__), new \Array_hx()))));
				}
				return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(415, "Unsupported Media Type", new _HxAnon_Router00("Server.hx", 53, "tink.web.routing.Router0", "subtraction")))));
			});
		});
	}

	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function sum ($ctx) {
		#Server.hx:45: lines 45-50
		$_gthis = $this;
		$_g = null;
		$_g1 = $ctx->request->header->contentType();
		if ($_g1->index === 0) {
			$v = $_g1->params[0];
			$_g = "" . ($v->type??'null') . "/" . ($v->subtype??'null');
		} else {
			$_g = "application/json";
		}
		$tmp = null;
		if ($_g === "application/json") {
			$tmp = Promise_Impl_::next($ctx->allRaw(), function ($b) {
				return new SyncFuture(new LazyConst((new Parser0())->tryParse($b->toString())));
			});
		} else if ($_g === "application/x-www-form-urlencoded") {
			$tmp = Promise_Impl_::next($ctx->parse(), function ($pairs) {
				return new SyncFuture(new LazyConst((new QuerystringParser0(null, new _HxAnon_Router00("Server.hx", 45, "tink.web.routing.Router0", "sum")))->tryParse(Pairs_Impl_::ofIterable($pairs))));
			});
		} else {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/macros/Routing.hx:673: characters 22-29
			$invalid = $_g;
			#Server.hx:45: lines 45-50
			$tmp = new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(406, "Cannot process Content-Type " . ($invalid??'null'), new _HxAnon_Router00("tink/web/macros/Routing.hx", 674, "tink.web.routing.Router0", "sum")))));
		}
		return Promise_Impl_::next($tmp, function ($__body__) use (&$_gthis, &$ctx) {
			#Server.hx:19: characters 20-32
			$body = new _HxAnon_Router01($__body__->_0);
			#Server.hx:45: lines 45-50
			return Promise_Impl_::next(new SyncFuture(new LazyConst(Outcome::Success($_gthis->target->sum($body)))), function ($__data__) use (&$ctx) {
				if (($ctx->accepts)("application/json")) {
					return new SyncFuture(new LazyConst(Outcome::Success(Response_Impl_::textual(200, "application/json", (new Writer0())->write($__data__), new \Array_hx()))));
				}
				return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(415, "Unsupported Media Type", new _HxAnon_Router00("Server.hx", 45, "tink.web.routing.Router0", "sum")))));
			});
		});
	}
}

class _HxAnon_Router00 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

class _HxAnon_Router01 extends HxAnon {
	function __construct($operands) {
		$this->operands = $operands;
	}
}

Boot::registerClass(Router0::class, 'tink.web.routing.Router0');
