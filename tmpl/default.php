<?php
/**
 * @package    ZPendingOrders
 *
 * @author     zabba
 * @copyright  
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       
 */

// No direct access to this file
defined('_JEXEC') or die;

if (count((array)($orders)) > 0){ ?>
    <table>
        <tr>
            <th><?= JText::_('MOD_VIRTUEMART_ZPENDINGORDERS_ORDER_NUMBER')?></th>
            <th><?= JText::_('MOD_VIRTUEMART_ZPENDINGORDERS_PRODUCT_SKU')?></th>
            <th><?= JText::_('MOD_VIRTUEMART_ZPENDINGORDERS_PRODUCT_NAME')?></th>
            <th><?= JText::_('MOD_VIRTUEMART_ZPENDINGORDERS_PRODUCT_QUANTITY')?></th>
            <th><?= JText::_('MOD_VIRTUEMART_ZPENDINGORDERS_PRODUCT_ITEM_PRICE')?></th>
        </tr>
    <?php
    foreach ($orders as $order){ 
        $order_link = (JURI::root().'index.php/administrace/moje-objednavky/number/'.$order->order_number); 
        ?>
        <tr>
            <td><a href="<?=$order_link; ?>"><?=$order->order_number?></a></td>
            <td><?=$order->order_item_sku?></td>
            <td><?=$order->order_item_name?></td>
            <td><?=$order->product_quantity?></td>
            <td><?=$order->product_item_price?></td>
        </tr>
    
<?php
    }
    echo '</table>';
}
