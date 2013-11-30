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
    echo "php install.php -ytz_options 1 网站设置选项表" . PHP_EOL;
    echo "php install.php -ytz_posts 1 文章表" . PHP_EOL;
    echo "php install.php -ytz_postmeta 1 文章额外参数表" . PHP_EOL;
    echo "php install.php -ytz_comments 1 评论表" . PHP_EOL;
    echo "php install.php -ytz_commentmeta 1 评论额外参数表" . PHP_EOL;
}

if (!empty($flag['ytz_options']))
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
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='用户表'";

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
    // first_name:姓， last_name：名，nickname：昵称, description：个人说明，rich_editing：是否使用可视化编辑器，
    // comment_shortcuts：是否启用键盘快捷键，admin_color：管理界面配色方案，use_ssl，show_admin_bar_front：浏览站点时是否显示工具栏，
    // ytz_capabilities：用户角色，ytz_user_level：用户等级，dismissed_wp_pointers，show_welcome_panel，ytz_dashboard_quick_press_last_post_id 
    $number = 1;
    $sql    = "CREATE TABLE IF NOT EXISTS `%s` (
            `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
            `user_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
            `meta_key` varchar(255) DEFAULT NULL COMMENT '参数名',
            `meta_value` longtext COMMENT '参数值',
            PRIMARY KEY (`umeta_id`),
            KEY `user_id` (`user_id`),
            KEY `meta_key` (`meta_key`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='用户额外参数表'";

    if ($flag['ytz_usermeta'] == 1)
    {
        hlp_tool::create_table('ytz_usermeta', $sql, $number);
    }
    else if ($flag['ytz_usermeta'] == 2)
    {
        hlp_tool::drop_table('ytz_usermeta', $number);
    }
}

if (!empty($flag['ytz_options']))
{
    // siteurl:网站首页地址，blogname:站点标题，blogdescription：副标题，users_can_register：是否允许任何人注册，
    // admin_email：管理员邮箱，start_of_week：一星期开始于，use_balanceTags：，use_smilies：，
    // require_name_email：comments_notify，posts_per_rss，rss_use_excerpt,mailserver_url：邮件服务器地址，
    // mailserver_login：邮件服务器用户名，mailserver_pass：邮件服务器登录密码，mailserver_port：邮件服务器端口，
    // default_category，default_comment_status，default_ping_status，default_pingback_flag，posts_per_page，
    // date_format，time_format，links_updated_date_format，links_recently_updated_prepend，links_recently_updated_append，
    // links_recently_updated_time，comment_moderation，moderation_notify，permalink_structure，gzipcompression，hack_file，
    // blog_charset，moderation_keys，active_plugins，home，category_base，ping_sites，advanced_edit，comment_max_links,
    // gmt_offset，default_email_category，recently_edited，template，stylesheet，comment_whitelist，blacklist_keys，
    // comment_registration，html_type，use_trackback，default_role，db_version，uploads_use_yearmonth_folders，
    // upload_path，default_link_category，show_on_front，tag_base，show_avatars，avatar_rating，upload_url_path，
    // thumbnail_size_w，thumbnail_size_h，thumbnail_crop，medium_size_w，medium_size_h，avatar_default，
    // large_size_w，large_size_h，image_default_link_type，image_default_size，image_default_align，close_comments_for_old_posts，
    // close_comments_days_old，thread_comments，thread_comments_depth，page_comments，comments_per_page，default_comments_page，
    // comment_order，sticky_posts，widget_categories，widget_text，widget_rss，uninstall_plugins，timezone_string，page_for_posts，
    // page_on_front，default_post_format，link_manager_enabled，initial_db_version，ytz_user_roles，widget_search，widget_recent-posts，
    // widget_recent-comments，widget_archives，widget_meta，sidebars_widgets，cron，_transient_doing_cron，_site_transient_update_core，
    // _site_transient_update_plugins，_site_transient_update_themes，_site_transient_timeout_browser_***，_transient_timeout_feed_***,
    // dashboard_widget_options，can_compress_scripts，_transient_is_multi_author，_transient_dash_***, _transient_doing_cron, 
    // _site_transient_timeout_theme_roots，_site_transient_theme_roots，_transient_feed_mod_***,_transient_feed_***，
    // _transient_is_multi_author，_transient_plugin_slugs，_transient_random_seed，_transient_timeout_dash_***，
    // _transient_timeout_plugin_slugs，_transient_timeout_feed_***，_transient_timeout_feed_mod_***
    $number = 1;
    $sql    = "CREATE TABLE IF NOT EXISTS `%s` (
        `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
        `option_name` varchar(64) NOT NULL DEFAULT '' COMMENT '选项名',
        `option_value` longtext NOT NULL COMMENT '值',
        `autoload` varchar(20) NOT NULL DEFAULT 'yes' COMMENT '是否自动载入',
        PRIMARY KEY (`option_id`),
        UNIQUE KEY `option_name` (`option_name`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='网站设置选项表'";

    if ($flag['ytz_options'] == 1)
    {
        hlp_tool::create_table('ytz_options', $sql, $number);
    }
    else if ($flag['ytz_options'] == 2)
    {
        hlp_tool::drop_table('ytz_options', $number);
    }
}

if (!empty($flag['ytz_posts']))
{
    $number = 1;
    $sql    = "CREATE TABLE IF NOT EXISTS `%s` (
            `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章ID',
            `post_author` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
            `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
            `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '格林标准发布时间',
            `post_content` longtext NOT NULL COMMENT '文章内容',
            `post_title` text NOT NULL COMMENT '文章标题',
            `post_excerpt` text NOT NULL COMMENT '摘要，即内容概要',
            `post_status` varchar(20) NOT NULL DEFAULT 'publish' COMMENT '文章状态：inherit：继承；auto-draft：自动草稿；private：私密；publish：公开；future：将来发布；pending： 等待复审；trash：回收站',
            `comment_status` varchar(20) NOT NULL DEFAULT 'open' COMMENT '是否允许评论：open：允许；closed：不允许',
            `ping_status` varchar(20) NOT NULL DEFAULT 'open' COMMENT '是否网络日志：open：允许；closed：不允许',
            `post_password` varchar(20) NOT NULL DEFAULT '' COMMENT '文章密码保护时的密码',
            `post_name` varchar(200) NOT NULL DEFAULT '' COMMENT '文章别名',
            `to_ping` text NOT NULL COMMENT '发送trackback到的地址',
            `pinged` text NOT NULL,
            `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
            `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '格林标准修改时间',
            `post_content_filtered` longtext NOT NULL,
            `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '父亲文章ID',
            `guid` varchar(255) NOT NULL DEFAULT '' COMMENT '全局唯一标示，这里存访问地址',
            `menu_order` int(11) NOT NULL DEFAULT '0' COMMENT '页面排序',
            `post_type` varchar(20) NOT NULL DEFAULT 'post' COMMENT '提交类型：post：post提交方式；attachment：附件；revision：修订版；page：页面',
            `post_mime_type` varchar(100) NOT NULL DEFAULT '' COMMENT '互联网媒体类型：image/jpeg;audio/x-ms-wma;application/msword',
            `comment_count` bigint(20) NOT NULL DEFAULT '0' COMMENT '评论数，评论审核后增加',
            PRIMARY KEY (`ID`),
            KEY `post_name` (`post_name`),
            KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
            KEY `post_parent` (`post_parent`),
            KEY `post_author` (`post_author`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='文章表'";
    
    if ($flag['ytz_posts'] == 1)
    {
        hlp_tool::create_table('ytz_posts', $sql, $number);
    }
    else if ($flag['ytz_posts'] == 2)
    {
        hlp_tool::drop_table('ytz_posts', $number);
    }
}

if (!empty($flag['ytz_postmeta']))
{
    // 额外参数存储，_edit_lock，_edit_last，_pingme，_encloseme，_thumbnail_id，_wp_page_template，
    // _wp_attached_file，_wp_attachment_metadata，_wp_attachment_image_alt
    $number = 1;
    $sql    = "CREATE TABLE IF NOT EXISTS `%s` (
            `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
            `post_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '文章ID',
            `meta_key` varchar(255) DEFAULT NULL COMMENT '参数名',
            `meta_value` longtext COMMENT '参数值',
            PRIMARY KEY (`meta_id`),
            KEY `post_id` (`post_id`),
            KEY `meta_key` (`meta_key`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='文章额外参数表'";

    if ($flag['ytz_postmeta'] == 1)
    {
        hlp_tool::create_table('ytz_postmeta', $sql, $number);
    }
    else if ($flag['ytz_postmeta'] == 2)
    {
        hlp_tool::drop_table('ytz_postmeta', $number);
    }
}

if (!empty($flag['ytz_comments']))
{
    $number = 1;
    $sql    = "CREATE TABLE IF NOT EXISTS `%s` (
            `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论ID',
            `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '评论文章ID',
            `comment_author` tinytext NOT NULL COMMENT '评论者姓名',
            `comment_author_email` varchar(100) NOT NULL DEFAULT '' COMMENT '评论者邮箱',
            `comment_author_url` varchar(200) NOT NULL DEFAULT '' COMMENT '评论者站点',
            `comment_author_IP` varchar(100) NOT NULL DEFAULT '' COMMENT '评论者IP',
            `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '评论时间',
            `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '格林标准评论时间',
            `comment_content` text NOT NULL COMMENT '评论内容',
            `comment_karma` int(11) NOT NULL DEFAULT '0' COMMENT '评论者邮箱',
            `comment_approved` varchar(20) NOT NULL DEFAULT '1' COMMENT '状态：0：未审核，1：已审核，spam：垃圾评论，trash：回收站',
            `comment_agent` varchar(255) NOT NULL DEFAULT '' COMMENT '评论user_agent',
            `comment_type` varchar(20) NOT NULL DEFAULT '',
            `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '父亲评论ID',
            `user_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '评论用户ID，登录情况使用',
            PRIMARY KEY (`comment_ID`),
            KEY `comment_post_ID` (`comment_post_ID`),
            KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
            KEY `comment_date_gmt` (`comment_date_gmt`),
            KEY `comment_parent` (`comment_parent`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='评论表'";

    if ($flag['ytz_comments'] == 1)
    {
        hlp_tool::create_table('ytz_comments', $sql, $number);
    }
    else if ($flag['ytz_comments'] == 2)
    {
        hlp_tool::drop_table('ytz_comments', $number);
    }
}

if (!empty($flag['ytz_commentmeta']))
{
    $number = 1;
    $sql    = "CREATE TABLE IF NOT EXISTS `%s` (
            `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
            `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '评论ID',
            `meta_key` varchar(255) DEFAULT NULL COMMENT '参数名',
            `meta_value` longtext COMMENT '参数值',
            PRIMARY KEY (`meta_id`),
            KEY `comment_id` (`comment_id`),
            KEY `meta_key` (`meta_key`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='评论额外参数表'";

    if ($flag['ytz_commentmeta'] == 1)
    {
        hlp_tool::create_table('ytz_commentmeta', $sql, $number);
    }
    else if ($flag['ytz_commentmeta'] == 2)
    {
        hlp_tool::drop_table('ytz_commentmeta', $number);
    }
}

echo "success" . PHP_EOL;
