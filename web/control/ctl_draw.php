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
        $return = array('nav' => 'draw');
        lib_template::assign('return', $return);
        lib_template::display('info_index.tpl');
    }

}

?>
