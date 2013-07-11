<?php session_start(); ?>
<!---削除確認画面の表示--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $bbs_name; ?></title>
</head>
<body class ="back">

    <h1 class="title">掲示板</h1>
<h3><?php echo htmlspecialchars_decode ($_SESSION['user_name'] ,ENT_COMPAT); ?>としてログイン中です。</h3>
<a href ="view_logout.php">ログアウト</a><br />

<table>

    <div class="comment">
    
<!---削除確認--->
<div style ="color:red"><?php echo $master_msg.'<br/>';?></div>
このコメントを削除します。<br/>
コメント：<?php echo nl2br (htmlspecialchars_decode ($delete_comment ,ENT_COMPAT));
if(!empty($delete_imge)){
	$image_path = upload_image_path($delete_imge);
	echo '<p><image width="200px" src=" '.$image_path.' "></p>';
} ?>

<form method ="post" action ="index.php">
削除パス入力:
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
</table>
</body>
</html>
