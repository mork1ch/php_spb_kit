<?php

$length = rand(5, 50);  //длина массива
$arr = array($length);  //создание массива
$param = rand(1,100);


for($i = 0; $i < $length; $i++) {   //заполнение массива рандомными числами
    $arr[$i] = rand(1, 100);
}

for($i = 0; $i < $length; $i++) {   //вывод исходного массива
    echo $arr[$i]." " ;
}


function sort_mass($array, $a, $n){   //сортировка методом пузырька
    for ($i = 0; $i < $a; $i++) {

        for($j = 0; $j < $a - $i - 1; $j++){

            if(abs($n - $array[$j]) > abs($n - $array[$j + 1])) { //сравниваем по модулю

                $value = $array[$j+1];  //меняем местами

                $arr[$j + 1] = $array[$j];
                $arr[$j] = $value;
            }
        }
    }
    echo "\n";
    for($i = 0; $i < $a; $i++) {    //вывод массива
    echo $arr[$i]." ";
    }
}

echo ("\n".$n."\n"); //вывод параметра

echo sort_mass($arr, $length, $param);  //Вызов функции

?>