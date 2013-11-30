<?php

/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty excerpt modifier plugin
 *
 * Type:     modifier<br>
 * Name:     excerpt<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string or inserting $etc into the middle.
 * @link http://smarty.php.net/manual/en/language.modifier.excerpt.php
 *          excerpt (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @param boolean
 * @return string
 */
function smarty_modifier_excerpt($excerpt, $column_name = 'image_url')
{
    if (empty($excerpt))
    {
        return '';
    }
    
    $excerpt_arr = @unserialize($excerpt);
    
    if (isset($excerpt_arr[$column_name]))
    {
        return $excerpt_arr[$column_name];
    }
    
    return '';
}

/* vim: set expandtab: */

