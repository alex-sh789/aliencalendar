<?php

namespace Dfndr\AlienCalendar;

use Dfndr\AlienCalendar\AlienCalendarDefinitionInterface;

abstract class AlienCalendarAbstract implements AlienCalendarDefinitionInterface {
    protected  $year;
    protected  $month;
    protected  $day;

    private $avg_month;


    public function __construct(int $year = NULL, int $month = NULL, int $day = NULL) {
        $baseDate = static::getBaseDate();
        $md = static::yearCfg();

        $this->year = ($year)?:$baseDate['year'];
        $this->month = ($month)?:$baseDate['month'];
        $this->day = ($day)?:$baseDate['day'];

        $this->avg_month = ($md['days'] - $md['days'] % $md['month'])/ $md['month'];

        //XXX: check date validity
    }

    private function asArray() {
        return [
            'year' => $this->year,
            'month' => $this->month,
            'day' => $this->day
        ];
    }

    private function days_from_start($to_date) {
        $md = static::yearCfg();
        $days = ($to_date['month'] -1) * $this->avg_month 
            + static::getMonthShift($to_date['month']) + $to_date['day'];

        if($this->isLeap($to_date['year']) && ( 
            $to_date['month'] > $md['leap_month'] || (
                $to_date['month'] == $md['leap_month'] && $to_date['day'] > $md['leap_day']
            )
        )) {
            $days += $md['leap_corr'];
        }

        return $days - 1;
    }

    private function days_to_end($from_date) {
        $md = static::yearCfg();
        $days = $md['days'] - ($this->avg_month * ($from_date['month'] - 1) 
            + static::getMonthShift($from_date['month']) + $from_date['day']);

        if($this->isLeap($from_date['year']) && (
            $from_date['month'] < $md['leap_month']  || (
                $from_date['month'] == $md['leap_month'] && $from_date['day'] <= $md['leap_day']
            )
        )) {
            $days += $md['leap_corr'];
        }
        return $days + 1;
    }

    private function find_direction($a, $b) {
        if($a['year'] < $b['year']) {
            return 1;
        }
        if($a['year'] > $b['year']) {
            return -1;
        }

        if($a['month'] < $b['month']) {
            return 1;
        }

        if($a['month'] > $b['month']) {
            return -1;
        }

        if($a['day'] < $b['day']) {
            return 1;
        }

        if($a['day'] > $b['day']) {
            return -1;
        }

        return 0;

    }

    public function dow($name = false) {
        $baseDate = static::getBaseDate();
        $md = static::yearCfg();

        $years_between = $this->year - $baseDate['year'];

        $dir = $this->find_direction($baseDate, $this->asArray());

        if($dir === 0) {
            return $baseDate['dow'];
        }
        if($years_between < 0) {
            $years_between = abs($years_between);
        }
        $years_between += 1;

        $from_date = ($dir > 0)? $baseDate : $this->asArray();
        $to_date = ($dir > 0) ? $this->asArray() : $baseDate;


        $days_between = $years_between * $md['days'];
        //apply leap correction for leap years between current and base date
        $days_between += $md['leap_corr'] * 
            $this->leapYearsBetween($from_date['year'], $to_date['year'] + 1);
        //move days from current date to next year
        $days_to_end = $this->days_to_end($to_date);
        //move days from base date to start of the year:
        $days_from_start = $this->days_from_start($from_date);

        $days_between -= $days_to_end;
        $days_between -= $days_from_start;


        $dow = ($baseDate['dow'] + $dir * $days_between) % $md['wdays'];

        if($dir < 0 && $dow < 0) {
            $dow += $md['wdays'];
        }

        if($name) {
            return static::dowName($dow);
        }

        return $dow;
    }

    public function getYear() {
        return $this->year;
    }

    public function getMonth() {
        return $this->month;
    }

    public function getDay() {
        return $this->day;
    }

    public function leapYearsBetween($start, $end) {
        if($start > $end) {
            throw new \InvalidArgumentException("Start must be greater then end");
        }

        if($start == $end) {
            return 0;
        }
        return $this->leapYearsBefore($end) - $this->leapYearsBefore($start);
    }

    abstract public function leapYearsBefore($year = null);
    abstract public function isLeap($year = null);

}

