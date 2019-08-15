<?php
/**
 * File for class KpsServiceServiceListele
 * @package KpsService
 * @subpackage Services
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
/**
 * This class stands for KpsServiceServiceListele originally named Listele
 * @package KpsService
 * @subpackage Services
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
class KpsServiceServiceListele extends KpsServiceWsdlClass
{
    /**
     * Method to call the operation originally named ListeleCoklu
     * @uses KpsServiceWsdlClass::getSoapClient()
     * @uses KpsServiceWsdlClass::setResult()
     * @uses KpsServiceWsdlClass::saveLastError()
     * @param KpsServiceStructListeleCoklu $_kpsServiceStructListeleCoklu
     * @return KpsServiceStructListeleCokluResponse
     */
    public function ListeleCoklu(KpsServiceStructListeleCoklu $_kpsServiceStructListeleCoklu)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->ListeleCoklu($_kpsServiceStructListeleCoklu));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Returns the result
     * @see KpsServiceWsdlClass::getResult()
     * @return KpsServiceStructListeleCokluResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
