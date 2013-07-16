<?php session_start(); ?>
<!---削除確認画面の表示--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
    <link rel="stylesheet" href="main.css" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $bbs_name; ?></title>
</head>
<body class ="back">
    <table class="back">
        <tbody style="width:500">
            <tr>
                <td class="title">
                    <?php echo $bbs_name; ?>
                </td>
                <td style="text-align: center">
                    <?php echo htmlspecialchars_decode ($_SESSION['user_name'] ,ENT_COMPAT); ?>としてログイン中です。
                </td>
            </tr>
        </tbody>
    </table>
  <div style="text-align: right">
    <a href ="view_logout.php">ログアウト</a><br />
  </div>

<div class="comment">
    
 <h2>削除確認</h2>
<div style ="color:red"><?php echo $master_msg.'<br/>';?></div>

<!---削除確認--->
<div style="width:450">
 
    <table class="name">
        <tbody>
            <tr>
                <td style="text-align:center">コメント</td><td>:</td>
                <td style="text-align:left">
                    <?php echo nl2br ( htmlspecialchars_decode ( $_SESSION['delete_comment'] ,ENT_COMPAT)); ?>
                </td>
            </tr>
        </tbody>
   </table>
   <br />
       <div style="text-align:center"> 
            <?php if(!empty($delete_imge)){
               $image_path = upload_image_path($delete_imge);
               echo '<p><image width="200px" src="'.$image_path.'" />'; ?></p>
               <br /> <?php } ?>
       </div>

<p>このコメントを削除します。</p>
       <div style="text-align:center">
            <table class="name">
                <tr>
                    <td style="width:80">
                        <form method ="post" action ="index.php">
                            <input type="hidden" name="action" value="delete2">
                            <input type="submit" value="削除">
                        </form>
                    </td>
                    <td style="width:80">
                        <form method ="post" action ="index.php">
                        <input type="hidden" name="action" value="">
                        <input type="submit" value="戻る"></form>
                    </td>
                </tr>
            </table>
      </div>


</div>

</div>
    
<?php
//掲示板部分の表示
require_once 'view_bbs2.php';
?>	
</body>
</html>
