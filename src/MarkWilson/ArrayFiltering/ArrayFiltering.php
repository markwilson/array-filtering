<?php

namespace MarkWilson\ArrayFiltering;

/**
 * Array filtering
 *
 * @package MarkWilson\ArrayFiltering
 * @author  Mark Wilson <mark@89allport.co.uk>
 */
class ArrayFiltering
{
    /**
     * Array to filter
     *
     * @var array|\ArrayObject
     */
    private $arrayToFilter;

    /**
     * Constructor.
     *
     * @param array|\ArrayAccess $arrayToFilter Array to filter
     *
     * @throws \InvalidArgumentException If not provided with an array
     */
    public function __construct($arrayToFilter)
    {
        $this->setArrayToFilter($arrayToFilter);
    }

    /**
     * Set the array to be filtered
     *
     * @param array|\ArrayAccess $arrayToFilter Array to filter
     *
     * @return $this
     */
    public function setArrayToFilter($arrayToFilter)
    {
        $this->checkValidArray($arrayToFilter);

        $this->arrayToFilter = $arrayToFilter;

        return $this;
    }

    /**
     * Filter the array
     *
     * @param FilterInterface $filter Filter to use
     *
     * @return \ArrayObject
     */
    public function filterBy(FilterInterface $filter)
    {
        $arrayToFilter = $this->arrayToFilter;
        $filteredArray = new \ArrayObject();

        foreach ($arrayToFilter as $key => $value) {
            if ($filter->isSatisfiedBy($key, $value)) {
                $filteredArray->offsetSet($key, $value);
            }
        }

        return $filteredArray;
    }

    /**
     * Check the specified array is usable
     *
     * @param $array
     */
    protected function checkValidArray($array)
    {
        if (!is_array($array) && !$array instanceof \ArrayAccess) {
            throw new \InvalidArgumentException('ArrayFiltering expects an array or ArrayAccess');
        }
    }
}
