<?php

use PHPUnit\Framework\TestCase;
use Dfndr\AlienCalendar\AlienCalendar13;


class AlienCalendar13Test extends TestCase {
    /* NLNLP */
    public function testNonLeapToNonLeapPositive() {
        $base = ['year' => 1991, 'month' => 1, 'day' => 1, 'dow' => 0 ];
        $test_date = ['year' => 1992, 'month' => 1, 'day' => 1, 'dow' => 0 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* NLNLN */
    public function testNonLeapToNonLeapNegative() {
        $test_date = ['year' => 1992, 'month' => 1, 'day' => 1, 'dow' => 0 ];
        $base = ['year' => 1991, 'month' => 1, 'day' => 1, 'dow' => 0 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* NLBLP */
    public function testNonLeapToBeforeLeapPositive() {
        $base = ['year' => 1991, 'month' => 1, 'day' => 1, 'dow' => 0 ];
        $test_date = ['year' => 2005, 'month' => 1, 'day' => 1, 'dow' => 5 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* NLBLN */
    public function testNonLeapToBeforeLeapNegative() {
        $base = ['year' => 1991, 'month' => 1, 'day' => 1, 'dow' => 0 ];
        $test_date = ['year' => 1985, 'month' => 1, 'day' => 1, 'dow' => 2 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* BLNLP */
    public function testBeforeLeapToNonLeapPositive() {
        $base = ['year' => 1990, 'month' => 1, 'day' => 1, 'dow' => 1 ];
        $test_date = ['year' => 1998, 'month' => 1, 'day' => 1, 'dow' => 6 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* BLNLN */
    public function testBeforeLeapToNonLeapNegative() {
        $test_date = ['year' => 1990, 'month' => 2, 'day' => 1, 'dow' => 2  ];
        $base = ['year' => 1991, 'month' => 1, 'day' => 1, 'dow' => 0 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* BLBLP */
    public function testBeforeLeapToBeforeLeapPositive() {
        $base = ['year' => 1990, 'month' => 3, 'day' => 5, 'dow' => 6 ];
        $test_date = ['year' => 2005, 'month' => 1, 'day' => 1, 'dow' => 5 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }

    /* BLBLN */
    public function testBeforeLeapToBeforeLeapNegative() {
        $test_date = ['year' => 1990, 'month' => 3, 'day' => 5, 'dow' => 6 ];
        $base = ['year' => 2005, 'month' => 1, 'day' => 1, 'dow' => 5 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*LNLP*/
    public function testLeapToNonLeapPositive() {
        $base = ['year' => 1990, 'month' => 13, 'day' => 21, 'dow' => 6 ];
        $test_date = ['year' => 1992, 'month' => 1, 'day' => 1, 'dow' => 0 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*LNLN*/
    public function testLeapToNonLeapNegative() {
        $base = ['year' => 1990, 'month' => 13, 'day' => 21, 'dow' => 6 ];
        $test_date = ['year' => 1984, 'month' => 1, 'day' => 1, 'dow' => 2 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*LBLP*/
    public function testLeapToBeforeLeapPositive() {
        $base = ['year' => 1990, 'month' => 13, 'day' => 21, 'dow' => 6 ];
        $test_date = ['year' => 2005, 'month' => 1, 'day' => 1, 'dow' => 5 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*LBLN*/
    public function testLeapToBeforeLeapNegative() {
        $base = ['year' => 1990, 'month' => 13, 'day' => 21, 'dow' => 6 ];
        $test_date = ['year' => 1985, 'month' => 3, 'day' => 1, 'dow' => 3 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*LLP*/
    public function testLeapToLeapPositive() {
        $base = ['year' => 1990, 'month' => 13, 'day' => 21, 'dow' => 6 ];
        $test_date = ['year' => 2005, 'month' => 13, 'day' => 21, 'dow' => 3 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*LLN*/
    public function testLeapToLeapNegative() {
        $test_date = ['year' => 1990, 'month' => 13, 'day' => 21, 'dow' => 6 ];
        $base = ['year' => 2005, 'month' => 13, 'day' => 21, 'dow' => 3 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*ENLNLP*/
    public function testEqNonLeapToNonLeapPositive() {
        $base = ['year' => 1991, 'month' => 1, 'day' => 1, 'dow' => 0 ];
        $test_date = ['year' => 1991, 'month' => 4, 'day' => 1, 'dow' => 2 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*ENLNLN*/
    public function testEqNonLeapToNonLeapNegative() {
        $base = ['year' => 1991, 'month' => 2, 'day' => 1, 'dow' => 1 ];
        $test_date = ['year' => 1991, 'month' => 1, 'day' => 1, 'dow' => 0 ];
        AlienCalendar13::setBaseDate($base);
        $this->doCheck($test_date);
    }

    private function doCheck($test_date) {
        $cal = new AlienCalendar13($test_date['year'], $test_date['month'], $test_date['day']);
        $base = AlienCalendar13::getBaseDate();
        $dow = $cal->dow();

        $this->assertSame($test_date['dow'], $dow);
    }
}
