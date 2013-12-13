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
function smarty_modifier_draw($type, $key, $len = 9)
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

                if ($count >= $len)
                {
                    break;
                }
            }

            return $res;
            break;
        case '3':            
            if (empty($key))
            {
                return 0;
            }

            $post_content = unserialize($key);

            if (empty($post_content))
            {
                return 0;
            }
            
            return count($post_content);
            break;
        case '4':
            if (empty($key))
            {
                return '';
            }

            $post_content = unserialize($key);

            if (empty($post_content))
            {
                return '';
            }
            
            $column = in_array($len, array('url', 'url_l')) ? $len : 'url';
            return $post_content[0][$column];
            break;
    }

    return '';
}

/* vim: set expandtab: */

