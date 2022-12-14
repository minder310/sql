<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生管理系統</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>學生管理系統</h1>
    <nav>
    <?php
    if(isset($_GET['status']))
    ?>

    </nav>
    <nav>
        <a href="add.php">新增學生</a>
        <a href="reg.php">教師註冊</a>
        <a href="login.php">教師登入</a>
    </nav>
    <?php
    // 告訴她資料庫基本參數。
    // 資料庫型態，資料庫位置，編碼，取用資料。
    $dsn="mysql:host=localhost;charset=utf8;dbname=school";
    // PDO(資料庫相關設定，帳號，密碼。)
    $pdo=new PDO($dsn,'root','');

    // 機料庫的基本語法。limt 數值，只顯示多少資料。
    $sql="SELECT * FROM `students` LIMIT 20";

    // 將資料送進資料庫，query查詢，fetchAll()拿全部的資料，>瘦箭頭,PDO::是只要取用的資料是哪種，盡量減少資料傳輸FETCH:ASSOC,NAMED 。
    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // print_r($rows);
    // echo "</pre>";
    ?>
    <table class="list-students">
        <tr>
            <td>學號</td>
            <td>姓名</td>
            <td>生日</td>
            <td>畢業國中</td>
            <td>年齡</td>
        </tr>
        <?php
        foreach($rows as $row)
        {
            $age=round(((strtotime('now')-strtotime($row['birthday'])))/(60*60*24*365),1);
            echo "<tr>";
            echo "<td>{$row['school_num']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['birthday']}</td>";
            // $year = explode("-",$row['birthday']);
            // echo "<td>".date("Y")-$year[0]."歲</td>";
            echo "<td>{$row['graduate_at']}</td>";
            echo "<td>$age</td>";
            echo "<td>";
            echo "<a href='edit.php?=id{$row['id']}'>編輯</a>";
            echo "<a href='del.php?=id{$row['id']}'>刪除</a>";
            echo "</td>";
            echo "</tr>";
            
        }
        print_r (explode("-",$row['birthday']));
        ?>
    </table>
</body>

</html>