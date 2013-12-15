<?php

!defined('IN_INIT') && exit('Access Denied');

require_once 'ctl_parent.php';

/**
 * 淘周边
 *
 * @author duanyunchao
 * @version $Id$
 */
class ctl_fish extends ctl_parent
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
        $return = array('nav'   => 'fish', 'count' => 0, 'data'  => array());
        $start   = get_params('s', 0, 'request', 0);
        $keyword = get_params('keyword', 1, 'request', '');
        $limit   = 20;
        $url     = '?c=fish';
        $order   = "post_date desc,ID desc";
        $cond    = array();
        $cond['post_status'] = pub_mod_posts::STATUS_PUBLISH;
        $cond['post_type']   = pub_mod_posts::TYPE_PRODUCT;

        if (!empty($keyword))
        {
            $cond['keyword'] = $keyword;
            $url .= "&keyword={$keyword}";
        }

        $return['count'] = pub_mod_posts::get_count($cond);
        $start           = ($start >= $return['count']) ? floor($return['count'] / $limit) * $limit : $start;

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

        $return['keyword'] = $keyword;
        $return['lsize'] = floor(min($return['count'], $limit) / 4);
        lib_template::assign('return', $return);
        lib_template::display('fish_index.tpl');
    }

    /**
     * 详情页
     * 
     * @return void
     */
    public function detail()
    {
        $return = array('nav'              => 'fish');
        $id                = get_params('id', 0, 'request');
        $return['product'] = pub_mod_posts::get_one_post($id);
        lib_template::assign('return', $return);
        lib_template::display('fish_detail.tpl');
    }

}

?>
