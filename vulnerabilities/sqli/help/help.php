<div class="body_padded">
	<h1>Help - SQL Injection</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>About</h3>
		<p>数据库注入 攻击包括插入或“注入”数据库语句查询通过从客户端到应用程序的输入数据。成功的SQL注入攻击可以从数据库读取敏感数据、修改数据库数据（插入/更新/删除）、执行管理(管理级） 数据库上的操作例如关闭数据
			库管理系统, 恢复数据库管理系统文件系统（load_file）上给定文件的内容，并在某些情况下向操作系统发出命令.</p>

		<p>数据库注入攻击是一种注入攻击，其中数据库命令被注入数据平面输入，以实现预定义数据库命令.</p>

		<p>这种攻击也可以称为SQLi.</p>

		<br /><hr /><br />

		<h3>Objective</h3>
		<p>数据库中有5个用户，id为从1到5。你的任务...通过SQL注入窃取密码.</p>

		<br /><hr /><br />

		<h3>Low Level</h3>
		<p>数据库语句查询使用由攻击者直接控制的原始输入。他们所需要做的就是逃避查询，然后就可以执行他们想要的任何数据库语句查询.</p>
		<pre>Spoiler: <span class="spoiler">?id=a' UNION SELECT "text1","text2";-- -&Submit=Submit</span>.</pre>

		<br />

		<h3>Medium Level</h3>
		<p>中等保护等级使用一种数据库注入保护形式，具有
			"<?php echo dvwaExternalLinkUrlGet( 'https://secure.php.net/manual/en/function.mysql-real-escape-string.php', 'mysql_real_escape_string()' ); ?>"功能.
			但是，由于数据库语句查询的参数周围没有引号，这不能完全保护查询不被更改.</p>

		<p>文本框已被预定义的下拉列表替换，并使用POST提交表单.</p>
		<pre>Spoiler: <span class="spoiler">?id=a UNION SELECT 1,2;-- -&Submit=Submit</span>.</pre>

		<br />

		<h3>High Level</h3>
		<p>与低安全级别非常相似，但是这次攻击者以不同的方式输入值。使用另一个页面通过会话变量将输入值传输到易受攻击的查询，而不是直接的获取请求.</p>
		<pre>Spoiler: <span class="spoiler">ID: a' UNION SELECT "text1","text2";-- -&Submit=Submit</span>.</pre>

		<br />

		<h3>Impossible Level</h3>
		<p>这些查询现在是参数化的查询(不是动态的)。意思是查询方式已经由开发人员定义，并且已经区分了哪些部分是代码，其余部分是数据.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>参考: <?php echo dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/SQL_Injection' ); ?></p>
</div>
