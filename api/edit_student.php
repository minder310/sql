<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

$sql="UPDAT `students` SET `name`='丁于引',`birthday`='1988-07-14' WHERE `ID`='1'";


$res=$pdo->exec($sql);
echo "編輯成功:".$res;




?>