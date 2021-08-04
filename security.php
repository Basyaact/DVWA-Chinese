<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'DVWA Security' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'security';

$securityHtml = '';
if( isset( $_POST['seclev_submit'] ) ) {
	// Anti-CSRF
	checkToken( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], 'security.php' );

	$securityLevel = '';
	switch( $_POST[ 'security' ] ) {
		case 'low':
			$securityLevel = 'low';
			break;
		case 'medium':
			$securityLevel = 'medium';
			break;
		case 'high':
			$securityLevel = 'high';
			break;
		default:
			$securityLevel = 'Impossible';
			break;
	}

	dvwaSecurityLevelSet( $securityLevel );
	dvwaMessagePush( "安全等级已设为 {$securityLevel}" );
	dvwaPageReload();
}

if( isset( $_GET['phpids'] ) ) {
	switch( $_GET[ 'phpids' ] ) {
		case 'on':
			dvwaPhpIdsEnabledSet( true );
			dvwaMessagePush( "PHPIDS已开启" );
			break;
		case 'off':
			dvwaPhpIdsEnabledSet( false );
			dvwaMessagePush( "PHPIDS已关闭" );
			break;
	}

	dvwaPageReload();
}

$securityOptionsHtml = '';
$securityLevelHtml   = '';
foreach( array( 'low', 'medium', 'high', 'Impossible' ) as $securityLevel ) {
	$selected = '';
	if( $securityLevel == dvwaSecurityLevelGet() ) {
		$selected = ' selected="selected"';
		$securityLevelHtml = "<p>安全等级已设为: <em>$securityLevel</em>.<p>";
	}
	$securityOptionsHtml .= "<option value=\"{$securityLevel}\"{$selected}>" . ucfirst($securityLevel) . "</option>";
}

$phpIdsHtml = 'PHPIDS已经: ';

// Able to write to the PHPIDS log file?
$WarningHtml = '';

if( dvwaPhpIdsIsEnabled() ) {
	$phpIdsHtml .= '<em>开启</em>. [<a href="?phpids=off">关闭PHPIDS</a>]';

	# Only check if PHPIDS is enabled
	if( !is_writable( $PHPIDSPath ) ) {
		$WarningHtml .= "<div class=\"warning\"><em>无法写入PHPID日志文件</em>: ${PHPIDSPath}</div>";
	}
}
else {
	$phpIdsHtml .= '<em>关闭</em>. [<a href="?phpids=on">开启PHPIDS</a>]';
}

// Anti-CSRF
generateSessionToken();

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>DVWA 安全等级设置 <img src=\"" . DVWA_WEB_PAGE_TO_ROOT . "dvwa/images/lock.png\" /></h1>
	<br />

	<h2>安全等级</h2>

	{$securityHtml}

	<form action=\"#\" method=\"POST\">
		{$securityLevelHtml}
		<p>您可以将安全级别设置为低、中、高或困难。安全等级为DVWA的漏洞级别:</p>
		<ol>
			<li> low（低） - 这个等级是完全可以轻易地利用漏洞 <em>没有任何安全性可言</em>. 它的用途是作为web应用程序漏洞如何通过糟糕的代码实践表现出来的示例，并作为传授或学习基本利用漏洞技术的平台.</li>
			<li> Medium（中）- 此设置主要是给一个实例如 <em>安全技术不过关的用户</em>, 开发人员已尝试保护应用程序，但失败。它还对用户提出了挑战，要求他们改进其利用漏洞技术.</li>
			<li> High（高） - 此选项是中等难度的扩展，混合了 <em>更难的或替代性的错误</em> 错误做法来尝试保护代码。该漏洞可能不允许相同程度的利用，类似于各种CTF竞赛.</li>
			<li> Impossible（困难） - 这个级别应该对<em>所有漏洞都是安全的</em>。它用于比较易受攻击的源代码和安全源代码。
				 在DVWA v1.9之前，该级别称为“高”<br />
				 .</li>
		</ol>
		<select name=\"security\">
			{$securityOptionsHtml}
		</select>
		<input type=\"submit\" value=\"提交\" name=\"seclev_submit\">
		" . tokenField() . "
	</form>

	<br />
	<hr />
	<br />

	<h2>PHPIDS</h2>
	{$WarningHtml}
	<p>" . dvwaExternalLinkUrlGet( 'https://github.com/PHPIDS/PHPIDS', 'PHPIDS' ) . " v" . dvwaPhpIdsVersionGet() . " （PHP入侵检测系统）是基于PHP的web应用程序的安全层.</p>
	<p>PHPIDS的工作原理是根据潜在恶意代码黑名单过滤任何用户提供的输入。它在DVWA中用作Web应用程序防火墙（WAF）如何帮助提高安全性以及在某些情况下如何规避WAF的实例.</p>
	<p>您可以在会话期间在此站点上启用PHPIDS.</p>

	<p>{$phpIdsHtml}</p>
	[<a href=\"?test=%22><script>eval(window.name)</script>\">模拟攻击</a>] -
	[<a href=\"ids_log.php\">查看IDs日志</a>]
</div>";

dvwaHtmlEcho( $page );

?>
