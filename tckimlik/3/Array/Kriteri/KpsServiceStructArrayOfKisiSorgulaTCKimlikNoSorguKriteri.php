<?php
/**
 * File for class KpsServiceStructArrayOfKisiSorgulaTCKimlikNoSorguKriteri
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
/**
 * This class stands for KpsServiceStructArrayOfKisiSorgulaTCKimlikNoSorguKriteri originally named ArrayOfKisiSorgulaTCKimlikNoSorguKriteri
 * Meta informations extracted from the WSDL
 * - from schema : {@link https://kpsbasvuru.nvi.gov.tr/Services/WsdlNoPolicy.ashx?Service=KisiSorgulaTCKimlikNoServis&TestMode=true}
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
class KpsServiceStructArrayOfKisiSorgulaTCKimlikNoSorguKriteri extends KpsServiceWsdlClass
{
    /**
     * The KisiSorgulaTCKimlikNoSorguKriteri
     * Meta informations extracted from the WSDL
     * - maxOccurs : unbounded
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri
     */
    public $KisiSorgulaTCKimlikNoSorguKriteri;
    /**
     * Constructor method for ArrayOfKisiSorgulaTCKimlikNoSorguKriteri
     * @see parent::__construct()
     * @param KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri $_kisiSorgulaTCKimlikNoSorguKriteri
     * @return KpsServiceStructArrayOfKisiSorgulaTCKimlikNoSorguKriteri
     */
    public function __construct($_kisiSorgulaTCKimlikNoSorguKriteri = NULL)
    {
        parent::__construct(array('KisiSorgulaTCKimlikNoSorguKriteri'=>$_kisiSorgulaTCKimlikNoSorguKriteri),false);
    }
    /**
     * Get KisiSorgulaTCKimlikNoSorguKriteri value
     * @return KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri|null
     */
    public function getKisiSorgulaTCKimlikNoSorguKriteri()
    {
        return $this->KisiSorgulaTCKimlikNoSorguKriteri;
    }
    /**
     * Set KisiSorgulaTCKimlikNoSorguKriteri value
     * @param KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri $_kisiSorgulaTCKimlikNoSorguKriteri the KisiSorgulaTCKimlikNoSorguKriteri
     * @return KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri
     */
    public function setKisiSorgulaTCKimlikNoSorguKriteri($_kisiSorgulaTCKimlikNoSorguKriteri)
    {
        return ($this->KisiSorgulaTCKimlikNoSorguKriteri = $_kisiSorgulaTCKimlikNoSorguKriteri);
    }
    /**
     * Returns the current element
     * @see KpsServiceWsdlClass::current()
     * @return KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see KpsServiceWsdlClass::item()
     * @param int $_index
     * @return KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri
     */
    public function item($_index)
    {
        return parent::item($_index);
    }
    /**
     * Returns the first element
     * @see KpsServiceWsdlClass::first()
     * @return KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see KpsServiceWsdlClass::last()
     * @return KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see KpsServiceWsdlClass::last()
     * @param int $_offset
     * @return KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri
     */
    public function offsetGet($_offset)
    {
        return parent::offsetGet($_offset);
    }
    /**
     * Returns the attribute name
     * @see KpsServiceWsdlClass::getAttributeName()
     * @return string KisiSorgulaTCKimlikNoSorguKriteri
     */
    public function getAttributeName()
    {
        return 'KisiSorgulaTCKimlikNoSorguKriteri';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see KpsServiceWsdlClass::__set_state()
     * @uses KpsServiceWsdlClass::__set_state()
     * @param array $_array the exported values
     * @return KpsServiceStructArrayOfKisiSorgulaTCKimlikNoSorguKriteri
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
