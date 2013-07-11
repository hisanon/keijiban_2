<?php
require_once 'master.php';
require_once 'model.php';
?>
<div class="back">
<div class="msg">

    <?php if(empty($order)){ ?>
        <h2>管理者用コメントフォーム</h2>
        <form enctype="multipart/form-data" method="post" action="master_index.php" >
            <label for="comment">コメント:</label>
            <textarea id="comment" name="comment"  cols="30" rows="5"></textarea><br />    
            <label for="image_file">　画像　:</label>
            <input type="file" id="image_file" name="image_file" /><br />
            <input type="hidden" value="master_confirm" name="$master_action">
            <input type="submit" value="送信" name="submit" />
        </form>
    <?php }else{require_once 'master_view_confirm.php'; } ?>

</div>    

    <br />
        
<?php $dtcnt = COUNTS($db,$name,$comment,$pass); ?>
		全コメント数<?php echo $dtcnt; ?>件
	
<table border="1" width="500" cellspacing="0" cellpadding="5">
<tr>
<th class="time" width="100">ID</th><th class="name" width="100">時間</th><th class="time" width="100">投稿者</th><th class="name" width="500">コメント</th><th class="time" width="20">削除</th></tr>
                
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
?>

                <tr>
                <td class="time"><?php echo $id; ?></td>
                <td class="name"><?php echo $time; ?></td>
                <td class="time"><?php echo $user_name; ?></td>
                <td class="name"><?php echo nl2br ($comment); 
                    if($image_file){
                        $image_path = upload_image_path($image_file);
                        echo '<p><image width="200px" src=" '.$image_path.' "></p>';
                    } ?>
                </td>
                <td class="time">
                    <form method="post" action="master_index.php" >
                    <input type="hidden" value="<?php echo $id; ?>" name="id" />
                    <input type="hidden" value="delete_bbs" name="master_action" />
                    <input type="submit" value="削除" name="submit" />
                    </form>
                </td>
                </tr>
<?php } ?>
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

</div>
