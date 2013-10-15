<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;

class Module
{
    public function onBootstrap($e)
    {
        $e->getApplication()->getServiceManager()->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        $config = $e->getApplication()->getServiceManager()->get('config');
        $cfg = \ActiveRecord\Config::instance();
		 $phpSettings = $config['phpSettings'];
        if($phpSettings) {
            foreach($phpSettings as $key => $value) {
                ini_set($key, $value);
            }
        }
		
        $cfg->set_connections(array('development' => $config['db']['dsn']));
		$e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
			$controller      = $e->getTarget();
			$controllerClass = get_class($controller);
			$moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
			$config          = $e->getApplication()->getServiceManager()->get('config');
	
			$routeMatch = $e->getRouteMatch();
			$actionName = strtolower($routeMatch->getParam('action', 'not-found')); // get the action name;
			if (isset($config['module_layouts'][$moduleNamespace][$actionName])) {
				$controller->layout($config['module_layouts'][$moduleNamespace][$actionName]);
			}elseif(isset($config['module_layouts'][$moduleNamespace]['default'])) {
				$controller->layout($config['module_layouts'][$moduleNamespace]['default']);
		   }elseif(isset($config['module_layouts'][$moduleNamespace])) {
			   $controller->layout($config['module_layouts'][$moduleNamespace]);
			}
			else{
				$controller->layout($config['module_layouts']['Application']);
			}		
		}, 100);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/../../vendor/ActiveRecord/autoload_classmap.php',
                __DIR__ . '/../../vendor/Custom/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
