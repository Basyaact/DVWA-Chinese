<div class="body_padded">
	<h1>Help - Cross Site Request Forgery (CSRF)</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>About</h3>
		<p>跨站脚本请求伪造是一种攻击，它可强制终端用户在其当前已通过身份验证的页面上执行恶意操作。并利用社会工程学（例如通过电子邮件/聊天来发送链接），攻击者可能会强制用户执行攻击者所选择的操作</p>

		<p>一个成功的CSRF攻击可以使用户的数据破坏或者泄漏并进行恶意操作，如果攻击目标为管理员账户，可能会危及整个网站安全。</p>

		<p>这种攻击也称为“XSRF（CSRF又名XSRF跨站脚本请求伪造），类似于XSS（XSS=跨站脚本攻击），一般考虑一起使用.</p>

		<br /><hr /><br />

		<h3>Objective</h3>
		<p>您的任务是使用跨站脚本请求伪造攻击让当前用户改变密码，并且不让管理员查出痕迹.</p>

		<br /><hr /><br />

		<h3>Low Level</h3>
		<p>没有任何保护措施可以免于被此攻击方式攻击。意味着可以创建一个链接来实现特定的操作（在本例中，我们需要更改当前用户的密码）。然后，通过一些基本的社会工程学，让目标用户点击该链接（或只是访问某个页面），以触发该操作</p>
		<pre>Spoiler: <span class="spoiler">?password_new=password&password_conf=password&Change=Change</span>.</pre>

		<br />

		<h3>Medium Level</h3>
		<p>对于此等级，需要检查最后一次的请求的来自何处。开发人员认为，如果它与当前域名或网站匹配，那么它肯定是来自安全的页面，这样才会被信任</p>
		<p>可能需要使用多个漏洞方式以利用此攻击方法, 例如反射型跨站脚本攻击（Reflected XSS）.</p>

		<br />

		<h3>High Level</h3>
		<p>在此等级中开发人员添加了“CSRF令牌”. 为了绕过此保护措施，可能会需要另一个攻击方式。</p>
		<pre>Spoiler: <span class="spoiler">例如，Javascript是在客户端浏览器（前端）中执行的脚本</span>.</pre>

		<br />

		<h3>Impossible Level</h3>
		<p>在此级别中，挑战将达到高的安全级别，并请求当前用户的密码。因为这是无法察觉的（只能预测或爆破），并且这里没有隐藏的漏洞利用方式</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>参考: <?php echo dvwaExternalLinkUrlGet( 'https://owasp.org/www-community/attacks/csrf' ); ?></p>
</div>
