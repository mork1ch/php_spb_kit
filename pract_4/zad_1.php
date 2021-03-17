<?php
    function mb_ucfirst($str) {
        return mb_substr(mb_strtoupper($str,'utf-8'),0,1,'utf-8').mb_strtolower(mb_substr($str,1,mb_strlen($str,'utf-8'),'utf-8'),'utf-8');
    } 
    
    $name = 'садовсикй Юрий алексеевич';
    $explode = explode(' ',$name);
    
    $last_name = mb_ucfirst($explode[0]);
    $name = mb_ucfirst($explode[1]);
    $surname = mb_ucfirst($explode[2]);
    
    echo $last_name.' '.mb_substr($name,0,1,'utf-8').'.'.mb_substr($surname,0,1,'utf-8');
?>