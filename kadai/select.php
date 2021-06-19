<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お役立ち資料一覧</title>
    <script src="js/jquery-2.1.3.min.js"></script>
</head>
<body>

<h1>検索結果表示</h1>

<table id ="summary" border='3'> 
<tr>
	<th>タイトル</th>
	<th>URL</th>
	<th>詳細</th>
	<th>タグ</th>
	<th>登録日時</th>
</tr>
<button id="search">検索</button>

<!-- <?= $view ?> -->



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
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");

//検索バージョン（検索条件なければ一覧を表示）
// if($keyword!="" OR $search_tag!=""){
//     $stmt =$pdo->prepare ("SELECT * FROM gs_bm_table WHERE details LIKE '%$keyword%' OR WHERE tag=$search_tag");
// }else{
//     $stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
// }

// $pdo = new PDO($dsn, $username, $password, $options);
//         if(@$_POST["id"] != "" OR @$_POST["user_name"] != ""){ //IDおよびユーザー名の入力有無を確認
//             $stmt = $pdo->query("SELECT * FROM user_list WHERE ID='".$_POST["id"] ."' OR Name LIKE  '%".$_POST["user_name"]."%')"); //SQL文を実行して、結果を$stmtに代入する。
//         }


//実行
$status = $stmt->execute();

//データを繰り返し処理で取り出し（表示はHTMLで）
$title_view = "";
$url_view = "";
$details_view = "";
$tag_view = "";
$indate_view = "";

$view="";

if($status==false){
    $error = $stmt->errorInfor();
    exit("ErrorQuery:". $error[2]);
}else{
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $title_view .= $result['title'];
        $url_view .= $result['url'];
        $details_view .= $result['details'];
        $tag_view .= $result['tag'];
        $indate_view .= $result['indate'];
        // $view .= "<p>";
        // $view .= $result['title'].':'.$result['url'].' '.$result['details'].' '.$result['tag'];
        // $view .= "</p>";
    }
}

?>

<!-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お役立ち資料一覧</title>
</head>
<body>

<p>検索結果表示</p>  -->

<script>
console.log(<?=$title_view ?>);

$("#search").on("click",function(){
let summary = '<tr><td>'+<?=$title_view ?>+'</td><td>'+<?=$url_view ?>+'</td><td>'+<?=$details_view ?>+'</td><td>'+<?=$tag_view ?>+'</td><td>'+<?=$indate_view ?>+'</td></tr>';
console.log(summary);
$("#view").append(summary);
});

</script>

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

<!-- <?= $view ?> -->

</table>
</body>
</html>