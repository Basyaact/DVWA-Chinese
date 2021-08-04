<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Welcome' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'home';

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>欢迎来到DVWA漏洞环境!</h1>
	<h2>汉化作者：@Basyaact,github:https://github.com/Basyaact</h2>
	<p>DVWA是一个非常易受攻击的PHP/MySQL Web应用程序。其主要目标是帮助安全专业人员在法律环境中测试他们的技能和工具，帮助web开发人员更好地理解保护web应用程序的过程，并帮助学生和教师在受控教室环境中学习web应用程序安全.</p>
	<p>DVWA的目标是 <em>练习一些最常见的web漏洞</em>, 有着<em>不同的难度</em>, 并具有简单直观的界面.</p>
	<hr />
	<br />

	<h2>通用介绍</h2>
	<p>这取决于用户如何利用DVWA。通过在每个级别上完成每个模块，或者选择任何模块并在进入下一个模块之前达到最高级别。没有固定的对象来完成一个模块；但是，用户应该感到，他们已经通过使用该特定漏洞成功地尽可能地利用了系统.</p>
	<p>请注意, 这里有 <em>存在记录和未记录的漏洞</em> 在这个系统中. 这是故意的。我们鼓励您尝试并发现尽可能多的漏洞.</p>
	<p>DVWA还包括一个Web应用程序防火墙（WAF），PHPIDS，可在任何阶段启用，以进一步增加难度。并演示添加另一个安全层如何阻止某些恶意操作。注意，还有各种绕过这些保护的大众方法（因此这可以被视为更高级用户的扩展）!</p>
	<p>每个页面底部都有一个帮助按钮，允许您查看该漏洞的提示和提示。此外，还有其他链接可供进一步背景阅读，这些链接与该安全问题有关（未汉化）.</p>
	<hr />
	<br />

	<h2>警告！！！！！!</h2>
	<p>DVWA全是漏洞！！ <em>不要将其上传到主机提供商的公共html文件夹或任何面向公网的服务器</em>, 因为不怀好心的人会发现并利用漏洞。建议使用虚拟机 (例如 " . dvwaExternalLinkUrlGet( 'https://www.virtualbox.org/','VirtualBox' ) . " 或 " . dvwaExternalLinkUrlGet( 'https://www.vmware.com/','VMware' ) . "), 并设置为NAT网络模式. 在虚拟机里面, 你才可以下载和使用 ；" . dvwaExternalLinkUrlGet( 'https://www.apachefriends.org/en/xampp.html','XAMPP' ) . " 这个是提供互联网服务和数据库服务的网站.</p>
	<br />
	<h3>免责声明</h3>
	<p>我们不对任何人使用此应用程序（DVWA）的方式负责。我们已清楚说明使用目的，不应恶意使用。并已经发出警告，并采取措施防止用户在实时web服务器上安装DVWA。如果您的web服务器因安装DVWA而中招，则我们不承担责任，而是由上传和安装DVWA的人员负责.</p>
	<hr />
	<br />

	<h2>更多用于训练的项目</h2>
	<p>DVWA旨在覆盖当今web应用程序中最常见的漏洞。然而，web应用程序还有很多其他问题。如果您希望探索任何其他攻击方式，或者想要更困难的挑战，您可能希望研究以下其他项目:</p>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'https://github.com/webpwnized/mutillidae', 'Mutillidae') . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/OWASP_Broken_Web_Applications_Project', 'OWASP Broken Web Applications Project
') . "</li>
	</ul>
	<hr />
	<br />
</div>";

dvwaHtmlEcho( $page );

?>
