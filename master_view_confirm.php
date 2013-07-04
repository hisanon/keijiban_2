<?php if($order == confirm_users){ ?>
このユーザーを削除します。<br/>
ユーザーID：<?php echo $_SESSION['delete_user_id']; ?> <br />
 　名前　 ：<?php echo htmlspecialchars_decode ($_SESSION['delete_user_name'] ,ENT_COMPAT); ?> <br />
  アドレス：<?php echo nl2br (htmlspecialchars_decode ($_SESSION['delete_comment'] ,ENT_COMPAT)); ?> <br />
<form method ="post" action ="master_index.php">
<input type="hidden" name="master_action" value="delete_user2">
<input type="submit" value="実行"></form>
<?php } ?>


<?php if($order == complete_users2){ ?>
ユーザーの削除が完了しました。<br/>
<a href ="master.php">戻る</a><br />
<?php } ?>


<?php if($order == confirm_bbs){ ?>
このコメントを削除します。<br/>
　名前　：<?php echo htmlspecialchars_decode ($_SESSION['delete_user_name'] ,ENT_COMPAT); ?> <br />
コメント：<?php echo nl2br (htmlspecialchars_decode ($_SESSION['delete_comment'] ,ENT_COMPAT)); ?> <br />
<form method ="post" action ="master_index.php">
<input type="hidden" name="master_action" value="delete_bbs2">
<input type="submit" value="実行"></form>
<?php } ?>


<?php if($order == complete_bbs2){ ?>
コメントの削除が完了しました。<br/>
<a href ="master.php">戻る</a><br />
<?php } ?>
