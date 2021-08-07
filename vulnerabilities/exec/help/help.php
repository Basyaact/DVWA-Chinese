<div class="body_padded">
	<h1>Help - Command Injection</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>About</h3>
		<p>T命令注入攻击的目的是在易受攻击的应用程序中注入并执行攻击者指定的命令。在这种情况下，执行不需要的系统命令的应用程序就像一个伪系统命令执行负荷, 攻击者可以将其作为任何授权系统用户使用。但是，使用与web服务相同的权限和环境执行命令.</p>

		<p>命令行注入在大多数情况下，由于缺乏正确的输入数据验证，可能会发生攻击数据有效性, 攻击者可以对其进行利用（例如主页, 页面缓存, HTTP页面标头缓存）.</p>

		<p>不同的操作系统（如Linux）的语法和命令可能不同于其他操作系统和窗口，这取决于它们所特有的命令.</p>

		<p>此攻击也可称为“远程命令执行（RCE）”（远程命令执行=RCE=远程代码执行）.</p>

		<br /><hr /><br />

		<h3>Objective</h3>
		<p>在远程操作下，可以通过远程命令执行来获得系统上的服务信息和主机信息.</p>

		<br /><hr /><br />

		<h3>Low Level</h3>
		<p>这个等级允许直接输入进大多数的<u>PHP方法</u> 可以直接在主机操作系统上执行命令.且有可能脱离预先给出的命令来执行其他命令.</p>
		<p>完成这个需要通过添加到请求, 如果命令成功执行后，请运行此命令：
		<pre>Spoiler: <span class="spoiler">添加一个指令 "&&"</span>. 例如: <span class="spoiler">127.0.0.1 && dir</span>.</pre>

		<br />

		<h3>Medium Level</h3>
		<p>开发人员已经学习了一些关于命令注入的漏洞复现方式，并使用各种模式修补和过滤输入。但这远远不够.</p>
		<p>可以使用各种其他系统的语法来中断执行的命令.</p>
		<pre>Spoiler: <span class="spoiler">例如：挂起ping命令</span>.</pre>

		<br />

		<h3>High Level</h3>
		<p>在这个等级，开发人员重新设计了安全方案，集合了更多方法以填补漏洞。但还是略有缺陷.</p>
		<p>开发人员要么使用过滤器时打错字了，要么相信某个PHP方法是安全的</p>
		<pre>Spoiler: <span class="spoiler"><?php echo dvwaExternalLinkUrlGet( 'https://secure.php.net/manual/en/function.trim.php', 'trim()' ); ?>
			removes all leading & trailing spaces, right?</span>.</pre>

		<br />

		<h3>Impossible Level</h3>
		<p> 在这个级别，安全方式将被全部推倒重做，只允许非常严格的输入。
			如果命令不匹配并且不产生特定的结果，则将不允许执行。与“黑名单”过滤（允许任何输入并删除不需要的内容）不同，这个方式使用“白名单”，仅允许某些值进入
.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>参考: <?php echo dvwaExternalLinkUrlGet( 'https://owasp.org/www-community/attacks/Command_Injection' ); ?></p>
</div>
