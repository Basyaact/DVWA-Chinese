<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';
require_once DVWA_WEB_PAGE_TO_ROOT . "external/recaptcha/recaptchalib.php";

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Vulnerability: Insecure CAPTCHA' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'captcha';
$page[ 'help_button' ]   = 'captcha';
$page[ 'source_button' ] = 'captcha';

dvwaDatabaseConnect();

$vulnerabilityFile = '';
switch( $_COOKIE[ 'security' ] ) {
	case 'low':
		$vulnerabilityFile = 'low.php';
		break;
	case 'medium':
		$vulnerabilityFile = 'medium.php';
		break;
	case 'high':
		$vulnerabilityFile = 'high.php';
		break;
	default:
		$vulnerabilityFile = 'impossible.php';
		break;
}

$hide_form = false;
require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/captcha/source/{$vulnerabilityFile}";

// Check if we have a reCAPTCHA key
$WarningHtml = '';
if( $_DVWA[ 'recaptcha_public_key' ] == "" ) {
	$WarningHtml = "<div class=\"warning\"><em>reCAPTCHA API密钥未设置或不正确</em> 配置文件地址: " . realpath( getcwd() . DIRECTORY_SEPARATOR . DVWA_WEB_PAGE_TO_ROOT . "config" . DIRECTORY_SEPARATOR . "config.inc.php" ) . "</div>";
	$html = "<em>请到</em> 此网址注册一个reCAPTCHA密钥 " . dvwaExternalLinkUrlGet( 'https://www.google.com/recaptcha/admin/create' );
	$hide_form = true;
}

$page[ 'body' ] .= "
	<div class=\"body_padded\">
	<h1>漏洞：不安全的验证码（Insecure CAPTCHA）</h1>

	{$WarningHtml}

	<div class=\"vulnerable_code_area\">
		<form action=\"#\" method=\"POST\" ";

if( $hide_form )
	$page[ 'body' ] .= "style=\"display:none;\"";

$page[ 'body' ] .= ">
			<h3>更改密码:</h3>
			<br />

			<input type=\"hidden\" name=\"step\" value=\"1\" />\n";

if( $vulnerabilityFile == 'impossible.php' ) {
	$page[ 'body' ] .= "
			原密码:<br />
			<input type=\"password\" AUTOCOMPLETE=\"off\" name=\"password_current\"><br />";
}

$page[ 'body' ] .= "			新密码:<br />
			<input type=\"password\" AUTOCOMPLETE=\"off\" name=\"password_new\"><br />
			二次确认新密码:<br />
			<input type=\"password\" AUTOCOMPLETE=\"off\" name=\"password_conf\"><br />

			" . recaptcha_get_html( $_DVWA[ 'recaptcha_public_key' ] );
if( $vulnerabilityFile == 'high.php' )
	$page[ 'body' ] .= "\n\n			<!-- **DEV NOTE**   Response: 'hidd3n_valu3'   &&   User-Agent: 'reCAPTCHA'   **/DEV NOTE** -->\n";

if( $vulnerabilityFile == 'high.php' || $vulnerabilityFile == 'impossible.php' )
	$page[ 'body' ] .= "\n			" . tokenField();

$page[ 'body' ] .= "
			<br />

			<input type=\"submit\" value=\"Change\" name=\"Change\">
		</form>
		{$html}
	</div>

	<h2>更多参考信息</h2>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'https://en.wikipedia.org/wiki/CAPTCHA' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.google.com/recaptcha/' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Testing_for_Captcha_(OWASP-AT-012)' ) . "</li>
	</ul>
</div>\n";

dvwaHtmlEcho( $page );

?>
