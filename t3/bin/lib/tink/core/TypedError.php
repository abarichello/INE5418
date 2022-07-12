<?php
/**
 */

namespace tink\core;

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \haxe\Exception;
use \haxe\StackItem;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Future\FutureObject;

class TypedError {
	/**
	 * @var StackItem[]|\Array_hx
	 */
	public $callStack;
	/**
	 * @var int
	 */
	public $code;
	/**
	 * @var mixed
	 */
	public $data;
	/**
	 * @var StackItem[]|\Array_hx
	 */
	public $exceptionStack;
	/**
	 * @var bool
	 */
	public $isTinkError;
	/**
	 * @var string
	 */
	public $message;
	/**
	 * @var object
	 */
	public $pos;

	/**
	 * @param mixed $v
	 * 
	 * @return TypedError
	 */
	public static function asError ($v) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:125: characters 9-31
		$value = $v;
		if (($value instanceof TypedError)) {
			return $value;
		} else {
			return null;
		}
	}

	/**
	 * @param \Closure $f
	 * @param \Closure $report
	 * @param object $pos
	 * 
	 * @return Outcome
	 */
	public static function catchExceptions ($f, $report = null, $pos = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:130: lines 130-144
		try {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:131: characters 9-21
			return Outcome::Success($f());
		} catch(\Throwable $_g) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:132: characters 14-15
			$e = Exception::caught($_g)->unwrap();
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:133: characters 9-28
			$e1 = TypedError::asError($e);
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:135: lines 135-142
			$tmp = null;
			if ($e1 === null) {
				$tmp = ($report === null ? TypedError::withData(null, "Unexpected Error", $e1, $pos) : $report($e1));
			} else {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:141: characters 20-21
				$e = $e1;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:135: lines 135-142
				$tmp = $e;
			}
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:134: lines 134-143
			return Outcome::Failure($tmp);
		}
	}

	/**
	 * @param int $code
	 * @param string $message
	 * @param object $pos
	 * 
	 * @return \Closure
	 */
	public static function reporter ($code, $message, $pos = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:147: lines 147-148
		return function ($e) use (&$pos, &$message, &$code) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:148: characters 28-72
			return TypedError::withData($code, $message, $e, $pos);
		};
	}

	/**
	 * @param mixed $any
	 * 
	 * @return mixed
	 */
	public static function rethrow ($any) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:154: characters 7-27
		if (isset($__hx__caught_e, $__hx__real_e) && Boot::equal($any, $__hx__real_e)) {
			throw $__hx__caught_e;
		}
		throw Exception::thrown($any);
	}

	/**
	 * @param \Closure $f
	 * @param \Closure $cleanup
	 * 
	 * @return mixed
	 */
	public static function tryFinally ($f, $cleanup) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:172: lines 172-180
		try {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:173: characters 7-21
			$ret = $f();
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:174: characters 7-16
			$cleanup();
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:175: characters 7-17
			return $ret;
		} catch(\Throwable $_g) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:177: characters 12-13
			$e = Exception::caught($_g)->unwrap();
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:178: characters 7-16
			$cleanup();
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:179: characters 14-24
			if (isset($__hx__caught_e, $__hx__real_e) && Boot::equal($e, $__hx__real_e)) {
				throw $__hx__caught_e;
			}
			throw Exception::thrown($e);
		}
	}

	/**
	 * @param int $code
	 * @param string $message
	 * @param mixed $data
	 * @param object $pos
	 * 
	 * @return TypedError
	 */
	public static function typed ($code, $message, $data, $pos = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:104: characters 5-50
		$ret = new TypedError($code, $message, $pos);
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:105: characters 5-20
		$ret->data = $data;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:106: characters 5-15
		return $ret;
	}

	/**
	 * @param int $code
	 * @param string $message
	 * @param mixed $data
	 * @param object $pos
	 * 
	 * @return TypedError
	 */
	public static function withData ($code, $message, $data, $pos = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:100: characters 5-43
		return TypedError::typed($code, $message, $data, $pos);
	}

	/**
	 * @param int $code
	 * @param string $message
	 * @param object $pos
	 * 
	 * @return void
	 */
	public function __construct ($code, $message, $pos = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:49: lines 49-183
		if ($code === null) {
			$code = 500;
		}
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:56: characters 21-25
		$this->isTinkError = true;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:59: characters 5-21
		$this->code = $code;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:60: characters 5-27
		$this->message = $message;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:61: characters 5-19
		$this->pos = $pos;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:62: characters 5-98
		$this->exceptionStack = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:63: characters 5-88
		$this->callStack = new \Array_hx();
	}

	/**
	 * @return string
	 */
	public function printPos () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:66: lines 66-72
		return ($this->pos->className??'null') . "." . ($this->pos->methodName??'null') . ":" . ($this->pos->lineNumber??'null');
	}

	/**
	 * @return mixed
	 */
	public function throwSelf () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:96: characters 9-22
		$any = $this;
		if (isset($__hx__caught_e, $__hx__real_e) && Boot::equal($any, $__hx__real_e)) {
			throw $__hx__caught_e;
		}
		throw Exception::thrown($any);
	}

	/**
	 * @return FutureObject
	 */
	public function toPromise () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:85: characters 5-37
		return new SyncFuture(new LazyConst(Outcome::Failure($this)));
	}

	/**
	 * @return string
	 */
	public function toString () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:76: characters 5-39
		$ret = "Error#" . ($this->code??'null') . ": " . ($this->message??'null');
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:78: lines 78-79
		if ($this->pos !== null) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:79: characters 7-30
			$ret = ($ret??'null') . " @ " . ($this->printPos()??'null');
		}
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Error.hx:81: characters 5-15
		return $ret;
	}

	public function __toString() {
		return $this->toString();
	}
}

Boot::registerClass(TypedError::class, 'tink.core.TypedError');
