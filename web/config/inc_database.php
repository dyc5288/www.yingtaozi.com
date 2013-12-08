<?php

/**
 * 数据库配置
 * 
 * @author duanyunchao
 * @version $Id$
 */
$GLOBALS["DATABASE"] = array();

/* my数据库 */
$GLOBALS['DATABASE']['databases']['db_user']    = 'yingtaozi';
$GLOBALS['DATABASE']['databases']['db_pass']    = 'yingtaozi';
$GLOBALS['DATABASE']['databases']['db_name']    = 'yingtaozi';
$GLOBALS['DATABASE']['databases']['db_charset'] = 'utf-8';

$GLOBALS['DATABASE']['section'] = array();
$GLOBALS['DATABASE']['section'][0] = array();
$GLOBALS['DATABASE']['section'][0]['table_name'] = array();
$GLOBALS['DATABASE']['section'][0]["table_range"] = 1;
$GLOBALS['DATABASE']['section'][0]["group_count"] = 1;
$GLOBALS['DATABASE']['section'][0]["ips"][0]["master"] = array("db_host" => "127.0.0.1:3306", "db_name" => "yingtaozi");  // 默认组
$GLOBALS['DATABASE']['section'][0]["ips"][0]["slave"][] = array("db_host" => "127.0.0.1:3306", "db_name" => "yingtaozi"); // 默认组

/* Memcached Keys */
$GLOBALS["DATABASE"]['MEMCACHED_PREFIX'] = array();

/* dbc层 */
$GLOBALS["DATABASE"]['MEMCACHED_PREFIX']['D_100'] = 'dbc_test::get_one';

/* worker层 */
$GLOBALS["DATABASE"]['MEMCACHED_PREFIX']['W_100'] = 'GRAB_INFO::one';