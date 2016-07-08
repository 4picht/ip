<?php
namespace Filipac;

class Ip {
	/**
	 * @var string Cached IP
	 */
	private static $ip = null;

	/**
	 * Retrieve the current client's IP
	 *
	 * @return string
	 */
	static public function get() {
		if (!isset(self::$ip)) {
			self::$ip = self::_checks_ip();
		}
		return self::$ip;
	}

	/**
	 * (Re-)Initialize the class
	 *
	 * @return string
	 */
	static public function init() {
		self::$ip = self::_checks_ip();
	}

	/**
	 * Try different methods to load the client IP
	 * - Forwarded header
	 * - HTTP_CLIENT_IP
	 * - REMOTE_ADDR
	 *
	 * @return string|false IP
	 */
	private static function _checks_ip() {
		if(self::_get('HTTP_X_FORWARDED_FOR')) {
			return self::_get('HTTP_X_FORWARDED_FOR');
		} else if(self::_get('HTTP_CLIENT_IP')) {
			return self::_get('HTTP_CLIENT_IP');
		} else if(self::_get('REMOTE_ADDR')) {
			return self::_get('REMOTE_ADDR');
		} else {
			return false;
		}
	}

	/**
	 * @param $name Name of the Variable to check
	 * @return string Content of either $_SERVER[$name] or getenv($name)
	 */
	private static function _get($name) {
		if(isset($_SERVER[$name])) {
			return $_SERVER[$name];
		}
		return getenv($name);
	}
}
