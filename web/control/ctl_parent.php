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
     * @param array $return
     * @return void
     */
    protected function _hot(&$return)
    {
        $order = 'comment_count desc, ID desc';
        $cond  = array();
        $cond['post_status'] = pub_mod_posts::STATUS_PUBLISH;
        $cond['post_type']   = pub_mod_posts::TYPE_POST;
        $return['hot']       = pub_mod_posts::get_list($cond, $order, 0, 5, pub_mod_posts::COLUMN_INFO_HOT);
    }

    /**
     * 精彩推荐视频
     * 
     * @param array $return
     * @return void
     */
    protected function _hot_video(&$return)
    {
        $order = 'comment_count desc, ID desc';
        $cond  = array();
        $cond['post_status'] = pub_mod_posts::STATUS_PUBLISH;
        $cond['post_type']   = pub_mod_posts::TYPE_VIDEO;
        $return['hot']       = pub_mod_posts::get_list($cond, $order, 0, 5, pub_mod_posts::COLUMN_VIDEO_HOT);
    }

    /**
     * 首页视频
     * 
     * @param array $return
     * @return void
     */
    protected function _video(&$return)
    {
        $order = 'comment_count desc, ID desc';
        $cond  = array();
        $cond['post_status'] = pub_mod_posts::STATUS_PUBLISH;
        $cond['post_type']   = pub_mod_posts::TYPE_VIDEO;
        $return['hot_video'] = pub_mod_posts::get_list($cond, $order, 0, 1, pub_mod_posts::COLUMN_VIDEO_FHOT);

        if (!empty($return['hot_video'][0]['post_content']))
        {
            $post_content = unserialize($return['hot_video'][0]['post_content']);

            foreach ($post_content as $row)
            {
                $return['hot_video'][0]['post_content'] = $row;
                break;
            }
        }
    }

    /**
     * 首页淘周边
     * 
     * @param array $return
     * @return void
     */
    protected function _fish(&$return)
    {
        $order = 'comment_count desc, ID desc';
        $cond  = array();
        $cond['post_status']   = pub_mod_posts::STATUS_PUBLISH;
        $cond['post_type']     = pub_mod_posts::TYPE_PRODUCT;
        $return['hot_product'] = pub_mod_posts::get_list($cond, $order, 0, 12, pub_mod_posts::COLUMN_PDT_HOT);
    }

    /**
     * 首页图集
     * 
     * @param array $return
     * @return void
     */
    protected function _draw(&$return)
    {
        $order = 'comment_count desc, ID desc';
        $cond  = array();
        $cond['post_status'] = pub_mod_posts::STATUS_PUBLISH;
        $cond['post_type']   = pub_mod_posts::TYPE_DRAW;
        $hot_draw            = pub_mod_posts::get_list($cond, $order, 0, 5, pub_mod_posts::COLUMN_DRAW_INDEX);
        $return['hot_draw']  = $hot_draw;
    }

    /**
     * 精彩推荐图集
     * 
     * @param array $return
     * @return void
     */
    protected function _hot_image(&$return)
    {
        $order = 'comment_count desc, ID desc';
        $cond  = array();
        $cond['post_status'] = pub_mod_posts::STATUS_PUBLISH;
        $cond['post_type']   = pub_mod_posts::TYPE_DRAW;
        $return['hot_image'] = pub_mod_posts::get_list($cond, $order, 0, 5, pub_mod_posts::COLUMN_DRAW_INDEX);
    }

}

?>
