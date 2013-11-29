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
    echo "php install.php -ytz_usermeta 1 用户额外参数表" . PHP_EOL;
}

if (!empty($flag['ytz_users']))
{
    $number = 1;
    $sql    = "CREATE TABLE IF NOT EXISTS `%s` (
            `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
            `user_login` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
            `user_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '密码',
            `user_nicename` varchar(50) NOT NULL DEFAULT '' COMMENT '昵称',
            `user_email` varchar(100) NOT NULL DEFAULT '' COMMENT '电子邮件',
            `user_url` varchar(100) NOT NULL DEFAULT '' COMMENT '站点地址',
            `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
            `user_activation_key` varchar(60) NOT NULL DEFAULT '',
            `user_status` int(11) NOT NULL DEFAULT '0' COMMENT '用户状态',
            `display_name` varchar(250) NOT NULL DEFAULT '' COMMENT '公开显示名字',
            PRIMARY KEY (`ID`),
            KEY `user_login_key` (`user_login`),
            KEY `user_nicename` (`user_nicename`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";

    if ($flag['ytz_users'] == 1)
    {
        hlp_tool::create_table('ytz_users', $sql, $number);
    }
    else if ($flag['ytz_users'] == 2)
    {
        hlp_tool::drop_table('ytz_users', $number);
    }
}

if (!empty($flag['ytz_usermeta']))
{
    $number = 1;
    $sql    = "CREATE TABLE IF NOT EXISTS `%s` (
            `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
            `user_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
            `meta_key` varchar(255) DEFAULT NULL COMMENT '参数名',
            `meta_value` longtext COMMENT '参数值',
            PRIMARY KEY (`umeta_id`),
            KEY `user_id` (`user_id`),
            KEY `meta_key` (`meta_key`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";

    if ($flag['ytz_usermeta'] == 1)
    {
        hlp_tool::create_table('ytz_usermeta', $sql, $number);
    }
    else if ($flag['ytz_usermeta'] == 2)
    {
        hlp_tool::drop_table('ytz_usermeta', $number);
    }
}

echo "success" . PHP_EOL;
