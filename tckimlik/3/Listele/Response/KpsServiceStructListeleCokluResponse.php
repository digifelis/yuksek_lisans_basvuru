<?php
/**
 * File for class KpsServiceStructListeleCokluResponse
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
/**
 * This class stands for KpsServiceStructListeleCokluResponse originally named ListeleCokluResponse
 * Meta informations extracted from the WSDL
 * - from schema : {@link https://kpsbasvuru.nvi.gov.tr/Services/WsdlNoPolicy.ashx?Service=KisiSorgulaTCKimlikNoServis&TestMode=true}
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
class KpsServiceStructListeleCokluResponse extends KpsServiceWsdlClass
{
    /**
     * The ListeleCokluResult
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructKisiBilgisiSonucu
     */
    public $ListeleCokluResult;
    /**
     * Constructor method for ListeleCokluResponse
     * @see parent::__construct()
     * @param KpsServiceStructKisiBilgisiSonucu $_listeleCokluResult
     * @return KpsServiceStructListeleCokluResponse
     */
    public function __construct($_listeleCokluResult = NULL)
    {
        parent::__construct(array('ListeleCokluResult'=>$_listeleCokluResult),false);
    }
    /**
     * Get ListeleCokluResult value
     * @return KpsServiceStructKisiBilgisiSonucu|null
     */
    public function getListeleCokluResult()
    {
        return $this->ListeleCokluResult;
    }
    /**
     * Set ListeleCokluResult value
     * @param KpsServiceStructKisiBilgisiSonucu $_listeleCokluResult the ListeleCokluResult
     * @return KpsServiceStructKisiBilgisiSonucu
     */
    public function setListeleCokluResult($_listeleCokluResult)
    {
        return ($this->ListeleCokluResult = $_listeleCokluResult);
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see KpsServiceWsdlClass::__set_state()
     * @uses KpsServiceWsdlClass::__set_state()
     * @param array $_array the exported values
     * @return KpsServiceStructListeleCokluResponse
     */
    public static function __set_state(array $_array,$_className = __CLASS__)
    {
        return parent::__set_state($_array,$_className);
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
