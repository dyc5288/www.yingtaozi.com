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
            $url       = $params['url'];
            $title     = $params['title'];
            $pid       = GM('W_101', $title);
            $image_obj = false;
            var_dump($url);
            $result    = hlp_common::remote_request($url);
            $result    = json_decode($result, true);
            $data      = isset($result['data']) ? $result['data'] : array();

            if (!empty($pid))
            {
                $image_obj = pub_mod_posts::get_one_post($pid);
            }

            if (empty($data))
            {
                throw new Exception('not data!');
            }

            $param_array = array();
            $post_content = array();

            if (empty($image_obj))
            {
                $param_array['post_author'] = pub_mod_posts::AUTHOR_ADMIN_ID;
            }
            else
            {
                $post_content = unserialize($image_obj['post_content']);
            }

            foreach ($data as $row)
            {
                $pc = array();
                $pc['middleURL'] = pub_mod_info::save_image($row['middleURL']);
                $pc['hoverURL']  = pub_mod_info::save_image($row['hoverURL']);
                $post_content[]  = $pc;var_dump($row['hoverURL']);
            }

            $param_array['post_content'] = serialize($post_content);
            $param_array['post_date']    = date('Y-m-d H:i:s');

            if (empty($image_obj))
            {
                $pid            = pub_mod_image::add_image($param_array);
                $return['data'] = $pid;
                SM($pid, 'W_101', $title, 86400);
            }
            else
            {
                $return['data'] = pub_mod_image::update_video($pid, $param_array);
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

