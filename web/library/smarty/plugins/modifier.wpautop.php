<?php

/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty wpautop modifier plugin
 *
 * Type:     modifier<br>
 * Name:     wpautop<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string or inserting $etc into the middle.
 * @link http://smarty.php.net/manual/en/language.modifier.wpautop.php
 *          wpautop (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @param boolean
 * @return string
 */
function smarty_modifier_wpautop($pee, $br = true)
{
    return hlp_format::wpautop($pee, $br);
}

/* vim: set expandtab: */

