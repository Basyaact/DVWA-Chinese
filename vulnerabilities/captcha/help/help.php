<div class="body_padded">
	<h1>帮助-不安全的验证码</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>简介</h3>
		<p>A <?php echo dvwaExternalLinkUrlGet( 'https://en.wikipedia.org/wiki/CAPTCHA', 'CAPTCHA' ); ?> 验证码是一个可以帮助识别用户是否为机器操作. 你应该会在日常生活中见到它 - 迷惑多彩的图像还有被故意模糊化的文字放在每个网页的注册表格下方，如今验证码被用于大部分网站以防滥用或攻击。
			“机器人”，或某些自动操作脚本被某些恶意分子利用来攻击网站. 没有任何一台计算机能比得上人类去识别这些迷惑性的图片, 所以机器人在验证码的保护下不能分析或者利用网站.</p>

		<p>验证码最常用于保护比较敏感的网站功能防止机器人或脚本攻击. 例如某些功能包含着用户的注册信息或者变更日志,
			密码变更日志和提交的内容. 在这个实例中, 验证码保护着更换用户密码的功能. 但这仅对CSRF（跨站请求伪造）和机器人猜解提供有限的防护.</p>

		<br /><hr /><br />

		<h3>目标</h3>
		<p>你的目标是用自动化的脚本方法来尝试在一个不安全的验证码系统下更改用户的密码.</p>

		<br /><hr /><br />

		<h3>Low Level（低安全等级）</h3>
		<p>这个等级的验证码可以轻易地绕过. 开发者假设所有用户都通过这个网页来完成验证并更改密码，然后跳转到下一个网页，此时密码已经更新。通过将新密码直接提交到更改页面，攻击者就可以绕过验证码系统.</p>

		<p>在低安全性条件下完成此挑战所需的参数或方法函数与以下类似:</p>
		<pre>Spoiler: <span class="spoiler">?step=2&password_new=password&password_conf=password&Change=Change</span>.</pre>

		<br />

		<h3>Medium Level（中等安全等级）</h3>
		<p>开发人员会试图在会话周围进行声明，并跟踪用户是否成功完成了会话中提交数据前的验证码。因为这个状态变量 (Spoiler: <span class="spoiler">passed_captcha</span>) 在连接端,
		它也可以像这样被攻击者利用:</p>
		<pre>Spoiler: <span class="spoiler">?step=2&password_new=password&password_conf=password&passed_captcha=true&Change=Change</span>.</pre>

		<br />

		<h3>高安全等级</h3>
		<p>这个等级已经有了遗留的开发代码并且没有在项目中被移除过，可尝试模仿开发值，用于无法将无效值填入验证码中.</p>
		<p>你可能需要更改你的user-agent来达到欺骗的目的 (Spoiler: <span class="spoiler">reCAPTCHA</span>) 并且能获取到
			(Spoiler: <span class="spoiler">hidd3n_valu3</span>) 值来绕过验证码.</p>

		<br />

		<h3>困难安全等级</h3>
		<p>在这个等级中, 开发者会尝试阻止一切攻击途径。该过程已简化，因此数据和验证码验证只需一步. 或者，开发者可以移动状态变量服务器端（从中等难度），因此用户无法更改它.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Reference: <?php echo dvwaExternalLinkUrlGet( 'https://en.wikipedia.org/wiki/CAPTCHA' ); ?></p>
</div>
