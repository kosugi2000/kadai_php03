<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。

$id = $_GET['id'];
// var_dump($id);
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs.php"); //ファイルの読み込み
$pdo = db_conn();
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table 
                       WHERE id=" . $id);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}
?>




<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ユーザーデータ編集</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div>
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->



<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>　　　ユーザー登録</legend>
     <label>　　　　　　　　名前：<input type="text" size="60" name="name" value=<?= $result['name'] ?>></label><br>
     <label>　　　　　ユーザーid：<input type="text" size="60" name="lid"  value=<?= $result['lid'] ?>></label><br>
     <label>　　　　　ユーザーpw：<input type="text" size="59" name="lpw" value=<?= $result['lpw'] ?>></label><br>
     <label>　　　　　管理フラグ：0=管理者, 1=スーパー管理者, 2=一般ユーザー：
         <select name="kanri_flg">
         <option value="0" <?= $result['kanri_flg']  == 0 ? 'selected' : '' ?> >0</option>
         <option value="1" <?= $result['kanri_flg']  == 1 ? 'selected' : '' ?> >1</option>
         <option value="2" <?= $result['kanri_flg']  == 2 ? 'selected' : '' ?> >2</option>
         </select></label><br>

     <label>　　　　　在籍フラグ：0=退社, 1=在籍中：
     <select name="life_flg" <?= $result['life_flg'] ?>>
            <option value="0" <?= $result['life_flg']  == 0 ? 'selected' : '' ?> >0</option>
            <option value="1" <?= $result['life_flg']  == 1 ? 'selected' : '' ?> >1</option>
         </select></label>
      <input type="hidden" name="id" value=<?= $result['id'] ?>>
         <input type="submit" value="登録">
    </fieldset>

  </div>
</form>



<!-- Main[End] -->
</body>

</html>
