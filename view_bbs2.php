<!---掲示板部分の表示--->
<table border="1" width="500" cellspacing="0" cellpadding="5">
	<tr>
	<th width="100">時間</th><th width="100">投稿者</th><th width="500">コメント</th><th width="20">削除</th>
	</tr>
<?php

/*総カウント数
$pager = pager($db,$id,$name,$comment,$pass);

$sth= ALLDATA($db,$id,$name,$comment,$pass);

//	while($row =$sth->fetch(PDO::FETCH_ASSOC)){
//while($a<=5 ){
*/

	//データベースへの接続
	$db =mysqli_connect("localhost","root","","TRANING02") or die('ERROR!(connect):MySQLサーバーへの接続に失敗しました。1');
	mysqli_query($db,"SET NAMES utf8");

	$query ="SELECT COUNT * FROM comments";
	$result =mysqli_query($db,$query) or die('ERROR!2');
	$row = mysql_fetch_row($result);


		//取り出す最大レコード数
		$lim =5;

		//ページの位置取得
		$p =intval(@$_GET["p"]);
		if($p < 1){
		$p =1;
		}

		//データの位置を取得する
		$st =($p -1) * $lim;

		//前ページ、次ページの番号の取得
		$prev = $p -1;
		if($prev<1){
			$prev=1;
		}
		$next = $p +1;



	$query ="SELECT * FROM comments ORDER by id desc LIMIT $st,$lim" ;
	$result =mysqli_query($db,$query) or die('ERROR!3');
	while($row =mysqli_fetch_array($result)){
	
	$id = $row['id'];
	$name =$row['name'];
	$comment =$row['comment'];
	$delete_pass =$row['pass'];
	$time = $row['time'];
	
?>

	<tr>
	<td><?php echo $time; ?></td>
	<td><?php echo $name; ?></td>
	<td><?php echo nl2br ($comment); ?></td>
	<td>
		<form method="post" action="index.php" >
		<input type="hidden" value="<?php echo $id; ?>" name="id" />
		<input type="hidden" value="<?php echo $name; ?>" name="name" />
		<input type="hidden" value="<?php echo $comment; ?>" name="comment" />
		<input type="hidden" value="<?php echo $delete_pass; ?>" name="delete_pass" />
		<input type="hidden" value="<?php echo $time; ?>" name="time" />
		<input type="hidden" value="delete" name="action" />
		<input type="submit" value="削除" name="submit" />
		</form>
	</td>
	</tr>
</table>
<?php
} 
if($p>1){
?>
<a href =¥ <?php $_SERVER['PHP_SELF']; ?>?p=<?php $prev ?>¥>前のページ→</a>
<?php
}
if(($next -1) * $lim < $dtcnt){
?>	
<a href =¥ <?php $_SERVER['PHP_SELF']; ?>?p=<?php $next ?>¥>次のページ→</a>

<?php } ?>
