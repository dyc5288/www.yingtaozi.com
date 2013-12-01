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
        $return = array('state'      => false, 'start_time' => time(), 'params'     => $params, 'data'       => array());

        try
        {
            switch ($params['type'])
            {
                case pub_mod_info::TYPE_ELONGDAO:
                    $url  = $params['url'];
                    $data = pub_mod_info::grab_list($url);

                    if (!empty($data))
                    {
                        foreach ($data as $row)
                        {
                            $param_array = array();
                            $param_array['post_author']  = pub_mod_posts::AUTHOR_ADMIN_ID;
                            $param_array['post_date']    = $row['post_date'];
                            $post_content                = pub_mod_info::replace_image($row['post_content']);
                            $param_array['post_content'] = addslashes($post_content);
                            $param_array['post_title']   = addslashes($row['post_title']);
                            $param_array['post_date']    = $row['post_date'];
                            $post_excerpt                = array();
                            $post_excerpt['from']        = $row['from'];
                            $post_excerpt['image_url']   = pub_mod_info::save_image($row['image_url']);
                            $param_array['post_excerpt'] = $post_excerpt;
                            $result                      = pub_mod_info::add_info($param_array);
                            if ($result)
                            {
                                $return['data'][] = $row['detail_url'];
                            }
                            else
                            {
                                throw new Exception('add error!');
                            }
                        }
                    }

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

