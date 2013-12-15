<?php

/**
 * 检查
 * 
 * @author duanyunchao
 * @version $Id$
 */
/** 初始化 */
require '../init.php';

/* 调试模式 */
$flag = hlp_common::get_cmd_flag();

if (!empty($flag['help']))
{
    echo "php check.php -draw 1 检查图集" . PHP_EOL;
}

if (!empty($flag['draw']))
{
    $start_time = time();
    $total      = 0;
    echo "start " . date('Y-m-d H:i:s') . PHP_EOL;
    $cond    = array();
    $cond['post_status'] = pub_mod_posts::STATUS_PUBLISH;
    $cond['post_type']   = pub_mod_posts::TYPE_DRAW;
    $count      = pub_mod_posts::get_count($cond);

    /* 分页取数据 */
    $limit = 100;
    $start = 0;

    while ($start < $count)
    {
        $result = pub_mod_posts::get_list($cond, false, $start, $limit, pub_mod_posts::COLUMN_DRAW_INDEX);

        foreach ($result as $row)
        {
            $post_content = $row['post_content'];
            $ID = $row['ID'];
            
            if (!empty($post_content))
            {
                $post_content = unserialize($post_content);
                $is_update = false;
                
                foreach($post_content as $key => $content)
                {
                    if (empty($content['url']) || empty($content['url_l']))
                    {
                        unset($post_content[$key]);
                        $is_update = true;
                    }
                }
                
                if ($is_update)
                {
                    $param_array = array();
                    $post_content = serialize($post_content);
                    $param_array['post_content'] = $post_content;
                    $res = pub_mod_image::update_image($ID, $param_array);
                    
                    if ($res)
                    {
                        $total++;
                    }
                }
            }
            
        }

        unset($result);
        $start += $limit;
    }

    $user_time = time() - $start_time;
    echo "finish all " . date('Y-m-d H:i:s') . "count:{$count} total:{$total}, use {$user_time}s." . PHP_EOL;
}

echo "success" . PHP_EOL;