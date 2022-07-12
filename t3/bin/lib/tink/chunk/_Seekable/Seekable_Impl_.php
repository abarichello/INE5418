<?php
/**
 */

namespace tink\chunk\_Seekable;

use \tink\chunk\ChunkObject;
use \haxe\io\_BytesData\Container;
use \php\Boot;
use \haxe\io\Bytes;

final class Seekable_Impl_ {

	/**
	 * @param int[]|\Array_hx $a
	 * 
	 * @return int[]|\Array_hx
	 */
	public static function _new ($a) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/Seekable.hx:7: character 3
		$this1 = $a;
		return $this1;
	}

	/**
	 * @param int[]|\Array_hx $this
	 * @param int $index
	 * 
	 * @return int
	 */
	public static function get ($this1, $index) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/Seekable.hx:14: characters 5-23
		return ($this1->arr[$index] ?? null);
	}

	/**
	 * @param int[]|\Array_hx $this
	 * 
	 * @return int
	 */
	public static function get_length ($this1) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/Seekable.hx:11: characters 7-25
		return $this1->length;
	}

	/**
	 * @param Bytes $b
	 * 
	 * @return int[]|\Array_hx
	 */
	public static function ofBytes ($b) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/Seekable.hx:20: characters 25-59
		$_g = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/Seekable.hx:20: characters 36-40
		$_g1 = 0;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/Seekable.hx:20: characters 40-48
		$_g2 = $b->length;
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/Seekable.hx:20: characters 26-58
		while ($_g1 < $_g2) {
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/Seekable.hx:20: characters 36-48
			$i = $_g1++;
			#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/Seekable.hx:20: characters 50-58
			$x = \ord($b->b->s[$i]);
			$_g->arr[$_g->length++] = $x;
		}
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/Seekable.hx:20: characters 12-60
		$this1 = $_g;
		return $this1;
	}

	/**
	 * @param ChunkObject $c
	 * 
	 * @return int[]|\Array_hx
	 */
	public static function ofChunk ($c) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/Seekable.hx:17: characters 5-22
		return Seekable_Impl_::ofBytes($c->toBytes());
	}

	/**
	 * @param string $s
	 * 
	 * @return int[]|\Array_hx
	 */
	public static function ofString ($s) {
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/Seekable.hx:23: characters 20-37
		$tmp = \strlen($s);
		#/home/barichello/.local/share/haxelib/tink_chunk/0,4,0/src/tink/chunk/Seekable.hx:23: characters 5-38
		return Seekable_Impl_::ofBytes(new Bytes($tmp, new Container($s)));
	}
}

Boot::registerClass(Seekable_Impl_::class, 'tink.chunk._Seekable.Seekable_Impl_');
Boot::registerGetters('tink\\chunk\\_Seekable\\Seekable_Impl_', [
	'length' => true
]);
