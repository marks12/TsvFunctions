<?php
use Zend\View\Helper\AbstractHelper;

class getRoute extends AbstractHelper {
	private $sm;

	public function __construct($app) {
		$this->sm = $app->getServiceManager();
	}

	public function echoRoute() {
		$router = $this->sm->get('router');
		$request = $this->sm->get('request');

		$routeMatch = $router->match($request);
		if (!is_null($routeMatch))
			echo $routeMatch->getMatchedRouteName();
	}
}