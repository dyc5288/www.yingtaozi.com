<?php

/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage plugins
 */
/**
 * Smarty draw modifier plugin
 *
 * Type:     modifier<br>
 * Name:     draw<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string or inserting $etc into the middle.
 * @link http://smarty.php.net/manual/en/language.modifier.draw.php
 *          draw (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @param boolean
 * @return string
 */
function smarty_modifier_draw($type, $key)
{
    switch ($type)
    {
        case '1':
            if ($key % 4 == 0)
            {
                return " jFirst";
            }
            else if ($key % 4 == 3)
            {
                return " jLast";
            }
            break;
        case '2':
            if (empty($key))
            {
                return '';
            }

            $post_content = unserialize($key);

            if (empty($post_content))
            {
                return '';
            }

            $res   = '';
            $count = 0;

            foreach ($post_content as $row)
            {
                $count++;
                $res .= '<img src="' . $row['url'] . '" alt="图集">';

                if ($count >= 9)
                {
                    break;
                }
            }

            return $res;
            break;
    }

    return '';
}

/* vim: set expandtab: */

