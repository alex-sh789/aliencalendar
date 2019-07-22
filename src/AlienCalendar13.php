<?php

namespace Dfndr\AlienCalendar;

use Dfndr\AlienCalendar\AlienCalendarAbstract;

class AlienCalendar13 extends AlienCalendarAbstract {

    static private $base = [
        'year' => 1990,
        'month' => 1,
        'day' => 1,
        'dow' => 1,
    ];

    static private $yearCfg = [
        'days' => 280,
        'month' => 13,
        'leap_corr' => -1,
        'wdays' => 7,
        'leap_month' => 13,
        'leap_day' => 21,
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

    static public function getBaseDate() {
        return static::$base;
    }

    static public function setBaseDate(array $base) {
        static::$base = $base;
    }

    static public function yearCfg() {
        return static::$yearCfg;
    }

    static public function getMonthShift($month) {
        return ($month - ($month % 2))/2;
    }

    public function leapYearsBefore($year = null) {
        if(NULL === $year) {
            $year = $this->year;
        }
        if($year <= 0) {
            throw new \InvalidArgumentException("year must be greater than 0");
        }

        $year--;

        return (int)($year / 5);
    }

    public function isLeap($year = null) {
        if(NULL == $year) {
            $year = $this->year;
        }
        return $year % 5 == 0;
    } 

}
