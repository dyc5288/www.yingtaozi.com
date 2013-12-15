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
            $type = $params['type'];

            if ($type == 1)
            {
                $url       = $params['url'];
                $title     = $params['title'];
                $pid       = GM('W_101', $title);
                $image_obj = false;

                $result = hlp_common::remote_request($url);
                $result = json_decode($result, true);
                $data   = isset($result['data']) ? $result['data'] : array();

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
                    $pc['url']      = pub_mod_info::save_image($row['middleURL']);
                    $pc['url_l']    = pub_mod_info::save_image($row['hoverURL']);
                    $post_content[] = $pc;
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
            }
            else if ($type == 2)
            {
                $url     = $params['url'];
                $title   = $params['title'];
                $result  = hlp_common::remote_request($url);
                $data    = mb_convert_encoding($result, 'utf-8', 'GBK');
                $matches = array();
                preg_match_all('/<img src=\'(.*)\'  alt=\'(.*)\'\/>/iU', $data, $matches);
                $urls = $matches[1];

                if (!empty($urls))
                {
                    $param_array = array();
                    $post_content = array();
                    $param_array['post_author'] = pub_mod_posts::AUTHOR_ADMIN_ID;
                    $param_array['post_title']  = addslashes($title);

                    foreach ($urls as $u)
                    {
                        $u  = "http://www.foxqq.com{$u}";
                        $pc = array();
                        $pc['url']      = pub_mod_info::save_image($u);
                        $pc['url_l']    = $pc['url'];
                        $post_content[] = $pc;
                    }

                    $param_array['post_content'] = serialize($post_content);
                    $param_array['post_date']    = date('Y-m-d H:i:s');
                    $return['pid']               = pub_mod_image::add_image($param_array);
                }
            }
            else if ($type == 3)
            {
                $urls  = $params['url'];
                $title = $params['title'];

                $param_array = array();
                $post_content = array();
                $param_array['post_author'] = pub_mod_posts::AUTHOR_ADMIN_ID;
                $param_array['post_title']  = addslashes($title);

                foreach ($urls as $url)
                {
                    $data    = hlp_common::remote_request($url);
                    $matches = array();
                    preg_match_all('/<img alt=\"(.*)\" src=\"(.*)\"\/>/iU', $data, $matches);
                    $url_data = $matches[2];

                    if (!empty($url_data))
                    {
                        foreach ($url_data as $u)
                        {
                            $pc = array();
                            $pc['url']      = pub_mod_info::save_image($u);
                            $pc['url_l']    = $pc['url'];
                            $post_content[] = $pc;
                        }
                    }
                }

                $param_array['post_content'] = serialize($post_content);
                $param_array['post_date']    = date('Y-m-d H:i:s');
                $return['pid']               = pub_mod_image::add_image($param_array);
            }
            else if ($type == 4)
            {
                $url_prefix = $params['url'];
                $title      = $params['title'];
                $num        = $params['num'];

                $param_array = array();
                $post_content = array();
                $param_array['post_author'] = pub_mod_posts::AUTHOR_ADMIN_ID;
                $param_array['post_title']  = addslashes($title);

                for ($i = 1; $i <= $num; $i++)
                {
                    $url     = $url_prefix . "&p=$i";
                    $data    = hlp_common::remote_request($url);
                    
                    if ($i == 1)
                    {
                        $matches = array();
                        preg_match_all('/<div class=\"c_p_l_c_i\" data-obj=\".*\">(.*)<\\/div>/iU', $data, $matches);
                        $url_data = $matches[1];

                        if (!empty($url_data))
                        {
                            foreach ($url_data as $u)
                            {
                                $p    = xml_parser_create();
                                $vals = array();
                                $index = array();
                                xml_parse_into_struct($p, $u, $vals, $index);
                                xml_parser_free($p);

                                $iattr  = $vals[$index['IMG'][0]]['attributes'];
                                $iurl   = $iattr['SRC'];
                                $ilurl  = str_replace('/m/', '/l/', $iurl);
                                $ititle = $iattr['ALT'];

                                $pc = array();
                                $pc['url']      = pub_mod_info::save_image($iurl);
                                $pc['url_l']    = pub_mod_info::save_image($ilurl);
                                $pc['title']    = $ititle;
                                $post_content[] = $pc;
                            }
                        }
                    }
                    else
                    {
                        
                    }
                }

                $param_array['post_content'] = serialize($post_content);
                $param_array['post_date']    = date('Y-m-d H:i:s');
                $return['pid']               = pub_mod_image::add_image($param_array);
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

