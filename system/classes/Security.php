<?php

class Security {

	public static function escape($str) {
		return htmlentities($str, ENT_QUOTES | ENT_HTML5, 'UTF-8');
	}

	private function __construct() {}

}
