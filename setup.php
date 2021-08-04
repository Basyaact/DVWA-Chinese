<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Setup' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'setup';

if( isset( $_POST[ 'create_db' ] ) ) {
	// Anti-CSRF
	if (array_key_exists ("session_token", $_SESSION)) {
		$session_token = $_SESSION[ 'session_token' ];
	} else {
		$session_token = "";
	}

	checkToken( $_REQUEST[ 'user_token' ], $session_token, 'setup.php' );

	if( $DBMS == 'MySQL' ) {
		include_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/DBMS/MySQL.php';
	}
	elseif($DBMS == 'PGSQL') {
		// include_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/DBMS/PGSQL.php';
		dvwaMessagePush( 'PostgreSQL还没有正式支持.' );
		dvwaPageReload();
	}
	else {
		dvwaMessagePush( 'ERROR: 数据库选择错误. 请查看配置文件是否有错误.' );
		dvwaPageReload();
	}
}

// Anti-CSRF
generateSessionToken();

$database_type_name = "Unknown - The site is probably now broken";
if( $DBMS == 'MySQL' ) {
	$database_type_name = "MySQL/MariaDB";
} elseif($DBMS == 'PGSQL') {
	$database_type_name = "PostgreSQL";
}

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>数据库初始化 <img src=\"" . DVWA_WEB_PAGE_TO_ROOT . "dvwa/images/spanner.png\" /></h1>

	<p>点击下方'创建 / 重置数据库' 按钮来重置或者创建数据库.<br />
	如果出现错误请检查你的用户凭证: <em>" . realpath(  getcwd() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.inc.php" ) . "</em></p>

	<p>如果数据库已存在, <em>数据将被清除且新会被重置</em>.<br />
	你也可以使用这个凭证来重设密码(\"<em>admin</em> // <em>password</em>\").</p>
	<hr />
	<br />

	<h2>初始化检查</h2>

	{$SERVER_NAME}<br />
	<br />
	{$DVWAOS}<br />
	<br />
	PHP version: <em>" . phpversion() . "</em><br />
	{$phpDisplayErrors}<br />
	{$phpSafeMode}<br/ >
	{$phpURLInclude}<br/ >
	{$phpURLFopen}<br />
	{$phpMagicQuotes}<br />
	{$phpGD}<br />
	{$phpMySQL}<br />
	{$phpPDO}<br />
	<br />
	Backend database: <em>{$database_type_name}</em><br />
	{$MYSQL_USER}<br />
	{$MYSQL_PASS}<br />
	{$MYSQL_DB}<br />
	{$MYSQL_SERVER}<br />
	{$MYSQL_PORT}<br />
	<br />
	{$DVWARecaptcha}<br />
	<br />
	{$DVWAUploadsWrite}<br />
	{$DVWAPHPWrite}<br />
	<br />
	<br />
	{$bakWritable}
	<br />
	<i><span class=\"failure\">Status in red</span>, indicate there will be an issue when trying to complete some modules.</i><br />
	<br />
	If you see disabled on either <i>allow_url_fopen</i> or <i>allow_url_include</i>, set the following in your php.ini file and restart Apache.<br />
	<pre><code>allow_url_fopen = On
allow_url_include = On</code></pre>
	These are only required for the file inclusion labs so unless you want to play with those, you can ignore them.

	<br /><br /><br />

	<!-- Create db button -->
	<form action=\"#\" method=\"post\">
		<input name=\"create_db\" type=\"submit\" value=\"创建 / 重置数据库\">
		" . tokenField() . "
	</form>
	<br />
	<hr />
</div>";

dvwaHtmlEcho( $page );

?>
