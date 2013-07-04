<?php session_start(); ?>
<!---書き込み確認画面--->
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
<h3><?php echo  htmlspecialchars_decode($_SESSION['user_name'] ,ENT_COMPAT); ?>としてログイン中です。</h3>
<a href ="view_logout.php">ログアウト</a><br />


<div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; width:450px;">

<!---書き込み内容--->
　名前　：<?php echo  htmlspecialchars_decode ( $_SESSION['user_name'] ,ENT_COMPAT); ?> <br />
コメント：<?php echo nl2br ( htmlspecialchars_decode ( $comment ,ENT_COMPAT)); ?> <br />
<?php if(!empty($image_name)){
					 $image_path = upload_image_path($image_name);
					echo '<p><image width="200px" src="'.$image_path.'" />'; ?>
<br /><br /> <?php } ?>
削除パス：<?php echo str_repeat('●' , mb_strlen( htmlspecialchars_decode($pass ,ENT_COMPAT))); ?> <br />
この内容で書き込みます。
<form method ="post" action ="index.php">
<input type="hidden" name="action" value="complete">
<input type="hidden" value="ec" name="ec">
<input type="submit" value="送信"></form>

<div style ="color:red"><?php echo $error_msg; ?></div>
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
