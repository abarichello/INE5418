<?php
/**
 */

namespace sys\io;

use \php\Boot;

/**
 * API for reading and writing files.
 * See `sys.FileSystem` for the complementary file system API.
 */
class File {
	/**
	 * Returns an `FileInput` handle to the file specified by `path`.
	 * If `binary` is true, the file is opened in binary mode. Otherwise it is
	 * opened in non-binary mode.
	 * If the file does not exist or can not be read, an exception is thrown.
	 * Operations on the returned `FileInput` handle read on the opened file.
	 * File handles should be closed via `FileInput.close` once the operation
	 * is complete.
	 * If `path` is null, the result is unspecified.
	 * 
	 * @param string $path
	 * @param bool $binary
	 * 
	 * @return FileInput
	 */
	public static function read ($path, $binary = true) {
		#/usr/share/haxe/std/php/_std/sys/io/File.hx:48: characters 3-73
		if ($binary === null) {
			$binary = true;
		}
		return new FileInput(\fopen($path, ($binary ? "rb" : "r")));
	}

	/**
	 * Returns an `FileOutput` handle to the file specified by `path`.
	 * If `binary` is true, the file is opened in binary mode. Otherwise it is
	 * opened in non-binary mode.
	 * If the file cannot be written to, an exception is thrown.
	 * Operations on the returned `FileOutput` handle write to the opened file.
	 * If the file existed, its previous content is overwritten.
	 * File handles should be closed via `FileOutput.close` once the operation
	 * is complete.
	 * If `path` is null, the result is unspecified.
	 * 
	 * @param string $path
	 * @param bool $binary
	 * 
	 * @return FileOutput
	 */
	public static function write ($path, $binary = true) {
		#/usr/share/haxe/std/php/_std/sys/io/File.hx:52: characters 3-66
		if ($binary === null) {
			$binary = true;
		}
		return new FileOutput(\fopen($path, ($binary ? "wb" : "w")));
	}
}

Boot::registerClass(File::class, 'sys.io.File');
