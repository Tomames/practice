<?php 

function find_missing_letter(array $array): string {
	$char = array();
	foreach ($array as $value) {
		$char[] = ord($value);
	}

	return chr(current(array_diff(range($char[0], $char[count($char)-1]),$char)));
}

echo find_missing_letter(['a','b','c','d','f']);