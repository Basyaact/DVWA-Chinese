<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Vulnerability: JavaScript Attacks' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'javascript';
$page[ 'help_button' ]   = 'javascript';
$page[ 'source_button' ] = 'javascript';

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

$message = "";
// Check whwat was sent in to see if it was what was expected
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (array_key_exists ("phrase", $_POST) && array_key_exists ("token", $_POST)) {

		$phrase = $_POST['phrase'];
		$token = $_POST['token'];

		if ($phrase == "success") {
			switch( $_COOKIE[ 'security' ] ) {
				case 'low':
					if ($token == md5(str_rot13("success"))) {
						$message = "<p style='color:red'>干得不错!</p>";
					} else {
						$message = "<p>无效的token.</p>";
					}
					break;
				case 'medium':
					if ($token == strrev("XXsuccessXX")) {
						$message = "<p style='color:red'>干得不错!</p>";
					} else {
						$message = "<p>无效的token.</p>";
					}
					break;
				case 'high':
					if ($token == hash("sha256", hash("sha256", "XX" . strrev("success")) . "ZZ")) {
						$message = "<p style='color:red'>干得不错!</p>";
					} else {
						$message = "<p>无效的token.</p>";
					}
					break;
				default:
					$vulnerabilityFile = 'impossible.php';
					break;
			}
		} else {
			$message = "<p>词语输入有误.</p>";
		}
	} else {
		$message = "<p>无法找到字符或token.</p>";
	}
}

if ( $_COOKIE[ 'security' ] == "impossible" ) {
$page[ 'body' ] = <<<EOF
<div class="body_padded">
	<h1>漏洞: JS攻击（JavaScript Attacks）</h1>

	<div class="vulnerable_code_area">
	<p>
	你永远不能相信来自用户的任何东西，也不能阻止他们弄乱它，因此没有困难级别.
	</p>
EOF;
} else {
$page[ 'body' ] = <<<EOF
<div class="body_padded">
	<h1>漏洞: JS攻击（JavaScript Attacks）</h1>

	<div class="vulnerable_code_area">
	<p>
		提交 "success" 去取得胜利.
	</p>

	$message

	<form name="low_js" method="post">
		<input type="hidden" name="token" value="" id="token" />
		<label for="phrase">输入字符</label> <input type="text" name="phrase" value="更改我" id="phrase" />
		<input type="submit" id="send" name="send" value="提交" />
	</form>
EOF;
}

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/javascript/source/{$vulnerabilityFile}";

$page[ 'body' ] .= <<<EOF
	</div>
EOF;

$page[ 'body' ] .= "
	<h2>更多参考信息</h2>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.w3schools.com/js/' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.youtube.com/watch?v=cs7EQdWO5o0&index=17&list=WL' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://ponyfoo.com/articles/es6-proxies-in-depth' ) . "</li>
	</ul>
	<p><i>模块开发者： <a href='https://twitter.com/digininja'>Digininja</a>.</i></p>
</div>\n";

dvwaHtmlEcho( $page );

?>
