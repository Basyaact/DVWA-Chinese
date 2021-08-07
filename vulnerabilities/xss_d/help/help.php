<div class="body_padded">
	<h1>Help - Cross Site Scripting (DOM Based)</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>About</h3>
		<p>"跨站脚本攻击(XSS)" 是一个注入类的通用漏洞, 典型的例子是恶意脚本被注入到其他的可信的网站来实现本站的攻击（盗用cookie等），具有隐蔽性强，发起容易的特点.
		XSS攻击通常指的是通过利用网页开发时留下的漏洞，通过巧妙的方法注入恶意指令代码到网页，使用户加载并执行攻击者恶意
		制造的网页程序。这些恶意网页程序通常是JavaScript，但实际上也可以包括Java、 VBScript、ActiveX、 Flash 或者甚至是
		普通的HTML。攻击成功后，攻击者可能得到包括但不限于更高的权限（如执行一些操作）、私密网页内容、会话和cookie等各种内容.</p>

		<p>攻击者可以使用XSS来发送恶意脚本到一个受害用户上。终端用户的浏览器不可能检测得到这个恶意脚本是不可信的，
			并且可以执行js脚本。原理是浏览器觉得这个脚本来源是安全的，恶意的脚本可以访问其他任何的cookies缓存，会话token或其他存在你浏览器上此网页的敏感内容，这种脚本甚至可以覆写HTML网页上的内容.</p>

		<p>基于DOM的XSS是一个特例，其中js脚本隐藏在URL链接中，并在用户请求页面时由Javascript从页面中调用，而不是在提供服务时嵌入进页面中。这个会使比其他攻击方式更加隐蔽且WAF或其他读取页面正文的保护措施不会察觉任何痕迹</p>

		<p><hr /></p>

		<h3>Objective</h3>
		<p>你的任务是在其他用户浏览器上运行js恶意脚本，偷取已登陆用户的cookies。</p>

		<p><hr /></p>

		<h3>Low Level</h3>
		<p>这个等级里不会检查输入的请求，在嵌入之前将其包含到输出文本中</p>
		<pre>Spoiler: <span class="spoiler"><?=htmlentities ("/vulnerabilities/xss_d/?default=English<script>alert(1)</script>")?></span>.</pre>

		<p><br /></p>

		<h3>Medium Level</h3>
		<p>开发者尝试加入一个模式匹配来删除“@lt;脚本”功能来禁用任何Javascript方式</p>
		<pre>Spoiler: <span class="spoiler">您必须首先跳出select块，然后才能添加带有onerror事件的图像:<br />
<?=htmlentities ("/vulnerabilities/xss_d/?default=English>/option></select><img src='x' onerror='alert(1)'>");?></span>.</pre>

		<p><br /></p>

		<h3>High Level</h3>
		<p>在这个等级的开发人员现在只列出了允许的语言，您必须找到一种方法来运行代码，而不必将其发送到服务器.</p>
		<pre>Spoiler: <span class="spoiler">URL的片段部分（在#符号之后的内容）不会发送到服务器，因此无法阻止。用于呈现页面的错误JavaScript在创建页面时从中读取内容。<br />
<?=htmlentities ("/vulnerabilities/xss_d/?default=English#<script>alert(1)</script>")?></span>.</pre>

		<p><br /></p>

		<h3>Impossible Level</h3>
		<p>在这个等级的默认情况下，大多数浏览器都会对URL中的内容进行编码，以防止执行任何注入的JavaScript脚本.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Reference: <?php echo dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)' ); ?></p>
</div>
