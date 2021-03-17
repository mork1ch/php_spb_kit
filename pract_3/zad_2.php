<?php
    $gsum = 0;
    $psum = 0;
    $d = 0;

    $num = array(
        array(0,0,0,0,0),
        array(0,0,0,0,0),
        array(0,0,0,0,0),
        array(0,0,0,0,0),
        array(0,0,0,0,0)
    );

    for($i = 0; $i < 5; $i++){
        for($n = 0; $n < 5; $n++){
            $num[$i][$n] = rand(0,10);
        }
    }

    for($b = 0; $b < 5; $b++){
        $gsum = $gsum + $num[$b][$b];
    }
    echo "сумма главной - $gsum\n";

    for ($c = 5; $c > 0; $c--){
        $psum = $psum + $num[$d][$c];
        $d++;
    }
    echo "сумма побочной - $psum";
?>