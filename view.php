<?php session_start(); ?>
<!---初期画面の表示--->

<?php require_once 'model.php'; ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
    
<head>
    <link rel="stylesheet" href="main.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>TRANING02_a</title>
</head>
<body class="back">    
        <table class ="back"><tbody>
            <tr style="width:500;">
                <td>
                    <div class ="title"><?php echo $bbs_name; ?></div>
                </td>
                <td style="white-space: nowrap;">
                    <?php echo htmlspecialchars_decode ($_SESSION['user_name'] , ENT_QUOTES); ?>としてログイン中です。
                </td>
            </tr>
            <tr>
                <td>
                    <div style ="color:red">
                    <?php echo $comp_msg.$error_msg; ?>
                    </div>
                </td>
                <td><div style="text-align: right">
                    <a href ="view_logout.php">ログアウト</a><br />
                    </div></td>
            </tr>
                
        </tbody></table>

    <div class="comment">

                
                <h2>コメントフォーム</h2>
                <form enctype="multipart/form-data" method="post" action="index.php" >
                <table class="name">
                    <tbody style="width:450;">
                        <tr>
                            <td>
                                <label for="comment">コメント</label>                                
                            </td>
                            <td>
                                <label for="comment">:</label>

                            </td>
                            <td>
                                <textarea id="comment" name="comment"  cols="30" rows="5"> <?php echo htmlspecialchars_decode ($comment, ENT_QUOTES); ?></textarea><br />
                                    <?php if (empty($comment) && !empty($ec)) { ?>
                                        <div style ="color:red">コメントを入力して下さい！</div>
                                <?php } ?>                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="image_file">画像</label>
                            </td>
                            <td>
                                <label for="image_file">:</label>
                            </td>
                            <td>
                                <input type="file" id="image_file" name="image_file" />
                            </td>
                        </tr>
                    </tbody>
                </table>
                    <div style="text-align: center">
                        <input type="hidden" value="confirm" name="action">
                        <input type="submit" value="送信" name="submit" />
                    </div>
                </form>
     </div>
		
<?php
//掲示板部分の表示
require_once 'view_bbs2.php';
?>	
</body>
</html>

