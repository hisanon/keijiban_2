<!---初期画面の表示--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $bbs_name; ?></title>
</head>
<body>
    <div class="back">
    
    <table>
            
<h1 class ="title"><?php echo $bbs_name; ?></h1>


<h2>掲示板管理</h2>

<div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; width :450;">

<a href ="view.php">・ユーザー表示の確認</a><br /></br />
<a href ="master_view_index.php">・レイアウト管理</a><br />
<a href ="master_view_users.php">・ユーザー管理</a><br />
<a href ="master_view_bbs.php">・コメント管理</a><br />



</div>

</table>
</div>
</body>
</html>
