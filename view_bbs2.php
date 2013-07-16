<!---掲示板部分の表示--->
<table border="1" width="500" cellspacing="0" cellpadding="5">
    
	<tr>
	<th width="30" class ="time">時間</th><th width="50" class="name">投稿者</th><th width="260" class ="time">コメント</th><th width="50" class="name">削除</th>
	</tr>

<?php $dtcnt = COUNTS($db,$name,$comment,$pass); ?>
		全コメント数<?php echo $dtcnt; ?>件
	
<?php
	$sth= ALLDATA($db,$st,$lim);
	while($row =$sth->fetch(PDO::FETCH_ASSOC)){
     
            
	$id = $row['id'];
	$time = $row['time'];
	$user_id = $row['user_id'];
	$comment =htmlspecialchars_decode ($row['comment'] , ENT_QUOTES);
	$image_file =$row['image_file'];
	
	$sth2= NAMEDATA($db,$user_id);
	$row =$sth2->fetch(PDO::FETCH_ASSOC);
	
        $user_name =htmlspecialchars_decode ($row['user_name'] , ENT_QUOTES);
        if($user_name == MASTER_NAME){
            $user_name ='管理人';
        }
        
?>

	<tr>
	<td class ="time"><?php echo nl2br ($time); ?></td>
	<td class ="name"><?php echo $user_name; ?></td>
	<td class ="time"><?php echo nl2br ($comment); 
			if($image_file){
				$image_path = upload_image_path($image_file);
				echo '<p><image width="200px" src=" '.$image_path.' "></p>';
			} ?>
	</td>
	<td class="name">
          <div align="center">
           <?php if($user_id == $_SESSION['user_id']){ ?>
		<form method="post" action="index.php" >
		<input type="hidden" value="<?php echo $id; ?>" name="id" />
		<input type="hidden" value="delete" name="action" />
		<input type="submit" value="削除" name="submit" />
		</form>
            <?php } else{ ?>
                削除
            <?php } ?>
          </div>
        </td>
	</tr>

<?php
}?>
        </div>
</table>
<table class="back">
    <tr>
        <td style="text-align: left; width:150px">
          <?php if($p>1){ ?>
            <a href ="<?php $_SERVER['PHP_SELF']; ?>?p=<?php echo $prev; ?>">←前のページ</a>
          <?php } ?>            
        </td>
        <td style="text-align: center;width:200px">
            <?php echo $prev.'ページ目'; ?> 
        </td>
        <td style="text-align: right; width:150px">
          <?php if(($next -1) * $lim < $dtcnt){ ?>
            <a href ="<?php $_SERVER['PHP_SELF']; ?>?p=<?php echo $next; ?>">次のページ→</a>
          <?php } ?>            
        </td>
    </tr>
</table>



