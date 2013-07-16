<?php require_once 'model.php';
list($color,$bbs_name) = layout($db);
require_once 'color.php'; ?>


<!---初期画面の表示--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
    <link rel="stylesheet" href="main.css" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $bbs_name; ?></title>
</head>
<body class ="back">
    
    <table class="back">
        <tbody>
            <tr style="width:500">
                <td class= "title">
                    <?php echo $bbs_name; ?>
                </td>
                <td style="align: center">
                    <?php echo htmlspecialchars_decode ($_SESSION['user_name'] ,ENT_COMPAT); ?>としてログイン中です。
                </td>
            </tr>    
        </tbody>        
    </table>

<div class="comment">
<h2>ログアウト</h2>
<p>ログアウトしてもよろしいですか？</p>
<div style="text-align:center">
    <table class="name">
        <tbody>
            <tr>
                <td style="width:80">
                    <form method="post" action="index.php " >
                        <input type="submit" value="はい" name="submit" />
                        <input type="hidden" value="logout_complete" name="action">
                    </form>                    
                </td>
                <td style="width:80">
                    <form method="post" action="index.php " >
                        <input type="submit" value="いいえ" name="submit" />
                        <input type="hidden" value="" name="action">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

</div>
</div>
</body>
</html>
