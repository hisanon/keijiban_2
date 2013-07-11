<?php session_start();
require_once 'model.php';
list($color,$bbs_name) = layout($db);
require_once 'color.php'; ?>
<!---初期画面の表示--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $bbs_name; ?></title>
</head>
<body class ="back">
<h1 class="title"><?php echo $bbs_name; ?></h1>
<table>
<h2>会員登録</h2>
    <div class="comment">
<!---書き込み内容--->
　　名前　：<?php echo htmlspecialchars_decode($_SESSION['user_name'],ENT_NOQUOTES); ?> <br />
　アドレス：<?php echo htmlspecialchars($_SESSION['mail'],ENT_NOQUOTES); ?> <br />
パスワード：<?php echo str_repeat('●' , mb_strlen($_SESSION['user_pass'])); ?> <br />
この内容で登録します。
<form method ="post" action ="index.php">
<input type="hidden" name="action" value="shingup_complete">
　　　　　　<input type="submit" value="登録"></form>
<br />
<a href ="view_shingup.php">戻る</a>
    </div>
</table>
</body>
</html>
