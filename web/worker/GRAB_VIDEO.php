<?php

/**
 * 抓取视频
 * 
 * @author duanyunchao
 * @version $Id$
 */
define('PATH_ROOT_CLI', strtr(__FILE__, array('\\'                     => '/', '/worker/GRAB_VIDEO.php' => '', 'GRAB_VIDEO.php'         => '')));
include PATH_ROOT_CLI . '/init.php';

/* 调试模式 */
$flag = hlp_common::get_cmd_flag();

if (!empty($flag['test']))
{
    var_dump($flag);
    lib_gearman::add_job($GLOBALS['CONFIG']['gearman'], 'GRAB_VIDEO', $flag, 3);
    exit();
}

if (isset($flag['help']))
{
    echo "php GRAB_VIDEO.php -debug 1 抓取消息";
    echo "\n";
    exit();
}

/* 执行任务 */
lib_gearman::do_job($GLOBALS['CONFIG']['gearman'], "GRAB_VIDEO", "GRAB_VIDEO");
/**
 * 测试
 *
 * @param resource $job
 * @return boolean
 */
function GRAB_VIDEO($job)
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
                case pub_mod_video::TYPE_YOUKU:
                    $url   = $params['url'];
                    $id    = $params['id'];
                    $key   = sha1($url);
                    $cache = GM('W_100', $key);

                    $video_obj = pub_mod_posts::get_one_post($id);

                    if (empty($video_obj))
                    {
                        throw new Exception("video {$id} not exist!");
                    }

                    if (!empty($cache))
                    {
                        throw new Exception("{$key} exist!");
                    }

                    $data = pub_mod_video::grab_data($url);

                    if (!empty($data))
                    {
                        if (!empty($video_obj['post_content']))
                        {
                            $post_content = array_merge(unserialize($video_obj['post_content']), $data);
                        }
                        else
                        {
                            $post_content = $data;
                        }
                        
                        $pcontent = array();
                        
                        foreach($post_content as $row)
                        {
                            $pcontent[$row['id']] = $row;
                        }
                        
                        ksort($pcontent);

                        $parmas = array();
                        $parmas['post_content'] = serialize($pcontent);

                        $result = pub_mod_video::update_video($id, $parmas);

                        if ($result)
                        {
                            $return['data'][] = $key;
                            SM(1, 'W_100', $key, 864000);
                        }
                        else
                        {
                            throw new Exception('add error!');
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

        lib_database::close_mysql();
        unset($params);
        return $return['state'];
    }

    return false;
}
