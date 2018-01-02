<?php
// function pickPeaks(array $arr) {

//     $count = count($arr);
//     $pos = array();
//     $peaks = array();
// 	$i = 1;
//     while ($i < $count-1) {
//     	if($arr[$i-1]<$arr[$i]&&$arr[$i]>$arr[$i+1]){
//     		$pos[] = $i;
//     		$peaks[] = $arr[$i];
//     	}elseif($arr[$i-1]<$arr[$i]&&$arr[$i]==$arr[$i+1]){
//     		$j = $i;
//     		while ($arr[$j+1] == $arr[$i] && $j < $count-2){
//     			$j ++;
//     		}
//     		if ($arr[$j] > $arr[$j+1]) {
//     			$pos[] = $i;
//     			$peaks[] = $arr[$i];
//     			$i = $j;
//     		}
//     	}
//     	$i++;
//     }

//     return array('pos'=>$pos,'peaks'=>$peaks);
// }

function pickPeaks(array $arr) {
    while(next($arr)) {
        if(key($arr) > 1 && prev($arr) == next($arr)) {
            unset($arr[key($arr)]);
            prev($arr);
        }
        if(next($arr) < prev($arr) && prev($arr) < next($arr)) {
            $result["pos"][] = key($arr);
            $result["peaks"][] = current($arr);
        }
    }
    return empty($result)? ["pos"=>[], "peaks"=>[]] : $result;
}
var_dump(pickPeaks([3,2,2, 1, 2, 2, 1]));
var_dump(pickPeaks([1,2,3,6,4,1,2,3,2,1]));
var_dump(pickPeaks([1, 2, 2, 2, 1]));