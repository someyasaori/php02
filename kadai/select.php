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

//検索バージョン（検索条件なければ一覧を表示（新しいもの順）、条件絞った一覧を新しいものから並べる、ができない）
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
        
        $view .= "<tr>";
        $view .= "<td>".$result['title'].'</td><td>'.$result['url'].'</td><td>'.$result['details'].'</td><td>'.$result['tag'].'</td><td>'.$result['indate'];
        $view .= "</tr>";
        
        // $graph1 .="<tr>";
        // $graph1 .= "<td>".h($result1['category']).'</td><td>'.h($result1['COUNT(id)']);
        // $graph1 .="</tr>";

        // $rows[] =$row;

    }
    
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>お役立ち資料一覧</title>
</head>
<body>

<p class="summary">検索結果表示</p> 

<table class="result">
    <tr>
    <th>タイトル</th>
	<th>URL</th>
	<th>詳細</th>
	<th>タグ</th>
	<th>登録日時</th>
    </tr>
    <?= $view ?>
</table>

<!-- <p class="result"><?= $view ?></p> -->


</body>
</html>