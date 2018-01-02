<?php 

function perimeter($n) {
    $arr = array();
    $i = 0; 
    while($i <= $n){
    	if($i == 0 || $i == 1){
    		$arr[$i] = 1;
    	}else{
    		$arr[$i] = $arr[$i-1]+$arr[$i-2];
    	}
    	$i ++;
    }
    return array_sum($arr)*4;
}

var_dump(perimeter(5));