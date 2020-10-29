<?php
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs.php"); //ファイルの読み込み
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();


//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if($result["kanri_flg"] ==0){
            $kfg ='管理者';
          }
          if($result["kanri_flg"] ==1){
              $kfg ='スーパー管理者';
            }
            if($result["kanri_flg"] ==2){
                $kfg ='一般ユーザー';
              }


        if($result["life_flg"] ==0){
          $lfg ='退職';
        }
        if($result["life_flg"] ==1){
            $lfg ='在籍';
          }





        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<p>';
        // <a href="detail.php?id=XXX">
        $view .= '<a href="detail.php?id=' . $result["id"] . '">';
        $view .= "ID:" .$result["lid"] . " 名前:" . $result["name"] . " 管理フラグ:" .  $kfg . " 在籍状況:" .  $lfg ;
        $view .= '</a>';
        $view .= '</p>';

        $view .= '<p>';
        // <a href="detail.php?id=XXX">
        $view .= '<a href="delete.php?id=' . $result["id"] . '">';
        $view .= '[削除]';
        $view .= '</a>';
        $view .= '</p>';
    }
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ユーザーデータベース表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 5px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->

</body>

</html>
