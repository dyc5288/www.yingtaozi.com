<?php

/**
 * 情报站
 * 
 * @author duanyunchao
 * @version $Id$
 */
class pub_mod_posts
{
    /* 文章状态 */
    const STATUS_PUBLISH    = 'publish';    // 发布状态
    const STATUS_INHERIT    = 'inherit';    // 继承
    const STATUS_AUTO_DRAFT = 'auto-draft'; // 自动草稿
    const STATUS_PRIVATE    = 'private';    // 私密
    const STATUS_FUTURE     = 'future';     // 将来发布
    const STATUS_PENDING    = 'pending';    // 发布状态
    const STATUS_TRASH      = 'trash';      // 发布状态

    /* 类型 */
    const TYPE_POST       = 'post';         // 文章
    const TYPE_ATTACHMENT = 'attachment';   // 附件
    const TYPE_REVISION   = 'revision';     // 修订版
    const TYPE_PAGE       = 'page';         // 单独页面    

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
