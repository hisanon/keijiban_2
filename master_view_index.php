<?php
require_once 'master.php';
require_once 'master_index.php';
require_once 'model.php';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php $bbs_name ?></title>
</head>
<body>
        <div class="back">
    <table>
       <?php if(!empty($master_action)){ ?>
                <br /><br /><div class="comment">
                <?php require_once 'master_view_confirm.php'; ?>
                </div>
        <?php }else{ ?>
                <form method="post" action="master_index.php">
                <input type="hidden" value="change_color" name="master_action">
                <div style ="color:red">・背景色を変更出来ます。</div>
                <input type="submit" value="変更" name="submit" /></form>
                <br /><br />
                <h1 class ="title"><?php echo $bbs_name; ?> </h1>
                <form method="post" action="master_index.php">
                <div style ="color:red">・掲示板名を変更出来ます。</div>
                <input type="hidden" value="change_name" name="master_action">
                <input type="submit" value="変更" name="submit" /></form>
        <?php }?>
<br/><br/>
<h3>○○○としてログイン中です。</h3>

ログアウト<br />

<div style ="color:red">この画面からはコメントの登録、削除は出来ません。<br/>
                        コメント管理画面から行って下さい。</div>

<div class ="comment">
<h2>コメントフォーム</h2>

        <form enctype="multipart/form-data" method="post" action="mastr_view_index.php" >
            <label for="comment">コメント:</label>
            <textarea id="comment" name="comment"  cols="30" rows="5"></textarea><br />    
            <label for="image_file">　画像　:</label>
            <input type="file" id="image_file" name="image_file" /><br />
            <input type="hidden" value="confirm" name="master_action">
            <input type="submit" value="送信" name="submit" />
        </form>
</div>

<?php
//掲示板部分の表示
require_once 'view_bbs2.php';
?>	

</table>
</div>
</body>
</html>

