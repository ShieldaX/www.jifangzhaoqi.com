<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'jifang');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', '');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'FUYap5ZEi}{iB7J th~j.ZH!&Iq3E^U{Wdn&#rj2Z6Yr8=9+~#[?|MhCgt:NLdg(');
define('SECURE_AUTH_KEY',  'E|i @:-]c1OJ-W!@@O6jCSG%gD.|M0=TuY=?Y=2gygf~Lv$&jM4dSB&nKXo~^gN1');
define('LOGGED_IN_KEY',    '-3Wo$`5Z!`gbB)bl.HA$oj~zfIdn=_bo%T+mXmk:;ZX8Ls$z6OtuScw^ |~?#?z,');
define('NONCE_KEY',        '=*ocXKruHt;D9A`L~/JW@bM;K#[05p_|mz |diFVBjeWB]^P_HHK^!>@-abad/}L');
define('AUTH_SALT',        'yG)6qdOv&H3%PO3ZS*X {HAIZiA6*5-/|QDlQY` ]X-z47vf5ZkDXZ3DgUm(qNma');
define('SECURE_AUTH_SALT', 'w6aLk^BqeWXRuv~)P2oLs6CQ1#z?P6P|ZrOL->{;J_|z_~kcAS^4P.5C[R-yG7;r');
define('LOGGED_IN_SALT',   'vGM(H4h&^h]l0}-n7o>d|6GPBAi?V7U$Gcy9+f&RI/BLPT*R|xj_FS&G7ti#J)!)');
define('NONCE_SALT',       'A@3jXWT#+}/WKtLYt.z+-s7?>I=uMaKs~jy(cz4g$BiC#,KB4THVuAC4_2ZOTMvM');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
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
