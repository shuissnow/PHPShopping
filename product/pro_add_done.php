<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
</head>
<body>
    <?php
        try
        {
            $pro_name = $_POST['name'];
            $pro_price = $_POST['price'];

            $pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
            $pro_price = htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');

            $db = new PDO('mysql:dbname=shop;host=localhost;charset=utf8', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = 'INSERT INTO mst_product(name,price) VALUES(?,?)';
            $stmt = $db->prepare($sql);
            $data[] = $pro_name;
            $data[] = $pro_price;
            $stmt->execute($data);

            $db = null;

            print $pro_name; 
            print 'を追加しました。<br>';
        }
        catch(Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をおかけしています。'; 
            exit();
        }
        
    ?>
    <a href="pro_list.php">戻る</a>
</body>
</html>