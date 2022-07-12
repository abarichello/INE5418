<?php
/**
 */

namespace tink\web\forms\_FormFile;

use \tink\json\_Representation\Representation_Impl_;
use \php\_Boot\HxAnon;
use \tink\io\RealSourceTools;
use \php\Boot;
use \haxe\Exception;
use \tink\core\TypedError;
use \tink\http\_StructuredBody\UploadedFile_Impl_;
use \tink\core\OutcomeTools;
use \haxe\io\Bytes;

final class FormFile_Impl_ {
	/**
	 * @param object $v
	 * 
	 * @return object
	 */
	public static function _new ($v) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:20: character 3
		$this1 = $v;
		return $this1;
	}

	/**
	 * @param string $name
	 * @param string $type
	 * @param Bytes $data
	 * 
	 * @return object
	 */
	public static function ofBlob ($name, $type, $data) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:46: characters 5-49
		return UploadedFile_Impl_::ofBlob($name, $type, $data);
	}

	/**
	 * @param object $rep
	 * 
	 * @return object
	 */
	public static function ofJson ($rep) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:41: characters 5-26
		$data = Representation_Impl_::get($rep);
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:42: characters 12-76
		$this1 = UploadedFile_Impl_::ofBlob($data->fileName, $data->mimeType, $data->content);
		return $this1;
	}

	/**
	 * @param object $this
	 * 
	 * @return object
	 */
	public static function toJson ($this1) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:24: characters 17-30
		$this2 = $this1->fileName;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:25: characters 17-30
		$this3 = $this1->mimeType;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:27: characters 9-31
		$src = $this1->read();
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:28: characters 9-26
		$chunk = null;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:29: characters 9-68
		$write = RealSourceTools::all($src)->handle(function ($c) use (&$chunk) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:29: characters 50-66
			$chunk = OutcomeTools::sure($c);
		});
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:26: lines 26-36
		$v = null;
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:30: lines 30-35
		if ($chunk !== null) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:26: lines 26-36
			$v = $chunk->toBytes();
		} else {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:33: characters 11-27
			if ($write !== null) {
				$write->cancel();
			}
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:34: characters 44-121
			$v1 = "Can only upload files through JSON backed by with sync sources but got a " . \Std::string($src);
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:34: characters 11-16
			throw Exception::thrown(new TypedError(501, $v1, new _HxAnon_FormFile_Impl_0("tink/web/forms/FormFile.hx", 34, "tink.web.forms._FormFile.FormFile_Impl_", "toJson")));
		}
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormFile.hx:23: lines 23-37
		$this1 = new _HxAnon_FormFile_Impl_1($this2, $this3, $v);
		return $this1;
	}
}

class _HxAnon_FormFile_Impl_0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

class _HxAnon_FormFile_Impl_1 extends HxAnon {
	function __construct($fileName, $mimeType, $content) {
		$this->fileName = $fileName;
		$this->mimeType = $mimeType;
		$this->content = $content;
	}
}

Boot::registerClass(FormFile_Impl_::class, 'tink.web.forms._FormFile.FormFile_Impl_');
