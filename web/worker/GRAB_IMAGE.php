<?php

/**
 * 抓取图片
 * 
 * @author duanyunchao
 * @version $Id$
 */
define('PATH_ROOT_CLI', strtr(__FILE__, array('\\'                     => '/', '/worker/GRAB_IMAGE.php' => '', 'GRAB_IMAGE.php'         => '')));
include PATH_ROOT_CLI . '/init.php';

/* 调试模式 */
$flag = hlp_common::get_cmd_flag();

if (!empty($flag['test']))
{
    var_dump($flag);
    lib_gearman::add_job($GLOBALS['CONFIG']['gearman'], 'GRAB_IMAGE', $flag, 3);
    exit();
}

if (isset($flag['help']))
{
    echo "php GRAB_IMAGE.php -debug 1 抓取图片";
    echo "\n";
    exit();
}

/* 执行任务 */
lib_gearman::do_job($GLOBALS['CONFIG']['gearman'], "GRAB_IMAGE", "GRAB_IMAGE");
/**
 * 抓取图片
 *
 * @param resource $job
 * @return boolean
 */
function GRAB_IMAGE($job)
{
    $params = $job->workload();
    $params = unserialize($params);

    if (!empty($params) && !empty($params['url']))
    {
        $return = array('state'      => false, 'start_time' => time(), 'params'     => $params, 'data'       => array());

        try
        {
            $url    = $params['url'];
            $result = hlp_common::remote_request($url);
            $result = json_decode($result, true);
            $data   = isset($result['data']) ? $result['data'] : array();

            if (empty($data))
            {
                throw new Exception('not data!');
            }

            foreach ($data as $key => $row)
            {
                var_dump($row);
                die;
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

        lib_database::close_mysql();
        unset($params);
        return $return['state'];
    }

    return false;
}

