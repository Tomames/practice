<?php 
function tour($friends, $fTowns, $distTable) {
	$distTable1 = $distTable;
    $x0 = new point(0,0);
    $i = 0;
    $pointArr = array('X0'=>$x0);
    $keyArr = array_keys($distTable);
    array_unshift($keyArr, 'X0');
   	foreach ($distTable as $key => $value) {
   		if($i == 0){
   			$temp = new point(0,$value);
   			$pointArr = array_merge($pointArr,array($key=>$temp));
   		}else{
   			foreach ($keyArr as $k => $v) {
   				if($key == $v){
   					$p1 = $pointArr[$keyArr[0]];
   					$p2 = $pointArr[$keyArr[$k-1]];
   					$temp = point::getPoint($p1,$p2,$value);
   					$pointArr = array_merge($pointArr,array($key=>$temp));
   				}
   			}
   		}
   		$i ++ ;
   	}
   	// $newTown = array();
   	// foreach ($fTowns as $key => $value) {
   	// 	$newTown[] = $value[0];
   	// }
   	// foreach ($friends as $key => $value) {
   	// 	if(!in_array($value, $newTown)){
   	// 		unset($friends[$key]);
   	// 	}
   	// }
   	// array_multisort($friends,$fTowns);
   	// $distance = array($distTable1[current($fTowns)[1]]);
   	// $count = count($fTowns);
   	// foreach ($fTowns as $key => $value) {
   	// 	if($key < $count-1){
   	// 		$distance = array_merge($distance,array(point::getLength($pointArr[$value[1]],$pointArr[$fTowns[$key+1][1]])));
   	// 	}
   	// }

   	// $distance = array_merge($distance,array($distTable1[end($fTowns)[1]]));
   	// var_dump($distance);
   	// return round(array_sum($distance));



   	$newfTowns = array();
   	foreach ($friends as $key => $value) {
   		foreach ($fTowns as $k => $v) {
   			if($v[0]==$value){
   				$newfTowns[] = $v;
   			}
   		}
   	}
   	$distance = array($distTable1[current($newfTowns)[1]]);
   	$count = count($newfTowns);
   	foreach ($newfTowns as $key => $value) {
   		if($key < $count-1){
   			$distance = array_merge($distance,array(point::getLength($pointArr[$value[1]],$pointArr[$newfTowns[$key+1][1]])));
   		}
   	}

   	$distance = array_merge($distance,array($distTable1[end($newfTowns)[1]]));
   	var_dump($distance);
   	return floor(array_sum($distance));

    
}
class point
{
	public $x;
	public $y;

	
	function __construct($x,$y)
	{
		$this->x = $x;
		$this->y = $y;
	}

	public function getLength(point $a,point $b){
		return sqrt(pow($a->x-$b->x,2)+pow($a->y-$b->y,2));
	}

	public function getAlength($a,$b){
		return sqrt(pow($b, 2)-pow($a, 2));
	}

	public function getPoint(point $a,point $b,int $l){
		$fl = point::getLength($a,$b);
		$sl = point::getAlength($fl,$l);
		$alpha = asin(($b->x-$a->x)/$fl);
		$smfl = $sl*sin($alpha);
		$smsl = $sl*cos($alpha);
		if($b->y-$a->y<=0&&$b->x-$a->x>=0){
			$px = $b->x-$smsl;
			$py = $b->y-$smfl;
		}elseif($b->y-$a->y>=0&&$b->x-$a->x>=0){
			$px = $b->x+$smsl;
			$py = $b->y-$smfl;
		}elseif($b->y-$a->y<=0&&$b->x-$a->x<=0){
			$px = $b->x-$smsl;
			$py = $b->y+$smfl;
		}elseif($b->y-$a->y>=0&&$b->x-$a->x<=0){
			$px = $b->x+$smsl;
			$py = $b->y+$smfl;
		}
		return new point($px,$py);
	}
}


$friends1 = ["A1", "A2", "A3", "A4", "A5"];
$fTowns1 = [["A1", "X1"], ["A2", "X2"], ["A3", "X3"], ["A4", "X4"]];
$distTable1 = ["X1"=>100.0, "X2"=>200.0, "X3"=>250.0, "X4"=>300.0];
echo tour($friends1, $fTowns1, $distTable1);

$friends3 = ["B1", "B2"];
$fTowns3 = [["B1", "Y1"], ["B2", "Y2"], ["B3", "Y3"], ["B4", "Y4"], ["B5", "Y5"]];
$distTable3 = ["Y1"=>50.0, "Y2"=>70.0, "Y3"=>90.0, "Y4"=>110.0, "Y5"=>150.0];
echo tour($friends3, $fTowns3, $distTable3);