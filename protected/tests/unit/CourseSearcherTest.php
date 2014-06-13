<?php
/**
 * Created by PhpStorm.
 * User: lubo
 * Date: 14-6-13
 * Time: 上午10:34
 */

class CourseSearcherTest extends CTestCase
{
    private $searcher;

    public function setUp()
    {
        $this->searcher = new CourseSearcher();
    }


    public function testParseTime()
    {
        $this->assertEquals($this->searcher->parseTime('2-5|2-10'),
            array(array('weekday' => 2, 'from' => 5, 'to' => 5),
                array('weekday' => 2, 'from' => 10, 'to' => 10),));
    }

    public function testParseTime2()
    {

        $this->assertEquals($this->searcher->parseTime('3-1~5|3-10'),
            array(
                array('weekday' => 3, 'from' => 1, 'to' => 5),
                array('weekday' => 3, 'from' => 10, 'to' => 10),
            ));
    }

    public function testParseSite()
    {
        $this->assertEquals($this->searcher->parseSite('图书馆109|图书馆108|仙Ⅱ120'),
            array('图书馆109', '图书馆108', '仙Ⅱ120')
        );
    }

    public function testParseSite2()
    {
        $this->assertEquals($this->searcher->parseSite('仙Ⅱ|图书馆'),
            array('仙Ⅱ', '图书馆',)
        );
    }

    public function testParseDomain()
    {
        $this->assertEquals($this->searcher->parseSearchDomain('user:all|department:all'),
            array('user' => 'all', 'department' => 'all')
        );
    }

    public function testParseDomain2()
    {
        $this->assertEquals($this->searcher->parseSearchDomain('user:none|department:1,2,4'),
            array('user' => 'none', 'department' => array(1, 2, 4))
        );
    }

    public function testParseDomain3()
    {
        $this->assertEquals($this->searcher->parseSearchDomain('user:all|department:none'),
            array('user' => 'all', 'department' => 'none')
        );
    }
}