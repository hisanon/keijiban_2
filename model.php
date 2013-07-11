<?php
session_start();
//データベースの接続
require_once 'db.php';

	define('UPLOAD_IMAGES_PATH','images/upload/');
	define('UPLOAD_IMAGE_MAX_SIZE', 1000000);
	define('savedir','/Applications/XAMPP/htdocs/BBS/images/upload/');
	define('MASTER_NAME','master');
        define('MASTER_PASS','1234');
        
        
date_default_timezone_set('Asia/Tokyo');
$now_datetime = date('YmdHis');


$master_msg ='';


//POSTの取得
$action =$_POST['action'];
$ec = $_POST['ec'];

$master_action =$_POST[master_action];

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
	
	$mail =$_POST['mail'];
	$user_pass =$_POST['user_pass'];

//半角の変更
$mail_b = mb_convert_kana($mail, "a", "UTF-8");
$user_pass_b = mb_convert_kana($user_pass, "a", "UTF-8");

//アドレスのチェック
$ret = preg_match("/^[a-zA-Z0-9_\.\-]+?@[A-Za-z0-9_\.\-]+$/", $mail_b);



//bbsのレイアウト表示
function layout($db){
	$sth =$db->prepare("SELECT * FROM layout WHERE id ='1'");
	$sth->execute();
	$row =$sth->fetch(PDO::FETCH_ASSOC);
	$color =$row['color'];
	$bbs_name =$row['bbs_name'];

			
        return array($color,$bbs_name);
}


//イメージファイルの処理
function upload_image_path($file_name){
	$image_path = UPLOAD_IMAGES_PATH.$file_name;
	return $image_path;
}

//会員登録	
function INSERTUSERS($db,$user_name,$mail_b,$user_pass_b){
try{
	$sth =$db->prepare("INSERT INTO USERS(user_name,mail,user_pass) VALUES( ? , ? , ?)");
	$sth->execute(array($user_name , $mail_b , $user_pass_b ));
}
catch(PDOException $e){
	die('Insert failed: '.$e->getMessage());
}
	return $sth;
}


//管理者認証
function MASTER(){
	if($_SESSION['user_name'] == MASTER_NAME && $_SESSION['user_id'] == '1'){
		$master = True;
	}
	else{
		$master =False;
	}
	return $master;
}


//ユーザー認証
function LOGIN(){
	if(!empty($_SESSION['user_name']) && !empty($_SESSION['user_id'])){
		$login = True;
	}
	else{
		$login =False;
	}
	return $login;
}


//会員情報を確認
function SHINGUP($db,$user_pass,$user_name,$no){
	//ユーザー情報の確認
	$sth = $db -> prepare ("SELECT * FROM USERS WHERE  user_pass = '$user_pass' AND user_name = '$user_name' ") or die('ERROR!2');
		$sth->execute();
		$cnt =$sth ->rowCount();
		if($cnt == $no){ 			
			$shingup =True;
		}
		else{
			$error_msg ='この内容は既に登録されています。';
			$singup =False;
		}
	return $shingup;
}


//ユーザーidの取得
function GETID($db,$user_name_s,$user_pass_s){
				$sth =$db->prepare("SELECT * FROM USERS WHERE user_pass ='$user_pass_s' AND user_name ='$user_name_s' ");
				$sth->execute();
			$row =$sth->fetch(PDO::FETCH_ASSOC);
			$user_id =$row['user_id'];
			
			return $user_id;
}


//削除ユーザーの検索
function GETDELETE_USER($db,$id){
				$sth =$db->prepare("SELECT * FROM USERS WHERE user_id ='$id' ");
				$sth->execute();
			$row =$sth->fetch(PDO::FETCH_ASSOC);
			
			$delete_name =$row['user_name'];
			$delete_mail =$row['mail'];
			$delete_id =$row['user_id'];

			return array($delete_name,$delete_mail,$delete_id);
}


//削除コメントの検索
function GETDELETE($db,$id){
			$sth =$db->prepare("SELECT * FROM comments WHERE id ='$id' ");
			$sth->execute();
			$row =$sth->fetch(PDO::FETCH_ASSOC);
			
			$delete_comment =$row['comment'];
                        $delete_image =$row['image_file'];
			$delete_pass =$row['pass'];
			$delete_user_id =$row['user_id'];

			return array($delete_comment,$delete_image,$delete_pass,$delete_user_id);
}



//コメント数の確認
function COUNTS($db,$name,$comment,$pass){
	$sth = $db -> query("SELECT * FROM comments") or die('ERROR!2');
	$sth->execute();
	$dtcnt = $sth ->rowCount( );
	return $dtcnt;
}


//登録者数の確認
function COUNTS_USERS($db){
	$sth = $db -> query("SELECT * FROM USERS") or die('ERROR!2');
	$sth->execute();
	$dtcnt = $sth ->rowCount( );
	return $dtcnt;
}

//掲示板部分の表示
function ALLDATA($db,$st,$lim){
	$sth =$db->prepare("SELECT * FROM comments ORDER by id desc LIMIT $st,$lim");
	$sth->execute();
	return $sth;
}

//登録者の表示
function ALLUSERDATA($db,$st,$lim){
	$sth =$db->prepare("SELECT * FROM USERS ORDER by user_id desc LIMIT $st,$lim");
	$sth->execute();
	return $sth;
}

//名前の表示
function NAMEDATA($db,$user_id){
	$sth2 =$db->prepare("SELECT * FROM USERS WHERE user_id ='$user_id' ");
	$sth2->execute();
	return $sth2;
}


//書き込み部分の表示
function INSERTBBS($db,$user_id_s,$comment_s,$pass_s,$image_name_s){
try{
	$sth =$db->prepare("INSERT INTO comments(comment,image_file,pass,user_id) VALUES( ? , ? , ? , ?)");
	$sth->execute(array($comment_s , $image_name_s , $pass_s , $user_id_s));
}
catch(PDOException $e){
	die('Insert failed: '.$e->getMessage());
}
	return $sth;
}


//掲示板の色変更
function CHANGE_LAYOUT($db,$c_color){
    try{
        $no1= '1';
        $m_name = 'master';
   	$sth =$db->prepare("UPDATE layout SET name= :name , color= :color WHERE id = :id");
        $sth->bindValue(':name',$m_name);
	$sth->bindValue(':color',$c_color);
        $sth->bindValue(':id',$no1);
        $sth->execute();
	}
catch(PDOException $e){
	die('Delete failed:'.$e->getMessage());
	}
	return $sth;
    
}


//掲示板の名前変更
function CHANGENAME($db,$c_name_s){
try{
        $no1= '1';
        $m_name = 'master';
   	$sth =$db->prepare("UPDATE layout SET name= :name , bbs_name= :bbs_name WHERE id = :id");
        $sth->bindValue(':name',$m_name);
	$sth->bindValue(':bbs_name',$c_name_s);
        $sth->bindValue(':id',$no1);
        $sth->execute();
	}
catch(PDOException $e){
	die('Delete failed:'.$e->getMessage());
	}
	return $sth;    
}


//ユーザー削除
function DELETEUSER($db,$id){
try{
    $sth =$db->prepare("DELETE FROM USERS WHERE user_id = $id");
    $sth->execute();	
}
catch(PDOException $e){
    die('Delete failed:'.$e->getMessage());
}
    return $sth;
}



//コメント削除
function DELETEBBS($db,$delete_id_s){
try{
	$sth =$db->prepare("DELETE FROM comments WHERE id = $delete_id_s");
	$sth->execute();
   }
catch(PDOException $e){
	die('Delete failed:'.$e->getMessage());
	}
	return $sth;
}


//コメントの編集
function CHANGEBBS($db,$change_id_s,$change_comment_s,$change_user_id_s){
try{
       	$sth =$db->prepare("UPDATE comments SET comment= :comment , user_id= :user_id WHERE id = :id");
        $sth->bindValue(':comment',$change_comment_s);
	$sth->bindValue(':user_id',$change_user_id_s);
        $sth->bindValue(':id',$change_id_s);
        $sth->execute();
	}
catch(PDOException $e){
	die('Delete failed:'.$e->getMessage());
	}
	return $sth;
    
}






?>
