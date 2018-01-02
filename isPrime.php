<?php
function is_prime(int $n): bool {
	if($n < 2){
		return false;
	}
	if($n == 2){
		return true;
	}
	$stand = sqrt($n);
   	for ($i=2; $i <= $stand ; $i++) { 
   		if($n%$i===0){
			return false;
   		}
   	}
   	return true;
}

var_dump(is_prime(1128892801));