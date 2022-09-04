<?php

class Point{

    private const POINTS_PER_DOLLAR = 1;

    public static function getPoints($total){
        return intval($total * self::POINTS_PER_DOLLAR);
    }

    public static function getDiscountAmount($points_used){
        switch ($points_used) {
            case '100':
                return 5;
                break;
            case '200':
                return 10;
                break;
            case '500':
                return 25;
                break;
            case '1000':
                return 50;
                break;
            case '2000':
                return 100;
                break;
            case '4000':
                return 200;
                break;
            case '10000':
                return 500;
                break;
            
            default:
                return 0;
                break;
        }
    }




}