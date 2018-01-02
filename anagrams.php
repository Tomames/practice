<?php
// function anagrams(string $word, array $words): array {
//   	$stand = str_split($word);
//   	$init = array_count_values($stand);
//   	ksort($init);
//   	$result = array();
//   	foreach ($words as $key => $value) {
//   		$temp = str_split($value);
//   		$tempinit = array_count_values($temp);
//   		ksort($tempinit);
//   		$diff = array_diff_assoc($tempinit,$init);
//   		$diff = array_merge($diff,array_diff_assoc($init,$tempinit));
//   		if(empty($diff)){
//   			$result[] = $value;
//   		}
//   	}
//   	return $result;
// }

function anagrams(string $word, array $words): array {
$char = count_chars($word, 1);
$res = [];

foreach($words as $elem){
  if(count_chars($elem, 1) == $char){
    $res[] = $elem;
  }
}
return $res;
}

var_dump(anagrams('a', ['a', 'b', 'c', 'd']));
var_dump(anagrams('racer', ['carer', 'arcre', 'carre', 'racrs', 'racers', 'arceer', 'raccer', 'carrer', 'cerarr']));
