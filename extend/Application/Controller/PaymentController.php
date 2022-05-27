<?php 
namespace Es\NetsEasy\extend\Application\Controller;

use Es\NetsEasy\Api\NetsLog;
use Es\NetsEasy\Api\NetsPaymentTypes;
/**
 * Description of netsPayment
 */
class PaymentController extends PaymentController_parent
{
	// var $nets_payment_types_active;
	var $payment_types_active;
	protected $_NetsLog = false;

	public function init()
	{
		$this->getSession()->deleteVariable('nets_err_msg');
		$this->_NetsLog = $this->getConfig()->getConfigParam('nets_blDebug_log');
		$this->getNetsPaymentTypes();
		$this->_sThisTemplate = parent::render();
		parent::init();
	}

	public function getDynValue()
	{
		return parent::getDynValue();
	}


	/**
	 *
	 * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
	 * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
	 */
	public function getNetsPaymentTypes()
	{
		$this->payment_types_active = array();
		$oDB = oxDb::getDb(true);
		$sSql = "SELECT OXID FROM oxpayments WHERE oxactive = 1";
		$active_payment_ids = $oDB->getAll($sSql);
		if (! empty($active_payment_ids)) {
			$payment_types = array();
			foreach ($active_payment_ids as $payment_id) {
				$payment_type = netsPaymentTypes::getNetsPaymentType($payment_id[0]);
				if (isset($payment_type) && $payment_type) {
					$payment_types[] = $payment_type;
				}
			}
			$this->payment_types_active = $payment_types;
		}
	}


	public function getPaymentTextConfig()
	{
		return $this->getConfig()->getConfigParam('nets_payment_text');
	}


	public function getPaymentUrlConfig()
	{
		return $this->getConfig()->getConfigParam('nets_payment_url');
	}
}
