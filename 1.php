<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>1 номер</title>
</head>
<body>
	<h1>Ссылка на статью</h1>
  <br>
<?php
# проблемы с этим заданием
#1) очистка строки от мусора
#2) работа с кириллицей
function last_three_words($text):string
{
# функция идет справа налево и дописывает в cut_str символы из аргумента функции
# до тех пор пока не попадется 3-ий пробел(то есть найдено 3 слова)
# наверное выделение 3-х слов можно было сделать проще 
# но implode и split не дали нужного результата
    $spaces = 0;
    $cut_str = "";
    for ($i = strlen($text) - 1; $i >= 0; $i--) {
        if ($text[$i] == " "){
            $spaces += 1;
            if ($spaces > 3){
                break;
            }
            $cut_str = $text[$i].$cut_str;
        } else {
            $cut_str = $text[$i].$cut_str;
        }

    }
    return $cut_str;
}
$articleLink = "https://braindagency.notion.site/backend-d91d156eb7e449358996948d1dd45b84#:~:text=%D0%9F%D1%80%D0%B8%D0%B2%D0%B5%D1%82!%20%D0%9F%D1%80%D0%B5%D0%B4%D0%BB%D0%B0%D0%B3%D0%B0%D0%B5%D0%BC%20%D1%82%D0%B5%D0%B1%D0%B5,%D0%B2%20%D0%BE%D0%B4%D0%B8%D0%BD%20%D1%80%D0%B5%D0%BF%D0%BE%D0%B7%D0%B8%D1%82%D0%BE%D1%80%D0%B8%D0%B9.";
$articleText = "Привет! Предлагаем тебе выполнить тестовое в школу разработчиков.<br>
Если не получилось выполнить все задания, шанс попасть в школу все равно есть, можно<br>
прислать то, что получилось. Мы будем смотреть на правильность выполнения заданий,<br>
качество кода, аккуратность. Это будет учитываться не только при поступлении, но и при<br>
переходе с первого этапа на второй, так что постарайся показать максимум своих <br>
возможностей. <br><br>
Результат выполнения всех заданий можно положить в один репозиторий.";
# главная сложность с которой я столкнулся это обрезание строки
# из-за того,что текст на кириллице приходится иметь дело с мульбитайтом

# необходимо очистить строку
$articlePreview = trim($articleText);# удаляем незначащие пробелы если они есть
$articlePreview = strip_tags($articlePreview);# вычищаем строку от HTML тэгов
$articlePreview = mb_substr($articlePreview,0,200);# обрезаем мультибайтовую строку
$last_three = "<a href = '$articleLink'> ".last_three_words($articlePreview)."...</a>";
#в last_three хранятся последние три слова с многоточием (они выделены с помошью функции)
$articlePreview =  mb_substr($articlePreview,0,200 - mb_strlen(last_three_words($articlePreview)));
# здесь мы обрезаем начальный текст на 3 слова и затем клеим справа эти 3 слова, ставшие ссылкой
echo $articlePreview.$last_three;
