<?php 

// function find_missing_letter(array $array): string {
// 	$char = array();
// 	foreach ($array as $value) {
// 		$char[] = ord($value);
// 	}

// 	return chr(current(array_diff(range($char[0], $char[count($char)-1]),$char)));
// }
//原来range()也可以生成字母数组的^.^
function find_missing_letter(array $array): string {
	return current(array_diff(range(current($array), end($array)),$array));
}

echo find_missing_letter(['a','b','c','d','f']);