<?php require_once 'model.php';
list($color,$bbs_name) = layout($db);
require_once 'color.php'; ?>

<!---初期画面の表示--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>	
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
	<title><?php echo $bbs_name; ?></title>
</head>
<body class="back">
    
    <table>
            
<h1 class ="title"><?php echo $bbs_name; ?></h1>


<h2>掲示板管理</h2>

<div class="comment">

<a href ="index.php">・ユーザー表示の確認</a><br /></br />
<a href ="master_view_index.php">・レイアウト管理</a><br />
<a href ="master_view_users.php">・ユーザー管理</a><br />
<a href ="master_view_bbs.php">・コメント管理</a><br />



</div>

</table>

<?php require_once 'master_index.php'; ?>
    
</body>
</html>
