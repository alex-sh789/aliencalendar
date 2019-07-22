<?php

use PHPUnit\Framework\TestCase;
use Dfndr\AlienCalendar\HumanCalendar;


class HumanCalendarTest extends TestCase {
    /* NLNLP */
    public function testNonLeapToNonLeapPositive() {
        $base = ['year' => 1990, 'month' => 1, 'day' => 1, 'dow' => 1 ];
        $test_date = ['year' => 2019, 'month' => 7, 'day' => 21, 'dow' => 0 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* NLNLN */
    public function testNonLeapToNonLeapNegative() {
        $test_date = ['year' => 1990, 'month' => 1, 'day' => 1, 'dow' => 1 ];
        $base = ['year' => 2019, 'month' => 7, 'day' => 21, 'dow' => 0 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* NLBLP */
    public function testNonLeapToBeforeLeapPositive() {
        $base = ['year' => 1990, 'month' => 1, 'day' => 1, 'dow' => 1 ];
        $test_date = ['year' => 2016, 'month' => 2, 'day' => 21, 'dow' => 0 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* NLBLN */
    public function testNonLeapToBeforeLeapNegative() {
        $base = ['year' => 2019, 'month' => 1, 'day' => 1, 'dow' => 2 ];
        $test_date = ['year' => 2016, 'month' => 2, 'day' => 21, 'dow' => 0 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* NLALP */
    public function testNonLeapToAfterLeapPositive() {
        $base = ['year' => 1990, 'month' => 1, 'day' => 1, 'dow' => 1 ];
        $test_date = ['year' => 2016, 'month' => 3, 'day' => 21, 'dow' => 1 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* NLALN */
    public function testNonLeapToAfterLeapNegative() {
        $base = ['year' => 2019, 'month' => 1, 'day' => 1, 'dow' => 2 ];
        $test_date = ['year' => 2016, 'month' => 3, 'day' => 21, 'dow' => 1 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* BLNLP */
    public function testBeforeLeapToNonLeapPositive() {
        $base = ['year' => 2004, 'month' => 1, 'day' => 1, 'dow' => 4 ];
        $test_date = ['year' => 2019, 'month' => 7, 'day' => 21, 'dow' => 0 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* BLNLN */
    public function testBeforeLeapToNonLeapNegative() {
        $base = ['year' => 2004, 'month' => 1, 'day' => 1, 'dow' => 4 ];
        $test_date = ['year' => 2003, 'month' => 2, 'day' => 21, 'dow' => 5 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* ALNLP */
    public function testAfterLeapToNonLeapPositive() {
        $base = ['year' => 2004, 'month' => 3, 'day' => 1, 'dow' => 1 ];
        $test_date = ['year' => 2019, 'month' => 1, 'day' => 17, 'dow' => 4 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* ALNLN */
    public function testAfterLeapToNonLeapNegative() {
        $base = ['year' => 2004, 'month' => 3, 'day' => 1, 'dow' => 1 ];
        $test_date = ['year' => 1999, 'month' => 9, 'day' => 15, 'dow' => 3 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* BLBLP */
    public function testBeforeLeapToBeforeLeapPositive() {
        $base = ['year' => 2004, 'month' => 1, 'day' => 1, 'dow' => 4 ];
        $test_date = ['year' => 2016, 'month' => 2, 'day' => 28, 'dow' => 0 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* BLBLN */
    public function testBeforeLeapToBeforeLeapNegative() {
        $base = ['year' => 2004, 'month' => 1, 'day' => 1, 'dow' => 4 ];
        $test_date = ['year' => 1996, 'month' => 2, 'day' => 28, 'dow' => 3 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* BLALP */
    public function testBeforeLeapToAfterLeapPositive() {
        $base = ['year' => 2004, 'month' => 1, 'day' => 1, 'dow' => 4 ];
        $test_date = ['year' => 2016, 'month' => 11, 'day' => 26, 'dow' => 6 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* BLALN */
    public function testBeforeLeapToAfterLeapNegative() {
        $base = ['year' => 2004, 'month' => 1, 'day' => 1, 'dow' => 4 ];
        $test_date = ['year' => 1996, 'month' => 4, 'day' => 9, 'dow' => 2 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* ALBLP */
    public function testAfterLeapToBeforeLeapPositive() {
        $base = ['year' => 2004, 'month' => 3, 'day' => 1, 'dow' => 1 ];
        $test_date = ['year' => 2016, 'month' => 2, 'day' => 28, 'dow' => 0 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* ALBLN */
    public function testAfterLeapToBeforeLeapNegative() {
        $base = ['year' => 2004, 'month' => 3, 'day' => 1, 'dow' => 1 ];
        $test_date = ['year' => 1996, 'month' => 2, 'day' => 28, 'dow' => 3 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* ALALP */
    public function testAfterLeapToAfterLeapPositive() {
        $base = ['year' => 2004, 'month' => 3, 'day' => 1, 'dow' => 1 ];
        $test_date = ['year' => 2016, 'month' => 5, 'day' => 27, 'dow' => 5 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /* ALALN */
    public function testAfterLeapToAfterLeapNegative() {
        $base = ['year' => 2004, 'month' => 3, 'day' => 1, 'dow' => 1 ];
        $test_date = ['year' => 1996, 'month' => 10, 'day' => 20, 'dow' => 0 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*LNLP*/
    public function testLeapToNonLeapPositive() {
        $base = ['year' => 2004, 'month' => 2, 'day' => 29, 'dow' => 0 ];
        $test_date = ['year' => 2019, 'month' => 7, 'day' => 21, 'dow' => 0 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*LNLN*/
    public function testLeapToNonLeapNegative() {
        $base = ['year' => 2004, 'month' => 2, 'day' => 29, 'dow' => 0 ];
        $test_date = ['year' => 2003, 'month' => 2, 'day' => 21, 'dow' => 5 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*LBLP*/
    public function testLeapToBeforeLeapPositive() {
        $base = ['year' => 2004, 'month' => 2, 'day' => 29, 'dow' => 0 ];
        $test_date = ['year' => 2008, 'month' => 2, 'day' => 21, 'dow' => 4 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*LBLN*/
    public function testLeapToBeforeLeapNegative() {
        $base = ['year' => 2004, 'month' => 2, 'day' => 29, 'dow' => 0 ];
        $test_date = ['year' => 2000, 'month' => 2, 'day' => 21, 'dow' => 1 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*LALP*/
    public function testLeapToAfterLeapPositive() {
        $base = ['year' => 2004, 'month' => 2, 'day' => 29, 'dow' => 0 ];
        $test_date = ['year' => 2008, 'month' => 3, 'day' => 21, 'dow' => 5 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*LALN*/
    public function testLeapToAfterLeapNegative() {
        $base = ['year' => 2004, 'month' => 2, 'day' => 29, 'dow' => 0 ];
        $test_date = ['year' => 2000, 'month' => 7, 'day' => 11, 'dow' => 2 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*LLP*/
    public function testLeapToLeapPositive() {
        $base = ['year' => 2004, 'month' => 2, 'day' => 29, 'dow' => 0 ];
        $test_date = ['year' => 2008, 'month' => 2, 'day' => 29, 'dow' => 5 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*LLN*/
    public function testLeapToLeapNegative() {
        $base = ['year' => 2004, 'month' => 2, 'day' => 29, 'dow' => 0 ];
        $test_date = ['year' => 2000, 'month' => 2, 'day' => 29, 'dow' => 2 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*ENLNLP*/
    public function testEqNonLeapToNonLeapPositive() {
        $base = ['year' => 1990, 'month' => 1, 'day' => 1, 'dow' => 1 ];
        $test_date = ['year' => 1990, 'month' => 7, 'day' => 21, 'dow' => 6 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }
    /*ENLNLN*/
    public function testEqNonLeapToNonLeapNegative() {
        $test_date = ['year' => 1990, 'month' => 1, 'day' => 1, 'dow' => 1 ];
        $base = ['year' => 1990, 'month' => 7, 'day' => 21, 'dow' => 6 ];
        HumanCalendar::setBaseDate($base);
        $this->doCheck($test_date);
    }

    private function doCheck($test_date) {
        $cal = new HumanCalendar($test_date['year'], $test_date['month'], $test_date['day']);
        $base = HumanCalendar::getBaseDate();
        $dow = $cal->dow();

        $this->assertSame($test_date['dow'], $dow);
    }
}
