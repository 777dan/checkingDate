<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checking</title>
</head>

<body>
    <h1>Checking</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
        <input type="text" name="inputBirthday">
        <input type="submit" name="checkdate" value="Проверить дату рождения">
    </form><br>
    <?php
    $birthday = date("m.d.Y", mktime(0, 0, 0, 1, 25, 2007));
    if (isset($_GET['checkdate'])) {
        $inputBirthday = $_GET['inputBirthday'];
        preg_replace("/(\.|,|\s|:)/", "", $birthday);
        $day = (int)(substr($inputBirthday, 0, (0 - (strlen($inputBirthday) - 2))));
        $month = (int)(substr($inputBirthday, 3, (0 - (strlen($inputBirthday) - 5))));
        $year = (int)(substr($inputBirthday, 6));
        if (checkdate($day, $month, $year) == true && checkdate($day, $month, $year) == $birthday){
            echo "День рождения проверен!";
        } else {
            echo "Введите день рождения верно!";
        }
    }
    ?>
</body>

</html>