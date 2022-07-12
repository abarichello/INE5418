<?php
/**
 */

namespace tink\io;

use \php\Boot;
use \tink\streams\StreamObject;

interface Transformer {
	/**
	 * @param StreamObject $source
	 * 
	 * @return StreamObject
	 */
	public function transform ($source) ;
}

Boot::registerClass(Transformer::class, 'tink.io.Transformer');
