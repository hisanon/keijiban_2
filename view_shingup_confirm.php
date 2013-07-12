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
    <table class="back">
        <tbody>
            <tr>
                <td class="title">
                    <?php echo $bbs_name; ?>
                </td>
                <td style="align: right">
                    <h2>新規会員登録</h2>
                </td>
            </tr>
        </tbody>
    </table>


    <div class="comment">
        <h2>新規会員情報確認</h2>
    <!---書き込み内容--->
<table class="name">
    <tr>
        <td width="120" align="center">ユーザー名</td>
        <td width="10">:</td>
        <td width="320">
            <?php echo htmlspecialchars_decode($_SESSION['user_name'],ENT_NOQUOTES); ?>
        </td>
    </tr>
    <tr>
        <td align="center">メールアドレス</td>
        <td>:</td>
        <td>
            <?php echo htmlspecialchars($_SESSION['mail'],ENT_NOQUOTES); ?>
        </td>
    </tr>
    <tr>
        <td align="center">パスワード</td>
        <td>:</td>
        <td>
            <?php echo str_repeat('●' , mb_strlen($_SESSION['user_pass'])); ?>
        </td>
    </tr>
</table>
    <p style="color:red; text-align: center;">この内容でよろしければ登録ボタンを押して下さい。</p>
    <div align="center">
<table class="name">
    <tr>
        <td width="100">
            <form method ="post" action ="index.php">
            <input type="hidden" name="action" value="shingup_complete">
            <input type="submit" value="登録"></form>
        </td>
        <td>
            <form method ="post" action ="index.php">
            <input type="hidden" name="action" value="shingup">
            <input type="submit" value="戻る"></form>
        </td>
    </tr>
        
</table>
        </div>
    </div>
</html>
