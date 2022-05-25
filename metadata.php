<?php
/**
 * nets Oxid Payment module metadata
 *
 * @version 1.0.0
 * @package Nets
 * @copyright nets
 */

/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

/**
 * Module information
 */
$aModule = array(
    'id' => 'nets',
    'title' => 'Nets Easy',
    'version' => '2.0.0',
    'author' => 'Nets eCom',
    'url' => 'http://www.nets.eu',
    'email' => 'https://www.nets.eu/contact-nets/Pages/Customer-service.aspx',
    'thumbnail' => 'img/nets_logo.png',
    'description' => array(
        'de' => 'Nets einfach sicher zahlen',
        'en' => 'Nets safe online payments'
    ),
    'extend' => array(
		\OxidEsales\NetsModule\Models\NetsPaymentGateway::class => \OxidEsales\NetsModule\Models\NetsPaymentGateway::class,
		\OxidEsales\NetsModule\Core\NetsEvents::class => \OxidEsales\NetsModule\Core\NetsEvents::class
               
    ),
	'controllers' => array(
        'order' => \OxidEsales\NetsModule\Controller\NetsOrderController::class,
        'payment' => \OxidEsales\NetsModule\Controller\NetsPaymentController::class,
        'orderoverview' => \OxidEsales\NetsModule\Controller\NetsThankyouController::class,
        'thankyou' => \OxidEsales\NetsModule\Controller\Admin\NetsOrderOverviewController::class
    ),   
    'blocks' => array(
        array(
            'template' => 'order_overview.tpl',
            'block' => 'admin_order_overview_export',
            'file' => 'admin_order_overview_export.tpl'
        ),
        array(
            'template' => 'page/checkout/payment.tpl',
            'block' => 'select_payment',
            'file' => 'out/blocks/page/checkout/payment/select_payment.tpl'
        ),
        array(
            'template' => 'page/checkout/order.tpl',
            'block' => 'shippingAndPayment',
            'file' => 'out/blocks/page/checkout/order/shippingAndPayment.tpl'
        ),
        array(
            'template' => 'page/checkout/order.tpl',
            'block' => 'checkout_order_errors',
            'file' => 'out/blocks/page/checkout/order/checkout_order_errors.tpl'
        ),
        array(
            'template' => 'page/checkout/thankyou.tpl',
            'block' => 'checkout_thankyou_info',
            'file' => 'out/blocks/page/checkout/thankyou/checkout_thankyou_info.tpl'
        )
    ),
    'settings' => array(
        array(
            'group' => 'nets_main',
            'name' => 'nets_blMode',
            'type' => 'select',
            'value' => '0',
            'constraints' => '0|1'
        ),
        array(
            'group' => 'nets_main',
            'name' => 'nets_secret_key_live',
            'type' => 'str',
            'value' => ''
        ),
        array(
            'group' => 'nets_main',
            'name' => 'nets_checkout_key_live',
            'type' => 'str',
            'value' => ''
        ),
        array(
            'group' => 'nets_main',
            'name' => 'nets_secret_key_test',
            'type' => 'str',
            'value' => ''
        ),
        array(
            'group' => 'nets_main',
            'name' => 'nets_checkout_key_test',
            'type' => 'str',
            'value' => ''
        ),
        array(
            'group' => 'nets_main',
            'name' => 'nets_terms_url',
            'type' => 'str',
            'value' => 'https://mysite.com/index.php?cl=content&oxloadid=oxagb'
        ),
        array(
            'group' => 'nets_main',
            'name' => 'nets_merchant_terms_url',
            'type' => 'str',
            'value' => 'https://cdn.dibspayment.com/terms/easy/terms_of_use.pdf'
        ),
        array(
            'group' => 'nets_main',
            'name' => 'nets_payment_url',
            'type' => 'str',
            'value' => 'http://easymoduler.dk/icon/img?set=2&icons=VISA_MC_MTRO_PP_RP'
        ),
        array(
            'group' => 'nets_main',
            'name' => 'nets_checkout_mode',
            'type' => 'select',
            'value' => 'hosted',
            'constraints' => 'embedded|hosted'
        ),
        array(
            'group' => 'nets_main',
            'name' => 'nets_layout_mode',
            'type' => 'select',
            'value' => 'layout_1',
            'constraints' => 'layout_1|layout_2'
        ),
        array(
            'group' => 'nets_main',
            'name' => 'nets_autocapture',
            'type' => 'bool',
            'value' => 'false'
        ),
        array(
            'group' => 'nets_main',
            'name' => 'nets_blDebug_log',
            'type' => 'bool',
            'value' => 'false'
        )
    ),
    'templates' => array(),    
    'events'       => array(
        'onActivate'   => '\OxidEsales\NetsModule\Core\NetsEvents::onActivate',
        'onDeactivate' => '\OxidEsales\NetsModule\Core\NetsEvents::onDeactivate'
    )
);
