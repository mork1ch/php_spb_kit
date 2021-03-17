<?php

$array = [
    "Name" =>   "one",
    "Adress" => "prosvet 55 k 0 kv 213",
    "Phone" =>  "+2 (696) 978-98-32",
    "Mail" =>   "prosvet@dno.ru"
    ];
    

foreach ($array as $key => $value) {
    echo "$key : ";
    echo "$value\n";
}

?>