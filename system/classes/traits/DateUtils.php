<?php

trait DateUtils {

	public static function formatDateAndTime($ts, $time = false) {
		if (is_string($ts)) {
			$ts = strtotime($ts);
		}
		if($time){
            return date('d/m/Y H:i:s', $ts);
        }else{
            return date('d/m/Y', $ts);
        }
	}

    public static function formatDateDB($date)
    {
        $ano = substr($date, 6);
        $mes = substr($date, 3, -5);
        $dia = substr($date, 0, -8);
        $segundos = ' 00:00:00';

        return $ano . "-" . $mes . "-" . $dia . $segundos;
    }

}
