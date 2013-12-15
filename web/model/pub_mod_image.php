<?php

/**
 * 图集
 * 
 * @author duanyunchao
 * @version $Id$
 */
class pub_mod_image
{
    /**
     * 添加图集
     * 
     * @param array $param_array 
     * @return void
     */
    public static function add_image($param_array)
    {
        if (empty($param_array))
        {
            return false;
        }

        $param_array['post_type'] = pub_mod_posts::TYPE_DRAW;
        return pub_mod_posts::add_post($param_array);
    }

    /**
     * 修改图集
     * 
     * @param int $ID
     * @param array $param_array 
     * @return void
     */
    public static function update_image($ID, $param_array)
    {
        if (empty($ID) || empty($param_array))
        {
            return false;
        }

        return pub_mod_posts::update_post($ID, $param_array);
    }

}
