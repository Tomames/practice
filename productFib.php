<?php 
// function productFib($prod) {
//   	$arr = array();
//   	$i = 0;
//   	do {
//   		if($i==0){
//   			$arr[$i] = 0;
//   		}elseif($i==1){
//   			$arr[$i] = 1;
//   		}else{
//   			$arr[$i] = $arr[$i-1] + $arr[$i-2];
//   		}
//   		$i ++ ;
//   	} while ($arr[$i-1]*$arr[$i-1]<$prod);
//   	$n = $i-1;
//   	if($arr[$n-1]*$arr[$n]==$prod){
//   		return array($arr[$n-1],$arr[$n],True);
//   	}elseif($arr[$n-1]*$arr[$n]<$prod){
//   		return array($arr[$n],$arr[$n]+$arr[$n-1],False);
//   	}else{
//   		return array($arr[$n-1],$arr[$n],False);
//   	}
// }

function productFib($prod) {
  $a = 0; $b = 1;
  while ($a * $b < $prod) {
    $next = $a + $b;
    $a = $b;
    $b = $next;
  }
  return [$a, $b, $a * $b == $prod];
}
var_dump(productFib(372101));