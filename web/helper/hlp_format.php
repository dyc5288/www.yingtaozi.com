<?php

!defined('IN_INIT') && exit('Access Denied');

/**
 * 格式化处理 
 *
 * @author duanyunchao
 * @version $Id$
 */
class hlp_format
{
    /**
     * 文章处理
     *
     * @param string $pee
     * @param boolean $br
     * @return string 
     */
    public static function wpautop($pee, $br = true)
    {
        $pre_tags = array();

        if (trim($pee) === '')
        {
            return '';
        }

        $pee = $pee . "\n"; // just to make things a little easier, pad the end

        if (strpos($pee, '<pre') !== false)
        {
            $pee_parts = explode('</pre>', $pee);
            $last_pee  = array_pop($pee_parts);
            $pee       = '';
            $i         = 0;

            foreach ($pee_parts as $pee_part)
            {
                $start = strpos($pee_part, '<pre');

                if ($start === false)
                {
                    $pee .= $pee_part;
                    continue;
                }

                $name            = "<pre wp-pre-tag-$i></pre>";
                $pre_tags[$name] = substr($pee_part, $start) . '</pre>';

                $pee .= substr($pee_part, 0, $start) . $name;
                $i++;
            }

            $pee .= $last_pee;
        }

        $pee       = preg_replace('|<br />\s*<br />|', "\n\n", $pee);
        // Space things out a little
        $allblocks = '(?:table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|option|form|map|area|blockquote|address|math|style|p|h[1-6]|hr|fieldset|noscript|legend|section|article|aside|hgroup|header|footer|nav|figure|figcaption|details|menu|summary)';
        $pee       = preg_replace('!(<' . $allblocks . '[^>]*>)!', "\n$1", $pee);
        $pee       = preg_replace('!(</' . $allblocks . '>)!', "$1\n\n", $pee);
        $pee       = str_replace(array("\r\n", "\r"), "\n", $pee); // cross-platform newlines

        if (strpos($pee, '<object') !== false)
        {
            $pee = preg_replace('|\s*<param([^>]*)>\s*|', "<param$1>", $pee); // no pee inside object/embed
            $pee = preg_replace('|\s*</embed>\s*|', '</embed>', $pee);
        }

        $pee  = preg_replace("/\n\n+/", "\n\n", $pee); // take care of duplicates
        // make paragraphs, including one at the end
        $pees = preg_split('/\n\s*\n/', $pee, -1, PREG_SPLIT_NO_EMPTY);
        $pee  = '';

        foreach ($pees as $tinkle)
        {
            $pee .= '<p>' . trim($tinkle, "\n") . "</p>\n";
        }

        $pee = preg_replace('|<p>\s*</p>|', '', $pee); // under certain strange conditions it could create a P of entirely whitespace
        $pee = preg_replace('!<p>([^<]+)</(div|address|form)>!', "<p>$1</p></$2>", $pee);
        $pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee); // don't pee all over a tag
        $pee = preg_replace("|<p>(<li.+?)</p>|", "$1", $pee); // problem with nested lists
        $pee = preg_replace('|<p><blockquote([^>]*)>|i', "<blockquote$1><p>", $pee);
        $pee = str_replace('</blockquote></p>', '</p></blockquote>', $pee);
        $pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)!', "$1", $pee);
        $pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee);

        if ($br)
        {
            $pee = preg_replace_callback('/<(script|style).*?<\/\\1>/s', '_autop_newline_preservation_helper', $pee);
            $pee = preg_replace('|(?<!<br />)\s*\n|', "<br />\n", $pee); // optionally make line breaks
            $pee = str_replace('<WPPreserveNewline />', "\n", $pee);
        }

        $pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*<br />!', "$1", $pee);
        $pee = preg_replace('!<br />(\s*</?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol)[^>]*>)!', '$1', $pee);
        $pee = preg_replace("|\n</p>$|", '</p>', $pee);

        if (!empty($pre_tags))
        {
            $pee = str_replace(array_keys($pre_tags), array_values($pre_tags), $pee);
        }

        return $pee;
    }

    /**
     * 时间格式化
     *
     * @param string $string
     * @param string $format
     * @return type 
     */
    public static function get_gmt_from_date($string, $format = 'Y-m-d H:i:s')
    {
        $tz      = 'Asia/Macau';
        $matches = array();

        if ($tz)
        {
            $datetime = date_create($string, new DateTimeZone($tz));

            if (!$datetime)
            {
                return gmdate($format, 0);
            }

            $datetime->setTimezone(new DateTimeZone('UTC'));
            $string_gmt = $datetime->format($format);
        }
        else
        {
            if (!preg_match('#([0-9]{1,4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})#', $string, $matches))
            {
                return gmdate($format, 0);
            }

            $string_time = gmmktime($matches[4], $matches[5], $matches[6], $matches[2], $matches[3], $matches[1]);
            $string_gmt  = gmdate($format, $string_time - 0 * HOUR_IN_SECONDS);
        }

        return $string_gmt;
    }

    /**
     * 获取div的内容
     *
     * @param string $div_id
     * @param string $data
     * @return boolean 
     */
    public static function get_div($div_id, $data)
    {
        $start_matches = array();
        $end_matches = array();
        preg_match_all('/<div(.*)>/iU', $data, $start_matches, PREG_OFFSET_CAPTURE); //获取所有div后缀         
        preg_match_all('/<\/div>/i', $data, $end_matches, PREG_OFFSET_CAPTURE); //获取所有div后缀         
        $hit = strpos($data, $div_id);

        if ($hit === false)
        {
            return false; //未命中 
        }

        $start_divs = array();
        $end_divs = array();
        $divs = array();
        $start_obj = false;

        foreach ($start_matches[0] as $row)
        {
            $start_divs[$row[1]] = 1;

            if (strpos($row[0], $div_id) !== false)
            {
                $start_obj = $row;
            }

            if ($row[1] > $hit)
            {
                $divs[] = $row[1];
            }
        }

        foreach ($end_matches[0] as $row)
        {
            $end_divs[$row[1]] = $row;

            if ($row[1] > $hit)
            {
                $divs[] = $row[1];
            }
        }

        $flag    = 1;
        $end_obj = false;
        sort($divs);

        foreach ($divs as $index)
        {
            if (isset($start_divs[$index]))
            {
                $flag++;
            }

            if (isset($end_divs[$index]))
            {
                $flag--;
            }

            if ($flag == 0)
            {
                $end_obj = $end_divs[$index];
                break;
            }
        }

        if (empty($end_obj) || empty($start_obj))
        {
            return false;
        }

        $start  = $start_obj[1] + strlen($start_obj[0]);
        $length = $end_obj[1] - $start;
        return substr($data, $start, $length);
    }

}
