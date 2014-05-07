<?php

namespace MarkWilson\ArrayFiltering\Tests;

use MarkWilson\ArrayFiltering\ArrayFiltering;

/**
 * Tests ArrayFiltering
 *
 * @package MarkWilson\ArrayFiltering\Tests
 * @author  Mark Wilson <mark@89allport.co.uk>
 */
class ArrayFilteringTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getFilterData
     */
    public function testFilter(array $expected, array $data, $filterFunction)
    {
        $filter = $this->getMockBuilder('MarkWilson\ArrayFiltering\FilterInterface')
                       ->disableOriginalConstructor()
                       ->getMock();

        $filter->expects($this->exactly(count($data)))
               ->method('isSatisfiedBy')
               ->will($this->returnCallback($filterFunction));

        $filtering = new ArrayFiltering($data);

        $this->assertEquals($expected, $filtering->filterBy($filter)->getArrayCopy());
    }

    public function getFilterData()
    {
        return [
            [['testing' => 'testing'], ['testing' => 'testing', 'blah' => 'blah'], function ($key) {
                return preg_match('/^testing/', $key);
            }]
        ];
    }
}
