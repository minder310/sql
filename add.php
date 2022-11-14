<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增學生</title>
</head>
<body>
<h1>新增學生</h1>
<form action="api/add_dtudent.php" method="post">
    <table>
        <tr>
            <td>school_num</td>
            <td><input type="text" name="school_num" id=""></td>
        </tr>
        <tr>
            <td>name</td>
            <td><input type="text" name="name" id=""></td>
        </tr>
        <tr>
            <td>birthday</td>
            <td><input type="date" name="birthday"></td>
        </tr>
        <tr>
            <td>uni_id</td>
            <td><input type="text" name="nui_id"></td>
        </tr>
        <tr>
            <td>addr</td>
            <td><input type="text" name="addr"></td>
        </tr>
        <tr>
            <td>parents</td>
            <td><input type="text" name="parents"></td>
        </tr>
        <tr>
            <td>tel</td>
            <td><input type="text" name="tel"></td>
        </tr>
        <tr>
            <td>dept</td>
            <td>
                <select name="dept">
                <?php
                    $sql="SELECT * FROM `dept`";
                    $depts=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                    foreach($depts as $dept){
                        echo "<option value='{$dept['id']}'>{$dept['name']}</option>";
                    }

                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>graduate_at</td>
            <td>
                <select name="graduate_at">
                    <?php
                    $sql="SELECT * FROM `graduate_school`";
                    $grads=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                    foreach($grads as $grad){
                        echo "<option value='{$grad['id']}'>{$grad['county']}{$grad['name']}</option>";
                    }
                    print_r($sql);
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>status_code</td>
            <td>

            </td>
        </tr>
        <tr>
            <td>班級</td>
            <td>
            <select name="classes">
                    <?php
                    $sql="SELECT `id`,`name` FROM `classes`";
                    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row){
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                    print_r($sql);
                    ?>
            </td>
        </tr>
        <tr>
            <td>座號</td>
            <td></td>
        </tr>
    </table>
    <input type="subimit" value="確認新增">
</form>
</body>
</html>