<?php require_once 'model.php';
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
<h1 class="tittle"><?php echo $bbs_name; ?></h1>

<table>

<h2>ログアウト</h2>
<h3>ログアウトしてもよろしいですか？</h3>

<form method="post" action="index.php " >
<input type="submit" value="はい" name="submit" />
<input type="hidden" value="logout_complete" name="action">
</form>

<form method="post" action="index.php " >
<input type="submit" value="いいえ" name="submit" />
<input type="hidden" value="" name="action">
</form>
		
</table>
</body>
</html>
