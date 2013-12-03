<?php

/**
 * 
 * @author duanyunchao
 * @version $Id$
 */
require_once(PATH_LIBRARY . "/qiniu/rs.php");
require_once(PATH_LIBRARY . "/qiniu/io.php");

/**
 * 七牛
 *
 * @package util
 */
class lib_qiniu
{
    private static $bucket    = null;
    private static $accessKey = null;
    private static $secretKey = null;

    /**
     * 初始化
     * 
     * @return void
     */
    public static function init()
    {
        self::$bucket = $GLOBALS["CONFIG"]['QINIU']['bucket'];
        self::$accessKey = $GLOBALS["CONFIG"]['QINIU']['accessKey'];
        self::$secretKey = $GLOBALS["CONFIG"]['QINIU']['secretKey'];
    }

    /**
     * 上传本地文件
     * 
     * @param string $bucket
     * @param string $filename
     * @param string $filepath
     * @return void
     */
    public static function upfile($filename, $filepath)
    {
        self::init();
        $key       = $filename;
        Qiniu_SetKeys(self::$accessKey, self::$secretKey);
        $putPolicy = new Qiniu_RS_PutPolicy(self::$bucket);
        $upToken   = $putPolicy->Token(null);
        $putExtra  = new Qiniu_PutExtra();
        $putExtra->Crc32 = 1;
        list($ret, $err) = Qiniu_PutFile($upToken, $key, $filepath, $putExtra);

        if ($err !== null)
        {
            return false;
        }

        return $GLOBALS["CONFIG"]['QINIU']['domain'] . $ret['key'];
    }

}

