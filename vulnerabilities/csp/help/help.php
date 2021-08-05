<div class="body_padded">
	<h1>Help - Content Security Policy (CSP) Bypass</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>关于</h3>
		<p>内容安全策略用于定义可以从何处加载或执行脚本或其他资源。本模块将根据开发者留下的常见错误引导您绕过此方法
.</p>
		<p>这些漏洞都不是CSP中的实际漏洞，它们是CSP启用中的漏洞.</p>

		<br /><hr /><br />

		<h3>Objective</h3>
		<p>绕过内容安全策略（CSP）并在页面中执行JavaScript.</p>

		<br /><hr /><br />

		<h3>低安全水平</h3>
		<p>检查策略以查找可用于继承外部脚本文件的所有源.</p>
		<pre>Spoiler: <span class="spoiler">脚本可以从Pastebin或Hastebin中找到，尝试在其中存储一些JavaScript方式，然后将其加载。
.</span></pre>

		<br />

		<h3>中等安全级别</h3>
		<p>CSP策略尝试使用临时造的来防止攻击者添加内联脚本.</p>
		<pre>Spoiler: <span class="spoiler">检查任意或非重复的随机数值并观察变化（或不变化）.</span></pre>

		<br />

		<h3>High Level</h3>
		<p>页面对source/JSONP.php-4进行JSONP调用，然后将函数名传递给脚本用于调用，您需要修改JSONP.php脚本以更改回调函数.</p>
		<pre>Spoiler: <span class="spoiler">页面上的JavaScript将执行页面返回的任何内容，将其更改为您自己的代码将执行该代码</span></pre>

		<br />

		<h3>困难安全等级</h3>
		<p>
		此级别是最困难的提升，其中JSONP调用具有硬编码的回调函数，并且CSP策略被锁定为仅允许加载外部脚本.
		</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Reference: <?php echo dvwaExternalLinkUrlGet( 'https://content-security-policy.com/', "Content Security Policy Reference" ); ?></p>
	<p>Reference: <?php echo dvwaExternalLinkUrlGet( 'https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP', "Mozilla Developer Network - CSP: script-src"); ?></p>
	<p>Reference: <?php echo dvwaExternalLinkUrlGet( 'https://blog.mozilla.org/security/2014/10/04/csp-for-the-web-we-have/', "Mozilla Security Blog - CSP for the web we have" ); ?></p>
</div>
