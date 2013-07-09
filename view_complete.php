<?php session_start(); ?>
<!---登録完了画面--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>TRANING01_a</title>
</head>
<body  class="back">
    <table>
<h1 class ="title"><?php echo $bbs_name; ?></h1>

<h3><?php echo htmlspecialchars_decode ($_SESSION['user_name'] ,ENT_COMPAT); ?>としてログイン中です。</h3>
<a href ="view_logout.php">ログアウト</a><br />

<div class="comment">

<h3>確認</h3>
<font color ="red">コメントが登録されました。</font>
<a href ="index.php">戻る</a>

</div>
</table>
<?php	
//掲示板部分の表示
require_once 'view_bbs2.php';
?>	

</body>
</html>
