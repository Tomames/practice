<?php 
/**
格雷码
http://blog.csdn.net/jingfengvae/article/details/51691124
*/	
function mystery(int $n): int {
	if($n==0) return 0;
	if($n==1) return 1;
	$stand = ceil(log($n)/log(2))+1;
	return bindec(createArray($stand)[$n]);
}
function mystery_inv(int $n): int {
	if($n==0) return 0;
	if($n==1) return 1;
	$stand = ceil(log($n)/log(2))+1;
	return array_search(decbin($n),createArray($stand));
}
function name_of_mystery(): string {
  // Give the name of the mystery function here
}

function createArray(int $n){
	if($n == 1){
		return array('0','1');
	}else{
		return array_merge(array_map(function($v){return '0'.$v;},createArray($n-1)),array_map(function($v){return '1'.$v;},array_reverse(createArray($n-1))));
	}
}

function decimalToGray(int $m){
	if($m==0||$m==1){
		return $m;
	}
	$n = ceil(log($m)/log(2));
	$gr = array();
	$b = 1;
	for($i=0;$i<$n;$i++)
    {
        $p=0;
        $b*=2;
        for($j=0;$j<=$m;$j++)
        {
            if($j%$b-$b/2==0)
                $p=1-$p;
        }
        $gr[$i]=$p;
    }
    return array_reverse($gr);
}

function decimal_to_gray($decimal){
    //$decimal = str_split((string)decdecimal($decimal));
    //先把十进制整形树字转换成二进制码
    $decimal = (string)decbin($decimal);
    $decimal = str_split($decimal);
    $gray = '';
    foreach($decimal as $k=>$v){
        if($k == 0){
            $gray .= $v;
        }else{
            $gray .= $decimal[$k-1] ^ (int)$v;
        }
    }
    return $gray;
}

function gary_to_decimal($gray){
    $gray = str_split((string)$gray);
    $decimal = '';
    $prev = 0;
    foreach($gray as $k=>$v){
        if($k == 0){
            $decimal .= $prev = $v;
        }else{
            $decimal .= $prev = (int)$v ^ $prev;
        }
    }
    //将获得的二进制码转换成十进制码
    return bindec($decimal);
}

function decToGray(int $dec){
	return $dec^($dec>>1);
}


function grayToDec(int $gray){
	$y = $gray;
	while ($gray>>=1) {
		$y ^= $gray;
	}
	return $y;
}
var_dump(grayToDec(5));

var_dump(decToGray(6));

// var_dump(decimal_to_gray(3));

// var_dump(decimalToGray(3));

var_dump(mystery(6));
var_dump(mystery_inv(5));
// var_dump(mystery(9));
// var_dump(mystery_inv(13));
