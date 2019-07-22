<?php

namespace Dfndr\AlienCalendar;

use Dfndr\AlienCalendar\AlienCalendarAbstract;

class HumanCalendar extends AlienCalendarAbstract {

    static private $yearCfg = [
        'days' => 365,
        'month' => 12,
        'leap_corr' => 1,
        'wdays' => 7,
        'leap_month' => 2,
        'leap_day' => 29,
    ];
    static private $base = [
        'year' => 2016,
        'month' => 2,
        'day' => 29,
        'dow' => 1,
     ];

    static public $dowNames = [
        'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday',
        'Friday', 'Saturday'
    ];

    static public function dowName($dow) {
        if($dow < 0 || $dow > 6) {
            throw new \InvalidArgumentException("dow must be between 0 and 6");
        }

        return static::$dowNames[$dow];
    }

    static public function yearCfg() {
        return static::$yearCfg;
    }

    static public function getMonthShift($month) {
        static $table = [ '--spacer--', 0, 1, -1, 0, 0, 1, 1, 2, 3, 3, 4, 4];


        return $table[$month];
    }

    static public function getBaseDate() {
        return static::$base;
    }

    static public function setBaseDate(array $base) {
        static::$base = $base;
    }

    public function leapYearsBefore($year = null) {

        if(NULL === $year) {
            $year = $this->year;
        }

        if($year < 0) {
            throw new \InvalidArgumentException("year must be greater than 0");
        }

        $year--;

        return (int)($year / 4) - (int)($year / 100) + (int)($year / 400);
    }

    public function isLeap($year = null) {
        if(NULL === $year) {
            $year = $this->year;
        }

        if( $year % 400 == 0) {
            return true;
        }

        if ( $year % 100 == 0) {
            return false;
        }

        return $year % 4 == 0;
    }

}
