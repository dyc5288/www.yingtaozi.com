<?php

!defined('IN_INIT') && exit('Access Denied');

require_once 'ctl_parent.php';

/**
 * TV放送局
 *
 * @author duanyunchao
 * @version $Id$
 */
class ctl_video extends ctl_parent
{
    /**
     * 初始化
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 首页
     * 
     * @return void
     */
    public function index()
    {
        $return = array('nav'   => 'video', 'count' => 0, 'data'  => array());
        $start = get_params('s', 0, 'request', 0);
        $keyword = get_params('keyword', 1, 'request', '');
        $limit = 12;
        $url   = '?c=video';
        $order = "post_date desc,ID desc";
        $cond  = array();
        $cond['post_status'] = pub_mod_posts::STATUS_PUBLISH;
        $cond['post_type']   = pub_mod_posts::TYPE_VIDEO;
        
        if (!empty($keyword))
        {
            $cond['keyword'] = $keyword;
            $url .= "&keyword={$keyword}";
        }
        
        $return['count']     = pub_mod_posts::get_count($cond);
        $start               = ($start >= $return['count']) ? floor($return['count'] / $limit) * $limit : $start;

        if (!empty($return['count']))
        {
            $return['data'] = pub_mod_posts::get_list($cond, $order, $start, $limit, pub_mod_posts::COLUMN_VIDEO_INDEX);
        }

        /* 分页 */
        $config = array();
        $config['page_name']    = 's';
        $config['count_number'] = $return['count'];
        $config['url']          = $url;
        $config['per_count']    = $limit;
        $config['start']        = $start;
        $return['page']         = pagination($config);

        $this->_hot_video($return);
        $return['keyword'] = $keyword;
        lib_template::assign('return', $return);
        lib_template::display('video_index.tpl');
    }

    /**
     * 播放页面
     * 
     * @return void
     */
    public function detail()
    {
        $return = array('nav'            => 'video');
        $id              = get_params('id', 0, 'request');
        $return['video'] = pub_mod_posts::get_one_post($id);

        if (!empty($return['video']))
        {
            $return['post_content'] = !empty($return['video']) ? unserialize($return['video']['post_content']) : '';
        }        

        $this->_hot_video($return);
        lib_template::assign('return', $return);
        lib_template::display('video_detail.tpl');
    }

}

?>
