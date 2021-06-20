<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>お役立ちリンク集</title>
</head>
<body>
<h1>お役立ち資料　目次</h1>
<main>
<div class="sub">
    <h2>新しい資料を登録</h2>
    <form method="POST" action="insert.php">
        <p>タイトル<input type="text" name="title" id="title" size ="15"></p>
        <p>URL<input type="text" name="url" id="url" size ="30"></p>
        <p>詳細<input type="text" name="details" id="details" size ="30"></p>
        <p>タグ<input type="text" name="tag" id="tag" size ="15"></p>
        <p><input type="submit" id="submit" value ="登録"></p>
    </form>
    
</div>

<div class="sub">
<h2>資料一覧から検索</h2>
<form method ="POST" action="select.php">
    <p>検索ワード<input type="text" name="keyword" id="keyword"></p>
    <p>タグ<input type="text" name="search_tag" id="search_tag"></p>
    <p><input type="submit" name="submit" id="submit" value="検索"></p>
    <p class="all"><a href="select.php">すべて表示</a></p>
</div>
</form>
</div>
</main>
</body>
</html>