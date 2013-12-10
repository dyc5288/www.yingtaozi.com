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
    echo "php grab.php -grab_video 1 抓取优酷视频" . PHP_EOL;
    echo "php grab.php -grab_product 1 抓取周边产品" . PHP_EOL;
}

if (!empty($flag['grab_info']))
{
    switch ($flag['grab_info'])
    {
        case pub_mod_info::TYPE_ELONGDAO:
            for ($i = 3; $i <= 7; $i++)
            {
                $params = array('url'  => "http://news.emland.net/index.php?&page={$i}", 'type' => $flag['grab_info']);
                lib_gearman::add_job($GLOBALS['CONFIG']['gearman'], 'GRAB_INFO', $params, 3);
            }
            break;
    }
}

if (!empty($flag['grab_video']))
{
    switch ($flag['grab_video'])
    {
        case pub_mod_video::TYPE_YOUKU:
            for ($i = 1; $i <= 8; $i++)
            {
                $start  = ($i - 1) * 20 + 1;
                $url    = "http://www.youku.com/show_episode/id_z63ddfc20dcae11e299f6.html?dt=json&divid=reload_{$start}&__rt=1&__ro=reload_{$start}";
                $params = array('url'  => $url, 'type' => $flag['grab_video'], 'id'   => 1580);
                lib_gearman::add_job($GLOBALS['CONFIG']['gearman'], 'GRAB_VIDEO', $params, 3);
            }
            break;
    }
}

if (!empty($flag['grab_product']))
{
    $file = PATH_DATA . '/notsync/xls/2013-12-08-13740145 (1).xls';
    $params = array();
    $params['file'] = $file;
    lib_gearman::add_job($GLOBALS['CONFIG']['gearman'], 'GRAB_PRODUCT', $params, 3);
}
echo "success" . PHP_EOL;