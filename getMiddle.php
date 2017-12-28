<?php 

function getMiddle($text) {
 	$array = str_split($text);
 	$count = count($array);
 	if($count%2==1){
 		return $array[ceil($count/2)-1];
 	} else{
 		return $array[ceil($count/2)-1].$array[ceil($count/2)];
 	}
}
echo getMiddle("test");