<?php session_start(); ?>
<!---書き込み確認画面--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $bbs_name; ?></title>

<body class ="back">
    <div class="back">
      <table>
        <tbody>
            <tr width="500">
                <td class="title">
                    <?php echo $bbs_name; ?>
                </td>
                <td style="white-space: nowrap; text-align:right;">
                    <?php echo  htmlspecialchars_decode($_SESSION['user_name'] ,ENT_COMPAT); ?>としてログイン中です。
                </td>
            </tr>
            <tr>
                <td style ="color:red">
                    <?php echo $error_msg; ?>
                </td>
                <td style="text-align: right">
                    <a href ="view_logout.php">ログアウト</a><br />
                    </td>
            </tr>
        </tbody>
    </table>


    <div class ="comment">
    
        <!---書き込み内容--->
        　名前　：<?php echo  htmlspecialchars_decode ( $_SESSION['user_name'] ,ENT_COMPAT); ?> <br />
        コメント：<?php echo nl2br ( htmlspecialchars_decode ( $comment ,ENT_COMPAT)); ?> <br />
        <?php if(!empty($image_name)){
            	$image_path = upload_image_path($image_name);
                echo '<p style="text-align: right"><image width="200px" src="'.$image_path.'" />'; ?></p>
                <br /><br /> <?php } ?>
        削除パス：<?php echo str_repeat('●' , mb_strlen( htmlspecialchars_decode($pass ,ENT_COMPAT))); ?> <br />
        この内容で書き込みます。　よろしいですか？
        <tr>
            <td colspan="2">
                <form method ="post" action ="index.php">
                    <input type="hidden" name="action" value="complete">
                    <input type="hidden" value="ec" name="ec">
                    <input type="submit" value="書き込む">
                </form>
            </td>
            <td>
                <form method ="post" action ="index.php">
                    <input type="hidden" name="action" value="">
                    <input type="submit" value="戻る">
                </form>
            </td>
        </tr>

        <div style ="color:red"><?php echo $error_msg; ?></div>

    </div>

<?php
//掲示板部分の表示
require_once 'view_bbs2.php';
?>	

</table>
</body>
</html>
