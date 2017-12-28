<?php 
function evaporator($content, $evap_per_day, $threshold) {
	$day = 1;
    $con = $content*(1-$evap_per_day/100);
    while($con/$content*100 > $threshold){
    	$con = $con*(1-$evap_per_day/100);
    	$day ++;
    }
    return $day;
}
echo evaporator(10,10,10);