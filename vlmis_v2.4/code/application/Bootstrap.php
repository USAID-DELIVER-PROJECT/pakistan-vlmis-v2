<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    /**
     * Initialize html doctype
     */
    protected function _initDoctype() {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML5');
        $view->headTitle()->setSeparator(' - ');
    }

    /**
     * Initialize Init Helper and Layout Plugin
     */
    protected function _initHelper() {
        $initHelper = new App_Controller_Plugin_Helper_Init();
        Zend_Controller_Action_HelperBroker::addHelper($initHelper);
        Zend_Controller_Action_HelperBroker::addPath(APPLICATION_PATH . '/controllers/helpers');
        //$front = Zend_Controller_Front::getInstance();
        //$front->registerPlugin(new App_Controller_Plugin_SelectLayout());
    }

    /**
     * Initialize custom route for API
     */
    protected function _initCustomRoute() {

        $router = Zend_Controller_Front::getInstance()->getRouter();
        /* $router->addRoute('authenticate-user', new Zend_Controller_Router_Route('authenticate-user', array(
          'module' => 'api',
          'controller' => 'index',
          'action' => 'authenticate-user'
          ))); */
    }

    /**
     * Initialize configuration values
     */
    protected function _initConfig() {
        ini_set('memory_limit', '-1');
        $configFile = APPLICATION_PATH . '/configs/application.ini';
        $config = new Zend_Config_Ini($configFile, APPLICATION_ENV);
        Zend_Registry::set('config', $config);
        Zend_Registry::set('dbSetting', $config->resources->db);
        Zend_Registry::set('cacheManager', $config->resources->cachemanager->file);
        Zend_Registry::set('appName', $config->app->name);
        Zend_Registry::set('baseurl', $config->app->baseurl);
        Zend_Registry::set('first_month', $config->app->first_month);
        Zend_Registry::set('lang_support', $config->app->language_support);
        Zend_Registry::set('api_from_date', $config->app->api_from_date);
        Zend_Registry::set('barcode_products', $config->app->barcode_products);
        Zend_Registry::set('smtpConfig', $config->smtpConfig);

        $dateobj = new DateTime('-2 month');
        //$dateobj = new DateTime('last day of last month');
        Zend_Registry::set('report_month', $dateobj->format("Y-m"));
    }

    /**
     * Initialize application autoloader
     */
    protected function _initAutoload() {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => '',
            'basePath' => dirname(__FILE__),
        ));

        return $autoloader;
    }

    protected function _initDoctrine() {

        require_once LIBRARY_PATH . '/Doctrine/Common/ClassLoader.php';
        $autoloader = \Zend_Loader_Autoloader::getInstance();
        $fmmAutoloader = new \Doctrine\Common\ClassLoader();
        $autoloader->pushAutoloader(array($fmmAutoloader, 'loadClass'));

        $options = $this->getOptions();
        $config = new Doctrine\ORM\Configuration();
        $config->addCustomDatetimeFunction('YEAR', 'Doctrine\Extensions\Query\Mysql\Year');
        $config->addCustomDatetimeFunction('MONTH', 'Doctrine\Extensions\Query\Mysql\Month');
        $config->addCustomDatetimeFunction('DAY', 'Doctrine\Extensions\Query\Mysql\Day');
        $config->addCustomStringFunction('DATEDIFF', 'Doctrine\Extensions\Query\Mysql\DateDiff');
        $config->addCustomStringFunction('DATE_FORMAT', 'Doctrine\Extensions\Query\Mysql\DateFormat');
        $config->addCustomStringFunction('IF', 'Doctrine\Extensions\Query\Mysql\IfElse');
        $config->addCustomStringFunction('GROUP_CONCAT', 'Doctrine\Extensions\Query\Mysql\GroupConcat');
        $config->addCustomStringFunction('IFNULL', 'Doctrine\Extensions\Query\Mysql\IfNull');
        $config->setProxyDir($options['doctrine']['metadata']['proxyDir']);
        $config->setProxyNamespace('Doctrine\Proxy');
        $config->setAutoGenerateProxyClasses(true);
        $config->setAutoGenerateProxyClasses((APPLICATION_ENV == 'development'));
        //$driverImpl = $config->newDefaultAnnotationDriver($options['metadata']['entityDir']);
        $driverImpl = new Doctrine\ORM\Mapping\Driver\YamlDriver($options['doctrine']['metadata']['entityDir']);

        $config->setMetadataDriverImpl($driverImpl);
        $cache = new Doctrine\Common\Cache\ArrayCache();
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);

        $evm = new Doctrine\Common\EventManager();
        $em = Doctrine\ORM\EntityManager::create($options['doctrine']['db'], $config, $evm);
        Zend_Registry::set('doctrine', $em);

        return $em;
    }

    protected function _initLog() {
        if ($this->hasPluginResource("log")) {
            $r = $this->getPluginResource("log");
            $log = $r->getLog();
            Zend_Registry::set('log', $log);
        }
    }

    /* public function _initBootstrap2(EventInterface $e) {
      $app = $e->getApplication();
      $sem = $app->getEventManager()->getSharedManager();
      $sem->attach('Application\Controller\IndexController', 'MyEvent', function($e) {
      exit("Hello");
      });
      } */
}
