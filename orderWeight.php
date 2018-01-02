<?php 
// function orderWeight($str) {
//   $nums = explode(" ", $str);
//   $arr = array();
//   $temparr = array();
//   foreach ($nums as $key => $value) {
//   	$temp = str_split($value);
//   	$arr[$key]['a'] = array_sum($temp);
//   	$arr[$key]['b'] = $key;
//   	$temparr[] = array_sum($temp);
//   }
//   $num = array_combine(range(0,count($nums)-1), $nums);
//   $newnum = $num;
//   usort($arr, "myOrder");
//   $new = array();
//   $keyarray = array_count_values($temparr);
//   $newkeyarr = array();

//   foreach ($keyarray as $key => $value) {
//   	$newkeyarr[$key]['con'] = array();
//   	foreach ($arr as $k => $v) {
//   		if($key==$v['a']){
//   			$newkeyarr[$key]['con'][] = $num[$v['b']];
//   		}
//   	}
//   }
//   ksort($newkeyarr);
//   foreach ($newkeyarr as $key => $value) {
//   	sort($value['con'],SORT_STRING);
//    	 $new = array_merge($new,$value['con']);
//    }
//   return implode(" ", $new);
// }
// function myOrder($a,$b){
// 	if($a['a'] == $b['a']) return 0;
// 	return $a['a'] < $b['a']?-1:1;
// }


function orderWeight($str) {
  $nums = explode(" ", $str);
  
  usort($nums, function ($a, $b) {
    $sumA = array_sum(str_split((string) $a));
    $sumB = array_sum(str_split((string) $b));
    echo $a;
    echo "<br>";
    echo $b;
    echo "<br>******************<br>";
    
    if ($sumA === $sumB) return strcmp($a, $b);
    
    return $sumA > $sumB;
  });
  var_dump($nums);
  
  return implode(' ', $nums);
}
//usort 回调函数返回真就调换顺序
echo orderWeight("103 123 4444 99 2000");
echo "<br>";
// echo "2000 10003 1234000 44444444 9999 11 11 22 123";
// echo orderWeight("2000 10003 1234000 44444444 9999 11 11 22 123");
