<?php session_start(); ?>
<!---削除確認画面の表示--->
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

<div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; width:450px;">

<!---削除確認--->
このコメントを削除します。<br/>
コメント：<?php echo nl2br ($_SESSION['delete_comment']); ?> <br />
<form method ="post" action ="index.php">
<input type="password" name="pass" maxlength="4" value="">
<input type="hidden" name="action" value="delete2">
<input type="submit" value="削除"></form>

<!---パスワードの確認--->

<div style ="color:red"><?php echo $error_msg; ?> </div>


<a href ="index.php">戻る</a>

</div>

<?php
//掲示板部分の表示
require_once 'view_bbs2.php';
?>	
</div>
</div><!-- waku_END -->

</body>
</html>
