<?php

/**
 * 视频
 * 
 * @author duanyunchao
 * @version $Id$
 */
class pub_mod_video
{
    const TYPE_YOUKU        = 1;
    const TYPE_YOUKU_DETAIL = 2;

    /**
     * 添加文章
     * 
     * @return void
     */
    public static function add_video($param_array)
    {
        if (empty($param_array))
        {
            return false;
        }

        $param_array['post_type'] = pub_mod_posts::TYPE_VIDEO;
        return pub_mod_posts::add_post($param_array);
    }

    /**
     * 修改视频
     *
     * @param int $ID
     * @param array $param_array 
     * @return void
     */
    public static function update_video($ID, $param_array)
    {
        if (empty($ID) || empty($param_array))
        {
            return false;
        }

        return pub_mod_posts::update_post($ID, $param_array);
    }

    /**
     * 抓取数据
     *
     * @param string $url 
     * @return array
     */
    public static function grab_data($url)
    {
        if (empty($url))
        {
            return false;
        }

        $data   = hlp_common::remote_request($url);
        $return = array();
        $p    = xml_parser_create();
        $vals = array();
        $index = array();
        xml_parse_into_struct($p, $data, $vals, $index);

        if (isset($index['A']))
        {
            foreach ($index['A'] as $id)
            {
                $data = array();
                $attributes    = $vals[$id]['attributes'];
                $key           = substr($attributes['HREF'], strpos($attributes['HREF'], 'id_') + 3, -5);
                $data['url']   = "http://player.youku.com/embed/{$key}";
                $data['id']    = hlp_common::findNum($attributes['TITLE']);
                $data['title'] = $attributes['TITLE'];
                $return[]      = $data;
            }
        }

        return $return;
    }

    /**
     * 抓取数据
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

        $data    = hlp_common::remote_request($url);
        $matches = array();
        preg_match_all('/<div class=\"item\">([\s\S]*)<\\/div><!--[\.]item-->/iU', $data, $matches);
        $datas  = $matches[0];
        $return = array();

        if (empty($datas))
        {
            return false;
        }

        foreach ($datas as $row)
        {
            $matches = array();
            preg_match_all('/<div class=\"desc\">([\s\S]*)<\\/div>/iU', $row, $matches);
            $detail  = $matches[1][0];
            $matches = array();
            preg_match_all('/alt=\"(.*)\" src/iU', $row, $matches);
            $title = $matches[1][0];
            $arr   = explode(' ', $title);
            $index = $arr[0];

            if (!is_numeric($index))
            {
                throw new Exception('数据异常');
            }

            $data = array('detail'        => $detail, 'title'         => $title, 'index'         => $index);
            $return[$index] = $data;
        }

        return $return;
    }

}
