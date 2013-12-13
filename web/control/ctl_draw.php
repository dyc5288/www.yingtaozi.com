<?php

!defined('IN_INIT') && exit('Access Denied');

require_once 'ctl_parent.php';

/**
 * 图集
 *
 * @author duanyunchao
 * @version $Id$
 */
class ctl_draw extends ctl_parent
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
        $return = array('nav' => 'draw', 'count' => 0, 'data'  => array());
        $start   = get_params('s', 0, 'request', 0);
        $keyword = get_params('keyword', 1, 'request', '');
        $limit   = 12;
        $url     = '?c=draw';
        $order   = "post_date desc,ID desc";
        $cond    = array();
        $cond['post_status'] = pub_mod_posts::STATUS_PUBLISH;
        $cond['post_type']   = pub_mod_posts::TYPE_DRAW;

        if (!empty($keyword))
        {
            $cond['keyword'] = $keyword;
            $url .= "keyword={$keyword}";
        }

        $return['count'] = pub_mod_posts::get_count($cond);
        $start           = ($start >= $return['count']) ? floor($return['count'] / $limit) * $limit : $start;

        if (!empty($return['count']))
        {
            $return['data'] = pub_mod_posts::get_list($cond, $order, $start, $limit, pub_mod_posts::COLUMN_DRAW_INDEX);
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
        lib_template::assign('return', $return);
        lib_template::display('draw_index.tpl');
    }
    
    /**
     * 查看页面
     * 
     * @return void
     */
    public function detail()
    {        
        $return = array('nav' => 'draw');
        $id                = get_params('id', 0, 'request');
        $return['draw'] = pub_mod_posts::get_one_post($id);        
        
        if (!empty($return['draw']))
        {
            $return['post_content'] = !empty($return['draw']) ? unserialize($return['draw']['post_content']) : '';
        }        
        
        $this->_hot_image($return);
        lib_template::assign('return', $return);
        lib_template::display('draw_detail.tpl');
    }

}

?>
