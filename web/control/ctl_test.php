<?php

/**
 * 主页
 * 
 * @author duanyunchao
 * @version $Id$
 */
!defined('IN_INIT') && exit('Access Denied');

require_once 'ctl_parent.php';

class ctl_test extends ctl_parent
{
    /**
     * 初始化
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 首页
     * 
     * @return void
     */
    public function index()
    {
        
    }

    /**
     * 查看单个文件
     * 
     * @return void
     */
    public function read()
    {
        require_once(PATH_LIBRARY . "/qiniu/rs.php");

        $bucket    = "yingtaozi";
        $key       = "IMG_20131120_200750.jpg";
        $accessKey = 'h4yaNvJCcrp6B4H5IjI85_0QdgX8w0rrTxnBo30V';
        $secretKey = 'rwqwsuiIxFzkWroCKUeJ5LltaaPTD1t5VxBfkHie';

        Qiniu_SetKeys($accessKey, $secretKey);
        $client = new Qiniu_MacHttpClient(null);

        list($ret, $err) = Qiniu_RS_Stat($client, $bucket, $key);
        echo "Qiniu_RS_Stat result: \n";
        if ($err !== null)
        {
            var_dump($err);
        }
        else
        {
            var_dump($ret);
        }
    }

    /**
     * 复制单个文件 
     * 
     * @return void
     */
    public function copy()
    {
        require_once(PATH_LIBRARY . "/qiniu/rs.php");

        $bucket    = "yingtaozi";
        $key       = "IMG_20131120_200750.jpg";
        $key1      = "IMG_20131120_200750_bak.jpg";
        $accessKey = 'h4yaNvJCcrp6B4H5IjI85_0QdgX8w0rrTxnBo30V';
        $secretKey = 'rwqwsuiIxFzkWroCKUeJ5LltaaPTD1t5VxBfkHie';

        Qiniu_SetKeys($accessKey, $secretKey);
        $client = new Qiniu_MacHttpClient(null);

        $err = Qiniu_RS_Copy($client, $bucket, $key, $bucket, $key1);
        echo "====> Qiniu_RS_Copy result: \n";
        if ($err !== null)
        {
            var_dump($err);
        }
        else
        {
            echo "Success!";
        }
    }

    /**
     * 移动单个文件
     * 
     * @return void
     */
    public function move()
    {
        require_once(PATH_LIBRARY . "/qiniu/rs.php");

        $bucket    = "yingtaozi";
        $key       = "IMG_20131120_200750_bak.jpg";
        $key1      = "IMG_20131120_200750_move.jpg";
        $accessKey = 'h4yaNvJCcrp6B4H5IjI85_0QdgX8w0rrTxnBo30V';
        $secretKey = 'rwqwsuiIxFzkWroCKUeJ5LltaaPTD1t5VxBfkHie';

        Qiniu_SetKeys($accessKey, $secretKey);
        $client = new Qiniu_MacHttpClient(null);

        $err = Qiniu_RS_Move($client, $bucket, $key, $bucket, $key1);
        echo "====> Qiniu_RS_Move result: \n";
        if ($err !== null)
        {
            var_dump($err);
        }
        else
        {
            echo "Success!";
        }
    }

    /**
     * 删除单个文件
     * 
     * @return void
     */
    public function delete()
    {
        require_once(PATH_LIBRARY . "/qiniu/rs.php");

        $bucket    = "yingtaozi";
        $key1      = "IMG_20131120_200750_move.jpg";
        $accessKey = 'h4yaNvJCcrp6B4H5IjI85_0QdgX8w0rrTxnBo30V';
        $secretKey = 'rwqwsuiIxFzkWroCKUeJ5LltaaPTD1t5VxBfkHie';

        Qiniu_SetKeys($accessKey, $secretKey);
        $client = new Qiniu_MacHttpClient(null);

        $err = Qiniu_RS_Delete($client, $bucket, $key1);
        echo "====> Qiniu_RS_Delete result: \n";
        if ($err !== null)
        {
            var_dump($err);
        }
        else
        {
            echo "Success!";
        }
    }

    /**
     * 生成上传token
     * 
     * @return void
     */
    public function uptoken()
    {
        require_once(PATH_LIBRARY . "/qiniu/rs.php");

        $bucket    = "yingtaozi";
        $accessKey = 'h4yaNvJCcrp6B4H5IjI85_0QdgX8w0rrTxnBo30V';
        $secretKey = 'rwqwsuiIxFzkWroCKUeJ5LltaaPTD1t5VxBfkHie';

        Qiniu_SetKeys($accessKey, $secretKey);
        $putPolicy = new Qiniu_RS_PutPolicy($bucket);
        $upToken   = $putPolicy->Token(null);
        var_dump($upToken);
    }

    /**
     * 上传字符串
     * 
     * @return void
     */
    public function upstring()
    {
        require_once(PATH_LIBRARY . "/qiniu/io.php");
        require_once(PATH_LIBRARY . "/qiniu/rs.php");

        $bucket    = "yingtaozi";
        $key1      = "test.txt";
        $accessKey = 'h4yaNvJCcrp6B4H5IjI85_0QdgX8w0rrTxnBo30V';
        $secretKey = 'rwqwsuiIxFzkWroCKUeJ5LltaaPTD1t5VxBfkHie';

        Qiniu_SetKeys($accessKey, $secretKey);
        $putPolicy = new Qiniu_RS_PutPolicy($bucket);
        $upToken   = $putPolicy->Token(null);
        list($ret, $err) = Qiniu_Put($upToken, $key1, "Qiniu Storage!", null);
        echo "====> Qiniu_Put result: \n";
        if ($err !== null)
        {
            var_dump($err);
        }
        else
        {
            var_dump($ret);
        }
    }

    /**
     * 上传本地文件
     * 
     * @return void
     */
    public function upfile()
    {
        require_once(PATH_LIBRARY . "/qiniu/io.php");
        require_once(PATH_LIBRARY . "/qiniu/rs.php");

        $bucket    = "yingtaozi";
        $key1      = PATH_DATA . '/lang/zh_CN.php';
        $accessKey = 'h4yaNvJCcrp6B4H5IjI85_0QdgX8w0rrTxnBo30V';
        $secretKey = 'rwqwsuiIxFzkWroCKUeJ5LltaaPTD1t5VxBfkHie';

        Qiniu_SetKeys($accessKey, $secretKey);
        $putPolicy = new Qiniu_RS_PutPolicy($bucket);
        $upToken   = $putPolicy->Token(null);
        $putExtra  = new Qiniu_PutExtra();
        $putExtra->Crc32 = 1;
        list($ret, $err) = Qiniu_PutFile($upToken, $key1, __file__, $putExtra);
        echo "====> Qiniu_PutFile result: \n";
        if ($err !== null)
        {
            var_dump($err);
        }
        else
        {
            var_dump($ret);
        }
    }

    /**
     * 公有资源下载地址
     * 
     * @return void
     */
    public function dlurl()
    {
        require_once(PATH_LIBRARY . "/qiniu/rs.php");
        $key     = 'IMG_20131120_200750.jpg';
        $domain  = 'yingtaozi.u.qiniudn.com';
        //$baseUrl 就是您要访问资源的地址
        $baseUrl = Qiniu_RS_MakeBaseUrl($domain, $key);
        var_dump($baseUrl);
    }

    /**
     * 私有资源下载地址
     * 
     * @return void
     */
    public function pdlurl()
    {
        require_once(PATH_LIBRARY . "/qiniu/rs.php");

        $key       = 'IMG_20131118_000834.jpg';
        $domain    = 'yunchao.u.qiniudn.com';
        $accessKey = 'h4yaNvJCcrp6B4H5IjI85_0QdgX8w0rrTxnBo30V';
        $secretKey = 'rwqwsuiIxFzkWroCKUeJ5LltaaPTD1t5VxBfkHie';

        Qiniu_SetKeys($accessKey, $secretKey);
        $baseUrl    = Qiniu_RS_MakeBaseUrl($domain, $key);
        $getPolicy  = new Qiniu_RS_GetPolicy();
        $privateUrl = $getPolicy->MakeRequest($baseUrl, null);
        echo "====> getPolicy result: \n";
        echo $privateUrl . "\n";
    }

}
