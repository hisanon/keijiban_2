<?php session_start(); ?>
<!---削除確認画面--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>TRANING01_a</title>
</head>
<body>
<div id="waku">
<div id="sample-title"><h1>TRANING02</h1></div>

<div class="sample-contents">
<h2>掲示板</h2><h3><?php echo htmlspecialchars_decode ($_SESSION['user_name'] ,ENT_COMPAT); ?>としてログイン中です。</h3>
<a href ="view_logout.php">ログアウト</a><br />


<div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; width :450;">

<h3>確認</h3>
<div style ="color:red"><?php echo $master_msg.'<br/>';?></div>
<font color ="red">コメントが削除されました。</font>
<a href ="index.php">戻る</a>

</div>
</div>
<?php
//掲示板部分の表示
require_once 'view_bbs2.php';
?>	
</sdiv><!-- waku_END -->

</body>
</html>
