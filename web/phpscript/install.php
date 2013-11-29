<?php

/**
 * 安装脚本
 * 
 * @author duanyunchao
 * @version $Id$
 */
/** 初始化 */
require '../init.php';

/* 调试模式 */
$flag = hlp_common::get_cmd_flag();

if (!empty($flag['help']))
{
    echo "php install.php -ytz_users 1 用户表" . PHP_EOL;
}

if (!empty($flag['ytz_users']))
{
    $number = 1;
    $sql    = "CREATE TABLE IF NOT EXISTS `%s` (
            `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            `user_login` varchar(60) NOT NULL DEFAULT '',
            `user_pass` varchar(64) NOT NULL DEFAULT '',
            `user_nicename` varchar(50) NOT NULL DEFAULT '',
            `user_email` varchar(100) NOT NULL DEFAULT '',
            `user_url` varchar(100) NOT NULL DEFAULT '',
            `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
            `user_activation_key` varchar(60) NOT NULL DEFAULT '',
            `user_status` int(11) NOT NULL DEFAULT '0',
            `display_name` varchar(250) NOT NULL DEFAULT '',
            PRIMARY KEY (`ID`),
            KEY `user_login_key` (`user_login`),
            KEY `user_nicename` (`user_nicename`)
            ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8";

    if ($flag['ytz_users'] == 1)
    {
        hlp_tool::create_table('ytz_users', $sql, $number);
    }
    else if ($flag['ytz_users'] == 2)
    {
        hlp_tool::drop_table('ytz_users', $number);
    }
}

echo "success" . PHP_EOL;
