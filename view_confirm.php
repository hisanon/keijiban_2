<?php session_start(); ?>
<!---書き込み確認画面--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
    <link rel="stylesheet" href="main.css" type="text/css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $bbs_name; ?></title>

<body class ="back">
   <table class="back" >
      <tbody>
            <tr width="500">
                <td class="title">
                    <?php echo $bbs_name; ?>
                </td>
                <td style="text-align:center;">
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

    <div class="comment">
        <table class="name">
            <tbody>
                <tr>
                    <td style ="color:red">
                        <?php echo $error_msg; ?>
                    </td>
                </tr>
                <tr>
                    <td class="center120"">名前</td><td style="width:10">:</td>
                    <td style="width:320">
                      <?php echo  htmlspecialchars_decode ( $_SESSION['user_name'] ,ENT_COMPAT); ?> <br />
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">コメント</td><td>:</td>
                    <td style="text-align:left">
                        <?php echo nl2br ( htmlspecialchars_decode ( $comment ,ENT_COMPAT)); ?>
                    </td>
                </tr>
            </tbody>
       </table>
        <br />
       <div style="text-align:center"> 
            <?php if(!empty($image_name)){
               $image_path = upload_image_path($image_name);
               echo '<p><image width="200px" src="'.$image_path.'" />'; ?></p>
               <br /> <?php } ?>
       </div>

       <div style="text-align:center">この内容で書き込みます。　よろしいですか？<br /></div>
       <div style="text-align:center">
            <table class="name">
                <tr>
                    <td style="width:80">
                        <form method ="post" action ="index.php">
                            <input type="hidden" name="action" value="complete">
                            <input type="hidden" value="ec" name="ec">
                            <input type="submit" value="書き込む">
                        </form>                        
                    </td>
                    <td style="width:80">
                        <form method ="post" action ="index.php">
                            <input type="hidden" name="action" value="">
                            <input type="submit" value="戻る">
                        </form>
                    </td>
                </tr>
            </table>
      </div>
    </div>
        
<?php
//掲示板部分の表示
require_once 'view_bbs2.php';
?>	

</body>
</html>
