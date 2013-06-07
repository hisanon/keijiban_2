<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>TRANING01_a</title>
</head>
<body>
<div id="waku">
<div id="sample-title"><h1>TRANING02</h1></div>

<div class="sample-contents">
<h2>掲示板</h2>

<div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; width :450;">

<?php
//ページ上部の表示
require_once 'controll.php';
?>

</div>
<table border="1" width="500" cellspacing="0" cellpadding="5">
	<tr>
	<th width="100">時間</th><th width="100">投稿者</th><th width="500">コメント</th><th width="20">削除</th>
	</tr>
		
<?php
//掲示板部分の表示
require_once 'controll_bbs.php';

?>	
</table>
</div>
</div><!-- waku_END -->

</body>
</html>
