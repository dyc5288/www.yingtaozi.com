<?php
/**
 * WordPress基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL设置、数据库表名前缀、密钥、
 * WordPress语言设定以及ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑wp-config.php}Codex页面。MySQL设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'yingtaozi');

/** MySQL数据库用户名 */
define('DB_USER', 'yingtaozi');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'yingtaozi');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'uPt8(T!{^t>X;rQ_1wcz0qetoFtVQ00<SMeJ$U,C-K@5ui?|*GA Q<f6De5rX8b<');
define('SECURE_AUTH_KEY',  '0LOh1(iXO#@C>Ufu%J]a}7ZdL3t;2E6-YttPuiZGm;1r=MKwA{Z3!L.&E4iF_67*');
define('LOGGED_IN_KEY',    'EAd+p:-VY9[kIYd,}mIAqMw>]V fug4-mC@d&e6A(~I+`vg-cfi@B:qDx9sgAG@t');
define('NONCE_KEY',        '#X]_|)ul!fozs|?TLr%`]}@z@0}rs= : pw.R$O<6I%ebkLBHxa&_:?.dH#H?/:#');
define('AUTH_SALT',        'tM-uZ!6WPOh7Oppnnl8$?Nap^Gm^^%XYyvaS<Ns--s]mLRA,}Y[C+5A40}LY+RU?');
define('SECURE_AUTH_SALT', 'Him|o}oVC[w:Sdt84;|5swPn*|{;5}IBA=WeIh<&?%K^oJn#ZTEYh1CmEn/R|K-&');
define('LOGGED_IN_SALT',   'Ba51?+6gZ+z={iY#I7FEO!+oz2Gz]C8#[AhIRP?-QcPQi_=j?C,I5$]Tba&kE50T');
define('NONCE_SALT',       'DP[]Fa%;<^;]j)I+kCL>d|WUW,td]]f3Zvi||/*2m1+`kYD%;<<tFTt@RblGocV|');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'ytz_';

/**
 * WordPress语言设置，中文版本默认为中文。
 *
 * 本项设定能够让WordPress显示您需要的语言。
 * wp-content/languages内应放置同名的.mo语言文件。
 * 例如，要使用WordPress简体中文界面，请在wp-content/languages
 * 放入zh_CN.mo，并将WPLANG设为'zh_CN'。
 */
define('WPLANG', 'zh_CN');

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
