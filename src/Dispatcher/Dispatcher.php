<?php

namespace Zabba\Module\ZPendingOrders\Site\Dispatcher;

\defined('_JEXEC') or die;

use Joomla\CMS\Dispatcher\DispatcherInterface;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Application\CMSApplicationInterface;
use Joomla\Input\Input;
use Joomla\Registry\Registry;
use Joomla\CMS\Helper\HelperFactoryAwareInterface;
use Joomla\CMS\Helper\HelperFactoryAwareTrait;

class Dispatcher implements DispatcherInterface, HelperFactoryAwareInterface
{
    use HelperFactoryAwareTrait;
    
    protected $module;
    
    protected $app;

    public function __construct(\stdClass $module, CMSApplicationInterface $app, Input $input)
    {
        $this->module = $module;
        $this->app = $app;
    }
    
    public function dispatch()
    {
        $language = $this->app->getLanguage();
        $language->load('mod_virtuemart_zpendingorders', JPATH_BASE . '/modules/mod_virtuemart_zpendingorders');
        
        $orders = $this->getHelperFactory()->getHelper('ZPendingOrdersHelper')->getOrders();

        require ModuleHelper::getLayoutPath('mod_virtuemart_zpendingorders');
    }
}