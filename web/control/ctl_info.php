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
        $return = array('nav' => 'info');
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
        $return = array('nav' => 'info');
        lib_template::assign('return', $return);
        lib_template::display('info_detail.tpl');
    }

}

?>
