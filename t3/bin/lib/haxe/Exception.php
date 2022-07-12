<?php
/**
 */

namespace haxe;

use \php\Boot;

/**
 * Base class for exceptions.
 * If this class (or derivatives) is used to catch an exception, then
 * `haxe.CallStack.exceptionStack()` will not return a stack for the exception
 * caught. Use `haxe.Exception.stack` property instead:
 * ```haxe
 * try {
 * throwSomething();
 * } catch(e:Exception) {
 * trace(e.stack);
 * }
 * ```
 * Custom exceptions should extend this class:
 * ```haxe
 * class MyException extends haxe.Exception {}
 * //...
 * throw new MyException('terrible exception');
 * ```
 * `haxe.Exception` is also a wildcard type to catch any exception:
 * ```haxe
 * try {
 * throw 'Catch me!';
 * } catch(e:haxe.Exception) {
 * trace(e.message); // Output: Catch me!
 * }
 * ```
 * To rethrow an exception just throw it again.
 * Haxe will try to rethrow an original native exception whenever possible.
 * ```haxe
 * try {
 * var a:Array<Int> = null;
 * a.push(1); // generates target-specific null-pointer exception
 * } catch(e:haxe.Exception) {
 * throw e; // rethrows native exception instead of haxe.Exception
 * }
 * ```
 */
class Exception extends \Exception {
	/**
	 * @var \Throwable
	 */
	public $__nativeException;
	/**
	 * @var Exception
	 */
	public $__previousException;
	/**
	 * @var int
	 */
	public $__skipStack;

	/**
	 * @param mixed $value
	 * 
	 * @return Exception
	 */
	public static function caught ($value) {
		#/usr/share/haxe/std/php/_std/haxe/Exception.hx:20: lines 20-26
		if (($value instanceof Exception)) {
			#/usr/share/haxe/std/php/_std/haxe/Exception.hx:21: characters 4-16
			return $value;
		} else if (($value instanceof \Throwable)) {
			#/usr/share/haxe/std/php/_std/haxe/Exception.hx:23: characters 4-69
			return new Exception($value->getMessage(), null, $value);
		} else {
			#/usr/share/haxe/std/php/_std/haxe/Exception.hx:25: characters 4-49
			return new ValueException($value, null, $value);
		}
	}

	/**
	 * @param mixed $value
	 * 
	 * @return mixed
	 */
	public static function thrown ($value) {
		#/usr/share/haxe/std/php/_std/haxe/Exception.hx:30: lines 30-38
		if (($value instanceof Exception)) {
			#/usr/share/haxe/std/php/_std/haxe/Exception.hx:31: characters 4-35
			return $value->get_native();
		} else if (($value instanceof \Throwable)) {
			#/usr/share/haxe/std/php/_std/haxe/Exception.hx:33: characters 4-16
			return $value;
		} else {
			#/usr/share/haxe/std/php/_std/haxe/Exception.hx:35: characters 4-38
			$e = new ValueException($value);
			#/usr/share/haxe/std/php/_std/haxe/Exception.hx:36: characters 4-21
			$e->__skipStack = 1;
			#/usr/share/haxe/std/php/_std/haxe/Exception.hx:37: characters 4-12
			return $e;
		}
	}

	/**
	 * Create a new Exception instance.
	 * The `previous` argument could be used for exception chaining.
	 * The `native` argument is for internal usage only.
	 * There is no need to provide `native` argument manually and no need to keep it
	 * upon extending `haxe.Exception` unless you know what you're doing.
	 * 
	 * @param string $message
	 * @param Exception $previous
	 * @param mixed $native
	 * 
	 * @return void
	 */
	public function __construct ($message, $previous = null, $native = null) {
		#/usr/share/haxe/std/php/_std/haxe/Exception.hx:16: characters 39-40
		$this->__skipStack = 0;
		#/usr/share/haxe/std/php/_std/haxe/Exception.hx:42: characters 3-30
		parent::__construct($message, 0, $previous);
		#/usr/share/haxe/std/php/_std/haxe/Exception.hx:43: characters 3-38
		$this->__previousException = $previous;
		#/usr/share/haxe/std/php/_std/haxe/Exception.hx:44: lines 44-48
		if (($native !== null) && ($native instanceof \Throwable)) {
			#/usr/share/haxe/std/php/_std/haxe/Exception.hx:45: characters 4-30
			$this->__nativeException = $native;
		} else {
			#/usr/share/haxe/std/php/_std/haxe/Exception.hx:47: characters 4-33
			$this->__nativeException = $this;
		}
	}

	/**
	 * @return string
	 */
	public function get_message () {
		#/usr/share/haxe/std/php/_std/haxe/Exception.hx:64: characters 3-27
		return $this->getMessage();
	}

	/**
	 * @return mixed
	 */
	final public function get_native () {
		#/usr/share/haxe/std/php/_std/haxe/Exception.hx:72: characters 3-27
		return $this->__nativeException;
	}

	/**
	 * Returns exception message.
	 * 
	 * @return string
	 */
	public function toString () {
		#/usr/share/haxe/std/php/_std/haxe/Exception.hx:56: characters 3-17
		return $this->get_message();
	}

	/**
	 * @return mixed
	 */
	public function unwrap () {
		#/usr/share/haxe/std/php/_std/haxe/Exception.hx:52: characters 3-27
		return $this->__nativeException;
	}

	public function __toString() {
		return $this->toString();
	}
}

Boot::registerClass(Exception::class, 'haxe.Exception');
Boot::registerGetters('haxe\\Exception', [
	'native' => true,
	'message' => true
]);
