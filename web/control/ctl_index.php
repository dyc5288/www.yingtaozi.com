<?php

/**
 * 主页
 * 
 * @author duanyunchao
 * @version $Id$
 */
!defined('IN_INIT') && exit('Access Denied');

require_once 'ctl_parent.php';

class ctl_index extends ctl_parent
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
        $return = array('nav' => 'index');
        $this->_hot($return);
        $this->_video($return);
        $this->_fish($return);
        $this->_draw($return);
        lib_template::assign('return', $return);
        lib_template::display('index.tpl');
    }

    /**
     * 搜索
     * 
     * @return void
     */
    public function search()
    {
        
    }

}
