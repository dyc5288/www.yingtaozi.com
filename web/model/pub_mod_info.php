<?php

/**
 * 情报站
 * 
 * @author duanyunchao
 * @version $Id$
 */
class pub_mod_info
{
    const TYPE_ELONGDAO = 1;

    /**
     * 添加文章
     * 
     * @return void
     */
    public static function add_info()
    {
        $param_array = array();
        return pub_mod_posts::add_post($param_array);
    }

    /**
     * 抓取列表
     *
     * @param string $url 
     * @return array
     */
    public static function grab_list($url)
    {
        if (empty($url))
        {
            return false;
        }

        $result = array('code'  => 404);
        $return = array();

        while ($result['code'] != 200)
        {
            try
            {
                $result = curl($url);
            }
            catch (Exception $e)
            {
                echo $e->getMessage() . PHP_EOL;
            }
        }

        $data    = mb_convert_encoding($result['data'], 'utf-8', 'GBK');
        $matches = array();
        $rmatches = array();
        preg_match_all('/<div class=\"newsleft(.*)\">(.*)<\\/div>/iU', $data, $matches);
        preg_match_all('/<div class=\"newsdata s8(.*)\">(.*)<\\/div>/iU', $data, $rmatches);
        $left_data  = isset($matches[0]) ? $matches[0] : null;
        $right_data = isset($rmatches[0]) ? $rmatches[0] : null;

        if (!empty($left_data))
        {
            foreach ($left_data as $key => $row)
            {
                $data = array();
                $right_row     = isset($right_data[$key]) ? $right_data[$key] : false;
                $right_matches = array();
                preg_match('/[[:alnum:]]{4}-[[:alnum:]]{2}-[[:alnum:]]{2} [[:alnum:]]{2}:[[:alnum:]]{2}/', $right_row, $right_matches);
                $post_time         = isset($right_matches[0]) ? $right_matches[0] : '';
                $data['post_time'] = $post_time;

                $right_matches = array();
                preg_match_all('/[\x{4e00}-\x{9fa5}]+/u', $right_row, $right_matches);
                $from         = isset($right_matches[0][1]) ? $right_matches[0][1] : '';
                $data['from'] = $from;

                $p    = xml_parser_create();
                $vals = array();
                $index = array();
                xml_parse_into_struct($p, $row, $vals, $index);
                xml_parser_free($p);
                $attributes        = $vals[$index['IMG'][0]]['attributes'];
                $image_url         = isset($attributes['EMDSRC']) ? $attributes['EMDSRC'] : '';
                $data['image_url'] = $image_url;

                $post_title         = isset($attributes['ALT']) ? $attributes['ALT'] : '';
                $data['post_title'] = $post_title;

                $dattributes        = $vals[$index['A'][0]]['attributes'];
                $detail_url         = isset($dattributes['HREF']) ? "http://news.emland.net/" . $dattributes['HREF'] : '';
                $data['detail_url'] = $detail_url;
                $detail_data        = self::grab_detail($detail_url);
                $data               = array_merge($data, $detail_data);
                $return[]           = $data;
            }
        }

        return $return;
    }

    /**
     * 抓取详情页
     *
     * @param string $url 
     * @return array
     */
    public static function grab_detail($url)
    {
        if (empty($url))
        {
            return false;
        }

        $result = array('code'  => 404);
        $return = array();

        while ($result['code'] != 200)
        {
            try
            {
                $result = curl($url);
            }
            catch (Exception $e)
            {
                echo $e->getMessage() . PHP_EOL;
            }
        }

        $data                   = mb_convert_encoding($result['data'], 'utf-8', 'GBK');
        $return['post_content'] = hlp_format::get_div('class="he15 content line22"', $data);
        return $return;
    }

}
