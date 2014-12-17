<?php

namespace TsvFunctions\View\Helper;

use Zend\View\Helper\AbstractHelper;


class Money extends AbstractHelper
{
	
	public function __invoke($text='',$kopeek=true)
	{
		$money = trim(strip_tags($text));
		
		preg_match("/[.,](\d+)/", $money, $kopeyki_arr);
		
		if(isset($kopeyki_arr[1]) && mb_strlen($kopeyki_arr[1]) && $kopeek)
			$kopeyki = ",".$kopeyki_arr[1];
		else
			$kopeyki = "";
		
		preg_match("/(\d+)/", $money,$rubles_arr);
		
		if(!isset($rubles_arr[1]) || !mb_strlen($rubles_arr[1]))
			return false;
		
		$output = "";
		
		for($i=mb_strlen($rubles_arr[1])-1;$i>=0;$i--)
		{
			if((mb_strlen(str_replace(" ","",$output))+1)%3==0)
				$output = " ".$rubles_arr[1][$i].$output;
			else 
				$output = $rubles_arr[1][$i].$output;
		}
		
		return $output.$kopeyki;
	}
	
}

?>