<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8;','root','zquickF6');
// 出力用のスクリプトでユーザーが入力したデータを更新するため、？を定義し、execute関数で出力するための準備をする。
$sql=$pdo->prepare('update product set name=?, price=? where id=?');
// empty関数で入力し忘れの時の条件分岐をコーディングする。
if(empty($_REQUEST['name'])){
    echo '商品名を入力してください';
} else
//  preg_match関数で数字以外を入力した際の条件分岐を定義する。
if(!preg_match('/[0-9]+/', $_REQUEST['price'])){
    echo '商品価格を整数で入力してください。';
} else
// execute関数で正しく入力した際のスクリプトを記述する。
if($sql->execute(
    [htmlspecialchars($_REQUEST['name']),$_REQUEST['price'],$_REQUEST['id']]
)) {
    echo '更新に成功しました。';
} else{
    echo '更新に失敗しました。';
}
?>
</body>
</html>