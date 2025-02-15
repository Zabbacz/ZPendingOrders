<?php
namespace Zabba\Module\ZPendingOrders\Site\Helper;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\Database\DatabaseInterface;

class ZPendingOrdersHelper
{
    public function getOrders()
    {
        $db = Factory::getContainer()->get(DatabaseInterface::class);
            $user = Factory::getApplication()->getIdentity();
            $query = $db->getQuery(true)
			->select ($db->quoteName (array('t2.order_number', 't1.order_item_sku','t1.order_item_name','t1.product_quantity','t1.product_item_price')))
			->from($db->quoteName('#__virtuemart_order_items','t1'))
			->join('INNER',$db->quoteName('#__virtuemart_orders','t2'). ' ON ' . $db->quoteName('t1.virtuemart_order_id') . ' = ' . $db->quoteName('t2.virtuemart_order_id'))
			->where($db->quoteName('t1.order_status'). ' = '.'"U"')
			->where($db->quoteName('t2.virtuemart_user_id'). ' = '.($user->id));
        $db->setQuery($query);
        
        return $db->loadObjectList();
    }
}