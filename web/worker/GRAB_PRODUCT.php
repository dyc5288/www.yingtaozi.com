<?php

/**
 * 掏周边产品
 * 
 * @author duanyunchao
 * @version $Id$
 */
define('PATH_ROOT_CLI', strtr(__FILE__, array('\\'                       => '/', '/worker/GRAB_PRODUCT.php' => '', 'GRAB_PRODUCT.php'         => '')));
include PATH_ROOT_CLI . '/init.php';

/* 调试模式 */
$flag = hlp_common::get_cmd_flag();

if (!empty($flag['test']))
{
    var_dump($flag);
    lib_gearman::add_job($GLOBALS['CONFIG']['gearman'], 'GRAB_PRODUCT', $flag, 3);
    exit();
}

if (isset($flag['help']))
{
    echo "php GRAB_PRODUCT.php -debug 1 掏周边产品";
    echo "\n";
    exit();
}

/* 执行任务 */
lib_gearman::do_job($GLOBALS['CONFIG']['gearman'], "GRAB_PRODUCT", "GRAB_PRODUCT");
/**
 * 掏周边产品
 *
 * @param resource $job
 * @return boolean
 */
function GRAB_PRODUCT($job)
{
    $params = $job->workload();
    $params = unserialize($params);

    if (!empty($params) && !empty($params['file']))
    {
        $return = array('state'      => false, 'start_time' => time(), 'params'     => $params, 'data'       => array());

        try
        {
            $data = lib_excel::get_data($params['file']);

            if (empty($data))
            {
                throw new Exception('not data!');
            }

            foreach ($data as $key => $row)
            {
                if ($key > 1)
                {
                    $cache_key = $params['file'] . "_" . $key;
                    $cache     = GM('W_100', $cache_key);

                    if (!empty($cache))
                    {
                        $return['data'][] = $cache_key . "exist!";
                        continue;
                    }

                    $param_array = array();
                    $param_array['post_author'] = pub_mod_posts::AUTHOR_ADMIN_ID;
                    $param_array['post_date']   = $row[1];
                    $param_array['post_title']  = addslashes($row[3]);
                    $post_excerpt               = array();
                    $post_excerpt['buy_url']     = $row[5];
                    $post_excerpt['image_url']   = $row[2];
                    $post_excerpt['price']       = $row[4];
                    $param_array['post_excerpt'] = $post_excerpt;
                    $result                      = pub_mod_product::add_prodcut($param_array);

                    if ($result)
                    {
                        $return['data'][] = $key;
                        SM(1, 'W_100', $cache_key, 864000);
                    }
                    else
                    {
                        throw new Exception('add error!');
                    }
                }
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

