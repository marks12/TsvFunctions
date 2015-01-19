<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/TsvFunctions for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace TsvFunctions\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class TsvFunctionsController extends AbstractActionController
{
    public function indexAction()
    {
        return array();
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /tsvFunctions/tsv-functions/foo
        return array();
    }
    
    public function deleteDir($dirPath) {
    	if (! is_dir($dirPath)) {
    		throw new InvalidArgumentException("$dirPath must be a directory");
    	}
    	if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
    		$dirPath .= '/';
    	}
    	$files = glob($dirPath . '*', GLOB_MARK);
    	foreach ($files as $file) {
    		if (is_dir($file)) {
    			self::deleteDir($file);
    		} else {
    			unlink($file);
    		}
    	}
    	rmdir($dirPath);
    }
    
}
