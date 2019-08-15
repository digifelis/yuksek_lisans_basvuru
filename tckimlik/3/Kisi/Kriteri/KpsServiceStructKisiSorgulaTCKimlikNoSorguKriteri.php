<?php
/**
 * File for class KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
/**
 * This class stands for KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri originally named KisiSorgulaTCKimlikNoSorguKriteri
 * Meta informations extracted from the WSDL
 * - from schema : {@link https://kpsbasvuru.nvi.gov.tr/Services/WsdlNoPolicy.ashx?Service=KisiSorgulaTCKimlikNoServis&TestMode=true}
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
class KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri extends KpsServiceWsdlClass
{
    /**
     * The TCKimlikNo
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var long
     */
    public $TCKimlikNo;
    /**
     * Constructor method for KisiSorgulaTCKimlikNoSorguKriteri
     * @see parent::__construct()
     * @param long $_tCKimlikNo
     * @return KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri
     */
    public function __construct($_tCKimlikNo = NULL)
    {
        parent::__construct(array('TCKimlikNo'=>$_tCKimlikNo),false);
    }
    /**
     * Get TCKimlikNo value
     * @return long|null
     */
    public function getTCKimlikNo()
    {
        return $this->TCKimlikNo;
    }
    /**
     * Set TCKimlikNo value
     * @param long $_tCKimlikNo the TCKimlikNo
     * @return long
     */
    public function setTCKimlikNo($_tCKimlikNo)
    {
        return ($this->TCKimlikNo = $_tCKimlikNo);
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see KpsServiceWsdlClass::__set_state()
     * @uses KpsServiceWsdlClass::__set_state()
     * @param array $_array the exported values
     * @return KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri
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
