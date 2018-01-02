<?php 

function justify(string $str,int $width): string{
	$upChar = range(65, 90);
	$lowChar = range(97, 122);
	$numChar = range(48, 57);
	$charAscll = array_merge($upChar,$lowChar,$numChar);
	$len = $width;
	if(strlen($str)<$width){
		return $str;
	}else{
	
		while(!(!in_array(ord(substr($str, $len-1 ,1)), $charAscll)&&in_array(ord(substr($str, $len ,1)), $charAscll)||(in_array(ord(substr($str, $len-1 ,1)), $charAscll)&&ord(substr($str, $len ,1))==32))){
			$len --;
		}

		if(in_array(ord(substr($str, $len-1 ,1)), $charAscll)&&ord(substr($str, $len ,1))==32){
			$length = $len;
			$start = $len+1;
		}elseif(ord(substr($str, $len-1 ,1))==32){
			$length = $len-1;
			$start = $len;
		}else{
			$length = $len;
			$start = $len;
		}
		$curStr = substr($str, 0 ,$length);
		$curLen = strlen($curStr);
		$spaceNum = $width - $curLen;
		$curArr = explode(' ', $curStr);
		if(count($curArr)>1){
			$lastEle = $curArr[count($curArr)-1];
			unset($curArr[count($curArr)-1]);
			$curArrLen = array_map(function($v){return array('len'=>strlen($v));}, $curArr);
			uasort($curArrLen,function($a,$b){return $a>=$b?-1:1;});
			while ($spaceNum > 0) {
				foreach ($curArrLen as $key => $value) {
					if($spaceNum <= 0){
						break;
					}
					isset($curArrLen[$key]['num'])?$curArrLen[$key]['num']++:$curArrLen[$key]['num']=1;
					$spaceNum --;
				}
			}
			foreach ($curArr as $key => $value) {
				$curArr[$key] = $value.str_repeat(' ',empty($curArrLen[$key]['num'])?0:$curArrLen[$key]['num']);
			}
			$curStr = implode(' ', array_merge($curArr,array($lastEle)));
			
 	
		}
		return $curStr."\n".justify(substr($str, $start),$width);
	}
} 

$str = "Anti Tracks is a complete solution to protect your privacy and enhance your PC performance. With a simple click Anti Tracks securely erase your internet tracks, computer activities and programs history information stored in many hidden files on your computer.Anti Tracks support Internet Explorer, AOL, Netscape/Mozilla and Opera browsers. It also include more than 85 free plug-ins to extend erasing features to support popular programs such as ACDSee, Acrobat Reader, KaZaA, PowerDVD, WinZip, iMesh, Winamp and much more. Also you can easily schedule erasing tasks at specific time intervals or at Windows stat-up/ shutdown.To ensure maximum privacy protection Anti Tracks implements the US Department of Defense DOD 5220.22-M, Gutmann and NSA secure erasing methods, making any erased files unrecoverable even when using advanced recovery tools.";
// echo justify("This is an example row, This is an example row, This is an example row, This is an example row.",20);
echo justify($str,70);
