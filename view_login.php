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
<body class="back">
    <table class="back">
        <tbody>
            <tr style="width:500">
                <td class= "title">
                    <?php echo $bbs_name; ?>
                </td>
                <td style="text-align: right">
                    <h2>ログイン画面</h2>
                </td>
            </tr>    
        </tbody>
    </table>
    
<div style ="color:red">
<?php echo $comp_msg; ?>
</div>
    

<div class="comment">
    <h2>ログイン情報入力</h2>
    <p>会員登録を行ってない方は<br />新規会員登録を行ってからログインして下さい。</p>

    <div style="text-align:right">
        <a href ="view_shingup.php">新規会員登録</a><br /><br />    
    </div>    
<div style ="color:red">
    <?php echo $error_msg; ?>
</div>
<form method="post" action="index.php " >
    <table class="name">
        <tbody>
            <tr style="text-align:center">
                <td>
                    <label for="user_name">名前</label>
                </td>
                <td>
                    <label for="user_name">:</label>
                </td>
                <td style="text-align:left">
                    <input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars_decode ($user_name ,ENT_COMPAT); ?>"/><br />
                    <?php if (empty($user_name) && empty($ec)) { ?>
                        <div style ="color:red">名前を入力して下さい！</div>
                    <?php } ?>                    
                </td>
            </tr>
            <tr>
                <td>
                    <label for="user_pass">パスワード</label>
                </td>
                <td>
                    <label for="user_pass">:</label>
                </td>
                <td style="text-align:left">
                    <input type="password" id="user_pass" name="user_pass" maxlength="8" value="" /><br />
                    <?php if (empty($user_pass) && empty($ec)) { ?>
                        <div style ="color:red">パスワードを入力して下さい！</div>
                    <?php } ?>
                </td>
            </tr>
        </tbody>
    </table>
    <div style="text-align: center">
                    <input type="submit" value="ログイン" name="submit" />
                    <input type="hidden" value="login" name="action">        
    </div>
</form>
</div>

</body>
</html>
