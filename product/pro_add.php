<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
</head>
<body>
    商品を追加<br>
    <br>
    <form action="pro_add_check.php" method="post">
        商品名を入力してください<br>
        <input type="text name" name="name" style="width:200px"><br>
        価格を入力してください<br>
        <input type="text" name="price" style="width:50px"><br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>
</html>