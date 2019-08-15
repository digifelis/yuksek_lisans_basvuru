<?php
/**
 * File for class KpsServiceStructArrayOfKisiBilgisi
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
/**
 * This class stands for KpsServiceStructArrayOfKisiBilgisi originally named ArrayOfKisiBilgisi
 * Meta informations extracted from the WSDL
 * - from schema : {@link https://kpsbasvuru.nvi.gov.tr/Services/WsdlNoPolicy.ashx?Service=KisiSorgulaTCKimlikNoServis&TestMode=true}
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
class KpsServiceStructArrayOfKisiBilgisi extends KpsServiceWsdlClass
{
    /**
     * The KisiBilgisi
     * Meta informations extracted from the WSDL
     * - maxOccurs : unbounded
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructKisiBilgisi
     */
    public $KisiBilgisi;
    /**
     * Constructor method for ArrayOfKisiBilgisi
     * @see parent::__construct()
     * @param KpsServiceStructKisiBilgisi $_kisiBilgisi
     * @return KpsServiceStructArrayOfKisiBilgisi
     */
    public function __construct($_kisiBilgisi = NULL)
    {
        parent::__construct(array('KisiBilgisi'=>$_kisiBilgisi),false);
    }
    /**
     * Get KisiBilgisi value
     * @return KpsServiceStructKisiBilgisi|null
     */
    public function getKisiBilgisi()
    {
        return $this->KisiBilgisi;
    }
    /**
     * Set KisiBilgisi value
     * @param KpsServiceStructKisiBilgisi $_kisiBilgisi the KisiBilgisi
     * @return KpsServiceStructKisiBilgisi
     */
    public function setKisiBilgisi($_kisiBilgisi)
    {
        return ($this->KisiBilgisi = $_kisiBilgisi);
    }
    /**
     * Returns the current element
     * @see KpsServiceWsdlClass::current()
     * @return KpsServiceStructKisiBilgisi
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see KpsServiceWsdlClass::item()
     * @param int $_index
     * @return KpsServiceStructKisiBilgisi
     */
    public function item($_index)
    {
        return parent::item($_index);
    }
    /**
     * Returns the first element
     * @see KpsServiceWsdlClass::first()
     * @return KpsServiceStructKisiBilgisi
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see KpsServiceWsdlClass::last()
     * @return KpsServiceStructKisiBilgisi
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see KpsServiceWsdlClass::last()
     * @param int $_offset
     * @return KpsServiceStructKisiBilgisi
     */
    public function offsetGet($_offset)
    {
        return parent::offsetGet($_offset);
    }
    /**
     * Returns the attribute name
     * @see KpsServiceWsdlClass::getAttributeName()
     * @return string KisiBilgisi
     */
    public function getAttributeName()
    {
        return 'KisiBilgisi';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see KpsServiceWsdlClass::__set_state()
     * @uses KpsServiceWsdlClass::__set_state()
     * @param array $_array the exported values
     * @return KpsServiceStructArrayOfKisiBilgisi
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
