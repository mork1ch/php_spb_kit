<?php
$age = rand(1, 100); //обьявляю пременную $age на рандоме от 1 до 100. Как по другому вводить возраст не знаю.

if (($age < 35) && ($age > 17)){
    echo("Счастливчик \n");
} else {
    echo("Не повезло \n");
    if ($age<17){
        echo("Слишком молод \n");
    }
}
echo("Ваш возраст - $age");
?>