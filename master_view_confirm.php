<?php if($order == confirm_users){ ?>
このユーザーを削除します。<br/>
ユーザーID：<?php echo $_SESSION['delete_id']; ?> <br />
 　名前　　 ：<?php echo htmlspecialchars_decode ($delete_name ,ENT_COMPAT); ?> <br />
アドレス　：<?php echo nl2br (htmlspecialchars_decode ($delete_mail,ENT_COMPAT)); ?> <br />
<form method ="post" action ="master_index.php">
<input type="hidden" name="master_action" value="delete_user2">
<input type="submit" value="実行"></form>
<a href ="master.php">戻る</a><br />
<?php } ?>


<?php if($order == confirm_users2){ ?>
  
ユーザーの削除が完了しました。<br/>
<a href ="master.php">戻る</a><br />
<?php } ?>


<?php if($order == 'conrirm_bbs'){ ?>
このコメントを削除します。<br/>
　ID　　：<?php echo $_SESSION['delete_id']; ?> <br />
　名前　：<?php echo htmlspecialchars_decode ($_SESSION['delete_user_name'] ,ENT_COMPAT); ?> <br />
コメント：<?php echo nl2br (htmlspecialchars_decode ($_SESSION['delete_comment'] ,ENT_COMPAT)); ?> <br />
<form method ="post" action ="master_index.php">
<input type="hidden" name="master_action" value="delete_bbs2">
<input type="submit" value="実行"></form>
<a href ="master.php">戻る</a><br />
<?php } ?>


<?php if($order == 'conrirm_bbs2'){ ?>
コメントの削除が完了しました。<br/>
<a href ="master.php">戻る</a><br />
<?php } ?>


<?php if($order == 'comment'){ ?>
<h2>管理者用コメントフォーム</h2>
この内容でコメントを投稿します。<br/>
コメント：<?php echo nl2br (htmlspecialchars_decode ($_SESSION['comment'] ,ENT_COMPAT)); ?> <br />
    <?php if(!empty($image_name)){
	$image_path = upload_image_path($image_name);
        echo '<p><image width="200px" src="'.$image_path.'" />'; ?>
    <br /><br /> <?php } ?>
<form method ="post" action ="master_index.php">
<input type="hidden" name="master_action" value="master_complete">
<input type="submit" value="実行"></form>
<a href ="master.php">戻る</a><br />
<?php } ?>


<?php if($order == 'comment2'){ ?>
<h2>管理者用コメントフォーム</h2>
コメントの投稿が完了しました。<br/>
<a href ="master.php">戻る</a><br />
<?php } ?>


<?php if($order == 'bbs_name'){ ?>
<h2>管理者用レイアウト編集フォーム</h2>
タイトルの編集を行います。<br />
<form method ="post" action="master_index.php">
<input type="text" name="bbs_name">
<input type="hidden" name="master_action" value="change_name2">
<input type ="submit" value="変更">
</form><br />
　　　　　　　　　　　　　　　　　　　<a href ="master.php">戻る</a><br />
<?php } ?>


<?php if($order == 'bbs_name2'){ ?>
<h2>管理者用タイトル編集フォーム</h2>
この内容に変更します。<br/>
よろしいですか？<br />
tittle:<h2 class ="title">　　<?php echo $_SESSION['bbs_name']; ?></h2>
<form method ="post" action ="master_index.php">
<input type="hidden" name="master_action" value="change_name3">
　　　　　　　　　　　　　　　　　　　　<input type="submit" value="実行"></form><br />
　　　　　　　　　　　　　　　　　　　　　　<a href ="master.php">戻る</a><br />
<?php } ?>


<?php if($order == 'bbs_name3'){ ?>
<h2>管理者用タイトル編集フォーム</h2>
掲示板名の変更が完了しました。<br/>
　　　　　　　　　　　<a href ="master.php">戻る</a><br />
<?php } ?>



<?php if($order == 'color'){ ?>
<h2>管理者用レイアウト編集フォーム</h2>
背景に変更する色を選択してください。<br />
<form method ="post" actin ="master_index.php">
　<input type="radio" name="color" value ="blue">　青<br />
　<input type="radio" name="color" value ="red">　赤<br />
　<input type="radio" name="color" value ="gray">　黒<br />
　<input type="radio" name="color" value ="nomal">　ノーマル<br />
　<input type="hidden" name="master_action" value="change_color2">
　　<input type="submit" value="実行"></form><br />
<a href ="master.php">戻る</a><br />
<?php } ?>


<?php if($order == 'color2'){ ?>
<h2>管理者用背景色編集フォーム</h2>
この内容に変更します。<br/>
よろしいですか？<br />
変更色: <?php echo $a; ?>
<form method ="post" action ="master_index.php">
<input type="hidden" name="change_color" value="$a">
<input type="hidden" name="master_action" value="change_color3">
<input type="submit" value="実行"></form>
<a href ="master.php">戻る</a><br />
<?php } ?>


<?php if($order == 'color3'){ ?>
<h2>管理者用背景色編集フォーム</h2>
背景色の変更が完了しました。<br/>
<a href ="master.php">戻る</a><br />
<?php } ?>

