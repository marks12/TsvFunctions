<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/TsvFunctions for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace TsvFunctions;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
//             'Zend\Loader\ClassMapAutoloader' => array(
//                 __DIR__ . '/../../autoload_classmap.php',
//             ),
//             'Zend\Loader\StandardAutoloader' => array(
//                 'namespaces' => array(
// 		    // if we're in a namespace deeper than one level we need to fix the \ in the path
//                     __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/' , __NAMESPACE__),
//                 ),
//             ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e)
    {
        // You may not need to do this if you're doing it elsewhere in your
        // application
    	$e->getApplication()->getServiceManager()->get('viewhelpermanager')->setFactory('controllerName', function($sm) use ($e) {
    		$viewHelper = new View\Helper\ControllerName($e->getRouteMatch());
    		return $viewHelper;
    	});
    	
    	$app = $e->getApplication();
   		$e->getApplication()->getServiceManager()->get('viewhelpermanager')->setFactory('getRoute', function($sm) use ($app) {
    		$viewHelper = new View\Helper\getRoute($app);
    		return $viewHelper;
   		});
    	
    	$eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        
    }
}
