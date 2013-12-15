<?php

/**
 * 测试
 * 
 * @author duanyunchao
 * @version $Id$
 */
require '../init.php';

$url = 'http://news.emland.net/news37471.html';
$detail_data = pub_mod_info::grab_detail($url);
var_dump($detail_data);
