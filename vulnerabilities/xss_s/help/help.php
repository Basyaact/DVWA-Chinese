<div class="body_padded">
	<h1>Help - Cross Site Scripting (Stored)</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<p>"跨站脚本攻击(XSS)" 是一个注入类的通用漏洞, 典型的例子是恶意脚本被注入到其他的可信的网站来实现本站的攻击（盗用cookie等），具有隐蔽性强，发起容易的特点.
		XSS攻击通常指的是通过利用网页开发时留下的漏洞，通过巧妙的方法注入恶意指令代码到网页，使用户加载并执行攻击者恶意
		制造的网页程序。这些恶意网页程序通常是JavaScript，但实际上也可以包括Java、 VBScript、ActiveX、 Flash 或者甚至是
		普通的HTML。攻击成功后，攻击者可能得到包括但不限于更高的权限（如执行一些操作）、私密网页内容、会话和cookie等各种内容</p>

		<p>攻击者可以使用XSS来发送恶意脚本到一个受害用户上。终端用户的浏览器不可能检测得到这个恶意脚本是不可信的， 并且可以执行js脚本。原理是浏览器
			觉得这个脚本来源是安全的，恶意的脚本可以访问其他任何的cookies缓存，会话token或其他存在你浏览器上此网页的敏感内容，这种脚本甚至可以
			覆写HTML网页上的内容.</p>

		<p>存储型XSS会被储存到数据库，这种类型的XSS是永久性的，除非数据库重置或攻击载荷被手动删除.</p>

		<br /><hr /><br />

		<h3>Objective</h3>
		<p>你的任务是将每个用户重定向到你想要的页面.</p>

		<br /><hr /><br />

		<h3>Low Level</h3>
		<p>这个等级里不会检查输入的请求，在嵌入之前将其包含到输出文本中.</p>
		<pre>Spoiler: <span class="spoiler">名称或消息字段: &lt;script&gt;alert("XSS");&lt;/script&gt;</span>.</pre>

		<br />

		<h3>Medium Level</h3>
		<p>在这个等级中开发者添加了一些保护措施，但并没有每一个可利用的地方都加了。</p>
		<pre>Spoiler: <span class="spoiler">name field: &lt;sCriPt&gt;alert("XSS");&lt;/sCriPt&gt;</span>.</pre>

		<br />

		<h3>High Level</h3>
		<p>开发人员相信他们已经通过删除"&lt;s*c*r*i*p*t"方式禁用了所有脚本使用.</p>
		<pre>Spoiler: <span class="spoiler">HTML events</span>.</pre>

		<br />

		<h3>Impossible Level</h3>
		<p>内置PHP函数在此等级中被使用 (例如"<?php echo dvwaExternalLinkUrlGet( 'https://secure.php.net/manual/en/function.htmlspecialchars.php', 'htmlspecialchars()' ); ?>"),
			此方法可以避免任何会改变输入行为的值.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>参考: <?php echo dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)' ); ?></p>
</div>
