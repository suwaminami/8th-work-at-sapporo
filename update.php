<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。

//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る

//2. $id = POST["id"]を追加

//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更


//1. POSTデータ取得
$name   = $_POST['name'];
$email  = $_POST['email'];
$age    = $_POST['age'];
$content = $_POST['content'];
//これはなんですか？detail.phpのhiddenで送られたid
$id = $_POST["id"]; //これを追加しましょう🤗

//2. DB接続します
// function.phpに記述したものを書きますよ🤗↓
// これが一番最初に書く、呼び出したい時！🤗
require_once('funcs.php');
$pdo = db_conn();


//３．データ更新SQL作成
// $stmt = $pdo->prepare("INSERT INTO gs_an_table(name,email,age,content,indate)VALUES(:name,:email,:age,:content,sysdate())");
$stmt = $pdo->prepare( 'UPDATE gs_an_table SET name = :name, email = :email, age = :age, content = :content, indate = sysdate() WHERE id = :id;' );

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);

// hiddenで受け取ったidをbindValueを用いて「安全かチェック」をする＝SQLインジェクション対策
$stmt->bindValue(':id', $id, PDO::PARAM_STR); //数値 なぜ？DBの設定でidを登録するときにINTにしているから🤗
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}