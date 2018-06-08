{*
* osenmpesa
*
* @author 0RS <hi@osen.co.ke>
* @link http://osen.co.ke/
* @copyright Copyright &copy; 2009-2016 Osen Concepts Kenya
* @license    http://www.opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
* @version 2.2.1
*}

{capture name=path}{$paysistem->name|escape:'htmlall':'UTF-8'}{/capture}

<h1 class="page-heading">
    {l s='Order summary' mod='osenmpesa'}
</h1>

{assign var='current_step' value='payment'}
{include file="$tpl_dir./order-steps.tpl"}

{if $nbProducts <= 0}
    <p class="alert alert-warning">
        {l s='Your shopping cart is empty.' mod='osenmpesa'}
    </p>
{else}
    <form action="{$link->getModuleLink('osenmpesa', 'validation', [], true)|escape:'html':'UTF-8'}" method="post">
        <div class="box cheque-box">
            <h3 class="page-subheading">
                {$paysistem->name|escape:'html':'UTF-8'}
            </h3>
            <p class="cheque-indent">
                {$paysistem->description}
            </p>
            <p>
                <b>{l s='Please confirm your order by clicking "I confirm my order"' mod='osenmpesa'}.</b>
            </p>
        </div>
        <p class="cart_navigation clearfix" id="cart_navigation">
            <a class="button-exclusive btn btn-default"
               href="{$link->getPageLink('order', true, NULL, "step=3")|escape:'html':'UTF-8'}">
                <i class="icon-chevron-left"></i>{l s='Other payment methods' mod='osenmpesa'}
            </a>
            <input type="hidden" name="id_osenmpesa_system" value="{$paysistem->id|intval}"/>
            <button class="button btn btn-default button-medium" type="submit">
                <span>{l s='I confirm my order' mod='osenmpesa'}<i class="icon-chevron-right right"></i></span>
            </button>
        </p>
    </form>
{/if}