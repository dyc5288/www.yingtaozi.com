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
    echo "php install.php -ytz_posts 1" . PHP_EOL;
}

if (!empty($flag['ytz_posts']))
{
    $number = 1;
    $sql    = "CREATE TABLE IF NOT EXISTS `%s` (
        `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
        `post_author` varchar(100) NOT NULL DEFAULT '',
        `post_ctime` int(10) DEFAULT NULL DEFAULT 0 COMMENT '添加时间',
        `post_content` longtext NOT NULL,
        `post_title` text NOT NULL,
        `post_excerpt` text NOT NULL,
        `comment_status` tinyint(4) NOT NULL DEFAULT 0,
        `post_name` varchar(200) NOT NULL DEFAULT '',
        `post_utime` int(10) DEFAULT NULL DEFAULT 0 COMMENT '修改时间',
        `post_type` tinyint(4) NOT NULL DEFAULT 0,
        `post_mime_type` varchar(100) NOT NULL DEFAULT '',
        `comment_count` bigint(20) NOT NULL DEFAULT '0',
        PRIMARY KEY (`pid`),
        KEY `post_name` (`post_name`),
        KEY `post_type` (`post_type`),
        KEY `post_author` (`post_author`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";

    if ($flag['ytz_posts'] == 1)
    {
        hlp_tool::create_table('ytz_posts', $sql, $number);
    }
    else if ($flag['ytz_posts'] == 2)
    {
        hlp_tool::drop_table('ytz_posts', $number);
    }
}

echo "success" . PHP_EOL;
