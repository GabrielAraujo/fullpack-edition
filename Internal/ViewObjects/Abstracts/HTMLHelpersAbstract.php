<?php namespace ZN\ViewObjects\Abstracts;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

abstract class HTMLHelpersAbstract
{
    /**
     * abstract create
     * 
     * @param string ...$elements
     * 
     * @return string
     */
    abstract public function create(...$elements) : String;
}
