<?php 
for ($i = 0; $i < 10; $i++)
  {
    $array = array ($i => rand (0, 50) * 2);
    foreach ($array as $key => $value){
        if (($value % 5 !== 0) and ($value % 6 !== 0)){
	        echo "$key : $value\n";
	    }
    }
  }
?>