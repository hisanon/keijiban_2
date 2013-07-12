<?php session_start();
require_once 'color.php'; 
require_once 'model.php'; ?>
<!---初期画面の表示--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $bbs_name; ?></title>
</head>
<body class="back">
    <table class="back">
        <tbody>
            <tr width="500">
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
    <h2>新規会員情報入力</h2>
    <div style ="color:red">
        <?php echo $error_msg; ?>
    </div>

    <?php echo $res; ?>

    <!--ログインの確認(ログイン状態)-->
    <?php $login=LOGIN();
    if($login == True){ ?>
        <p>既に<?php echo htmlspecialchars_decode ($_SESSION['user_name'] ,ENT_COMPAT) ?>の名前でログインしています。<br />
        ログアウトしてからログインして下さい。</p><br />
        <a href ="view_logout.php">ログアウト</a><br />
        <a href ="index.php">掲示板に戻る</a><br />
    <?php } ?>

    <!--ログインの確認(非ログイン状態)-->
    <?php if($login == False){ ?>
            <p>・新規会員登録を行います。<br />全ての項目を入力してから確認を押して下さい。</p>
            <form method="post" action="index.php " >
                <table class="name">
                    <tbody>
                        <tr>
                            <td>
                                <label for="name">ユーザー名</label>
                            </td>
                            <td>
                                <label for="name">:</label>
                            </td>
                            <td>
                                <input type="text" id="name" name="user_name" value="<?php echo htmlspecialchars_decode ($user_name ,ENT_COMPAT); ?>" /><br />                                
                                <?php if (empty($user_name) && !empty($ec)) { ?>
                                <div style ="color:red; font-size: 80%; font-weight:bold;text-align: center">項目を正しく<br>入力して下さい！</div>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="mail">メールアドレス</label>
                            </td>
                            <td>
                                <label for="mail">:</label>
                            </td>
                            <td>
                                <?php if (empty($mail) && !empty($ec)) { ?>
                                    <input type="text" id="mail"  name="mail" value="<?php echo htmlspecialchars_decode ($mail ,ENT_COMPAT); ?>"/><br />
                                    <div style ="color:red; font-size: 80%; font-weight:bold;text-align: center">項目を正しく<br>入力して下さい！</div> 
                                <?php } 
                                  elseif (!empty($error_mail) && !empty($ec)) { ?>
                                    <input type="text" id="mail"  name="mail" value=""/><br />
                                    <div style ="color:red"><?php echo $error_mail; ?></div>
                                <?php } 
                                  else  { ?>
                        	    <input type="text" id="mail"  name="mail" value=""/><br />
                                    <div style ="color:red"><?php echo $error_mail; ?></div>
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
                            <td>
                                <input type="password" id="user_pass" name="user_pass" maxlength="8" value="" /><br />
                              <?php if (empty($user_pass) && !empty($ec)) { ?>
                                <div style ="color:red; font-size: 80%; font-weight:bold;text-align: center">項目を正しく<br>入力して下さい！</div>
                              <?php } ?>
                            </td>
                            <td style="color:blue;font-size: 75%;">
                                ・半角英数字で入力して下さい。
                            </td>
                        </tr>
                        
                </tbody></table>
                <div style="text-align: center">
		<input type="submit" value="確認" name="submit" />
		<input type="hidden" value="shingup" name="action">
		<input type="hidden" value="ec" name="ec">
                    </div>
            </form>
    <?php } ?>
	
</div>
    <div style="text-align: right">
    <a href ="view_login.php">戻る</a><br />
</div>     
</body>
</html>
