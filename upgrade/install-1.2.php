<?php
/**
 * osenmpesa
 *
 * @author    0RS <hi@osen.co.ke>
 * @link http://osen.co.ke/
 * @copyright Copyright &copy; 2009-2016 Osen Concepts Kenya
 * @license   http://www.opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version 2.0.0
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_1_2($object)
{
    return (Db::getInstance()->Execute('ALTER TABLE  `' . _DB_PREFIX_ . 'osenmpesa_system_lang` ADD  `description_success` TEXT NULL')
        && Db::getInstance()->Execute('ALTER TABLE  `' . _DB_PREFIX_ . 'osenmpesa_system` ADD  `id_order_state` INT( 10 ) NOT NULL DEFAULT \'' .
            Configuration::get('PS_OS_PREPARATION') . '\''));
}
