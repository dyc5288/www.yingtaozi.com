<?php

/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty url modifier plugin
 *
 * Type:     modifier<br>
 * Name:     url<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string or inserting $etc into the middle.
 * @link http://smarty.php.net/manual/en/language.modifier.url.php
 *          url (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @param boolean
 * @return string
 */
function smarty_modifier_url($data, $type = false)
{
    $url = '';
    
    switch ($type)
    {
        case 'info_detail':
            $url = URL . "/?c=info&a=detail&id={$data}";
            break;
        case 'info':
            $url = URL . "/?c=info";
            break;
        default:
            $url = URL;
            break;
    }
    
    return $url;
}

/* vim: set expandtab: */

