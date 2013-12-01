<?php

/**
 * 
 * @author duanyunchao
 * @version $Id$
 */
require_once PATH_CONFIG . '/inc_wp_api.php';

class pub_wp_api
{
    /**
     * 获取用户的好友信息
     * 
     * @param int $user_id
     * @param int $frinend_id
     * @param string $nick_name
     * @return array 
     */
    public function post($params)
    {
        return $this->_call_api_method('post', $params);
    }
    
    /**
     * 请求指定的内容
     * 
     * @param string $api_method
     * @param array $args
     * @param string $ispost
     * @param string $my_server_url
     * @return max ( array || null || false)
     */
    protected function _call_api_method($api_method, $args, $ispost = 'auto', $my_server_url = '')
    {
        $this->errno = 0;
        $this->errmsg = '';
        $url    = empty($my_server_url) ? MYAPI_SERVER_URL : $my_server_url;
        $params = array();
        $params['api_method'] = $api_method;
        $params['api_app_id'] = $this->app_id;
        $params['api_client'] = 'PHP';
        $params['api_v']      = '0.1';

        //生成证书
        $this->_make_secret($params, $args);

        //大于512字节时才使用post， 否则用get方式请求
        $query_str = $this->_get_params($params);

        if ($api_method == 'p3pLogin' || $api_method == 'p3pExit')
        {
            $query_str = preg_replace('/^&/U', '', $query_str);
            $url       = $url . '?' . $query_str;
            return $url;
        }
        else if (strlen($query_str) < 512 && $ispost == 'auto')
        {
            list($errno, $result) = $this->_get_request($url, $query_str);
        }
        else
        {
            list($errno, $result) = $this->_post_request($url, $query_str);
        }

        $result = trim($result);    //echo $url.'?'.$query_str.'|'; var_dump($result);

        if ($result == '')
        {
            return false;
        }
        else if (!$errno)
        {
            try
            {
                $result = unserialize($result);
            }
            catch (Exception $e)
            {
                if (DEBUG_LEVEL)
                {
                    echo "服务端程序可能存在错，返回信息如下：<hr />\n";
                    echo $result;
                    echo "错误信息如下：";
                    echo $e->getMessage();
                    exit();
                }
                else
                {
                    trigger_error("Server Error:" . $result);
                    return false;
                }
            }

            if (isset($result['errCode']) && $result['errCode'] != 0)
            {
                $this->errno = $result['errCode'];
                $this->errmsg = $result['errMessage'];
                return null;
            }

            return $result['result'];
        }
        else
        {
            return false;
        }
    }
}
