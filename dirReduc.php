<?php
// function dirReduc($arr) {
// 	$newarr = array_count_values($arr);
// 	$nsflag =  $newarr['NORTH'] > $newarr['SOUTH'] ? 'NORTH' : "SOUTH";
// 	$ns = abs($newarr['NORTH'] - $newarr['SOUTH']);
// 	$weflag = $newarr['WEST'] > $newarr['EAST'] ? "WEST" : "EAST";
// 	$we = abs($newarr['WEST'] - $newarr['EAST']);
// 	$result = array();
// 	for ($i=0; $i <$we ; $i++) { 
// 		$result[] = $weflag;
// 	}
// 	for ($i=0; $i <$ns ; $i++) { 
// 		$result[] = $nsflag;
// 	}
// 	return $result;

// }

function dirReduc($arr){
	$count = count($arr);
	$newarr = array();
	foreach ($arr as $key => $value) {
		$newarr[$key]['con'] = $value;
		$newarr[$key]['del'] = 0;
	}
	for ($i=0; $i < $count; $i++) { 
	 	for ($j=$i; $j < $count; $j++) { 
	 		if(empty($newarr[$i]['del'])&&empty($newarr[$j]['del'])){
	 			if(($newarr[$i]['con'] == "NORTH" && $newarr[$j]['con'] == "SOUTH")||($newarr[$i]['con'] == "WEST" && $newarr[$j]['con'] == "EAST")||($newarr[$i]['con'] == "SOUTH" && $newarr[$j]['con'] == "NORTH")||($newarr[$i]['con'] == "EAST" && $newarr[$j]['con'] == "WEST")){
	 				$newarr[$i]['del'] = 1;
	 				$newarr[$j]['del'] = 1;
	 			}
	 			
	 		}
	 	}
	 } 

	 $result = array();
	 foreach ($newarr as $key => $value) {
	 	if($value['del']==0){
	 		$result[] = $value['con'];
	 	}
	 }
	 return $result;
}

$a = ["NORTH", "SOUTH","SOUTH", "SOUTH", "EAST", "WEST", "NORTH", "WEST","SOUTH"];
var_dump(dirReduc($a));