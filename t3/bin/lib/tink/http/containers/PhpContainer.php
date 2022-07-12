<?php
/**
 */

namespace tink\http\containers;

use \tink\http\IncomingRequest;
use \php\_Boot\HxAnon;
use \tink\http\Container;
use \tink\http\HeaderField;
use \tink\core\_Future\SyncFuture;
use \tink\http\ContainerResult;
use \tink\core\NamedWith;
use \php\Boot;
use \tink\io\std\InputSource;
use \haxe\io\_BytesData\Container as _BytesDataContainer;
use \php\Lib;
use \tink\io\_Source\Source_Impl_;
use \tink\streams\Single;
use \tink\core\TypedError;
use \tink\io\_Worker\Worker_Impl_;
use \sys\io\File;
use \tink\chunk\ByteChunk;
use \tink\core\Outcome;
use \sys\io\FileOutput;
use \tink\core\_Lazy\LazyConst;
use \tink\http\IncomingRequestHeader;
use \tink\http\_Method\Method_Impl_;
use \tink\core\_Future\Future_Impl_;
use \tink\_Url\Url_Impl_;
use \tink\io\_Sink\SinkYielding_Impl_;
use \tink\http\IncomingRequestBody;
use \haxe\io\Bytes;
use \tink\core\_Future\FutureObject;
use \tink\http\HandlerObject;
use \tink\http\BodyPart;

class PhpContainer implements Container {
	/**
	 * @var PhpContainer
	 */
	static public $inst;

	/**
	 * @param array $a
	 * @param \Closure $process
	 * 
	 * @return NamedWith[]|\Array_hx
	 */
	public static function getParts ($a, $process) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:35: characters 5-49
		$map = Lib::hashOfAssociativeArray($a);
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:36: characters 5-18
		$ret = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:37: characters 18-28
		$data = \array_values(\array_map("strval", \array_keys($map->data)));
		$name_current = 0;
		$name_length = \count($data);
		$name_data = $data;
		while ($name_current < $name_length) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:37: lines 37-44
			$name = $name_data[$name_current++];
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:38: characters 14-32
			$_g = $process(($map->data[$name] ?? null));
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:39: lines 39-43
			if ($_g !== null) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:40: characters 14-15
				$v = $_g;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:40: lines 40-43
				$x = new NamedWith($name, $process(($map->data[$name] ?? null)));
				$ret->arr[$ret->length++] = $x;
			}
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:45: characters 5-15
		return $ret;
	}

	/**
	 * @param string $key
	 * 
	 * @return string
	 */
	public static function getServerVar ($key) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:24: lines 24-25
		return $_SERVER[$key];
	}

	/**
	 * @return void
	 */
	public function __construct () {
	}

	/**
	 * @return IncomingRequest
	 */
	public function getRequest () {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:50: characters 7-79
		$header = Method_Impl_::ofString($_SERVER["REQUEST_METHOD"], function ($_) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:50: characters 68-78
			return "GET";
		});
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:51: characters 7-34
		$header1 = Url_Impl_::fromString($_SERVER["REQUEST_URI"]);
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:54: lines 54-86
		$header2 = null;
		if (\function_exists("getallheaders")) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:56: characters 9-136
			$raw = Lib::hashOfAssociativeArray(\getallheaders());
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:58: characters 11-70
			$_g = new \Array_hx();
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:58: characters 25-35
			$data = \array_values(\array_map("strval", \array_keys($raw->data)));
			$name_current = 0;
			$name_length = \count($data);
			$name_data = $data;
			while ($name_current < $name_length) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:58: characters 12-69
				$name = $name_data[$name_current++];
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:58: characters 53-57
				$this1 = \mb_strtolower($name);
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:58: characters 37-69
				$x = new HeaderField($this1, ($raw->data[$name] ?? null));
				$_g->arr[$_g->length++] = $x;
			}
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:54: lines 54-86
			$header2 = $_g;
		} else {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:61: characters 11-120
			$h = Lib::hashOfAssociativeArray($_SERVER);
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:63: characters 11-28
			$headers = new \Array_hx();
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:65: characters 20-28
			$data = \array_values(\array_map("strval", \array_keys($h->data)));
			$k_current = 0;
			$k_length = \count($data);
			$k_data = $data;
			while ($k_current < $k_length) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:65: lines 65-74
				$k = $k_data[$k_current++];
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:66: lines 66-72
				$key = null;
				if ($k === "CONTENT_LENGTH") {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:68: lines 68-71
					if (!\array_key_exists("HTTP_CONTENT_LENGTH", $h->data)) {
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:66: lines 66-72
						$key = "Content-Length";
					} else if (\mb_substr($k, 0, 5) === "HTTP_") {
						$key = \StringTools::replace(\mb_substr($k, 5, null), "_", "-");
					} else {
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:71: characters 23-31
						continue;
					}
				} else if ($k === "CONTENT_MD5") {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:69: lines 69-71
					if (!\array_key_exists("HTTP_CONTENT_MD5", $h->data)) {
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:66: lines 66-72
						$key = "Content-Md5";
					} else if (\mb_substr($k, 0, 5) === "HTTP_") {
						$key = \StringTools::replace(\mb_substr($k, 5, null), "_", "-");
					} else {
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:71: characters 23-31
						continue;
					}
				} else if ($k === "CONTENT_TYPE") {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:67: lines 67-71
					if (!\array_key_exists("HTTP_CONTENT_TYPE", $h->data)) {
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:66: lines 66-72
						$key = "Content-Type";
					} else if (\mb_substr($k, 0, 5) === "HTTP_") {
						$key = \StringTools::replace(\mb_substr($k, 5, null), "_", "-");
					} else {
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:71: characters 23-31
						continue;
					}
				} else {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:70: lines 70-71
					if (\mb_substr($k, 0, 5) === "HTTP_") {
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:66: lines 66-72
						$key = \StringTools::replace(\mb_substr($k, 5, null), "_", "-");
					} else {
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:71: characters 23-31
						continue;
					}
				}
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:73: characters 17-20
				$this1 = \mb_strtolower($key);
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:73: characters 13-31
				$x = new HeaderField($this1, ($h->data[$k] ?? null));
				$headers->arr[$headers->length++] = $x;
			}
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:75: lines 75-84
			if (!\array_key_exists("HTTP_AUTHORIZATION", $h->data)) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:76: lines 76-83
				if (\array_key_exists("REDIRECT_HTTP_AUTHORIZATION", $h->data)) {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:77: characters 22-35
					$this1 = \mb_strtolower("Authorization");
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:77: characters 17-75
					$x = new HeaderField($this1, ($h->data["REDIRECT_HTTP_AUTHORIZATION"] ?? null));
					$headers->arr[$headers->length++] = $x;
				} else if (\array_key_exists("PHP_AUTH_USER", $h->data)) {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:79: characters 17-81
					$basic = (\array_key_exists("PHP_AUTH_PW", $h->data) ? ($h->data["PHP_AUTH_PW"] ?? null) : "");
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:80: characters 22-35
					$this1 = \mb_strtolower("Authorization");
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:80: characters 75-121
					$s = ($h->data["PHP_AUTH_USER"] ?? null);
					$bytes = \strlen($s);
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:80: characters 49-122
					$result = \base64_encode((new Bytes($bytes, new _BytesDataContainer($s)))->toString());
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:80: characters 17-146
					$x = new HeaderField($this1, "Basic " . ($result??'null') . (":" . ($basic??'null')));
					$headers->arr[$headers->length++] = $x;
				} else if (\array_key_exists("PHP_AUTH_DIGEST", $h->data)) {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:82: characters 22-35
					$this1 = \mb_strtolower("Authorization");
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:82: characters 17-63
					$x = new HeaderField($this1, ($h->data["PHP_AUTH_DIGEST"] ?? null));
					$headers->arr[$headers->length++] = $x;
				}
			}
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:54: lines 54-86
			$header2 = $headers;
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:49: lines 49-88
		$header3 = new IncomingRequestHeader($header, $header1, "1.1", $header2);
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:91: characters 7-34
		$tmp = $_SERVER["REMOTE_ADDR"];
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:93: characters 14-34
		$_g = $header3->contentType();
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:93: lines 93-136
		$tmp1 = null;
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:93: characters 14-34
		if ($_g->index === 0) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:94: characters 22-65
			$_g1 = $_g->params[0];
			$_g = "" . ($_g1->type??'null') . "/" . ($_g1->subtype??'null');
			$_g = $_g1->extensions;
			$_g = $_g1->raw;
			if ($_g1->type === "multipart") {
				if ($_g1->subtype === "form-data") {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:94: lines 94-133
					if ($header3->method === "POST") {
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:93: lines 93-136
						$tmp1 = IncomingRequestBody::Parsed(PhpContainer::getParts($_POST, Boot::getStaticClosure(BodyPart::class, 'Value'))->concat(PhpContainer::getParts($_FILES, function ($v) {
							#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:103: characters 15-46
							$tmpName = $v["tmp_name"];
							#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:104: characters 15-39
							$name = $v["name"];
							#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:107: characters 24-45
							if ($v["error"] === 0) {
								#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:109: characters 21-95
								$streamName = "uploaded file \"" . ($name??'null') . "\" in temporary location \"" . ($tmpName??'null') . "\"";
								#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:110: lines 110-126
								return BodyPart::File(new _HxAnon_PhpContainer0($name, $v["size"], $v["type"], function () use (&$name, &$tmpName) {
									#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:114: lines 114-117
									$input = File::read($tmpName, true);
									$options = null;
									if ($options === null) {
										#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:93: characters 7-14
										$options = new HxAnon();
									}
									#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:115: characters 25-29
									$name1 = $name;
									#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:114: lines 114-117
									$tmp = Worker_Impl_::ensure($options->worker);
									$_g = $options->chunkSize;
									$tmp1 = null;
									if ($_g === null) {
										$tmp1 = 65536;
									} else {
										$v = $_g;
										$tmp1 = $v;
									}
									return new InputSource($name1, $input, $tmp, Bytes::alloc($tmp1), 0);
								}, function ($path) use (&$streamName, &$tmpName) {
									#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:118: lines 118-125
									return new SyncFuture(new LazyConst((\rename($tmpName, $path) ? Outcome::Success(null) : Outcome::Failure(new TypedError(null, "Failed to save " . ($streamName??'null') . " to " . ($path??'null'), new _HxAnon_PhpContainer1("tink/http/containers/PhpContainer.hx", 124, "tink.http.containers.PhpContainer", "getRequest"))))));
								}));
							} else {
								#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:127: characters 28-32
								return null;
							}
						})));
					} else {
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:133: characters 18-127
						$s = \file_get_contents("php://input");
						$b = \strlen($s);
						#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:93: lines 93-136
						$tmp1 = IncomingRequestBody::Plain(new Single(new LazyConst(ByteChunk::of(new Bytes($b, new _BytesDataContainer($s))))));
					}
				} else {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:133: characters 18-127
					$s = \file_get_contents("php://input");
					$b = \strlen($s);
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:93: lines 93-136
					$tmp1 = IncomingRequestBody::Plain(new Single(new LazyConst(ByteChunk::of(new Bytes($b, new _BytesDataContainer($s))))));
				}
			} else {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:133: characters 18-127
				$s = \file_get_contents("php://input");
				$b = \strlen($s);
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:93: lines 93-136
				$tmp1 = IncomingRequestBody::Plain(new Single(new LazyConst(ByteChunk::of(new Bytes($b, new _BytesDataContainer($s))))));
			}
		} else {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:133: characters 18-127
			$s = \file_get_contents("php://input");
			$b = \strlen($s);
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:93: lines 93-136
			$tmp1 = IncomingRequestBody::Plain(new Single(new LazyConst(ByteChunk::of(new Bytes($b, new _BytesDataContainer($s))))));
		}
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:90: lines 90-137
		return new IncomingRequest($tmp, $header3, $tmp1);
	}

	/**
	 * @param HandlerObject $handler
	 * 
	 * @return FutureObject
	 */
	public function run ($handler) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:141: lines 141-162
		$_gthis = $this;
		return Future_Impl_::async(function ($cb) use (&$_gthis, &$handler) {
			#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:142: lines 142-161
			$handler->process($_gthis->getRequest())->handle(function ($res) use (&$cb) {
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:146: characters 9-69
				http_response_code($res->header->statusCode);
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:150: characters 19-29
				$_g_current = 0;
				$_g_array = $res->header->fields;
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:150: lines 150-152
				while ($_g_current < $_g_array->length) {
					$h = ($_g_array->arr[$_g_current++] ?? null);
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:152: characters 11-49
					\header(($h->name??'null') . ": " . ($h->value??'null'));
				}
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:156: characters 9-178
				$out = SinkYielding_Impl_::ofOutput("output buffer", new FileOutput(\fopen("php://output", "w")));
				#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:158: lines 158-160
				Source_Impl_::pipeTo($res->body, $out, new _HxAnon_PhpContainer2(true))->handle(function ($o) use (&$cb) {
					#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/containers/PhpContainer.hx:159: characters 11-23
					$cb(ContainerResult::Shutdown());
				});
			});
		});
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$inst = new PhpContainer();
	}
}

class _HxAnon_PhpContainer1 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

class _HxAnon_PhpContainer0 extends HxAnon {
	function __construct($fileName, $size, $mimeType, $read, $saveTo) {
		$this->fileName = $fileName;
		$this->size = $size;
		$this->mimeType = $mimeType;
		$this->read = $read;
		$this->saveTo = $saveTo;
	}
}

class _HxAnon_PhpContainer2 extends HxAnon {
	function __construct($end) {
		$this->end = $end;
	}
}

Boot::registerClass(PhpContainer::class, 'tink.http.containers.PhpContainer');
PhpContainer::__hx__init();