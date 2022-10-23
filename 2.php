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
	<!-- 
	ниже формочка для считывания 2-х значений
	-->
        <form method="post">
        <p>Введите число ошибок:</p>
        <p><input type="number" size="5" name="num1" value="0"></p>
        <p>Введите число предупреждений:</p>
        <p><input type="number" size="5" name="num2" value="0"></p>
        <input type="submit" value="Ввести">
  </form>
  <br>
<?php
if (!empty($_POST))
{ # проверяем что запрос не пустой чтобы не вылезали ворнинги
    $n = (int)$_POST['num1'];
    $m = (int)$_POST['num2'];
    if ($n < 0 || $m < 0 || $n > 1000 || $m > 1000)
    {
        echo 'Неверные данные входа';
    }
    else
    {
        # алгоритм просто: сначала избавляемся от всех ворнингов m (увеличивая итерации и увеличивая эроры)
        $iterations = 0;
        $iterations += intdiv($m, 2);
        $n += intdiv($m, 2);
        $m = $m % 2;
        $iterations += intdiv($n, 2);
        $n = $n % 2;
        if ($n == 0 && $m == 0)
        {
            echo 'Количество коммитов: ' . $iterations;
        }
        else
        { # мы попадаем в одну из 4 ситуаций
            # e -1 w - 0 эта ситуация не разрешима поэтому выводим -1
            # e -0 w - 1 эта ситуация разрешима в 6 итераций (ew: 01 - 02 - 03 - 04 - 12 - 20 - 00)
            # e -1 w - 1 эта ситуация разрешима в 3 итерации (ew: 11 - 12 - 20 - 00)
            # e -0 w - 0 эту ситуацию проверили выше(уже решено)
            if ($n == 1 && $m == 0)
            {
                echo 'Количество коммитов: -1';
            }
            if ($n == 0 && $m == 1)
            {
                echo 'Количество коммитов: ' . ($iterations + 6);
            }
            if ($n == 1 && $m == 1)
            {
                echo 'Количество коммитов: ' . ($iterations + 3);
            }

        }
    }
}

