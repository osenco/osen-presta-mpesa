<?php
/**
 * osenmpesa
 *
 * @author    0RS <hi@osen.co.ke>
 * @link http://osen.co.ke/
 * @copyright Copyright &copy; 2009-2016 Osen Concepts Kenya
 * @license   http://www.opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version 2.2.1
 */
class OsenMpesaModuleFrontController extends ModuleFrontController
{
    public $display_column_left = false;
    public $display_column_right = false;
    public $ssl = true;

    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        $cart = $this->context->cart;

        require_once(dirname(__FILE__) . '/../../classes/MPesa.php');
        $paysistem = new MPesa((int)Tools::getValue('id_osenmpesa_system'), $this->context->cookie->id_lang);

        if (!Validate::isLoadedObject($paysistem)) {
            return;
        }

        $total = $cart->getOrderTotal(true, Cart::BOTH);
        /*if ($paysistem->id_cart_rule) {
            $cart_rule = new CartRule($paysistem->id_cart_rule);
            if ($cart_rule->reduction_percent > 0)
                $total = $total - $total * $cart_rule->reduction_percent / 100;
            else
                $total = $total - $cart_rule->reduction_amount;
        }*/

        $paysistem->description = str_replace(array('%total%'),
            array(Tools::DisplayPrice($total)),
            $paysistem->description);

        $this->context->smarty->assign(array(
            'nbProducts' => $cart->nbProducts(),
            'paysistem' => $paysistem,
            'this_path' => $this->module->getPathUri(),
            'this_path_ssl' => Tools::getShopDomainSsl(true,
                    true) . __PS_BASE_URI__ . 'modules/' . $this->module->name . '/'
        ));

        $this->setTemplate('payment_execution.tpl');
    }
}
