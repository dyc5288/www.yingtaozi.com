<?php

!defined('IN_INIT') && exit('Access Denied');

/**
 * 控制器父类
 *
 * @author duanyunchao
 * @version $Id$
 */
class ctl_parent
{
    /**
     * 初始化
     * 
     * @return void
     */
    protected function __construct()
    {
        
    }

    /**
     * 热点资讯
     * 
     * @return void
     */
    protected function _hot(&$return)
    {
        $order = 'comment_count desc';
        $cond = array();
        $cond['post_status'] = pub_mod_posts::STATUS_PUBLISH;
        $cond['post_type']   = pub_mod_posts::TYPE_POST;
        $return['hot']       = pub_mod_posts::get_list($cond, $order, 0, 5, pub_mod_posts::COLUMN_INFO_HOT);
    }

}

?>
