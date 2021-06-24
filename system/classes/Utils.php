<?php

require_once './system/classes/traits/DateUtils.php';
require_once './system/classes/traits/StringUtils.php';

class Utils {

	use DateUtils, StringUtils;

	public static function generateLink($path) {
		return Config::PATH . $path;
	}

	private function __construct() {}

}
