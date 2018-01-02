<?php 

function multiply1(string $a, string $b): string {
  	return (string)(int)$a*(int)$b;
}

function multiply(string $a, string $b): string {
  	$arra = str_split($a);
  	$arrb = str_split($b);
  	$arrc = array();
  	foreach ($arrb as $key => $value) {
  		$arrc[$key] = array();
  		foreach ($arra as $k => $v) {
  			$arrc[$key][] = $value*$v;
  		}
		for ($i=0; $i < $key; $i++) { 
			array_unshift($arrc[$key],0);
		}
  	}
  	$maxCount = count(end($arrc));
  	foreach ($arrc as $key => $value) {
  		$count = count($value);
  		$arrc[$key] = array_merge($arrc[$key],array_fill($count, $maxCount-$count, 0));
  	}
  	$arrd = array();
  	for ($i=0; $i < $maxCount ; $i++) { 
  		$arrd[] = array_sum(array_column($arrc, $i));
  	}
  	$dCount = count($arrd);
  	$arre = array();
	$temp = 0;
  	for ($i=$dCount-1; $i >=0 ; $i--) { 
  		if($i == $dCount-1){
  			$arre[] = (string)($arrd[$i]%10);
  			$temp = floor($arrd[$i]/10);
  		}elseif($i == 0){
  			$arre[] = (string)($temp+$arrd[$i]);
  		}else{
  			$arre[] = (string)(($temp+$arrd[$i])%10);
  			$temp = floor(($temp+$arrd[$i])/10);
  		}
  
  	}
  	return preg_replace('/^0*/', '', (string)implode('', array_reverse($arre)))==''?'0':preg_replace('/^0*/', '', (string)implode('', array_reverse($arre)));
}

// echo multiply("2", "0");
echo "<br>".multiply("0000001", "3");
echo "<br>".multiply("98765", "56894");
echo "<br>".multiply1("98765", "56894");
echo "<br>".multiply("1020303004875647366210", "2774537626200857473632627613");
echo "<br>".multiply("9007199254740991", "9007199254740991");
echo "<br>".multiply1("1020303004875647366210", "2774537626200857473632627613");