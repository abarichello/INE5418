<?php
/**
 */

namespace tink\http;

use \php\_Boot\HxAnon;
use \tink\chunk\_Seekable\Seekable_Impl_;
use \tink\io\StreamParserObject;
use \php\Boot;
use \haxe\io\_BytesData\Container as _BytesDataContainer;
use \tink\core\TypedError;
use \tink\core\Outcome;
use \tink\io\ParseStep;
use \haxe\io\Bytes;
use \tink\_Chunk\Chunk_Impl_;
use \tink\chunk\ChunkCursor;

class ChunkedParser implements StreamParserObject {
	/**
	 * @var int[]|\Array_hx
	 */
	static public $LINEBREAK;

	/**
	 * @var int
	 */
	public $chunkSize;

	/**
	 * @return void
	 */
	public function __construct () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:62: characters 3-10
		$this->reset();
	}

	/**
	 * @param ChunkCursor $rest
	 * 
	 * @return Outcome
	 */
	public function eof ($rest) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:89: characters 10-95
		if ($this->chunkSize === 0) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:89: characters 27-47
			return Outcome::Success(Chunk_Impl_::$EMPTY);
		} else {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:89: characters 50-95
			return Outcome::Failure(new TypedError(null, "Unexpected end of input", new _HxAnon_ChunkedParser0("tink/http/Chunked.hx", 89, "tink.http.ChunkedParser", "eof")));
		}
	}

	/**
	 * @param ChunkCursor $cursor
	 * 
	 * @return ParseStep
	 */
	public function progress ($cursor) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:70: lines 70-85
		if ($this->chunkSize < 0) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:71: characters 12-34
			$_g = $cursor->seek(ChunkedParser::$LINEBREAK);
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:72: characters 16-17
				$v = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:72: characters 20-52
				$this->chunkSize = \Std::parseInt("0x" . ((($v === null ? "null" : $v->toString()))??'null'));
			} else if ($__hx__switch === 1) {
			}
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:75: characters 5-15
			return ParseStep::Progressed();
		} else if ($this->chunkSize === 0) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:77: characters 5-15
			return ParseStep::Progressed();
		} else if ($cursor->length >= ($this->chunkSize + 2)) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:80: characters 13-35
			$_g = $cursor->seek(ChunkedParser::$LINEBREAK);
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:81: characters 17-18
				$v = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:81: characters 21-28
				$this->reset();
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:81: characters 30-37
				return ParseStep::Done($v);
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:82: characters 18-55
				return ParseStep::Failed(new TypedError(null, "Invalid encoding", new _HxAnon_ChunkedParser0("tink/http/Chunked.hx", 82, "tink.http.ChunkedParser", "progress")));
			}
		} else {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:84: characters 10-20
			return ParseStep::Progressed();
		}
	}

	/**
	 * @return void
	 */
	public function reset () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:66: characters 3-17
		$this->chunkSize = -1;
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		$tmp = \strlen("\x0D\x0A");
		self::$LINEBREAK = Seekable_Impl_::ofBytes(new Bytes($tmp, new _BytesDataContainer("\x0D\x0A")));
	}
}

class _HxAnon_ChunkedParser0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(ChunkedParser::class, 'tink.http.ChunkedParser');
ChunkedParser::__hx__init();
