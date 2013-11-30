<?php

/**
 * 情报站
 * 
 * @author duanyunchao
 * @version $Id$
 */
class pub_mod_posts
{

    /**
     * 添加
     * 
     * @param array $params
     * @return void
     */
    public static function add_post($params)
    {
        if (empty($params))
        {
            return false;
        }

        $column = array('post_author', 'post_content', 'post_title', 'post_status', 'post_type', 'comment_count', 'post_name');
        $param_array = array();

        foreach ($column as $column_name)
        {
            if (isset($params[$column_name]))
            {
                $param_array[$column_name] = $params[$column_name];
            }
        }

        if (empty($param_array))
        {
            return false;
        }

        return dbc_posts::insert($param_array);
    }

    /**
     * 修改
     * 
     * @param int $ID
     * @param array $params
     * @return void
     */
    public static function update_post($ID, $params)
    {
        if (empty($ID) || empty($params))
        {
            return false;
        }

        $column = array('post_author', 'post_content', 'post_title', 'post_status', 'post_type', 'comment_count', 'post_name');
        $param_array = array();

        foreach ($column as $column_name)
        {
            if (isset($params[$column_name]))
            {
                $param_array[$column_name] = $params[$column_name];
            }
        }

        if (empty($param_array))
        {
            return false;
        }

        return dbc_posts::update($ID, $param_array);
    }

    /**
     * 获取
     * 
     * @return void
     */
    public static function get_one_post($ID)
    {
        if (empty($ID))
        {
            return false;
        }

        return dbc_posts::get_one($ID);
    }

    /**
     * 获取列表
     * 
     * @param array $cond
     * @param string $order
     * @param int $start
     * @param int $limit
     * @return void
     */
    public static function get_list($cond, $order = false, $start = 0, $limit = 10)
    {
        $start = intval($start);
        $limit = intval($limit);
        return dbc_posts::get_list($cond, $order, $start, $limit);
    }

    /**
     * 获取个数
     * 
     * @param array $cond
     * @return void
     */
    public static function get_count($cond)
    {
        return dbc_posts::get_count($cond);
    }

}
