<?php
/**
 */

namespace tink\io\_StreamParser;

use \php\_Boot\HxAnon;
use \tink\core\_Future\SyncFuture;
use \tink\io\StreamParserObject;
use \php\Boot;
use \tink\streams\Step;
use \tink\streams\Generator;
use \tink\io\_Source\Source_Impl_;
use \tink\streams\Single;
use \tink\streams\StreamObject;
use \tink\streams\Handled;
use \tink\core\_Lazy\LazyConst;
use \tink\streams\_Stream\Handler_Impl_;
use \tink\io\ParseResult;
use \tink\core\_Future\Future_Impl_;
use \tink\_Chunk\Chunk_Impl_;
use \tink\core\_Future\FutureObject;

final class StreamParser_Impl_ {
	/**
	 * @param StreamObject $source
	 * @param StreamParserObject $p
	 * @param \Closure $consume
	 * @param \Closure $finish
	 * 
	 * @return FutureObject
	 */
	public static function doParse ($source, $p, $consume, $finish) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:26: characters 5-39
		$cursor = Chunk_Impl_::$EMPTY->getCursor();
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:27: characters 5-23
		$resume = true;
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:28: lines 28-33
		$mk = function ($source) use (&$cursor) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:29: lines 29-32
			if ($cursor->currentPos < $cursor->length) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:30: characters 9-39
				return $source->prepend(new Single(new LazyConst($cursor->right())));
			} else {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:32: characters 9-15
				return $source;
			}
		};
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:35: lines 35-39
		$flush = function () use (&$cursor) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:36: characters 21-35
			$_g = $cursor->flush();
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:37: characters 14-15
			$c = $_g;
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:37: lines 37-38
			if ($c->getLength() === 0) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:37: characters 35-52
				return Source_Impl_::$EMPTY;
			} else {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:38: characters 14-15
				$c = $_g;
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:38: characters 9-18
				return new Single(new LazyConst($c));
			}
		};
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:41: lines 41-84
		return Future_Impl_::flatMap($source->forEach(Handler_Impl_::ofUnknown(function ($chunk) use (&$consume, &$resume, &$cursor, &$p) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:42: characters 7-55
			if ($chunk->getLength() === 0) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:42: characters 29-55
				return new SyncFuture(new LazyConst(Handled::Resume()));
			}
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:43: characters 7-26
			$cursor->shift($chunk);
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:45: lines 45-65
			return Future_Impl_::async(function ($cb) use (&$consume, &$resume, &$cursor, &$p) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:46: lines 46-63
				$next = null;
				$next = function () use (&$consume, &$next, &$resume, &$cb, &$cursor, &$p) {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:47: characters 11-25
					$cursor->shift();
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:48: characters 11-43
					$lastPos = $cursor->currentPos;
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:49: characters 18-36
					$_g = $p->progress($cursor);
					$__hx__switch = ($_g->index);
					if ($__hx__switch === 0) {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:51: characters 15-107
						if (($lastPos !== $cursor->currentPos) && ($cursor->currentPos < $cursor->length)) {
							#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:51: characters 85-91
							$next();
						} else {
							#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:51: characters 97-107
							$cb(Handled::Resume());
						}
					} else if ($__hx__switch === 1) {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:52: characters 23-24
						$v = $_g->params[0];
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:53: lines 53-59
						$consume($v)->handle(function ($o) use (&$next, &$lastPos, &$resume, &$cb, &$cursor) {
							#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:54: characters 17-34
							$resume = $o->resume;
							#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:55: lines 55-58
							if ($resume) {
								#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:56: characters 19-111
								if (($lastPos !== $cursor->currentPos) && ($cursor->currentPos < $cursor->length)) {
									#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:56: characters 89-95
									$next();
								} else {
									#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:56: characters 101-111
									$cb(Handled::Resume());
								}
							} else {
								#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:58: characters 19-29
								$cb(Handled::Finish());
							}
						});
					} else if ($__hx__switch === 2) {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:60: characters 25-26
						$e = $_g->params[0];
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:61: characters 15-26
						$cb(Handled::Clog($e));
					}
				};
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:64: characters 9-15
				$next();
			});
		})), function ($c) use (&$finish, &$consume, &$mk, &$flush, &$resume, &$cursor, &$p) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:66: lines 66-84
			$__hx__switch = ($c->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:67: characters 19-23
				$rest = $c->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:68: characters 28-36
				$v = $finish();
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:68: characters 9-48
				return new SyncFuture(new LazyConst(ParseResult::Parsed($v, $mk($rest))));
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:69: characters 20-21
				$e = $c->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:69: characters 23-27
				$rest = $c->params[1];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:70: characters 9-42
				return new SyncFuture(new LazyConst(ParseResult::Invalid($e, $mk($rest))));
			} else if ($__hx__switch === 2) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:71: characters 19-20
				$e = $c->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:72: characters 9-30
				return new SyncFuture(new LazyConst(ParseResult::Broke($e)));
			} else if ($__hx__switch === 3) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:73: lines 73-83
				if ($cursor->currentPos < $cursor->length) {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:74: characters 28-36
					$v = $finish();
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:74: characters 9-55
					return new SyncFuture(new LazyConst(ParseResult::Parsed($v, $mk(new Single(new LazyConst(Chunk_Impl_::$EMPTY))))));
				} else if (!$resume) {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:76: characters 28-36
					$v = $finish();
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:76: characters 9-47
					return new SyncFuture(new LazyConst(ParseResult::Parsed($v, $flush())));
				} else {
					#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:78: characters 16-29
					$_g = $p->eof($cursor);
					$__hx__switch = ($_g->index);
					if ($__hx__switch === 0) {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:79: characters 24-30
						$result = $_g->params[0];
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:80: characters 13-79
						return Future_Impl_::map($consume($result), function ($_) use (&$finish, &$flush) {
							#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:80: characters 60-68
							$tmp = $finish();
							#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:80: characters 46-78
							return ParseResult::Parsed($tmp, $flush());
						});
					} else if ($__hx__switch === 1) {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:81: characters 24-25
						$e = $_g->params[0];
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:82: characters 13-45
						return new SyncFuture(new LazyConst(ParseResult::Invalid($e, $flush())));
					}
				}
			}
		});
	}

	/**
	 * @param StreamObject $s
	 * @param StreamParserObject $p
	 * 
	 * @return FutureObject
	 */
	public static function parse ($s, $p) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:87: characters 5-20
		$res = null;
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:88: lines 88-91
		$onResult = function ($r) use (&$res) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:89: characters 7-14
			$res = $r;
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:90: characters 7-44
			return new SyncFuture(new LazyConst(new _HxAnon_StreamParser_Impl_0(false)));
		};
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:92: characters 5-59
		return StreamParser_Impl_::doParse($s, $p, $onResult, function () use (&$res) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:92: characters 48-58
			return $res;
		});
	}

	/**
	 * @param StreamObject $s
	 * @param StreamParserObject $p
	 * 
	 * @return StreamObject
	 */
	public static function parseStream ($s, $p) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:96: lines 96-106
		$next = null;
		$next = function ($step) use (&$next, &$s, &$p) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:97: lines 97-105
			if ($s->get_depleted()) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:98: characters 9-18
				$step(Step::End());
			} else {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:100: lines 100-105
				StreamParser_Impl_::parse($s, $p)->handle(function ($o) use (&$step, &$next, &$s) {
					$__hx__switch = ($o->index);
					if ($__hx__switch === 0) {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:101: characters 23-29
						$result = $o->params[0];
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:101: characters 31-35
						$rest = $o->params[1];
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:102: characters 13-21
						$s = $rest;
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:103: characters 13-55
						$step(Step::Link($result, Generator::stream($next)));
					} else if ($__hx__switch === 1) {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:104: characters 27-28
						$_g = $o->params[1];
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:104: characters 24-25
						$e = $o->params[0];
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:104: characters 42-55
						$step(Step::Fail($e));
					} else if ($__hx__switch === 2) {
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:104: characters 38-39
						$e = $o->params[0];
						#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:104: characters 42-55
						$step(Step::Fail($e));
					}
				});
			}
		};
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/StreamParser.hx:96: lines 96-106
		return Generator::stream($next);
	}
}

class _HxAnon_StreamParser_Impl_0 extends HxAnon {
	function __construct($resume) {
		$this->resume = $resume;
	}
}

Boot::registerClass(StreamParser_Impl_::class, 'tink.io._StreamParser.StreamParser_Impl_');
