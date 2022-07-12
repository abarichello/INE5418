<?php
/**
 */

namespace tink\http\_StructuredBody;

use \php\_Boot\HxAnon;
use \php\Boot;
use \tink\io\_Source\Source_Impl_;
use \tink\streams\Single;
use \tink\core\TypedError;
use \sys\io\File;
use \tink\chunk\ByteChunk;
use \tink\core\Outcome;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Future\Future_Impl_;
use \tink\io\_Sink\SinkYielding_Impl_;
use \haxe\io\Bytes;

final class UploadedFile_Impl_ {
	/**
	 * @param string $name
	 * @param string $type
	 * @param Bytes $data
	 * 
	 * @return object
	 */
	public static function ofBlob ($name, $type, $data) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/StructuredBody.hx:19: lines 19-41
		return new _HxAnon_UploadedFile_Impl_0($name, $type, $data->length, function () use (&$data) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/StructuredBody.hx:23: characters 35-46
			return new Single(new LazyConst(ByteChunk::of($data)));
		}, function ($path) use (&$data) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/StructuredBody.hx:25: characters 9-38
			$name = "File sink " . ($path??'null');
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/StructuredBody.hx:26: lines 26-34
			$dest = SinkYielding_Impl_::ofOutput($name, File::write($path));
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/StructuredBody.hx:35: lines 35-39
			return Future_Impl_::map(Source_Impl_::pipeTo(new Single(new LazyConst(ByteChunk::of($data))), $dest, new _HxAnon_UploadedFile_Impl_1(true)), function ($r) {
				$__hx__switch = ($r->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/StructuredBody.hx:36: characters 28-42
					return Outcome::Success(null);
				} else if ($__hx__switch === 1) {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/StructuredBody.hx:37: characters 26-27
					$_g = $r->params[0];
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/StructuredBody.hx:37: characters 29-30
					$_g = $r->params[1];
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/StructuredBody.hx:37: characters 33-85
					return Outcome::Failure(new TypedError(null, "File \$path closed unexpectedly", new _HxAnon_UploadedFile_Impl_2("tink/http/StructuredBody.hx", 37, "tink.http._StructuredBody.UploadedFile_Impl_", "ofBlob")));
				} else if ($__hx__switch === 2) {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/StructuredBody.hx:38: characters 30-31
					$_g = $r->params[1];
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/StructuredBody.hx:38: characters 27-28
					$e = $r->params[0];
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/StructuredBody.hx:38: characters 34-44
					return Outcome::Failure($e);
				}
			});
		});
	}
}

class _HxAnon_UploadedFile_Impl_1 extends HxAnon {
	function __construct($end) {
		$this->end = $end;
	}
}

class _HxAnon_UploadedFile_Impl_2 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

class _HxAnon_UploadedFile_Impl_0 extends HxAnon {
	function __construct($fileName, $mimeType, $size, $read, $saveTo) {
		$this->fileName = $fileName;
		$this->mimeType = $mimeType;
		$this->size = $size;
		$this->read = $read;
		$this->saveTo = $saveTo;
	}
}

Boot::registerClass(UploadedFile_Impl_::class, 'tink.http._StructuredBody.UploadedFile_Impl_');
