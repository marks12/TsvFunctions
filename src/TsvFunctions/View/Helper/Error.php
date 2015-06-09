<?php

namespace TsvFunctions\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Session\Container;

class Error extends AbstractHelper
{
	
	public function __invoke($key = '')
	{
		
		$session = new Container("error");
		$error = $session->offsetGet("error");
		
		$result = '';
		
		$html = '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Ошибка!</strong> %s</div>';

		if(is_array($error) && count($error))
		{
			foreach ($error as $k=>$v)
				$result .= sprintf($html,$v);
			
			$result = "<br>".$result;
		}

		$session->offsetUnset("error");
		
		
		$session = new Container("message");
		$message = $session->offsetGet("message");
		$session->offsetUnset("message");
		
		$html = '<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  %s</div>';

		if(is_array($message) && count($message))
		{
			foreach ($message as $k=>$v)
				$result .= sprintf($html,$v);
			
			$result = "<br>".$result;
		}
		
		return $result;
	}
	
}

?>