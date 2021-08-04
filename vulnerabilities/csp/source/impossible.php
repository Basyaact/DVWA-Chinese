<?php

$headerCSP = "Content-Security-Policy: script-src 'self';";

header($headerCSP);

?>
<?php
if (isset ($_POST['include'])) {
$page[ 'body' ] .= "
	" . $_POST['include'] . "
";
}
$page[ 'body' ] .= '
<form name="csp" method="POST">
	<p>这不同于高等级, 这里用了JSONP call函数但没有用到callback函数, 替换硬编码来请求.</p><p>CSP设置只允许内部JS在本地服务器上运行且没有内联代码.</p>
	<p>1+2+3+4+5=<span id="answer"></span></p>
	<input type="button" id="solve" value="求和" />
</form>

<script src="source/impossible.js"></script>
';

