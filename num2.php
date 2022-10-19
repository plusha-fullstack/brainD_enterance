<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>2 номер</title>
</head>
<body>
	<h1>Ошибки и ворнинги</h1>
        <form method="post">
        <p>Введите число ошибок:</p>
        <p><input type="number" size="5" name="num1" value="0"></p>
        <p>Введите число предупреждений:</p>
        <p><input type="number" size="5" name="num2" value="0"></p>
        <input type="submit" value="Ввести">
  </form>
  <br>
<?php
if (!empty($_POST)){
$n = (int)$_POST['num1'];
$m = (int)$_POST['num2'];
if ($n < 0 || $m < 0 || $n > 1000 || $m > 1000){
    echo 'Неверные данные входа';
} else{
$iterations = 0;
$iterations += intdiv($m, 2);
$n += intdiv($m, 2);
$m = $m % 2;
$iterations += intdiv($n, 2);
$n = $n % 2;
if ($n == 0 && $m == 0){
    echo 'Количество коммитов: '.$iterations;
}
else {
    if ($n == 1 && $m == 0){
        echo 'Количество коммитов: -1';
    }
    if ($n == 0 && $m == 1){
        echo 'Количество коммитов: '.($iterations + 6);
    }
    if ($n == 1 && $m == 1){
        echo 'Количество коммитов: '.($iterations + 3);
    }

}
}
}
