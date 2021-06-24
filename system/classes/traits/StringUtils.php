<?php

trait StringUtils {

    public static function endsWith($haystack, $needle) {
		$haystack = substr($haystack, -strlen($needle));
		return $haystack === $needle;
	}

	public static function startsWith($haystack, $needle) {
		$haystack = substr($haystack, 0, strlen($needle));
		return $haystack === $needle;
	}

    public static function removeMaskZipCode($zipcode)
    {
        $zipcode = str_replace('-', '', $zipcode);
        return $zipcode;
    }

}
