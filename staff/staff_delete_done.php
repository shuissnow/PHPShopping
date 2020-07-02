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
            $staff_code = $_POST['code'];

            $db = new PDO('mysql:dbname=shop;host=localhost;charset=utf8', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = 'DELETE FROM mst_staff WHERE code=?';
            $stmt = $db->prepare($sql);
            $stmt->execute($data);

            $db = null;
        }
        catch(Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をおかけしています。'; 
            exit();
        }
        
    ?>
    <p>削除しました。</p>
    <a href="staff_list.php">戻る</a>
</body>
</html>