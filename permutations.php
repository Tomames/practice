<?php 

function  permutations(string $str): array{
	$strarr = str_split($str);
	return array_unique(array_map(function($v){return implode('', $v);},createArr($strarr)));
}

function createArr(array $arr): array{
	$result = array();
	$count = count($arr);
	foreach ($arr as $key => $value) {
		$temp = $arr;
		if($count==1){
			$result[] = array($value);
		}else{
			array_splice($temp, $key, 1); 
			$newarr = createArr($temp);
			foreach ($newarr as $k => $v) {
				$result[] = array_merge(array($value),$v);				
			}
		}
	}
	return $result;
}	

function arrangement($a, $m) {  
    $r = array();  
  
    $n = count($a);  
    if ($m <= 0 || $m > $n) {  
        return $r;  
    }  
  
    for ($i=0; $i<$n; $i++) {  
        $b = $a;  
        $t = array_splice($b, $i, 1);  
        if ($m == 1) {  
            $r[] = $t;  
        } else {  
            $c = arrangement($b, $m-1);  
            foreach ($c as $v) {  
                $r[] = array_merge($t, $v);  
            }  
        }  
    }  
  
    return $r;  
} 
$a = array("A", "B", "C", "D");  
  
// $r = arrangement($a, 4);  
// var_dump($r);  

var_dump(permutations('abc')); 
var_dump(permutations('abba')); 