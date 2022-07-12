<?php
/**
 */

namespace tink\io;

use \php\_Boot\HxAnon;
use \php\Boot;
use \haxe\Exception;
use \tink\core\TypedError;
use \tink\core\Outcome;
use \tink\chunk\ChunkCursor;

class BytewiseParser implements StreamParserObject {
	/**
	 * @param ChunkCursor $rest
	 * 
	 * @return Outcome
	 */
	public function eof ($rest) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:179: characters 19-28
		$_g = $this->read(-1);
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:180: characters 24-90
			return Outcome::Failure(new TypedError(422, "Unexpected end of input", new _HxAnon_BytewiseParser0("tink/io/StreamParser.hx", 180, "tink.io.BytewiseParser", "eof")));
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:181: characters 17-18
			$r = $_g->params[0];
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:181: characters 21-31
			return Outcome::Success($r);
		} else if ($__hx__switch === 2) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:182: characters 19-20
			$e = $_g->params[0];
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:182: characters 23-33
			return Outcome::Failure($e);
		}
	}

	/**
	 * @param ChunkCursor $cursor
	 * 
	 * @return ParseStep
	 */
	public function progress ($cursor) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:166: lines 166-173
		while (true) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:166: characters 15-39
			$_g = $this->read($cursor->currentByte);
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:168: characters 17-18
				$r = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:169: characters 9-22
				$cursor->next();
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:170: characters 9-23
				return ParseStep::Done($r);
			} else if ($__hx__switch === 2) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:171: characters 19-20
				$e = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:172: characters 9-25
				return ParseStep::Failed($e);
			}
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:166: lines 166-173
			if (!$cursor->next()) {
				break;
			}
		}
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:175: characters 5-22
		return ParseStep::Progressed();
	}

	/**
	 * @param int $char
	 * 
	 * @return ParseStep
	 */
	public function read ($char) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:161: characters 12-17
		throw Exception::thrown("abstract");
	}
}

class _HxAnon_BytewiseParser0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(BytewiseParser::class, 'tink.io.BytewiseParser');
