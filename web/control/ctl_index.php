<?php

/**
 * 主页
 * 
 * @author duanyunchao
 * @version $Id$
 */
!defined('IN_INIT') && exit('Access Denied');

class ctl_index
{

    public function index()
    {
        $return = array();        
        lib_template::assign('return', $return);
        lib_template::display('index.tpl');
    }

}
