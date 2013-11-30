<?php

/**
 * 文章
 * 
 * @author duanyunchao
 * @version $Id$
 */
class dbc_posts
{
    /**
     * 表名
     * 
     * @var string
     */
    const TABLE_NAME = 'ytz_posts';

    /**
     * 单条
     *
     * @param int $ID
     * @return boolean 
     */
    public static function get_one($ID)
    {
        if (empty($ID))
        {
            return false;
        }

        $table = hlp_common::get_split_table(null, self::TABLE_NAME);
        $sql   = "SELECT * FROM {$table['name']} WHERE ID = '{$ID}' ";
        return lib_database::get_one($sql, $table['index']);
    }

    /**
     * 插入
     *
     * @param array $key_values
     * @return int 
     */
    public static function insert($key_values = array())
    {
        if (empty($key_values))
        {
            return false;
        }

        $key_values['post_modified'] = date('Y-m-d H:i:s');
        $table                       = hlp_common::get_split_table(null, self::TABLE_NAME);
        return lib_database::duplicate($key_values, $table['name'], $table['index']);
    }

    /**
     * 修改
     *
     * @param int $ID
     * @param array $key_values 
     * @return boolean
     */
    public static function update($ID, $key_values = array())
    {
        if (empty($ID) || empty($key_values))
        {
            return false;
        }

        $key_values['post_modified'] = date('Y-m-d H:i:s');
        $table                       = hlp_common::get_split_table(null, self::TABLE_NAME);
        $where                       = " ID = '{$ID}' ";
        return lib_database::update($key_values, $where, $table['name'], $table['index']);
    }

    /**
     * 列表
     *
     * @param array $cond
     * @param string $order
     * @param int $start
     * @param int $limit
     * @return array 
     */
    public static function get_list($cond = array(), $order = false, $start = 0, $limit = 10, $column = false)
    {
        $where = self::_get_where($cond);
        $table = hlp_common::get_split_table(null, self::TABLE_NAME);
        $order = !empty($order) ? "ORDER BY {$order}" : "";
        $column = !empty($column) ? $column : "*";

        $sql = "SELECT {$column}  FROM {$table['name']} {$where} {$order} LIMIT {$start}, {$limit}";
        return lib_database::get_all($sql, $table['index']);
    }

    /**
     * 获取数据
     *
     * @param array $cond
     * @return array
     */
    public static function get_count($cond)
    {
        $where = self::_get_where($cond);
        $table = hlp_common::get_split_table(null, self::TABLE_NAME);

        $sql    = "SELECT COUNT(*) as count FROM {$table['name']} {$where}";
        $result = lib_database::get_one($sql, $table['index']);

        if ($result)
        {
            return $result['count'];
        }

        return false;
    }

    /**
     * 获取条件
     * 
     * @param array $cond
     * @return string 
     */
    private static function _get_where($cond = array())
    {
        $where = "WHERE 1 = 1 ";

        if (isset($cond['ID']))
        {
            $where .= "AND ID = '{$cond['ID']}' ";
        }

        if (isset($cond['post_author']))
        {
            $where .= "AND post_author <= '{$cond['post_author']}' ";
        }

        if (isset($cond['post_name']))
        {
            $where .= "AND post_name like '%{$cond['post_name']}%' ";
        }

        if (isset($cond['post_type']))
        {
            $where .= "AND post_type = '{$cond['post_type']}' ";
        }

        if (isset($cond['post_status']))
        {
            $where .= "AND post_status = '{$cond['post_status']}' ";
        }

        if (isset($cond['gt_post_date']))
        {
            $where .= "AND post_date >= '{$cond['gt_post_date']}' ";
        }

        if (isset($cond['lt_post_date']))
        {
            $where .= "AND post_date <= '{$cond['gt_post_date']}' ";
        }

        return $where;
    }

}
