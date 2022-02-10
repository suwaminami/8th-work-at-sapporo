<?php

require_once('funcs.php');
$pdo = db_conn();
/**
 * １．PHP
 * [ここでやりたいこと]
 * まず、クエリパラメータの確認 = GETで取得している内容を確認する
 * イメージは、select.phpで取得しているデータを一つだけ取得できるようにする。
 * →select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * ※SQLとデータ取得の箇所を修正します。
 */
$id = $_GET["id"];
// 保育園の詳細を書く
$stmt = $pdo->prepare('SELECT * FROM gs_an_table WHERE id=:id;');

## sqlが安全かチェックする
$stmt->bindValue(':id',$id,PDO::PARAM_INT);

## sqlを実行
$status = $stmt->execute();

## 結果表示

$view = '';

if ($status === false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}



?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>フリーアンケート</legend>
                <label>名前：<input type="text" name="name" value="<?= $result['name'] ?>"></label><br>
                <label>Email：<input type="text" name="email" value="<?= $result['email']?>"></label><br>
                <label>年齢：<input type="text" name="age" value="<?= $result['age'] ?>"></label><br>
                <label><textarea name="content" rows="4" cols="40"><?= $result['content'] ?></textarea></label><br>


                <!-- ここに１つ追加します -->
                <input type='hidden' name="id" value="<?=$result["id"]?>">
                 <!-- ここに１つ追加します -->

                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>

