<?php

namespace MarkWilson\ArrayFiltering;

/**
 * Array filter interface
 *
 * @package MarkWilson\ArrayFiltering
 * @author  Mark Wilson <mark@89allport.co.uk>
 */
interface FilterInterface
{
    /**
     * Check if the filter is satisfied by the specified values
     *
     * @param string|integer $key   Item key
     * @param mixed          $value Item value
     *
     * @return boolean
     */
    public function isSatisfiedBy($key, $value);
}
