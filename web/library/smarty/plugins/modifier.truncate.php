<?php

/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage plugins
 */
/**
 * Smarty truncate modifier plugin
 *
 * Type:     modifier<br>
 * Name:     truncate<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string or inserting $etc into the middle.
 * @link http://smarty.php.net/manual/en/language.modifier.truncate.php
 *          truncate (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @param boolean
 * @return string
 */
function smarty_modifier_truncate($string, $length = 80, $etc = '...')
{
    if ($length == 0)
    {
        return '';
    }
    
    $tag = array('img', 'p', 'div', 'a');
    
    foreach($tag as $t)
    {
        $string = preg_replace("/<{$t}.+>/i", '', $string);    
    }

    if (utf8_strlen($string) <= $length)
    {
        return $string;
    }

    $length = $length - utf8_strlen($etc);
    $string = utf8_strcut($string, 0, $length);
    return $string . $etc;
}

/* vim: set expandtab: */

