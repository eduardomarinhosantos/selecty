<?php

namespace App;

class Helper {

    public static function datahorarioBDtoBR( string $data ) {
        return date_create_from_format( 'Y-m-d H:i:s', $data )->format( 'd/m/Y à\s H:i:s' );
    }

    public static function dataBDtoBR( string $data ) {
        return date_create_from_format( 'Y-m-d', $data )->format( 'd/m/Y' );
    }

    public static function dataBRtoBD( string $data ) {
        return date_create_from_format( 'd/m/Y', $data )->format( 'Y-m-d' );
    }

    public static function horarioBDtoBR( string $horario ) {
        return date_create_from_format( 'H:i:s', $horario )->format( 'H:i' );
    }

    public static function moedaBDtoBR( string $valor ) {
        
        return 'R$ '.number_format($valor, 2, ',', '');
    }

}