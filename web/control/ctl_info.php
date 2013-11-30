<?php

!defined('IN_INIT') && exit('Access Denied');

require_once 'ctl_parent.php';

/**
 * 情报站
 *
 * @author duanyunchao
 * @version $Id$
 */
class ctl_info extends ctl_parent
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
        $return = array('nav'   => 'info', 'count' => 0, 'data'  => array());
        $start = get_params('s', 0, 'request', 0);
        $limit = 10;
        $url   = '?c=info';
        $order = "post_date desc";
        $cond  = array();
        $cond['post_status'] = pub_mod_posts::STATUS_PUBLISH;
        $cond['post_type']   = pub_mod_posts::TYPE_POST;
        $return['count']     = pub_mod_posts::get_count($cond);

        if (!empty($return['count']))
        {
            $return['data'] = pub_mod_posts::get_list($cond, $order, $start, $limit, pub_mod_posts::COLUMN_INFO_INDEX);
        }

        /* 分页 */
        $config = array();
        $config['page_name']    = 's';
        $config['count_number'] = $return['count'];
        $config['url']          = $url;
        $config['per_count']    = $limit;
        $config['start']        = $start;
        $return['page']         = pagination($config);

        lib_template::assign('return', $return);
        lib_template::display('info_index.tpl');
    }

    /**
     * 情报详情
     * 
     * @return void
     */
    public function detail()
    {
        $return = array('nav'           => 'info');
        $id             = get_params('id', 0, 'request');
        $return['info'] = pub_mod_posts::get_one_post($id);
        lib_template::assign('return', $return);
        lib_template::display('info_detail.tpl');
    }

}

?>
