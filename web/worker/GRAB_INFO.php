<?php

/**
 * 抓取消息
 * 
 * @author duanyunchao
 * @version $Id$
 */
define('PATH_ROOT_CLI', strtr(__FILE__, array('\\'                    => '/', '/worker/GRAB_INFO.php' => '', 'GRAB_INFO.php'         => '')));
include PATH_ROOT_CLI . '/init.php';

/* 调试模式 */
$flag = hlp_common::get_cmd_flag();

if (!empty($flag['test']))
{
    var_dump($flag);
    lib_gearman::add_job($GLOBALS['CONFIG']['gearman'], 'GRAB_INFO', $flag, 3);
    exit();
}

if (isset($flag['help']))
{
    echo "php GRAB_INFO.php -debug 1 抓取消息";
    echo "\n";
    exit();
}

/* 执行任务 */
lib_gearman::do_job($GLOBALS['CONFIG']['gearman'], "GRAB_INFO", "GRAB_INFO");
/**
 * 测试
 *
 * @param resource $job
 * @return boolean
 */
function GRAB_INFO($job)
{
    $params = $job->workload();
    $params = unserialize($params);

    if (!empty($params) && !empty($params['type']))
    {
        $return = array('state'      => false, 'start_time' => time(), 'params'     => $params);

        try
        {
            switch ($params['type'])
            {
                case pub_mod_info::TYPE_ELONGDAO:
                    $url            = $params['url'];
                    $return['data'] = pub_mod_info::grab_list($url);
                    break;
            }

            $return['state'] = true;
        }
        catch (Exception $e)
        {
            $return['err_msg']  = $e->getMessage();
            $return['err_code'] = $e->getCode();
        }

        $return['use_time'] = time() - $return['start_time'];

        if (CLI_DEBUG_LEVEL)
        {
            print_r($return);
        }
        die;
        lib_database::close_mysql();
        unset($params);
        return $return['state'];
    }

    return false;
}

