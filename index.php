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

    echo "<pre>";
    print_r($rows);
    echo "</pre>";
    ?>
    <table>
        <?php
        foreach($rows as $row)
        {
            echo "<tr>";
            echo "<td>{$row['school_num']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['birthdsy']}</td>";
            echo "<td>{$row['graduate_at']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>