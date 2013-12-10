<?php

/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage plugins
 */
/**
 * Smarty remainder modifier plugin
 *
 * Type:     modifier<br>
 * Name:     remainder<br>
 * Purpose:  designate remainder value for empty variables
 * @link http://smarty.php.net/manual/en/language.modifier.remainder.php
 *          remainder (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param string
 * @return string
 */
function smarty_modifier_remainder($key, $mod)
{
    if ($key > 3 * $mod)
    {
        return '';
    }

    if ($key % $mod == $mod - 1)
    {
        if ($key > 2 * $mod)
        {
            return '</div>
                <div class="jCol jLast">';
        }
        else
        {
            return '</div>
                <div class="jCol">';
        }
    }

    return '';
}

/* vim: set expandtab: */

