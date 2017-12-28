<?php 

function compare($arr1,$arr2){
	$array = array();
	if($arr1 == null || $arr2 == null){
		return false;
	}
	if(empty($arr1) || empty($arr2)){
		return false;
	}
	if(count($arr1) != count($arr2)){
		return false;
	}
	foreach ($arr2 as $key => $value) {
		$array[] = sqrt($value);
	}
	
	sort($arr1);
	sort($array);

	foreach ($arr1 as $key => $value) {
		if($array[$key] != $value){
			return false;
		}
	}
	return true;
	
}

$a1 = [121, 144, 19, 161, 19, 144, 19, 11];
$a2 = [11*11, 121*121, 144*144, 19*19, 161*161, 19*19, 144*144, 19*19];
echo compare($a1, $a2);
echo "--true<br>";
$a1 = [121, 144, 19, 161, 19, 144, 19, 11];
$a2 = [11*21, 121*121, 144*144, 19*19, 161*161, 19*19, 144*144, 19*19];
echo compare($a1, $a2);
echo "--false<br>";