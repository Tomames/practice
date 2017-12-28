<?php 

function nbYear($p0, $percent, $aug, $p) {
	$n = 1;
    $pop = $p0*(1+$percent/100)+$aug;
    while($pop < $p){
    	$pop = $pop*(1+$percent/100)+$aug;
    	$n++;
    }
    return $n;
}

echo nbYear(1500, 5, 100, 5000);