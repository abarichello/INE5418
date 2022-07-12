<?php
/**
 */

namespace tink\core;

use \php\Boot;
use \tink\core\_Callback\Callback_Impl_;
use \tink\core\_Callback\ListCell;

class CallbackList extends SimpleDisposable {
	/**
	 * @var bool
	 */
	public $busy;
	/**
	 * @var ListCell[]|\Array_hx
	 */
	public $cells;
	/**
	 * @var bool
	 */
	public $destructive;
	/**
	 * @var \Closure
	 */
	public $ondrain;
	/**
	 * @var \Closure
	 */
	public $onfill;
	/**
	 * @var \Closure[]|\Array_hx
	 */
	public $queue;
	/**
	 * @var int
	 */
	public $used;

	/**
	 * @param bool $destructive
	 * 
	 * @return void
	 */
	public function __construct ($destructive = false) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:162: lines 162-277
		if ($destructive === null) {
			$destructive = false;
		}
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:183: characters 32-46
		$this->onfill = function () {
		};
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:182: characters 33-47
		$this->ondrain = function () {
		};
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:174: characters 41-46
		$this->busy = false;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:172: characters 15-17
		$this->queue = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:171: characters 18-19
		$this->used = 0;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:176: lines 176-180
		$_gthis = $this;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:177: characters 5-44
		parent::__construct(function () use (&$_gthis) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:177: characters 23-43
			if (!$_gthis->busy) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:177: characters 34-43
				$_gthis->destroy();
			}
		});
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:178: characters 5-35
		$this->destructive = $destructive;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:179: characters 5-20
		$this->cells = new \Array_hx();
	}

	/**
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	public function add ($cb) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:206: characters 5-30
		if ($this->disposeHandlers === null) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:206: characters 19-30
			return null;
		}
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:207: characters 5-39
		$node = new ListCell($cb, $this);
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:208: characters 5-21
		$_this = $this->cells;
		$_this->arr[$_this->length++] = $node;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:209: characters 5-57
		if ($this->used++ === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:209: characters 22-57
			$fn = $this->onfill;
			if (Callback_Impl_::$depth < 500) {
				Callback_Impl_::$depth++;
				$fn();
				Callback_Impl_::$depth--;
			} else {
				Callback_Impl_::defer($fn);
			}
		}
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:210: characters 5-16
		return $node;
	}

	/**
	 * @return void
	 */
	public function clear () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:270: lines 270-271
		if ($this->busy) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:271: characters 7-24
			$_this = $this->queue;
			$_this->arr[$_this->length++] = Boot::getInstanceClosure($this, 'clear');
		}
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:272: lines 272-273
		$_g = 0;
		$_g1 = $this->cells;
		while ($_g < $_g1->length) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:272: characters 10-14
			$cell = ($_g1->arr[$_g] ?? null);
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:272: lines 272-273
			++$_g;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:273: characters 7-19
			$cell->cb = null;
			$cell->list = null;
		}
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:274: characters 5-14
		$this->resize(0);
	}

	/**
	 * @return void
	 */
	public function compact () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:245: lines 245-263
		if ($this->busy) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:245: characters 15-21
			return;
		} else if ($this->used === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:247: characters 7-16
			$this->resize(0);
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:248: characters 7-14
			$fn = $this->ondrain;
			if (Callback_Impl_::$depth < 500) {
				Callback_Impl_::$depth++;
				$fn();
				Callback_Impl_::$depth--;
			} else {
				Callback_Impl_::defer($fn);
			}
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:251: characters 7-25
			$compacted = 0;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:253: characters 17-21
			$_g = 0;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:253: characters 21-33
			$_g1 = $this->cells->length;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:253: lines 253-260
			while ($_g < $_g1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:253: characters 17-33
				$i = $_g++;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:254: characters 16-24
				$_g2 = ($this->cells->arr[$i] ?? null);
				$_g3 = $_g2->list;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:255: lines 255-259
				if ($_g2->cb !== null) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:256: characters 16-17
					$v = $_g2;
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:257: lines 257-258
					if ($compacted !== $i) {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:258: characters 15-35
						$this->cells->offsetSet($compacted, $v);
					}
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:259: characters 13-43
					if (++$compacted === $this->used) {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:259: characters 38-43
						break;
					}
				}
			}
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:262: characters 7-19
			$this->resize($this->used);
		}
	}

	/**
	 * @return void
	 */
	public function destroy () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:190: lines 190-191
		$_g = 0;
		$_g1 = $this->cells;
		while ($_g < $_g1->length) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:190: characters 10-11
			$c = ($_g1->arr[$_g] ?? null);
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:190: lines 190-191
			++$_g;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:191: characters 7-16
			$c->cb = null;
			$c->list = null;
		}
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:193: characters 5-17
		$this->queue = null;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:194: characters 5-17
		$this->cells = null;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:196: lines 196-199
		if ($this->used > 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:197: characters 7-15
			$this->used = 0;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:198: characters 7-14
			$fn = $this->ondrain;
			if (Callback_Impl_::$depth < 500) {
				Callback_Impl_::$depth++;
				$fn();
				Callback_Impl_::$depth--;
			} else {
				Callback_Impl_::defer($fn);
			}
		}
	}

	/**
	 * @return void
	 */
	public function drain () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:203: characters 5-41
		$fn = $this->ondrain;
		if (Callback_Impl_::$depth < 500) {
			Callback_Impl_::$depth++;
			$fn();
			Callback_Impl_::$depth--;
		} else {
			Callback_Impl_::defer($fn);
		}
	}

	/**
	 * @return int
	 */
	public function get_length () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:169: characters 7-18
		return $this->used;
	}

	/**
	 * @param mixed $data
	 * 
	 * @return void
	 */
	public function invoke ($data) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:214: lines 214-242
		$_gthis = $this;
		if (Callback_Impl_::$depth < 500) {
			Callback_Impl_::$depth++;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:215: lines 215-241
			if ($_gthis->disposeHandlers !== null) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:216: lines 216-241
				if ($_gthis->busy) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:217: lines 217-218
					if ($_gthis->destructive !== true) {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:218: characters 11-40
						$_this = $_gthis->queue;
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:218: characters 22-28
						$_g = Boot::getInstanceClosure($_gthis, 'invoke');
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:218: characters 34-38
						$data1 = $data;
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:218: characters 22-33
						$tmp = function () use (&$data1, &$_g) {
							$_g($data1);
						};
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:218: characters 11-40
						$_this->arr[$_this->length++] = $tmp;
					}
				} else {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:221: characters 9-20
					$_gthis->busy = true;
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:223: lines 223-224
					if ($_gthis->destructive) {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:224: characters 11-20
						$_gthis->dispose();
					}
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:226: characters 9-35
					$length = $_gthis->cells->length;
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:227: characters 19-23
					$_g1 = 0;
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:227: characters 23-29
					$_g2 = $length;
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:227: lines 227-228
					while ($_g1 < $_g2) {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:227: characters 19-29
						$i = $_g1++;
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:228: characters 11-32
						$_this = ($_gthis->cells->arr[$i] ?? null);
						if ($_this->list !== null) {
							($_this->cb)($data);
						}
					}
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:230: characters 9-21
					$_gthis->busy = false;
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:232: lines 232-240
					if ($_gthis->disposeHandlers === null) {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:233: characters 11-20
						$_gthis->destroy();
					} else {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:235: lines 235-236
						if ($_gthis->used < $_gthis->cells->length) {
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:236: characters 13-22
							$_gthis->compact();
						}
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:238: lines 238-239
						if ($_gthis->queue->length > 0) {
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:239: characters 13-26
							$_this = $_gthis->queue;
							if ($_this->length > 0) {
								$_this->length--;
							}
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:239: characters 13-28
							\array_shift($_this->arr)();
						}
					}
				}
			}
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:214: lines 214-242
			Callback_Impl_::$depth--;
		} else {
			Callback_Impl_::defer(function () use (&$data, &$_gthis) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:215: lines 215-241
				if ($_gthis->disposeHandlers !== null) {
					#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:216: lines 216-241
					if ($_gthis->busy) {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:217: lines 217-218
						if ($_gthis->destructive !== true) {
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:218: characters 11-40
							$_this = $_gthis->queue;
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:218: characters 22-28
							$_g = Boot::getInstanceClosure($_gthis, 'invoke');
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:218: characters 34-38
							$data1 = $data;
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:218: characters 22-33
							$tmp = function () use (&$data1, &$_g) {
								$_g($data1);
							};
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:218: characters 11-40
							$_this->arr[$_this->length++] = $tmp;
						}
					} else {
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:221: characters 9-20
						$_gthis->busy = true;
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:223: lines 223-224
						if ($_gthis->destructive) {
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:224: characters 11-20
							$_gthis->dispose();
						}
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:226: characters 9-35
						$length = $_gthis->cells->length;
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:227: characters 19-23
						$_g1 = 0;
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:227: characters 23-29
						$_g2 = $length;
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:227: lines 227-228
						while ($_g1 < $_g2) {
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:227: characters 19-29
							$i = $_g1++;
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:228: characters 11-32
							$_this = ($_gthis->cells->arr[$i] ?? null);
							if ($_this->list !== null) {
								($_this->cb)($data);
							}
						}
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:230: characters 9-21
						$_gthis->busy = false;
						#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:232: lines 232-240
						if ($_gthis->disposeHandlers === null) {
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:233: characters 11-20
							$_gthis->destroy();
						} else {
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:235: lines 235-236
							if ($_gthis->used < $_gthis->cells->length) {
								#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:236: characters 13-22
								$_gthis->compact();
							}
							#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:238: lines 238-239
							if ($_gthis->queue->length > 0) {
								#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:239: characters 13-26
								$_this = $_gthis->queue;
								if ($_this->length > 0) {
									$_this->length--;
								}
								#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:239: characters 13-28
								\array_shift($_this->arr)();
							}
						}
					}
				}
			});
		}
	}

	/**
	 * @return void
	 */
	public function release () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:186: lines 186-187
		if (--$this->used <= ($this->cells->length >> 1)) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:187: characters 7-16
			$this->compact();
		}
	}

	/**
	 * @param int $length
	 * 
	 * @return void
	 */
	public function resize ($length) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:266: characters 5-25
		$this->cells->resize($length);
	}
}

Boot::registerClass(CallbackList::class, 'tink.core.CallbackList');
Boot::registerGetters('tink\\core\\CallbackList', [
	'length' => true
]);
