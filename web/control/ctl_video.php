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
        $return = array('nav' => 'video');
        lib_template::assign('return', $return);
        lib_template::display('video_index.tpl');
    }

}

?>
