<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'About' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'about';

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h2>About</h2>
	<p>DVWA是一个非常易受攻击的PHP/MySQL Web应用程序。其主要目标是帮助安全专业人员在法律环境中测试他们的技能和工具，帮助web开发人员更好地理解保护web应用程序的过程，并帮助学生和教师在受控教室环境中学习web应用程序安全</p>
	<p>Pre-August 2020, All material is copyright 2008-2015 RandomStorm & Ryan Dewhurst.</p>
	<p>Ongoing, All material is copyright Robin Wood and probably Ryan Dewhurst.</p>

	<h2>链接</h2>
	<ul>
		<li>主页: " . dvwaExternalLinkUrlGet( 'http://www.dvwa.co.uk/' ) . "</li>
		<li>项目主页: " . dvwaExternalLinkUrlGet( 'https://github.com/digininja/DVWA' ) . "</li>
		<li>Bug反馈: " . dvwaExternalLinkUrlGet( 'https://github.com/digininja/DVWA/issues' ) . "</li>
		<li>维基百科: " . dvwaExternalLinkUrlGet( 'https://github.com/digininja/DVWA/wiki' ) . "</li>
	</ul>

	<h2>贡献者</h2>
	<ul>
		<li>Brooks Garrett: " . dvwaExternalLinkUrlGet( 'http://brooksgarrett.com/','www.brooksgarrett.com' ) . "</li>
		<li>Craig</li>
		<li>g0tmi1k: " . dvwaExternalLinkUrlGet( 'https://blog.g0tmi1k.com/','g0tmi1k.com' ) . "</li>
		<li>Jamesr: " . dvwaExternalLinkUrlGet( 'https://www.creativenucleus.com/','www.creativenucleus.com' ) . "</li>
		<li>Jason Jones</li>
		<li>RandomStorm</li>
		<li>Ryan Dewhurst: " . dvwaExternalLinkUrlGet( 'https://wpscan.com/','wpscan.com' ) . "</li>
		<li>Shinkurt: " . dvwaExternalLinkUrlGet( 'http://www.paulosyibelo.com/','www.paulosyibelo.com' ) . "</li>
		<li>Tedi Heriyanto: " . dvwaExternalLinkUrlGet( 'http://tedi.heriyanto.net/','tedi.heriyanto.net' ) . "</li>
		<li>Tom Mackenzie</li>
		<li>Robin Wood: " . dvwaExternalLinkUrlGet( 'https://digi.ninja/','digi.ninja' ) . "</li>
		<li>Zhengyang Song: " . dvwaExternalLinkUrlGet( 'https://github.com/songzy12/','songzy12' ) . "</li>
	</ul>
	<ul>
		<li>PHPIDS - Copyright (c) 2007 " . dvwaExternalLinkUrlGet( 'http://github.com/PHPIDS/PHPIDS', 'PHPIDS 团队' ) . "</li>
	</ul>

	<h2>条款</h2>
	<p>是一个免费开源的软件：你可以在GPL-3协议下使用或更改它用于发布免费软件，或者根据你的意向使用其他的版本</p>
	<p>已包含PHPIDS库, 真诚的使用此发行版, PHPIDS 的操作是在没有 DVWA 团队支持的情况下提供的。 它是根据 <a href=\"" . DVWA_WEB_PAGE_TO_ROOT . "instructions.php?doc=PHPIDS-license\">separate terms</a> 条款来完成dvwa的代码.</p>

	<h2>Development</h2>
	<p>每个人都可以为DVWA更好的成功做贡献. 每一个贡献者的名字和他们的主页都能在贡献者名单上出现(如果他们愿意的话). 贡献者可以在DVWA主项目里选择一个Issue然后提交Issue List.</p>
</div>\n";

dvwaHtmlEcho( $page );

exit;

?>
