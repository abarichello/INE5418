<?php
/**
 */

namespace tink\http;

use \php\Boot;
use \tink\core\_Future\FutureObject;

interface Container {
	/**
	 *  Start the Container
	 *  @param handler - The HTTP handler (see `Handler`)
	 *  @return ContainerResult: For non-persistent containers like modneko & php, it will be Shutdown. For persistent containers such as nodejs, it will be Running
	 * 
	 * @param HandlerObject $handler
	 * 
	 * @return FutureObject
	 */
	public function run ($handler) ;
}

Boot::registerClass(Container::class, 'tink.http.Container');