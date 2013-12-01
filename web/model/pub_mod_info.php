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
    public static function add_info($param_array)
    {
        if (empty($param_array))
        {
            return false;
        }

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

        $result = hlp_common::remote_request($url);
        $return = array();

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
                $post_date         = isset($right_matches[0]) ? $right_matches[0] : '';
                $data['post_date'] = $post_date;

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

        $result = hlp_common::remote_request($url);
        $return = array();

        $data                   = mb_convert_encoding($result['data'], 'utf-8', 'GBK');
        $post_content           = hlp_format::get_div('class="he15 content line22"', $data);
        $post_content           = preg_replace('/on(.*)=\"(.*)\"/iU', '', $post_content);
        $post_content           = preg_replace('/on(.*)=\'(.*)\'/iU', '', $post_content);
        $return['post_content'] = $post_content;
        return $return;
    }

    /**
     * 替换图片保存到本地
     * 
     * @param string $url 
     * @return void
     */
    public static function replace_image($content)
    {
        if (empty($content))
        {
            return false;
        }

        $matches = array();
        preg_match_all('/<img.*src=[\"\'](.*)[\"\'].*>/iU', $content, $matches);
        $images = $matches[1];

        if (!empty($images))
        {
            $images = array_unique($images);

            foreach ($images as $image_url)
            {
                $image_url = trim($image_url);

                if (strpos(trim($image_url), ' ') !== false)
                {
                    continue;
                }

                $new_url = self::save_image($image_url);
                $content = str_replace($image_url, $new_url, $content);
            }
        }

        return $content;
    }

    /**
     * 保存图片
     * 
     * @param string $url 
     * @return void
     */
    public static function save_image($url)
    {
        if (empty($url))
        {
            return false;
        }

        $result   = hlp_common::remote_request($url);
        $rand     = mt_rand(1000, 9999);
        $dir      = date('Y') . "/" . date('m') . "/" . date('d') . "/{$rand}/";
        $name     = time() . '.jpg';
        $filename = "/images/upload/" . $dir . $name;
        $file     = PATH_STATIC . $filename;
        put_file($file, $result['data']);
        return URL . '/static' . $filename;
    }

}
