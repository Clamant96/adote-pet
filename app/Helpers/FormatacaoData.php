<?php

class FormatacaoData {

    public static function conversorDiaEData($dia) {
        if(isset($dia)):
            return date('d/m/Y H:i', strtotime($dia));
        else:
            return false;
        endif;

    }

    public static function conversorDia($dia) {
        if(isset($dia)):
            return date('d/m/Y', strtotime($dia));
        else:
            return false;
        endif;

    }

}