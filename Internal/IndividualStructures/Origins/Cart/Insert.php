<?php namespace ZN\IndividualStructures\Cart;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

class Insert extends CartExtends
{
    //--------------------------------------------------------------------------------------------------------
    // Insert Item
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $product
    //
    //--------------------------------------------------------------------------------------------------------
    public function item(Array $product) : Bool
    {
        if( ! isset($product['quantity']) )
        {
            $product['quantity'] = 1;
        }

        array_push(Properties::$items, $product);

        $this->driver->insert($this->key, Properties::$items);

        Properties::$items = $this->driver->select($this->key);

        return true;
    }
}
