<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3 номер</title>
</head>
<body>
<h1>Странная математика</h1>
<!-- 
	ниже формочка для считывания 2-х значений
	-->
<form method="post">
	
    <p>Введите порядок k:</p>
    <p><input type="number" size="5" name="num1" value="0"></p>
    <p>Введите количество чисел n:</p>
    <p><input type="number" size="5" name="num2" value="0"></p>
    <input type="submit" value="Ввести">
</form>
<br>
<?php
# собственная функция сравнения двух строк(наших чисел)
function compare($str1, $str2)
{
    #будем сравнивать по длине наименьшего (len)
    if (strlen($str1) > strlen($str2))
    {
        $len = strlen($str2);
    }
    else
    {
        $len = strlen($str1);
    }
    #с помощью функции сравнения строк strcmp
    #по-элементно сравнием строки по длине меньшей
    for ($i = 0;$i < $len;$i++)
    {
        if (strcmp($str1[$i], $str2[$i]) < 0)
        {
            return -1;
        }
        elseif (strcmp($str1[$i], $str2[$i]) > 0)
        {
            return 1;
        }
    }
    #если же строки совпали по len
    # то меньшей оказывается та которая короче
    if (strlen($str1) > strlen($str2))
    {
        return 1;
    }
    else
    {
        return -1;
    }
}
if (!empty($_POST))
{
    $k = (int)$_POST['num1'];
    $n = (int)$_POST['num2'];
    $arr = [];
    for ($i = 1;$i <= $n;$i++)
    { # заполняем массив в обычной математике
        $arr[$i] = (string)$i;
    }
    for ($i = 1;$i <= $n;$i++)
    { # сортировка пузырьком(но вместо > или < используем функцию compare)
        for ($j = 1;$j <= $n - $i;$j++)
        {
            if (compare($arr[$j], $arr[$j + 1]) == 1)
            {
                #если значения стоят неправильно меняем их местами через 3-ую переменную
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;

            }

        }

    }

    foreach ($arr as & $value)
    { # выводим обновленный массив на всякий случай
        echo $value . ' ';
    }
    echo "<br>";
    for ($i = 1;$i <= $n;$i++)
    {
        if ($arr[$i] == $k)
        {
            echo "В странной математике число $k находится на месте $i (считая с 1)";
        }

    }
}

