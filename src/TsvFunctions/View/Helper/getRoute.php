<?php
namespace TsvFunctions\View\Helper;
use Zend\View\Helper\AbstractHelper;

class getRoute extends AbstractHelper {
	private $sm;

    public function __construct($app) {
        $this->sm = $app->getServiceManager();
    }

	public function __invoke()
	{
		$router = $this->sm->get('router');
		$request = $this->sm->get('request');

		$routeMatch = $router->match($request);
		
		if (!is_null($routeMatch))
			return $routeMatch->getMatchedRouteName();
	}
}