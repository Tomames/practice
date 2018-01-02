<?php 
function format_duration($seconds)
{
	if($seconds==0){
		return 'now';
	}
	$formatArr = array('year','day','hour','minute','second');
	$year = floor($seconds/(365*24*60*60));
	// $lseconds = $seconds%(365*24*60*60);
	// $day = floor($lseconds/(24*60*60));
	// $l1seconds = $lseconds%(24*60*60);
	// $hour = floor($l1seconds/(60*60));
	// $l2seconds = $l1seconds%(60*60);
	// $minute = floor($l2seconds/60);
	// $second = $l2seconds%60;
	$day = $seconds/(24*60*60)%365;
	$hour = $seconds/(60*60)%24;
	$minute = $seconds/60%60;
	$second = $seconds%60;
	$arr = array($year,$day,$hour,$minute,$second);
	$newarr = array();
	foreach ($arr as $key => $value) {
		if($value > 0){
			if($value > 1){
				$newarr[] = $value.' '.$formatArr[$key].'s';
			}else{
				$newarr[] = $value.' '.$formatArr[$key];
			}
		}
	}
	$res = implode(', ', $newarr);
	if(count($newarr)>1){
		return substr_replace($res, ' and', strrpos($res, ','),1);
	}
	return $res;

}
echo format_duration(62);