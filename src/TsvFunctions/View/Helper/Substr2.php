<?php

namespace TsvFunctions\View\Helper;

use Zend\View\Helper\AbstractHelper;


class Substr2 extends AbstractHelper
{
	protected $count = 0;
	
	public function __invoke($text='' ,$characters_num = 143)
	{
		$output = $this->substr2(strip_tags($text),(int)$characters_num);
		
		return $output;
	}
	
	private function substr2($str,$chars_num=143)
	{
		$validator = new \Zend\Validator\StringLength(array('min' => 0, 'max' => $chars_num));
		
		if($validator->isValid($str))
			return $str;
		
		$str_arr = explode(" ",$str);
		
		
		$res = '';
		
		if(is_array($str_arr))
		foreach ($str_arr as $k=>$v)
		{
			if($validator->isValid($res))
				$res.= ' '.$v;
			else
				break;
		}
		return $res. ' ...';
	}
}

?>