<?php

//XSS対策

//検索条件取得
$keyword =$_POST["keyword"];
$search_tag= $_POST["search_tag"];


//DB接続
try {
    $pdo = new PDO('mysql:dbname=power_links;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }
  

//表示するデータの選択
//＊は全選択
// $stmt = $pdo->prepare("SELECT * FROM gs_bm_table");

//検索バージョン（検索条件なければ一覧を表示、条件絞った後に新しいものから並べる、ができない）
if($keyword!=""){
    $stmt =$pdo->query ("SELECT * FROM gs_bm_table WHERE details LIKE '%$keyword%' ");
} else if ($search_tag!=""){
    $stmt =$pdo->query ("SELECT * FROM gs_bm_table WHERE tag='$search_tag' ");
} else {
    $stmt = $pdo->query("SELECT * FROM gs_bm_table ORDER BY indate DESC");
}


//実行
$status = $stmt->execute();

//データを繰り返し処理で取り出し（表示はHTMLで）
// $title_view = "";
// $url_view = "";
// $details_view = "";
// $tag_view = "";
// $indate_view = "";

$view="";

if($status==false){
    $error = $stmt->errorInfor();
    exit("ErrorQuery:". $error[2]);
}else{
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        // $title_view .= $result['title'];
        // $url_view .= $result['url'];
        // $details_view .= $result['details'];
        // $tag_view .= $result['tag'];
        // $indate_view .= $result['indate'];
        
        $view .= "<p>";
        $view .= $result['title'].' '.$result['url'].' '.$result['details'].' '.$result['tag'].' '.$result['indate'];
        $view .= "</p>";
        // <table>
        // $view .= <tr><td>$result['title']</td><td>$result['url']</td><td>$result['details']</td><td>$result['tag']</td><td>$result['indate']</td></tr>;
        // </table>
    }
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お役立ち資料一覧</title>
</head>
<body>

<p>検索結果表示</p> 

<!-- <tr>
	<td><?=$title_view ?></td>
	<td><?=$url_view ?></td>
	<td><?=$details_view ?></td>
	<td><?=$tag_view ?></td>
	<td><?=$indate_view ?></td>
</tr> -->

<!-- <table border='6'> 
<tr>
	<th>タイトル</th>
	<td>URL</td>
	<td>詳細</td>
	<td>タグ</td>
	<td>登録日時</td>
</tr> -->

<!-- <table>
<tr><th>タイトル</th><th>URL</th><th>詳細</th><th>タグ</th><th>登録日時</th></tr> -->
            <!-- ここでPHPのforeachを使って結果をループさせる -->
            <!-- <?php foreach ($stmt as $row): ?>
                <tr><td><? $row[0]?></td><td><? $row[1]?></td><td><? $row[2]?></td><td><? $row[3]?></td><td><? $row[4]?></td></tr>
            <?php endforeach; ?>
        </table> -->

<p id="table"><?= $view ?></p>
<!-- <table border="1"><?= $view ?></table> -->


</table>
</body>
</html>