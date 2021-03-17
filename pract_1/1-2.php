<?php

$chisloFirst = 132;
$chisloSec = 264;

$deistv = rand( 1 , 4);

echo ($deistv);

if ($deistv == 1){
    echo ($chisloFirst + $chisloSec);
}
if ($deistv == 2){
    echo ($chisloFirst - $chisloSec);
}
if ($deistv == 3){
    echo ($chisloFirst / $chisloSec);
}
if ($deistv == 4){
    echo ($chisloFirst * $chisloSec);
}


?>