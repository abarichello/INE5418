<?php
/**
 */

namespace tink\web\routing;

use \tink\http\IncomingRequest;
use \php\_Boot\HxAnon;
use \tink\core\_Lazy\LazyFunc;
use \tink\core\_Future\SyncFuture;
use \tink\io\RealSourceTools;
use \tink\querystring\_Pairs\Pairs_Impl_;
use \tink\core\NamedWith;
use \php\Boot;
use \tink\url\_Query\QueryStringParser;
use \tink\io\_Source\Source_Impl_;
use \tink\core\TypedError;
use \tink\http\Header;
use \tink\streams\StreamObject;
use \tink\url\_Query\Query_Impl_;
use \tink\core\Outcome;
use \tink\url\_Path\Path_Impl_;
use \tink\core\_Lazy\LazyConst;
use \tink\http\IncomingRequestHeader;
use \tink\core\_Promise\Next_Impl_;
use \tink\http\_Header\HeaderValue_Impl_;
use \haxe\ds\StringMap;
use \tink\core\_Promise\Promise_Impl_;
use \tink\core\_Future\FutureObject;
use \tink\http\BodyPart;
use \tink\url\_Portion\Portion_Impl_;

class Context {
	/**
	 * @var \Closure
	 */
	public $accepts;
	/**
	 * @var int
	 */
	public $depth;
	/**
	 * @var StringMap
	 */
	public $params;
	/**
	 * @var Context
	 */
	public $parent;
	/**
	 * @var string[]|\Array_hx
	 */
	public $parts;
	/**
	 * @var IncomingRequest
	 */
	public $request;

	/**
	 * @param string $s
	 * 
	 * @return bool
	 */
	public static function acceptsAll ($s) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:167: characters 40-51
		return true;
	}

	/**
	 * @param IncomingRequest $request
	 * @param \Closure $getSession
	 * 
	 * @return AuthedContext
	 */
	public static function authed ($request, $getSession) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:150: characters 7-40
		$tmp = Context::parseAcceptHeader($request->header);
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:153: characters 7-38
		$tmp1 = Path_Impl_::parts($request->header->url->path);
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:154: characters 7-31
		$tmp2 = Query_Impl_::toMap($request->header->url->query);
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:155: characters 7-17
		$_g = $getSession;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:155: characters 23-37
		$a1 = $request->header;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:148: lines 148-156
		return new AuthedContext(null, $tmp, $request, 0, $tmp1, $tmp2, new LazyFunc(function () use (&$_g, &$a1) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:155: characters 7-22
			return $_g($a1);
		}));
	}

	/**
	 * @param IncomingRequest $request
	 * 
	 * @return Context
	 */
	public static function ofRequest ($request) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:140: characters 7-40
		$tmp = Context::parseAcceptHeader($request->header);
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:143: characters 7-38
		$tmp1 = Path_Impl_::parts($request->header->url->path);
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:138: lines 138-145
		return new Context(null, $tmp, $request, 0, $tmp1, Query_Impl_::toMap($request->header->url->query));
	}

	/**
	 * @param Header $h
	 * 
	 * @return \Closure
	 */
	public static function parseAcceptHeader ($h) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:159: characters 19-32
		$_g = $h->get("accept");
		if ($_g->length === 0) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:160: characters 16-26
			return Boot::getStaticClosure(Context::class, 'acceptsAll');
		} else {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:161: characters 12-18
			$values = $_g;
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:162: characters 24-86
			$accepted_data = null;
			$this1 = [];
			$accepted_data = $this1;
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:162: characters 25-85
			$_g = 0;
			while ($_g < $values->length) {
				#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:162: characters 30-31
				$v = ($values->arr[$_g] ?? null);
				#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:162: characters 25-85
				++$_g;
				#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:162: characters 43-85
				$_g1 = 0;
				$_g2 = HeaderValue_Impl_::parse($v);
				while ($_g1 < $_g2->length) {
					#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:162: characters 48-52
					$part = ($_g2->arr[$_g1] ?? null);
					#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:162: characters 43-85
					++$_g1;
					#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:162: characters 67-85
					$accepted_data[$part->value] = true;
				}
			}
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:163: lines 163-164
			if (($accepted_data["*/*"] ?? null)) {
				#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:163: characters 30-40
				return Boot::getStaticClosure(Context::class, 'acceptsAll');
			} else {
				#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:164: characters 14-52
				return function ($t) use (&$accepted_data) {
					#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:164: characters 27-52
					return \array_key_exists($t, $accepted_data);
				};
			}
		}
	}

	/**
	 * @param string $header
	 * 
	 * @return string
	 */
	public static function toCamelCase ($header) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:55: characters 5-32
		$header1 = $header;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:56: lines 56-58
		$ret = new \StringBuf();
		$pos = 0;
		$max = mb_strlen($header1);
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:60: lines 60-68
		while ($pos < $max) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:61: characters 14-38
			$_g = \StringTools::fastCodeAt($header1, $pos++);
			if ($_g === 45) {
				#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:63: lines 63-64
				if ($pos < $max) {
					#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:64: characters 35-40
					$index = $pos++;
					#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:64: characters 13-56
					$ret->add(\mb_strtolower(($index < 0 ? "" : \mb_substr($header1, $index, 1))));
				}
			} else {
				#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:65: characters 14-15
				$v = $_g;
				#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:66: characters 11-14
				$ret1 = $ret;
				#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:66: characters 11-25
				$ret1->b = ($ret1->b??'null') . (\mb_chr($v)??'null');
			}
		}
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:70: characters 5-26
		return $ret->b;
	}

	/**
	 * @param Context $parent
	 * @param \Closure $accepts
	 * @param IncomingRequest $request
	 * @param int $depth
	 * @param string[]|\Array_hx $parts
	 * @param StringMap $params
	 * 
	 * @return void
	 */
	public function __construct ($parent, $accepts, $request, $depth, $parts, $params) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:126: characters 5-25
		$this->parent = $parent;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:127: characters 5-27
		$this->accepts = $accepts;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:128: characters 5-27
		$this->request = $request;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:129: characters 5-23
		$this->depth = $depth;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:130: characters 5-23
		$this->parts = $parts;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:131: characters 5-25
		$this->params = $params;
	}

	/**
	 * @return FutureObject
	 */
	public function allRaw () {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:41: characters 12-23
		$_g = $this->request->body;
		$tmp = null;
		if ($_g->index === 0) {
			$s = $_g->params[0];
			$tmp = $s;
		} else {
			$tmp = Source_Impl_::ofError(new TypedError(501, "not implemented", new _HxAnon_Context0("tink/web/routing/Context.hx", 47, "tink.web.routing.Context", "get_rawBody")));
		}
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:41: characters 5-25
		return RealSourceTools::all($tmp);
	}

	/**
	 * @return string[]|\Array_hx
	 */
	public function getPath () {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:114: characters 5-40
		return $this->parts->slice($this->depth);
	}

	/**
	 * @return string[]|\Array_hx
	 */
	public function getPrefix () {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:111: characters 5-43
		return $this->parts->slice(0, $this->depth);
	}

	/**
	 * @return IncomingRequestHeader
	 */
	public function get_header () {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:35: characters 7-28
		return $this->request->header;
	}

	/**
	 * @return int
	 */
	public function get_pathLength () {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:108: characters 7-44
		return $this->parts->length - $this->depth;
	}

	/**
	 * @return StreamObject
	 */
	public function get_rawBody () {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:45: characters 21-38
		$_g = $this->request->body;
		if ($_g->index === 0) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:46: characters 20-21
			$s = $_g->params[0];
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:46: characters 24-25
			return $s;
		} else {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:47: characters 9-62
			return Source_Impl_::ofError(new TypedError(501, "not implemented", new _HxAnon_Context0("tink/web/routing/Context.hx", 47, "tink.web.routing.Context", "get_rawBody")));
		}
	}

	/**
	 * @param string $name
	 * 
	 * @return bool
	 */
	public function hasParam ($name) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:117: characters 12-36
		return \array_key_exists($name, $this->params->data);
	}

	/**
	 * @return object
	 */
	public function headers () {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:51: characters 12-58
		$_g = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:51: characters 23-29
		$_g1_current = 0;
		$_g1_array = $this->request->header->fields;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:51: characters 13-57
		while ($_g1_current < $_g1_array->length) {
			$f = ($_g1_array->arr[$_g1_current++] ?? null);
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:51: characters 31-57
			$x = new NamedWith($f->name, $f->value);
			$_g->arr[$_g->length++] = $x;
		}
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:51: characters 5-58
		return Pairs_Impl_::ofIterable($_g);
	}

	/**
	 * @param string $name
	 * 
	 * @return string
	 */
	public function param ($name) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:123: characters 5-29
		return Portion_Impl_::stringly(($this->params->data[$name] ?? null));
	}

	/**
	 * @return FutureObject
	 */
	public function parse () {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:74: characters 19-36
		$_g = $this->request->body;
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:76: characters 18-21
			$src = $_g->params[0];
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:77: lines 77-80
			$parseForm = function () use (&$src) {
				#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:78: lines 78-80
				return Promise_Impl_::next(RealSourceTools::all($src), Next_Impl_::ofSafeSync(function ($chunk) {
					#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:80: characters 63-145
					$_g = new \Array_hx();
					#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:80: characters 64-144
					$part = new QueryStringParser($chunk->toString(), "&", "=", 0);
					while ($part->hasNext()) {
						$part1 = $part->next();
						#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:80: characters 115-124
						$part2 = $part1->name;
						#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:80: characters 105-144
						$x = new NamedWith($part2, BodyPart::Value(Portion_Impl_::toString($part1->value)));
						$_g->arr[$_g->length++] = $x;
					}
					#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:80: characters 63-145
					return $_g;
				}));
			};
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:102: characters 11-22
			return $parseForm();
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:75: characters 19-24
			$parts = $_g->params[0];
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:75: characters 7-32
			return new SyncFuture(new LazyConst(Outcome::Success($parts)));
		}
	}

	/**
	 * @param int $index
	 * 
	 * @return string
	 */
	public function part ($index) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:120: characters 12-94
		if (($this->depth + $index) >= $this->parts->length) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:120: characters 56-58
			return "";
		} else {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:120: characters 64-94
			return Portion_Impl_::stringly(($this->parts->arr[$this->depth + $index] ?? null));
		}
	}

	/**
	 * @param int $descend
	 * 
	 * @return Context
	 */
	public function sub ($descend) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/routing/Context.hx:135: characters 5-104
		return new Context($this, $this->accepts, $this->request, $this->depth + $descend, $this->parts, $this->params);
	}
}

class _HxAnon_Context0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(Context::class, 'tink.web.routing.Context');
Boot::registerGetters('tink\\web\\routing\\Context', [
	'pathLength' => true,
	'rawBody' => true,
	'header' => true
]);