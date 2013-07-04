<?php
require_once 'master.php';
require_once 'model.php';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>ユーザー管理画面</title>
</head>
<body>    
<?php if($order =='confirm_users' ||$order =='confirm_users2'){ ?>
    <div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; width :450;">
        <?php require_once 'master_view_confirm.php'; ?>
    </div>    
<?php } ?>
    
    
<?php $dtcnt = COUNTS_USERS($db); ?>
		登録会員数<?php echo $dtcnt; ?>件

<table border="1" width="500" cellspacing="0" cellpadding="5">
    <tr>
    <th width="100">ユーザーID</th><th width="100">名前</th><th width="500">アドレス</th><th width="20">管理</th>
    </tr>

                
<?php
	$sth= ALLUSERDATA($db,$st,$lim);
	while($row =$sth->fetch(PDO::FETCH_ASSOC)){
     
            
	$id = $row['user_id'];
	$name = $row['user_name'];
	$mail = $row['mail'];
	

?>

	<tr>
	<td><?php echo $id; ?></td>
	<td><?php echo htmlspecialchars_decode($name ,ENT_COMPAT); ?></td>
	<td><?php echo nl2br (htmlspecialchars_decode($mail,ENT_COMPAT)); 
			if($image_file){
				$image_path = upload_image_path($image_file);
				echo '<p><image width="200px" src=" '.$image_path.' "></p>';
			} ?>
	</td>
	<td>
		<form method="post" action="master_index.php" >
		<input type="hidden" value="<?php echo $id; ?>" name="id" />
		<input type="hidden" value="delete_user" name="master_action" />
		<input type="submit" value="管理" name="submit" />
		</form>
	</td>
	</tr>

<?php
}?>
</table>
<?php 
if($p>1){
?>
<a href ="<?php $_SERVER['PHP_SELF']; ?>?p=<?php echo $prev; ?>">←前のページ</a>
<?php
}
if(($next -1) * $lim < $dtcnt){
?>	
<a href ="<?php $_SERVER['PHP_SELF']; ?>?p=<?php echo $next; ?>">次のページ→</a>

<?php } ?>


</body>
</html>
