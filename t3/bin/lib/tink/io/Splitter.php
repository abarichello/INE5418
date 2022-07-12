<?php
/**
 */

namespace tink\io;

use \tink\chunk\ChunkObject;
use \haxe\io\_BytesData\Container;
use \haxe\ds\Option;
use \php\Boot;
use \tink\chunk\ByteChunk;
use \haxe\io\Bytes;
use \tink\_Chunk\Chunk_Impl_;

class Splitter extends BytewiseParser {
	/**
	 * @var ChunkObject
	 */
	public $buf;
	/**
	 * @var ChunkObject
	 */
	public $delim;

	/**
	 * @param ChunkObject $delim
	 * 
	 * @return void
	 */
	public function __construct ($delim) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:112: characters 13-24
		$this->buf = Chunk_Impl_::$EMPTY;
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:114: characters 5-23
		$this->delim = $delim;
	}

	/**
	 * @param int $char
	 * 
	 * @return ParseStep
	 */
	public function read ($char) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:118: characters 5-37
		if ($char === -1) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:118: characters 20-37
			return ParseStep::Done(Option::None());
		}
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:120: characters 11-42
		$a = $this->buf;
		$s = \mb_chr($char);
		$b = \strlen($s);
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:120: characters 5-42
		$this->buf = Chunk_Impl_::concat($a, ByteChunk::of(new Bytes($b, new Container($s))));
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:121: lines 121-143
		if ($this->buf->getLength() >= $this->delim->getLength()) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:122: characters 7-34
			$bcursor = $this->buf->getCursor();
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:123: characters 7-48
			$delta = $this->buf->getLength() - $this->delim->getLength();
			$bcursor->moveTo($bcursor->currentPos + $delta);
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:124: characters 7-36
			$dcursor = $this->delim->getCursor();
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:126: characters 16-20
			$_g = 0;
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:126: characters 20-32
			$_g1 = $this->delim->getLength();
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:126: lines 126-134
			while ($_g < $_g1) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:126: characters 16-32
				$i = $_g++;
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:127: lines 127-133
				if ($bcursor->currentByte !== $dcursor->currentByte) {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:128: characters 11-28
					return ParseStep::Progressed();
				} else {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:131: characters 11-25
					$bcursor->next();
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:132: characters 11-25
					$dcursor->next();
				}
			}
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:135: characters 7-77
			$out = ParseStep::Done(Option::Some($this->buf->slice(0, $bcursor->currentPos - $this->delim->getLength())));
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:136: characters 7-24
			$this->buf = Chunk_Impl_::$EMPTY;
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:137: characters 7-17
			return $out;
		} else {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:141: characters 7-17
			return ParseStep::Progressed();
		}
	}
}

Boot::registerClass(Splitter::class, 'tink.io.Splitter');
