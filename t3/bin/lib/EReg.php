<?php
/**
 */

use \php\Boot;
use \haxe\Exception as HaxeException;

/**
 * The EReg class represents regular expressions.
 * While basic usage and patterns consistently work across platforms, some more
 * complex operations may yield different results. This is a necessary trade-
 * off to retain a certain level of performance.
 * EReg instances can be created by calling the constructor, or with the
 * special syntax `~/pattern/modifier`
 * EReg instances maintain an internal state, which is affected by several of
 * its methods.
 * A detailed explanation of the supported operations is available at
 * <https://haxe.org/manual/std-regex.html>
 */
final class EReg {
	/**
	 * @var bool
	 */
	public $global;
	/**
	 * @var string
	 */
	public $last;
	/**
	 * @var mixed[]
	 */
	public $matches;
	/**
	 * @var string
	 */
	public $options;
	/**
	 * @var string
	 */
	public $pattern;
	/**
	 * @var string
	 */
	public $re;

	/**
	 * Creates a new regular expression with pattern `r` and modifiers `opt`.
	 * This is equivalent to the shorthand syntax `~/r/opt`
	 * If `r` or `opt` are null, the result is unspecified.
	 * 
	 * @param string $r
	 * @param string $opt
	 * 
	 * @return void
	 */
	public function __construct ($r, $opt) {
		#/usr/share/haxe/std/php/_std/EReg.hx:37: characters 3-19
		$this->pattern = $r;
		#/usr/share/haxe/std/php/_std/EReg.hx:38: characters 3-45
		$this->options = str_replace("g", "", $opt);
		#/usr/share/haxe/std/php/_std/EReg.hx:39: characters 3-26
		$this->global = $this->options !== $opt;
		#/usr/share/haxe/std/php/_std/EReg.hx:40: characters 3-49
		$this->options = str_replace("u", "", $this->options);
		#/usr/share/haxe/std/php/_std/EReg.hx:41: characters 3-68
		$this->re = "\"" . (str_replace("\"", "\\\"", $r)??'null') . "\"" . ($this->options??'null');
	}

	/**
	 * @return void
	 */
	public function handlePregError () {
		#/usr/share/haxe/std/php/_std/EReg.hx:63: characters 3-36
		$e = preg_last_error();
		#/usr/share/haxe/std/php/_std/EReg.hx:64: lines 64-72
		if ($e === PREG_INTERNAL_ERROR) {
			#/usr/share/haxe/std/php/_std/EReg.hx:65: characters 4-9
			throw HaxeException::thrown("EReg: internal PCRE error");
		} else if ($e === PREG_BACKTRACK_LIMIT_ERROR) {
			#/usr/share/haxe/std/php/_std/EReg.hx:67: characters 4-9
			throw HaxeException::thrown("EReg: backtrack limit");
		} else if ($e === PREG_RECURSION_LIMIT_ERROR) {
			#/usr/share/haxe/std/php/_std/EReg.hx:69: characters 4-9
			throw HaxeException::thrown("EReg: recursion limit");
		} else if ($e === PREG_JIT_STACKLIMIT_ERROR) {
			#/usr/share/haxe/std/php/_std/EReg.hx:71: characters 4-9
			throw HaxeException::thrown("failed due to limited JIT stack space");
		}
	}

	/**
	 * Tells if `this` regular expression matches String `s`.
	 * This method modifies the internal state.
	 * If `s` is `null`, the result is unspecified.
	 * 
	 * @param string $s
	 * 
	 * @return bool
	 */
	public function match ($s) {
		#/usr/share/haxe/std/php/_std/EReg.hx:45: characters 10-29
		$p = preg_match(($this->re . "u"), $s, $this->matches, PREG_OFFSET_CAPTURE, 0);
		if ($p === false) {
			$this->handlePregError();
			$p = preg_match($this->re, $s, $this->matches, PREG_OFFSET_CAPTURE);
		}
		if ($p > 0) {
			$this->last = $s;
		} else {
			$this->last = null;
		}
		return $p > 0;
	}

	/**
	 * Returns the matched sub-group `n` of `this` EReg.
	 * This method should only be called after `this.match` or
	 * `this.matchSub`, and then operates on the String of that operation.
	 * The index `n` corresponds to the n-th set of parentheses in the pattern
	 * of `this` EReg. If no such sub-group exists, the result is unspecified.
	 * If `n` equals 0, the whole matched substring is returned.
	 * 
	 * @param int $n
	 * 
	 * @return string
	 */
	public function matched ($n) {
		#/usr/share/haxe/std/php/_std/EReg.hx:81: lines 81-82
		if (($this->matches === null) || ($n < 0)) {
			#/usr/share/haxe/std/php/_std/EReg.hx:82: characters 4-9
			throw HaxeException::thrown("EReg::matched");
		}
		#/usr/share/haxe/std/php/_std/EReg.hx:85: lines 85-86
		if ($n >= count($this->matches)) {
			#/usr/share/haxe/std/php/_std/EReg.hx:86: characters 4-15
			return null;
		}
		#/usr/share/haxe/std/php/_std/EReg.hx:87: lines 87-88
		if ($this->matches[$n][1] < 0) {
			#/usr/share/haxe/std/php/_std/EReg.hx:88: characters 4-15
			return null;
		}
		#/usr/share/haxe/std/php/_std/EReg.hx:89: characters 3-23
		return $this->matches[$n][0];
	}
}

Boot::registerClass(EReg::class, 'EReg');
