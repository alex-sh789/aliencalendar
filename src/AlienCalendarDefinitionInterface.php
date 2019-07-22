<?php

namespace Dfndr\AlienCalendar;

interface AlienCalendarDefinitionInterface {

    static public function yearCfg();
    static public function dowName($dow);
    static public function getBaseDate();
    static public function setBaseDate(array $base);
    static public function getMonthShift($month);

    public function leapYearsBefore($year = null);
    public function isLeap($year = null);
}
