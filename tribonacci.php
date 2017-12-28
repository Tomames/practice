<?php 

function tribonacci($signature, $n) {
	if($n<=0){
		return array();
	}elseif($n <= 3){
		return array_slice($signature,0, $n);
	}else{
		$arr = $signature;
		$i = 3;
		while($i <= $n-1){
			$arr[$i] = $arr[$i-3]+$arr[$i-2]+$arr[$i-1];
			$i ++;
		}
		return $arr;
	}

}	

var_dump(tribonacci([1,1,1],10));