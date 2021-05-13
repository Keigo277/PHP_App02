<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <div class="th0">商品番号</div>
 <div class="th1">商品名</div>
 <div class="th1">商品価格</div>
 <?php
 $pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8','root','zquickF6');
//  foreachによりデータベースからテーブル内のデータを全て取得する。
 foreach($pdo->query('select*from product') as $row){
     echo '<form action="output.php" method=post>';
//  echoでidと商品名、価格を表示させる。
     echo '<input type="hidden" name="id" value="', $row['id'], '">';
     echo '<div class="td0">', $row['id'], '</div>';
     echo '<div class="td1">';
// nameでSQLで登録されている商品名を順に表示させる。
     echo '<input type="text" name="name" value="', $row['name'], '">';
     echo '</div>';
     echo '<div class="td1">';
//  priceで登録されている価格を順に表示させる。
     echo '<input type="text" name="price" value="', $row['price'], '">';
     echo '</div>';
//  更新用のボタンの設定。
     echo '<div class="td2"><input type="submit" value="更新"></div>';
     echo '</form>';

 }
 ?>
</body>
</html>