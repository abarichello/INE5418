<?php
/**
 */

namespace tink\json;

use \php\_Boot\HxAnon;
use \php\Boot;
use \tink\core\TypedError;
use \tink\json\_Parser\RawData_Impl_;
use \tink\core\Outcome;

class Parser1 extends BasicParser {
	/**
	 * @return void
	 */
	public function __construct () {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/Macro.hx:78: characters 29-36
		parent::__construct();
	}

	/**
	 * @param string $source
	 * 
	 * @return object
	 */
	public function parse ($source) {
		#Server.hx:53: lines 53-60
		$_gthis = $this;
		if ($_gthis->afterParsing->length > 0) {
			$_gthis->afterParsing = new \Array_hx();
		}
		$this->init($source);
		$ret = $this->process0();
		$_g = 0;
		$_g1 = $this->afterParsing;
		while ($_g < $_g1->length) {
			$f = ($_g1->arr[$_g] ?? null);
			++$_g;
			$f();
		}
		if ($_gthis->afterParsing->length > 0) {
			$_gthis->afterParsing = new \Array_hx();
		}
		return $ret;
	}

	/**
	 * @return object
	 */
	public function process0 () {
		$_gthis = $this;
		$cur = 0;
		$v__1 = null;
		$hasv__1 = false;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:224: characters 7-32
		$__start__ = $this->pos;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:225: characters 7-33
		while (true) {
			$_g = \ord($this->source->s[$this->pos++]);
			$_hx_tmp = null;
			if (($_g === 123) === true) {
				break;
			} else {
				$_hx_tmp = $_g < 33;
				if ($_hx_tmp !== true) {
					$this->die("expected " . "{");
				}
			}
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
		while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
			$this->pos++;
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
		$tmp = null;
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
		if (\ord($this->source->s[$this->pos]) === 125) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
			$this->pos += 1;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
			while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
				$this->pos++;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
			$tmp = true;
		} else {
			$tmp = false;
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:226: lines 226-236
		if (!$tmp) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:227: lines 227-234
			while (true) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:228: characters 11-37
				while (true) {
					$_g = \ord($this->source->s[$this->pos++]);
					$_hx_tmp = null;
					if (($_g === 34) === true) {
						break;
					} else {
						$_hx_tmp = $_g < 33;
						if ($_hx_tmp !== true) {
							$this->die("expected " . "\"");
						}
					}
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 36-47
				$cur = \ord($this->source->s[$this->pos++]);
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 30-47
				if ($cur === 111) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 36-47
					$cur = \ord($this->source->s[$this->pos++]);
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 30-47
					if ($cur === 112) {
						#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 36-47
						$cur = \ord($this->source->s[$this->pos++]);
						#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 30-47
						if ($cur === 101) {
							#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 36-47
							$cur = \ord($this->source->s[$this->pos++]);
							#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 30-47
							if ($cur === 114) {
								#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 36-47
								$cur = \ord($this->source->s[$this->pos++]);
								#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 30-47
								if ($cur === 97) {
									#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 36-47
									$cur = \ord($this->source->s[$this->pos++]);
									#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 30-47
									if ($cur === 110) {
										#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 36-47
										$cur = \ord($this->source->s[$this->pos++]);
										#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 30-47
										if ($cur === 100) {
											#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 36-47
											$cur = \ord($this->source->s[$this->pos++]);
											#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 30-47
											if ($cur === 115) {
												#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 36-47
												$cur = \ord($this->source->s[$this->pos++]);
												#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:202: characters 30-47
												if ($cur === 34) {
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:196: characters 29-55
													while (true) {
														$_g1 = \ord($this->source->s[$this->pos++]);
														$_hx_tmp1 = null;
														if (($_g1 === 58) === true) {
															break;
														} else {
															$_hx_tmp1 = $_g1 < 33;
															if ($_hx_tmp1 !== true) {
																$this->die("expected " . ":");
															}
														}
													}
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:196: characters 57-70
													while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
														$this->pos++;
													}
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
													while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
														$this->pos++;
													}
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
													$v__11 = null;
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
													if (\ord($this->source->s[$this->pos]) === 91) {
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
														$this->pos += 1;
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
														while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
															$this->pos++;
														}
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
														$v__11 = true;
													} else {
														$v__11 = false;
													}
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 18-160
													if (!$v__11) {
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 76-114
														$this->die("Expected " . "[");
													}
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:249: characters 7-22
													$__ret = new \Array_hx();
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
													while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
														$this->pos++;
													}
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
													$v__12 = null;
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
													if (\ord($this->source->s[$this->pos]) === 93) {
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
														$this->pos += 1;
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
														while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
															$this->pos++;
														}
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
														$v__12 = true;
													} else {
														$v__12 = false;
													}
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:250: lines 250-255
													if (!$v__12) {
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:251: lines 251-253
														while (true) {
															#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:36: characters 18-44
															$this1 = $this->parseNumber();
															#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:252: characters 11-25
															$x = \Std::parseInt(RawData_Impl_::substring($this1->source, $this1->min, $this1->max));
															$__ret->arr[$__ret->length++] = $x;
															#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
															while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
																$this->pos++;
															}
															#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
															$v__13 = null;
															#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
															if (\ord($this->source->s[$this->pos]) === 44) {
																#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
																$this->pos += 1;
																#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
																while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
																	$this->pos++;
																}
																#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
																$v__13 = true;
															} else {
																$v__13 = false;
															}
															#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:251: lines 251-253
															if (!$v__13) {
																break;
															}
														}
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
														while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
															$this->pos++;
														}
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
														$v__14 = null;
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
														if (\ord($this->source->s[$this->pos]) === 93) {
															#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
															$this->pos += 1;
															#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
															while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
																$this->pos++;
															}
															#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
															$v__14 = true;
														} else {
															$v__14 = false;
														}
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 18-160
														if (!$v__14) {
															#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 76-114
															$this->die("Expected " . "]");
														}
													}
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:256: characters 7-12
													$v__1 = $__ret;
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:123: characters 24-40
													$hasv__1 = true;
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
													while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
														$this->pos++;
													}
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
													$tmp = null;
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
													if (\ord($this->source->s[$this->pos]) === 44) {
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
														$this->pos += 1;
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
														$tmp = true;
													} else {
														$tmp = false;
													}
													#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:227: lines 227-234
													if (!$tmp) {
														break;
													} else {
														#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:196: characters 76-84
														continue;
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:230: characters 11-44
				if ($cur !== 34) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:230: characters 32-44
					$this->skipString();
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:231: characters 11-37
				while (true) {
					$_g2 = \ord($this->source->s[$this->pos++]);
					$_hx_tmp2 = null;
					if (($_g2 === 58) === true) {
						break;
					} else {
						$_hx_tmp2 = $_g2 < 33;
						if ($_hx_tmp2 !== true) {
							$this->die("expected " . ":");
						}
					}
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:232: characters 11-29
				while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
					$this->pos++;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:233: characters 11-27
				$this->skipValue();
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
				while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
					$this->pos++;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
				$tmp1 = null;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
				if (\ord($this->source->s[$this->pos]) === 44) {
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
					$this->pos += 1;
					#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
					$tmp1 = true;
				} else {
					$tmp1 = false;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:227: lines 227-234
				if (!$tmp1) {
					break;
				}
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:21: characters 9-29
			while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
				$this->pos++;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
			$tmp = null;
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:22: lines 22-28
			if (\ord($this->source->s[$this->pos]) === 125) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:23: characters 9-35
				$this->pos += 1;
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:25: characters 11-31
				while (($this->pos < $this->max) && (\ord($this->source->s[$this->pos]) < 33)) {
					$this->pos++;
				}
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:19: lines 19-29
				$tmp = true;
			} else {
				$tmp = false;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 18-160
			if (!$tmp) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Parser.macro.hx:6: characters 76-114
				$this->die("Expected " . "}");
			}
		}
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:238: lines 238-240
		$__missing__ = function ($field) use (&$__start__, &$_gthis) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:239: characters 9-68
			return $_gthis->die("missing field \"" . ($field??'null') . "\"", $__start__);
		};
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/GenReader.hx:242: characters 7-39
		return new _HxAnon_Parser10(($hasv__1 ? $v__1 : $__missing__("operands")));
	}

	/**
	 * @param string $source
	 * 
	 * @return Outcome
	 */
	public function tryParse ($source) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/Macro.hx:107: lines 107-113
		$_gthis = $this;
		return TypedError::catchExceptions(function () use (&$source, &$_gthis) {
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/Macro.hx:108: characters 11-35
			$ret = $_gthis->parse($source);
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/Macro.hx:109: characters 11-24
			while (($_gthis->pos < $_gthis->max) && (\ord($_gthis->source->s[$_gthis->pos]) < 33)) {
				$_gthis->pos++;
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/Macro.hx:110: lines 110-111
			if ($_gthis->pos < $_gthis->max) {
				#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/Macro.hx:111: characters 13-52
				$_gthis->die("Invalid data after JSON document");
			}
			#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/macros/Macro.hx:112: characters 11-21
			return $ret;
		}, null, new _HxAnon_Parser11("tink/json/macros/Macro.hx", 107, "tink.json.Parser1", "tryParse"));
	}
}

class _HxAnon_Parser10 extends HxAnon {
	function __construct($_1) {
		$this->_1 = $_1;
	}
}

class _HxAnon_Parser11 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(Parser1::class, 'tink.json.Parser1');
