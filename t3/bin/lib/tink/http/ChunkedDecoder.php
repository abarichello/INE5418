<?php
/**
 */

namespace tink\http;

use \tink\io\RealSourceTools;
use \php\Boot;
use \tink\io\Transformer;
use \tink\streams\StreamObject;
use \tink\streams\_Stream\Mapping_Impl_;
use \tink\_Chunk\Chunk_Impl_;

class ChunkedDecoder implements Transformer {
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
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:48: lines 48-52
		return RealSourceTools::parseStream($source, new ChunkedParser())->map(Mapping_Impl_::ofPlain(function ($v) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:50: characters 29-56
			if ($v === null) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:50: characters 41-52
				return Chunk_Impl_::$EMPTY;
			} else {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Chunked.hx:50: characters 55-56
				return $v;
			}
		}));
	}
}

Boot::registerClass(ChunkedDecoder::class, 'tink.http.ChunkedDecoder');
