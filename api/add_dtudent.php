<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

$sql="INSERT INTO `students` 
(`id`, `school_num`, `name`,
 `birthday`, `uni_id`, `addr`,
  `parents`, `tel`, `dept`,
   `graduate_at`, `status_code`) 
   VALUES 
   (NULL,'915084', '陳彥明', 
   '1984-06-12','F133322235','新北市太山區龍華里貴子街100-1號3樓', 
   '陳國雄', '02-12345678', 3, 
   5, '001')";

$res=$pdo->query($sql);
    $sql ="DELETE FROM `students` WHERE `name`='陳彥明'";
    //回傳刪除的值，以辨認新增或刪除了幾筆。
    $res=$pdo->exec($sql);
    echo "刪除成功:".$res;

?>