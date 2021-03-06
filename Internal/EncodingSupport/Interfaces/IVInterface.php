<?php namespace ZN\EncodingSupport;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

interface IVInterface
{
    //--------------------------------------------------------------------------------------------------------
    // Convert
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    // @param string $fromEncoding
    // @param string $toEncoding
    //
    //--------------------------------------------------------------------------------------------------------
    public function convert(String $string, String $fromEncoding, String $toEncoding) : String;

    //--------------------------------------------------------------------------------------------------------
    // Encodings
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function encodings() : Array;


    //--------------------------------------------------------------------------------------------------------
    // Get Encoding
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $type: input, output, internal
    //
    //--------------------------------------------------------------------------------------------------------
    public function getEncoding(String $type = 'input') : String;

    //--------------------------------------------------------------------------------------------------------
    // Set Encoding
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $type
    // @param string $charset
    //
    //--------------------------------------------------------------------------------------------------------
    public function setEncoding(String $type = 'input', String $charset = 'utf-8') : Bool;

    //--------------------------------------------------------------------------------------------------------
    // Mimes Decode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $encodedHeaders
    // @param int    $mode
    // @param string $charset
    //
    //--------------------------------------------------------------------------------------------------------
    public function mimesDecode(String $encodedHeader, $mode = 0, String $charset = NULL) : Array;

    //--------------------------------------------------------------------------------------------------------
    // Mime Decode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $encodedHeader
    // @param int    $mode
    // @param string $charset
    //
    //--------------------------------------------------------------------------------------------------------
    public function mimeDecode(String $encodedHeader, $mode = 0, String $charset = NULL) : String;

    //--------------------------------------------------------------------------------------------------------
    // Mime Encode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $fieldName
    // @param string $fieldValue
    // @param array  $preferences
    //
    //--------------------------------------------------------------------------------------------------------
    public function mimeEncode(String $fieldName, String $fieldValue, Array $preferences = NULL) : String;
}
