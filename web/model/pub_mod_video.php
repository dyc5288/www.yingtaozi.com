<?php

/**
 * 视频
 * 
 * @author duanyunchao
 * @version $Id$
 */
class pub_mod_video
{
    const TYPE_YOUKU = 1;

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
                $key           = substr($attributes['HREF'], strpos($attributes['HREF'], 'id_')+3, -5);
                $data['url']   = "http://player.youku.com/embed/{$key}";
                $arr           = explode(' ', $attributes['TITLE']);
                $data['id']    = intval($arr[0]);
                $data['title'] = $attributes['TITLE'];
                $return[]      = $data;
            }
        }

        return $return;
    }

}
