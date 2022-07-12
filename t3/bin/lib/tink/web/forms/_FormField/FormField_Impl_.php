<?php
/**
 */

namespace tink\web\forms\_FormField;

use \php\Boot;
use \haxe\Exception;
use \tink\_Stringly\Stringly_Impl_;
use \tink\core\OutcomeTools;
use \tink\http\BodyPart;

final class FormField_Impl_ {
	/**
	 * @param BodyPart $this
	 * 
	 * @return object
	 */
	public static function getFile ($this1) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormField.hx:24: lines 24-27
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormField.hx:25: characters 18-19
			$_g = $this1->params[0];
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormField.hx:25: characters 22-27
			throw Exception::thrown("expected file but got plain value");
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormField.hx:26: characters 17-18
			$u = $this1->params[0];
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormField.hx:26: characters 37-52
			$this1 = $u;
			return $this1;
		}
	}

	/**
	 * @param BodyPart $this
	 * 
	 * @return string
	 */
	public static function getValue ($this1) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormField.hx:9: lines 9-12
		$__hx__switch = ($this1->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormField.hx:10: characters 18-19
			$v = $this1->params[0];
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormField.hx:10: characters 22-23
			return $v;
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormField.hx:11: characters 17-18
			$_g = $this1->params[0];
			#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormField.hx:11: characters 21-26
			throw Exception::thrown("expected plain value but received file");
		}
	}

	/**
	 * @param BodyPart $this
	 * 
	 * @return float
	 */
	public static function toFloat ($this1) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormField.hx:15: characters 5-22
		return OutcomeTools::sure(Stringly_Impl_::parseFloat(FormField_Impl_::getValue($this1)));
	}

	/**
	 * @param BodyPart $this
	 * 
	 * @return int
	 */
	public static function toInt ($this1) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormField.hx:18: characters 5-22
		return OutcomeTools::sure(Stringly_Impl_::parseInt(FormField_Impl_::getValue($this1)));
	}

	/**
	 * @param BodyPart $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#/home/barichello/.local/share/haxelib/tink_web/0,3,0/src/tink/web/forms/FormField.hx:21: characters 5-22
		return FormField_Impl_::getValue($this1);
	}
}

Boot::registerClass(FormField_Impl_::class, 'tink.web.forms._FormField.FormField_Impl_');
