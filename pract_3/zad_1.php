<?php

    $chislo = rand(0,100);
    echo "ваше число - $chislo\n";
    $dvoich = '';

    while ($chislo > 1){
        $ost = $chislo % 2;
        $dvoich = $ost.$dvoich;
        $chislo = $chislo / 2;
    }
if ($chislo = 1){
        $dvoich = '1'.$dvoich;
}
    echo "Двоичная запись числа - $dvoich"

?>