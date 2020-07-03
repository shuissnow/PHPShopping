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
            $staff_code = $_GET['staffcode'];
            $db = new PDO('mysql:dbname=shop;host=localhost;charset=utf8', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT name FROM mst_staff WHERE code=?';
            $stmt = $db->prepare($sql);
            $data[]=$staff_code;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $staff_name = $rec['name'];

            $dbh = null;
        }
        catch(Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をおかけしています';
            exit();
        }
    
    ?>

    <p>スタッフ情報参照</p>
    <p>スタッフコード</p>
    <?php print $staff_code?>
    <br>
    <p>スタッフ名</p>
    <?php print $staff_name;?>
    <br>
    <form >
        <input type="button" onclick="history.back()" value="戻る">
    </form>
</body>
</html>