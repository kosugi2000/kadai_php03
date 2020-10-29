<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザーデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

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
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>　　　ユーザー登録</legend>
     <label>　　　　　　　　名前：<input type="text" size="60" name="name"></label><br>
     <label>　　　　　ユーザーid：<input type="text" size="60" name="lid" ></label><br>
     <label>　　　　　ユーザーpw：<input type="text" size="59" name="lpw" ></label><br>
     <label>　　　　　管理フラグ：0=管理者, 1=スーパー管理者, 2=一般ユーザー：
         <select name="kanri_flg">
         <option value="0">0</option>
         <option value="1">1</option>
         <option value="2">2</option>
         </select></label><br>

     <label>　　　　　在籍フラグ：0=退社, 1=在籍中：
     <select name="life_flg">
         <option value="0">0</option>
         <option value="1">1</option>
         </select></label>

         <input type="submit" value="登録">
    </fieldset>

  </div>
</form>
<!-- Main[End] -->


</body>
</html>
