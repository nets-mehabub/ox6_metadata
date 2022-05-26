<?php 
namespace OxidEsales\NetsModule\Models;

use OxidEsales\NetsModule\Api\NetsPaymentTypes;
use OxidEsales\NetsModule\Api\NetsLog;
class NetsPaymentGateway extends NetsPaymentGateway_parent
{
	protected $_NetsLog = false;

	public function executePayment($dAmount, &$oOrder)
	{
		NetsLog::log($this->_NetsLog, 'executePayment ', $this->getFunctionName);
		$this->_NetsLog = $this->getConfig()->getConfigParam('nets_blDebug_log');
		// $ox_payment_id = $this->getSession()->getInstance()->getBasket()->getPaymentId();
		$ox_payment_id = $this->getSession()->getBasket()->getPaymentId();
		$payment_type = netsPaymentTypes::getNetsPaymentType($ox_payment_id);
		NetsLog::log($this->_NetsLog, "netsPaymentGateway executePayment: " . $payment_type);

		if (! isset($payment_type) || ! $payment_type) {
			NetsLog::log($this->_NetsLog, "netsPaymentGateway executePayment, parent");
			return parent::executePayment($dAmount, $oOrder);
		}
		NetsLog::log($this->_NetsLog, "netsPaymentGateway executePayment");
		$success = true;
		$this->getSession()->deleteVariable('nets_success');

		if (isset($success) && $success === true) {
			NetsLog::log($this->_NetsLog, "netsPaymentGateway executePayment - success");
			return true;
		}
		NetsLog::log($this->_NetsLog, "netsPaymentGateway executePayment - failure");
		return false;
	}
}
