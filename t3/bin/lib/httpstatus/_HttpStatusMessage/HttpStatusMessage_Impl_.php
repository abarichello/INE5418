<?php
/**
 */

namespace httpstatus\_HttpStatusMessage;

use \php\Boot;

final class HttpStatusMessage_Impl_ {
	/**
	 * @param int $statusCode
	 * 
	 * @return string
	 */
	public static function _new ($statusCode) {
		#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:5: character 2
		$this1 = HttpStatusMessage_Impl_::fromCode($statusCode);
		return $this1;
	}

	/**
	 * @param int $statusCode
	 * 
	 * @return string
	 */
	public static function fromCode ($statusCode) {
		#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:9: lines 9-72
		if ($statusCode === 100) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:10: characters 15-23
			return "Continue";
		} else if ($statusCode === 101) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:11: characters 15-34
			return "Switching Protocols";
		} else if ($statusCode === 102) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:12: characters 15-25
			return "Processing";
		} else if ($statusCode === 200) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:13: characters 15-17
			return "OK";
		} else if ($statusCode === 201) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:14: characters 15-22
			return "Created";
		} else if ($statusCode === 202) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:15: characters 15-23
			return "Accepted";
		} else if ($statusCode === 203) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:16: characters 15-44
			return "Non-Authoritative Information";
		} else if ($statusCode === 204) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:17: characters 15-25
			return "No Content";
		} else if ($statusCode === 205) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:18: characters 15-28
			return "Reset Content";
		} else if ($statusCode === 206) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:19: characters 15-30
			return "Partial Content";
		} else if ($statusCode === 207) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:20: characters 15-27
			return "Multi-Status";
		} else if ($statusCode === 208) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:21: characters 15-31
			return "Already Reported";
		} else if ($statusCode === 226) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:22: characters 15-22
			return "IM Used";
		} else if ($statusCode === 300) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:23: characters 15-31
			return "Multiple Choices";
		} else if ($statusCode === 301) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:24: characters 15-32
			return "Moved Permanently";
		} else if ($statusCode === 302) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:25: characters 15-20
			return "Found";
		} else if ($statusCode === 303) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:26: characters 15-24
			return "See Other";
		} else if ($statusCode === 304) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:27: characters 15-27
			return "Not Modified";
		} else if ($statusCode === 305) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:28: characters 15-24
			return "Use Proxy";
		} else if ($statusCode === 306) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:29: characters 15-27
			return "Switch Proxy";
		} else if ($statusCode === 307) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:30: characters 15-33
			return "Temporary Redirect";
		} else if ($statusCode === 308) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:31: characters 15-33
			return "Permanent Redirect";
		} else if ($statusCode === 400) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:32: characters 15-26
			return "Bad Request";
		} else if ($statusCode === 401) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:33: characters 15-27
			return "Unauthorized";
		} else if ($statusCode === 402) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:34: characters 15-31
			return "Payment Required";
		} else if ($statusCode === 403) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:35: characters 15-24
			return "Forbidden";
		} else if ($statusCode === 404) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:36: characters 15-24
			return "Not Found";
		} else if ($statusCode === 405) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:37: characters 15-33
			return "Method Not Allowed";
		} else if ($statusCode === 406) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:38: characters 15-29
			return "Not Acceptable";
		} else if ($statusCode === 407) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:39: characters 15-44
			return "Proxy Authentication Required";
		} else if ($statusCode === 408) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:40: characters 15-30
			return "Request Timeout";
		} else if ($statusCode === 409) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:41: characters 15-23
			return "Conflict";
		} else if ($statusCode === 410) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:42: characters 15-19
			return "Gone";
		} else if ($statusCode === 411) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:43: characters 15-30
			return "Length Required";
		} else if ($statusCode === 412) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:44: characters 15-34
			return "Precondition Failed";
		} else if ($statusCode === 413) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:45: characters 15-32
			return "Payload Too Large";
		} else if ($statusCode === 414) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:46: characters 15-27
			return "URI Too Long";
		} else if ($statusCode === 415) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:47: characters 15-37
			return "Unsupported Media Type";
		} else if ($statusCode === 416) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:48: characters 15-36
			return "Range Not Satisfiable";
		} else if ($statusCode === 417) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:49: characters 15-33
			return "Expectation Failed";
		} else if ($statusCode === 418) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:50: characters 16-28
			return "I'm a teapot";
		} else if ($statusCode === 421) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:51: characters 15-34
			return "Misdirected Request";
		} else if ($statusCode === 422) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:52: characters 15-35
			return "Unprocessable Entity";
		} else if ($statusCode === 423) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:53: characters 15-21
			return "Locked";
		} else if ($statusCode === 424) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:54: characters 15-32
			return "Failed Dependency";
		} else if ($statusCode === 426) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:55: characters 15-31
			return "Upgrade Required";
		} else if ($statusCode === 428) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:56: characters 15-36
			return "Precondition Required";
		} else if ($statusCode === 429) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:57: characters 15-32
			return "Too Many Requests";
		} else if ($statusCode === 431) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:58: characters 15-46
			return "Request Header Fields Too Large";
		} else if ($statusCode === 451) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:59: characters 15-44
			return "Unavailable For Legal Reasons";
		} else if ($statusCode === 500) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:60: characters 15-36
			return "Internal Server Error";
		} else if ($statusCode === 501) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:61: characters 15-30
			return "Not Implemented";
		} else if ($statusCode === 502) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:62: characters 15-26
			return "Bad Gateway";
		} else if ($statusCode === 503) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:63: characters 15-34
			return "Service Unavailable";
		} else if ($statusCode === 504) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:64: characters 15-30
			return "Gateway Timeout";
		} else if ($statusCode === 505) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:65: characters 15-41
			return "HTTP Version Not Supported";
		} else if ($statusCode === 506) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:66: characters 15-38
			return "Variant Also Negotiates";
		} else if ($statusCode === 507) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:67: characters 15-35
			return "Insufficient Storage";
		} else if ($statusCode === 508) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:68: characters 15-28
			return "Loop Detected";
		} else if ($statusCode === 510) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:69: characters 15-27
			return "Not Extended";
		} else if ($statusCode === 511) {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:70: characters 15-46
			return "Network Authentication Required";
		} else {
			#/home/barichello/.local/share/haxelib/http-status/1,3,1/src/httpstatus/HttpStatusMessage.hx:71: characters 14-28
			return "Unknown Status";
		}
	}
}

Boot::registerClass(HttpStatusMessage_Impl_::class, 'httpstatus._HttpStatusMessage.HttpStatusMessage_Impl_');