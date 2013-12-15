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
    echo "php grab.php -grab_image 1 抓取百度图片" . PHP_EOL;
    echo "php grab.php -grab_image 2 抓取QQ表情图片" . PHP_EOL;
    echo "php grab.php -grab_image 3 抓取路游动漫图片" . PHP_EOL;
    echo "php grab.php -grab_image 4 抓取图展的图片" . PHP_EOL;
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
    $file   = PATH_DATA . '/notsync/xls/2013-12-08-13740145 (1).xls';
    $params = array();
    $params['file'] = $file;
    lib_gearman::add_job($GLOBALS['CONFIG']['gearman'], 'GRAB_PRODUCT', $params, 3);
}


if (!empty($flag['grab_image']))
{
    if ($flag['grab_image'] == 1)
    {
        $start   = 0;
        $limit   = 50;
        $keywrod = '樱桃小丸子';
        $oq      = urlencode($keywrod);
        $url     = "http://image.baidu.com/i?tn=resultjson_com&ipn=rj&ct=201326592&cl=2&lm=-1&st=-1&fm=index&fr=&sf=1&fmq=&pv=&ic=0&nc=1&z=&se=1&showtab=0&fb=0&width=&height=&face=0&istype=2&ie=gbk&word=%D3%A3%CC%D2%D0%A1%CD%E8%D7%D3&f=3&oq={$oq}&rsp=-1&oe=utf-8&rn={$limit}&pn={$start}&531463329075.834&132670077221.29118";
        $result  = hlp_common::remote_request($url);
        $result  = json_decode($result, true);
        $count   = isset($result['listNum']) ? $result['listNum'] : 0;

        if ($count > 0)
        {
            while ($start < $count)
            {
                $url    = "http://image.baidu.com/i?tn=resultjson_com&ipn=rj&ct=201326592&cl=2&lm=-1&st=-1&fm=index&fr=&sf=1&fmq=&pv=&ic=0&nc=1&z=&se=1&showtab=0&fb=0&width=&height=&face=0&istype=2&ie=gbk&word=%D3%A3%CC%D2%D0%A1%CD%E8%D7%D3&f=3&oq={$oq}&rsp=-1&oe=utf-8&rn={$limit}&pn={$start}&531463329075.834&132670077221.29118";
                $start += $limit;
                $params = array();
                $params['url']   = $url;
                $params['title'] = $keywrod;
                lib_gearman::add_job($GLOBALS['CONFIG']['gearman'], 'GRAB_IMAGE', $params, 3);
            }
        }
    }
    else if ($flag['grab_image'] == 2)
    {
        $params = array();
        $params['type']  = 2;
        $params['url']   = 'http://www.foxqq.com/biaoqing/NiuNiuNiuNiu.html';
        $params['title'] = '牛牛妞妞 表情';
        lib_gearman::add_job($GLOBALS['CONFIG']['gearman'], 'GRAB_IMAGE', $params, 3);
    }
    else if ($flag['grab_image'] == 3)
    {
        $params = array();
        $params['type'] = 3;
        $urls           = array();
        for ($i = 2; $i <= 30; $i++)
        {
            $urls[]          = "http://www.roame.net/index/sword-art-online/images/index_{$i}.html";
        }
        $params['url']   = $urls;
        $params['title'] = '刀剑神域';
        lib_gearman::add_job($GLOBALS['CONFIG']['gearman'], 'GRAB_IMAGE', $params, 3);
    }
    else if ($flag['grab_image'] == 4)
    {
        $params = array();
        $params['type']  = 4;
        $params['title'] = '柯南';
        $key             = urlencode($params['title']);
        $params['url']   = "http://www.tuzhan.com/search.html?key={$key}&_=1387040470452";
        $params['num']   = 5;
        $params['sum']   = 0;
        $params['start']   = 1;
        lib_gearman::add_job($GLOBALS['CONFIG']['gearman'], 'GRAB_IMAGE', $params, 3);
    }
}
echo "success" . PHP_EOL;