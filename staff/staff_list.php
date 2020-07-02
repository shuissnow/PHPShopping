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
        $db = new PDO('mysql:dbname=shop;host=localhost;charset=utf8', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT code, name FROM mst_staff WHERE 1';
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $db = null;

        print 'スタッフ一覧<br>';

        print '<form method="post" action="staff_branch.php">';
        while(true)
        {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if($rec == false)
            {
            break;
            }
            print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
            print $rec['name'];
            print '<br>';
        }
        print '<input type="submit" name="add" value="追加">';
        print '<input type="submit" name="edit" value="修正">';
        print '<input type="submit" name="delete" value="削除">';
        print'</form>';
    }
    catch(Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をおかけしています。'; 
        exit();
    }
?>
</body>
</html>