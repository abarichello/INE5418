<?php
/**
 */

namespace haxe;

use \php\Boot;

class MainLoop {
	/**
	 * @var MainEvent
	 */
	static public $pending;

	/**
	 * Add a pending event to be run into the main loop.
	 * 
	 * @param \Closure $f
	 * @param int $priority
	 * 
	 * @return MainEvent
	 */
	public static function add ($f, $priority = 0) {
		#/usr/share/haxe/std/haxe/MainLoop.hx:97: lines 97-108
		if ($priority === null) {
			$priority = 0;
		}
		#/usr/share/haxe/std/haxe/MainLoop.hx:98: lines 98-99
		if ($f === null) {
			#/usr/share/haxe/std/haxe/MainLoop.hx:99: characters 4-9
			throw Exception::thrown("Event function is null");
		}
		#/usr/share/haxe/std/haxe/MainLoop.hx:100: characters 3-38
		$e = new MainEvent($f, $priority);
		#/usr/share/haxe/std/haxe/MainLoop.hx:101: characters 3-22
		$head = MainLoop::$pending;
		#/usr/share/haxe/std/haxe/MainLoop.hx:102: lines 102-103
		if ($head !== null) {
			#/usr/share/haxe/std/haxe/MainLoop.hx:103: characters 4-17
			$head->prev = $e;
		}
		#/usr/share/haxe/std/haxe/MainLoop.hx:104: characters 3-16
		$e->next = $head;
		#/usr/share/haxe/std/haxe/MainLoop.hx:105: characters 3-14
		MainLoop::$pending = $e;
		#/usr/share/haxe/std/haxe/MainLoop.hx:106: characters 3-25
		MainLoop::injectIntoEventLoop(0);
		#/usr/share/haxe/std/haxe/MainLoop.hx:107: characters 3-11
		return $e;
	}

	/**
	 * @return bool
	 */
	public static function hasEvents () {
		#/usr/share/haxe/std/haxe/MainLoop.hx:77: characters 3-19
		$p = MainLoop::$pending;
		#/usr/share/haxe/std/haxe/MainLoop.hx:78: lines 78-82
		while ($p !== null) {
			#/usr/share/haxe/std/haxe/MainLoop.hx:79: lines 79-80
			if ($p->isBlocking) {
				#/usr/share/haxe/std/haxe/MainLoop.hx:80: characters 5-16
				return true;
			}
			#/usr/share/haxe/std/haxe/MainLoop.hx:81: characters 4-14
			$p = $p->next;
		}
		#/usr/share/haxe/std/haxe/MainLoop.hx:83: characters 3-15
		return false;
	}

	/**
	 * @param int $waitMs
	 * 
	 * @return void
	 */
	public static function injectIntoEventLoop ($waitMs) {
	}

	/**
	 * @return void
	 */
	public static function sortEvents () {
		#/usr/share/haxe/std/haxe/MainLoop.hx:133: characters 3-22
		$list = MainLoop::$pending;
		#/usr/share/haxe/std/haxe/MainLoop.hx:135: lines 135-136
		if ($list === null) {
			#/usr/share/haxe/std/haxe/MainLoop.hx:136: characters 4-10
			return;
		}
		#/usr/share/haxe/std/haxe/MainLoop.hx:138: characters 3-49
		$insize = 1;
		$nmerges = null;
		$psize = 0;
		$qsize = 0;
		#/usr/share/haxe/std/haxe/MainLoop.hx:139: characters 3-31
		$p = null;
		$q = null;
		$e = null;
		$tail = null;
		#/usr/share/haxe/std/haxe/MainLoop.hx:141: lines 141-186
		while (true) {
			#/usr/share/haxe/std/haxe/MainLoop.hx:142: characters 4-12
			$p = $list;
			#/usr/share/haxe/std/haxe/MainLoop.hx:143: characters 4-15
			$list = null;
			#/usr/share/haxe/std/haxe/MainLoop.hx:144: characters 4-15
			$tail = null;
			#/usr/share/haxe/std/haxe/MainLoop.hx:145: characters 4-15
			$nmerges = 0;
			#/usr/share/haxe/std/haxe/MainLoop.hx:146: lines 146-181
			while ($p !== null) {
				#/usr/share/haxe/std/haxe/MainLoop.hx:147: characters 5-14
				++$nmerges;
				#/usr/share/haxe/std/haxe/MainLoop.hx:148: characters 5-10
				$q = $p;
				#/usr/share/haxe/std/haxe/MainLoop.hx:149: characters 5-14
				$psize = 0;
				#/usr/share/haxe/std/haxe/MainLoop.hx:150: characters 15-19
				$_g = 0;
				#/usr/share/haxe/std/haxe/MainLoop.hx:150: characters 19-25
				$_g1 = $insize;
				#/usr/share/haxe/std/haxe/MainLoop.hx:150: lines 150-155
				while ($_g < $_g1) {
					#/usr/share/haxe/std/haxe/MainLoop.hx:150: characters 15-25
					$i = $_g++;
					#/usr/share/haxe/std/haxe/MainLoop.hx:151: characters 6-13
					++$psize;
					#/usr/share/haxe/std/haxe/MainLoop.hx:152: characters 6-16
					$q = $q->next;
					#/usr/share/haxe/std/haxe/MainLoop.hx:153: lines 153-154
					if ($q === null) {
						#/usr/share/haxe/std/haxe/MainLoop.hx:154: characters 7-12
						break;
					}
				}
				#/usr/share/haxe/std/haxe/MainLoop.hx:156: characters 5-19
				$qsize = $insize;
				#/usr/share/haxe/std/haxe/MainLoop.hx:157: lines 157-179
				while (($psize > 0) || (($qsize > 0) && ($q !== null))) {
					#/usr/share/haxe/std/haxe/MainLoop.hx:158: lines 158-172
					if ($psize === 0) {
						#/usr/share/haxe/std/haxe/MainLoop.hx:159: characters 7-12
						$e = $q;
						#/usr/share/haxe/std/haxe/MainLoop.hx:160: characters 7-17
						$q = $q->next;
						#/usr/share/haxe/std/haxe/MainLoop.hx:161: characters 7-14
						--$qsize;
					} else if (($qsize === 0) || ($q === null) || (($p->priority > $q->priority) || (($p->priority === $q->priority) && ($p->nextRun <= $q->nextRun)))) {
						#/usr/share/haxe/std/haxe/MainLoop.hx:165: characters 7-12
						$e = $p;
						#/usr/share/haxe/std/haxe/MainLoop.hx:166: characters 7-17
						$p = $p->next;
						#/usr/share/haxe/std/haxe/MainLoop.hx:167: characters 7-14
						--$psize;
					} else {
						#/usr/share/haxe/std/haxe/MainLoop.hx:169: characters 7-12
						$e = $q;
						#/usr/share/haxe/std/haxe/MainLoop.hx:170: characters 7-17
						$q = $q->next;
						#/usr/share/haxe/std/haxe/MainLoop.hx:171: characters 7-14
						--$qsize;
					}
					#/usr/share/haxe/std/haxe/MainLoop.hx:173: lines 173-176
					if ($tail !== null) {
						#/usr/share/haxe/std/haxe/MainLoop.hx:174: characters 7-20
						$tail->next = $e;
					} else {
						#/usr/share/haxe/std/haxe/MainLoop.hx:176: characters 7-15
						$list = $e;
					}
					#/usr/share/haxe/std/haxe/MainLoop.hx:177: characters 6-19
					$e->prev = $tail;
					#/usr/share/haxe/std/haxe/MainLoop.hx:178: characters 6-14
					$tail = $e;
				}
				#/usr/share/haxe/std/haxe/MainLoop.hx:180: characters 5-10
				$p = $q;
			}
			#/usr/share/haxe/std/haxe/MainLoop.hx:182: characters 4-20
			$tail->next = null;
			#/usr/share/haxe/std/haxe/MainLoop.hx:183: lines 183-184
			if ($nmerges <= 1) {
				#/usr/share/haxe/std/haxe/MainLoop.hx:184: characters 5-10
				break;
			}
			#/usr/share/haxe/std/haxe/MainLoop.hx:185: characters 4-15
			$insize *= 2;
		}
		#/usr/share/haxe/std/haxe/MainLoop.hx:187: characters 3-19
		$list->prev = null;
		#/usr/share/haxe/std/haxe/MainLoop.hx:188: characters 3-17
		MainLoop::$pending = $list;
	}

	/**
	 * Run the pending events. Return the time for next event.
	 * 
	 * @return float
	 */
	public static function tick () {
		#/usr/share/haxe/std/haxe/MainLoop.hx:195: characters 3-15
		MainLoop::sortEvents();
		#/usr/share/haxe/std/haxe/MainLoop.hx:196: characters 3-19
		$e = MainLoop::$pending;
		#/usr/share/haxe/std/haxe/MainLoop.hx:197: characters 3-32
		$now = \microtime(true);
		#/usr/share/haxe/std/haxe/MainLoop.hx:198: characters 3-18
		$wait = 1e9;
		#/usr/share/haxe/std/haxe/MainLoop.hx:199: lines 199-208
		while ($e !== null) {
			#/usr/share/haxe/std/haxe/MainLoop.hx:200: characters 4-22
			$next = $e->next;
			#/usr/share/haxe/std/haxe/MainLoop.hx:201: characters 4-29
			$wt = $e->nextRun - $now;
			#/usr/share/haxe/std/haxe/MainLoop.hx:202: lines 202-206
			if ($wt <= 0) {
				#/usr/share/haxe/std/haxe/MainLoop.hx:203: characters 5-13
				$wait = 0;
				#/usr/share/haxe/std/haxe/MainLoop.hx:204: characters 5-13
				if ($e->f !== null) {
					($e->f)();
				}
			} else if ($wait > $wt) {
				#/usr/share/haxe/std/haxe/MainLoop.hx:206: characters 5-14
				$wait = $wt;
			}
			#/usr/share/haxe/std/haxe/MainLoop.hx:207: characters 4-12
			$e = $next;
		}
		#/usr/share/haxe/std/haxe/MainLoop.hx:209: characters 3-14
		return $wait;
	}
}

Boot::registerClass(MainLoop::class, 'haxe.MainLoop');
