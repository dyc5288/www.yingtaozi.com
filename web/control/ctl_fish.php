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
        $return = array('nav' => 'fish');
        lib_template::assign('return', $return);
        lib_template::display('fish_index.tpl');
    }

}

?>
