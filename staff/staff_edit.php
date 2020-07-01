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

    <p>スタッフ修正</p>
    <p>スタッフコード</p>
    <?php print $staff_code?>
    <br>
    <br>
    <form action="staff_edit_check.php" method="post">
        <input type="hidden" name="code" value="<?php print $staff_code?>">
        <p>スタッフ名</p>
        <input type="text" name="name" style="width:200px" value='<?php print $staff_name?>'>
        <p>パスワードを入力してください</p>
        <input type="password" name="pass" style="width:100px"><br>
        <p>パスワードをもう一度入力してください</p>
        <input type="password" name="pass2" style="width:100px"><br>
        <br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>
</html>