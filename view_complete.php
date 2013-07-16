<?php session_start(); ?>
<!---登録完了画面--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
    <link rel="stylesheet" href="main.css" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>TRANING01_a</title>
</head>
<body  class="back">
    <table class="back">
        <tbody width="500">
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

<h3>書き込み完了</h3>
<font style="color:red">・コメントが登録されました。</font>

   <div align="center">
     <form method ="post" action ="index.php">
        <input type="hidden" name="action" value="">
        <input type="submit" value="戻る">
     </form>
   </div>
</div>

<?php	
//掲示板部分の表示
require_once 'view_bbs2.php';
?>	

</body>
</html>
