<?php
/**
 */

use \haxe\io\_BytesData\Container;
use \php\_Boot\HxAnon;
use \php\Boot;
use \tink\streams\Single;
use \tink\chunk\ByteChunk;
use \tink\http\ResponseHeaderBase;
use \tink\core\_Lazy\LazyConst;
use \haxe\Json;
use \tink\http\_Response\OutgoingResponseData;
use \haxe\io\Bytes;

class Root {
	/**
	 * @return void
	 */
	public function __construct () {
	}

	/**
	 * @param object $body
	 * 
	 * @return OutgoingResponseData
	 */
	public function division ($body) {
		#Server.hx:74: lines 74-77
		if ($body->operands->length !== 2) {
			#Server.hx:75: characters 39-60
			$this1 = new ResponseHeaderBase(400, null, null, "HTTP/1.1");
			#Server.hx:75: characters 62-117
			$s = Json::phpJsonEncode(new _HxAnon_Root0("Invalid number of operands"), null, null);
			$b = strlen($s);
			#Server.hx:75: characters 18-118
			$this2 = new OutgoingResponseData($this1, new Single(new LazyConst(ByteChunk::of(new Bytes($b, new Container($s))))));
			#Server.hx:75: characters 4-119
			$error = $this2;
			#Server.hx:76: characters 4-16
			return $error;
		}
		#Server.hx:78: lines 78-81
		if (($body->operands->arr[1] ?? null) === 0) {
			#Server.hx:79: characters 39-60
			$this1 = new ResponseHeaderBase(400, null, null, "HTTP/1.1");
			#Server.hx:79: characters 62-115
			$s = Json::phpJsonEncode(new _HxAnon_Root0("Invalid division by zero"), null, null);
			$b = strlen($s);
			#Server.hx:79: characters 18-116
			$this2 = new OutgoingResponseData($this1, new Single(new LazyConst(ByteChunk::of(new Bytes($b, new Container($s))))));
			#Server.hx:79: characters 4-117
			$error = $this2;
			#Server.hx:80: characters 4-16
			return $error;
		}
		#Server.hx:82: characters 38-59
		$this1 = new ResponseHeaderBase(400, null, null, "HTTP/1.1");
		#Server.hx:82: characters 61-116
		$s = Json::phpJsonEncode(new _HxAnon_Root0("Invalid number of operands"), null, null);
		$b = strlen($s);
		#Server.hx:82: characters 17-117
		$this2 = new OutgoingResponseData($this1, new Single(new LazyConst(ByteChunk::of(new Bytes($b, new Container($s))))));
		#Server.hx:82: characters 3-118
		$error = $this2;
		#Server.hx:83: characters 3-15
		return $error;
	}

	/**
	 * @return string
	 */
	public function hello () {
		#Server.hx:40: characters 3-27
		$this->print("Received /hello");
		#Server.hx:41: characters 3-14
		return "OK";
	}

	/**
	 * @param object $body
	 * 
	 * @return object
	 */
	public function multiplication ($body) {
		#Server.hx:64: characters 3-34
		$start = ($body->operands->arr[0] ?? null);
		#Server.hx:65: characters 3-26
		$body->operands->remove(0);
		#Server.hx:66: characters 3-56
		$sum = function ($num, $total) {
			#Server.hx:66: characters 43-55
			$total *= $num;
			#Server.hx:66: characters 36-55
			return $total;
		};
		#Server.hx:67: characters 3-46
		$res = \Lambda::fold($body->operands, $sum, $start);
		#Server.hx:68: characters 3-101
		$this->print("Received /calculate/multiplication with operands " . \Std::string($body->operands) . " which results in " . ($res??'null'));
		#Server.hx:69: characters 3-25
		return new _HxAnon_Root1($res);
	}

	/**
	 * @param string $s
	 * 
	 * @return void
	 */
	public function print ($s) {
	}

	/**
	 * @param object $body
	 * 
	 * @return object
	 */
	public function subtraction ($body) {
		#Server.hx:54: characters 3-34
		$start = ($body->operands->arr[0] ?? null);
		#Server.hx:55: characters 3-26
		$body->operands->remove(0);
		#Server.hx:56: characters 3-56
		$sum = function ($num, $total) {
			#Server.hx:56: characters 43-55
			$total -= $num;
			#Server.hx:56: characters 36-55
			return $total;
		};
		#Server.hx:57: characters 3-46
		$res = \Lambda::fold($body->operands, $sum, $start);
		#Server.hx:58: characters 3-98
		$this->print("Received /calculate/subtraction with operands " . \Std::string($body->operands) . " which results in " . ($res??'null'));
		#Server.hx:59: characters 3-25
		return new _HxAnon_Root1($res);
	}

	/**
	 * @param object $body
	 * 
	 * @return object
	 */
	public function sum ($body) {
		#Server.hx:46: characters 3-56
		$sum = function ($num, $total) {
			#Server.hx:46: characters 43-55
			$total += $num;
			#Server.hx:46: characters 36-55
			return $total;
		};
		#Server.hx:47: characters 3-42
		$res = \Lambda::fold($body->operands, $sum, 0);
		#Server.hx:48: characters 3-90
		$this->print("Received /calculate/sum with operands " . \Std::string($body->operands) . " which results in " . ($res??'null'));
		#Server.hx:49: characters 3-25
		return new _HxAnon_Root1($res);
	}
}

class _HxAnon_Root0 extends HxAnon {
	function __construct($_hx_0) {
		$this->{"error"} = $_hx_0;
	}
}

class _HxAnon_Root1 extends HxAnon {
	function __construct($_hx_0) {
		$this->{"result"} = $_hx_0;
	}
}

Boot::registerClass(Root::class, 'Root');
