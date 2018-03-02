<?php
	function GenArray ($n){
		$array=[];
		for ($i=0; $i<$n; $i++){
			$array[]=rand (20, 65);
		}
		return $array;
	}

	function Sum ($array){
		$sum=0;
		foreach ($array as $value){
			$sum+=$value;
		}
		return $sum;
	}
	function Printt ($mas){
		 echo "<pre>", print_r($mas,true), "</pre>";
	}
	function DifferenceEvenОdd ($array){
		$even=0;
		$odd=0;
		foreach ($array as $value){
			($value%2)? $odd+=$value: $even+=$value;
		}
		return $even-$odd;
	}
	function DoublyEvenОdd ($array){
		foreach ($array as $key => $value){
			($array[$key]%2)? $array[$key]/=2: $array[$key]*=2;
		}
		return $array;
	}
	function Mirror ($str){
		$rez=$str;
		$rez = strrev(iconv('utf-8', 'windows-1251', $rez));
		return iconv('windows-1251', 'utf-8', $rez);
	}
	function AverageScore ($array){
		$ball=0;
		 foreach ($array as $value) {
		 	$ball+=$value;
		 }
		 return $ball/count($array);
		
	}


?>