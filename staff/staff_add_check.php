<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
</head>
<body>
    <?php
    $staff_name = $_POST['name'];
    $staff_pass = $_POST['pass'];
    $staff_pass2 = $_POST['pass2'];

    $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
    $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8'); 
    $staff_pss2 = htmlspecialchars($staff_pass2, ENT_QUOTES,'UTF-8');

    if($staff_name == '')
    {
        print '名前を入力してください <br>';
    }
    else
    {
        print 'スタッフ名:';
        print $staff_name;
        print '<br>';
    }
    
    if($staff_pass='')
    {
        print 'パスワードが入力されていません<br>';

    }
    if($staff_pass!=$staff_pass2)
    {
        print 'パスワードが一致していません<br>';

    }
    if($staff_name == '' || $staff_pass == '' || $staff_pass != $staff_pass2)
    {
        print '<form>';
        print '<input type="button" onclick="history.back()" value="戻る">';
        print '</form>';
    }
    else
    {
        $staff_pass = md5($staff_pass);
        print'<form action="post" action="staff_add_done.php">';
        print'<input type="hidden" name="name" value="'.$staff_name.'">';
        print'<input type="hidden" name="pass" value="'.$staff_pass.'">';
        print'<br>';
        print'<input type="button" onclick="history.back()" value="戻る">';
        print'<input type="submit" value="OK">';
        print'</form>';
    }
    ?>
    スタッフ追加<br>
    <br>
    <form action="staff_add_check.php" method="post">
        スタッフ名を入力してください<br>
        <input type="text name" name="name" style="width:200px"><br>
        パスワードを入力してください<br>
        <input type="password" name="pass" style="width:100px"><br>
        パスワードをもう一度入力してください<br>
        <input type="password" name="pass" style="width:100px"><br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>
</html>