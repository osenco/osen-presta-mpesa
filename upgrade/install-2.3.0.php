<?php
/**
 * osenmpesa
 *
 * @author    0RS <hi@osen.co.ke>
 * @link http://osen.co.ke/
 * @copyright Copyright &copy; 2009-2016 Osen Concepts Kenya
 * @license   http://www.opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version 2.2.0
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_2_3_0($object)
{
    return Db::getInstance()->Execute('ALTER TABLE `'._DB_PREFIX_.'osenmpesa_system` ADD COLUMN `cart_type` TINYINT NOT NULL DEFAULT \'0\' ');
}
