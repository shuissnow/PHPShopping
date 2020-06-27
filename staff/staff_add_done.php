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
            $staff_name = $_POST['name'];
            $staff_pass = $_POST['pass'];

            $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
            $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');
            $db = new PDO('mysql:dbname=shop;host=localhost;charset=utf8', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = 'INSERT INTO mst_staff(name,password) VALUES(?,?)';
            $stmt = $db->prepare($sql);
            $data[] = $staff_name;
            $data[] = $staff_pass;
            $stmt->execute($data);

            $db = null;

            print $staff_name; 
            print 'さんを追加しました。<br>';
        }
        catch(Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をおかけしています。'; 
            exit();
        }
        
    ?>
    <a href="staff_list.php">戻る</a>
</body>
</html>