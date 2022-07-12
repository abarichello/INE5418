<?php
/**
 */

namespace tink\http;

use \php\Boot;
use \tink\io\Transformer;
use \tink\streams\_Stream\Stream_Impl_;
use \haxe\io\_BytesData\Container as _BytesDataContainer;
use \tink\io\_Source\Source_Impl_;
use \tink\streams\StreamObject;
use \tink\chunk\ByteChunk;
use \tink\streams\_Stream\Mapping_Impl_;
use \haxe\io\Bytes;
use \tink\_Chunk\Chunk_Impl_;
use \haxe\iterators\ArrayIterator;

class ChunkedEncoder implements Transformer {
	/**
	 * @return void
	 */
	public function __construct () {
	}

	/**
	 * @param StreamObject $source
	 * 
	 * @return StreamObject
	 */
	public function transform ($source) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:38: lines 38-39
		$tmp = Source_Impl_::chunked($source)->map(Mapping_Impl_::ofPlain(function ($chunk) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:39: characters 43-78
			$s = "" . (\StringTools::hex($chunk->getLength())??'null') . "\x0D\x0A";
			$b = \strlen($s);
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:39: characters 43-87
			$a = Chunk_Impl_::concat(ByteChunk::of(new Bytes($b, new _BytesDataContainer($s))), $chunk);
			$b = \strlen("\x0D\x0A");
			return Chunk_Impl_::concat($a, ByteChunk::of(new Bytes($b, new _BytesDataContainer("\x0D\x0A"))));
		}));
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:40: characters 13-36
		$b = \strlen("0\x0D\x0A");
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:38: lines 38-40
		return $tmp->append(Stream_Impl_::ofIterator(new ArrayIterator(\Array_hx::wrap([ByteChunk::of(new Bytes($b, new _BytesDataContainer("0\x0D\x0A")))]))));
	}
}

Boot::registerClass(ChunkedEncoder::class, 'tink.http.ChunkedEncoder');
