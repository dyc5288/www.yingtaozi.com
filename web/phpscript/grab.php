<?php

/**
 * 抓取
 * 
 * @author duanyunchao
 * @version $Id$
 */
/** 初始化 */
require '../init.php';

/* 调试模式 */
$flag = hlp_common::get_cmd_flag();

if (!empty($flag['help']))
{
    echo "php grab.php -grab_info 1 抓取恶魔岛资讯" . PHP_EOL;
}

if (!empty($flag['grab_info']))
{
    switch ($flag['grab_info'])
    {
        case pub_mod_info::TYPE_ELONGDAO:
            for ($i = 1; $i <= 776; $i++)
            {
                $params = array('url'  => "http://news.emland.net/index.php?&page={$i}", 'type' => $flag['grab_info']);
                lib_gearman::add_job($GLOBALS['CONFIG']['gearman'], 'GRAB_INFO', $params, 3);
            }
            break;
    }
}

echo "success" . PHP_EOL;