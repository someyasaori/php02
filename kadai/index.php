<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お役立ちリンク集</title>
</head>
<body>

<header>
お役立ち資料目次
</header>

<h1>入力フォーマット</h1>
<form method="POST" action="insert.php">
    <p>タイトル<input type="text" name="title" id="title" size ="15"></p>
    <p>URL<input type="text" name="url" id="url" size ="30"></p>
    <p>詳細<input type="text" name="details" id="details" size ="30"></p>
    <p>タグ<input type="text" name="tag" id="tag" size ="15"></p>
    <p>登録<input type="submit" value ="送信"></p>
</form>

<h1>資料一覧から検索</h1>
<form method ="POST" action="select.php">
    <p>検索ワード<input type="text" name="keyword" id="keyword"></p>
    <p>タグ<input type="text" name="search_tag" id="search_tag"></p>
    <p>検索<input type="submit" name="submit" value="送信"></p>
    
</form>

</body>
</html>