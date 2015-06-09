<?php

namespace TsvFunctions\View\Helper;

use Zend\View\Helper\AbstractHelper;

class getDateSelect extends AbstractHelper
{
	/**
	 * options array can content that variables
	 */
	
	private $date;
	private $from_year;
	private $to_year;
	private $class;
	private $prefix;
	
	public function __invoke($part = '',$options = array())
	{
		if(isset($options['date']))
			if(preg_match("/\d{4}-\d{2}-\d{2}/",$options['date']))
				$this->date = $options['date'];
			else
				return "Неверный формат даты. Используйте ГГГГ-ММ-ДД";
		else 
			$this->date = date("Y-m-d");
		
		if(isset($options['from_year']))
			if(preg_match("/\d{4}/",$options['from_year']))
				$this->from_year = $options['from_year'];
			else
				return "Неверный формат Года from_year. Используйте ГГГГ";
		else 
			$this->from_year = date('Y')-1;
		
		if(isset($options['to_year']))
			if(preg_match("/\d{4}/",$options['to_year']))
				$this->to_year = $options['to_year'];
			else
				return "Неверный формат Года to_year. Используйте ГГГГ";
		else 
			$this->to_year = date('Y')+1;
		
		if(isset($options['class']))
			$this->class = "class='".$options['class']."' ";
		else 
			$this->class = "class='form-control' ";
		
		if(isset($options['prefix']))
			$this->prefix = $options['prefix'];
		
		
		$part = mb_strtolower($part);
		
		$result = '';
		
		switch ($part)
		{
			case "d":
			case "day":
				$result .= $this->getDay($this->date);
			break;
			
			case "m":
			case "month":
				$result .= $this->getMonth($this->date);
			break;

			case "y":
			case "year":
				$result .= $this->getYear($this->date);
			break;
			
			case "":
			case "all":
			case "full":
				$result .= $this->getDay($this->date).$this->getMonth($this->date).$this->getYear($this->date);
			break;
			
			default:
				$result = "Ошибка установки части даты. $part не поддерживается.";
			break;
		}
		
		return $result;
	}
	
	public function getDay($date)
	{
		if(mb_strlen($date) && !preg_match("/\d{4}-\d{2}-(\d{2})/", $date, $date_arr))
			return "Ошибка установки даты (день). Неверный формат даты. Используйте ГГГГ-ММ-ДД";
		$str = '<select '.$this->class.' name="'.$this->prefix.'day" id="'.$this->prefix.'day">';

		for($i=1;$i<32;$i++)
		{
			if(isset($date_arr) && $date_arr[1]==$i)
				$str .= "<option value='".trim(sprintf("%'.02d\n", $i))."' selected>".trim(sprintf("%'.02d\n", $i))."</option>";
			else
				$str .= "<option value='".trim(sprintf("%'.02d\n", $i))."'>".trim(sprintf("%'.02d\n", $i))."</option>";
		}
		
		$str .= '</select>';
		
		return $str;
	}
	
	public function getMonth($date)
	{
		if(mb_strlen($date) && !preg_match("/\d{4}-(\d{2})-\d{2}/", $date, $date_arr))
			return "Ошибка установки даты (месяц). Неверный формат даты. Используйте ГГГГ-ММ-ДД";
		$str = '<select '.$this->class.' name="'.$this->prefix.'month" id="'.$this->prefix.'month">';

		for($i=1;$i<12;$i++)
		{
			if(isset($date_arr) && $date_arr[1]==$i)
				$str .= "<option value='".trim(sprintf("%'.02d\n", $i))."' selected>".trim(sprintf("%'.02d\n", $i))."</option>";
			else
				$str .= "<option value='".trim(sprintf("%'.02d\n", $i))."'>".trim(sprintf("%'.02d\n", $i))."</option>";
		}
		
		$str .= '</select>';
		
		return $str;
	}

	public function getYear($date)
	{
		$from = $this->from_year;
		$to = $this->to_year;
		
		if(mb_strlen($date) && !preg_match("/(\d{4})-\d{2}-\d{2}/", $date, $date_arr))
			return "Ошибка установки даты (год). Неверный формат даты. Используйте ГГГГ-ММ-ДД";
		$str = '<select '.$this->class.' name="'.$this->prefix.'year" id="'.$this->prefix.'year">';

		for($i=$from;$i<=$to;$i++)
		{
			if(isset($date_arr) && $date_arr[1]==$i)
				$str .= "<option value='".trim(sprintf("%'.02d\n", $i))."' selected>".trim(sprintf("%'.02d\n", $i))."</option>";
			else
				$str .= "<option value='".trim(sprintf("%'.02d\n", $i))."'>".trim(sprintf("%'.02d\n", $i))."</option>";
		}
		
		$str .= '</select>';
		
		return $str;
	}
	
}

?>