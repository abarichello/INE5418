<?php
/**
 */

namespace tink\io;

use \php\Boot;
use \tink\core\Outcome;
use \tink\chunk\ChunkCursor;

interface StreamParserObject {
	/**
	 * @param ChunkCursor $rest
	 * 
	 * @return Outcome
	 */
	public function eof ($rest) ;

	/**
	 * @param ChunkCursor $cursor
	 * 
	 * @return ParseStep
	 */
	public function progress ($cursor) ;
}

Boot::registerClass(StreamParserObject::class, 'tink.io.StreamParserObject');
