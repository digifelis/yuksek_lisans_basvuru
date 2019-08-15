<?php
/**
 * File for class KpsServiceStructKisiBilgisiSonucu
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
/**
 * This class stands for KpsServiceStructKisiBilgisiSonucu originally named KisiBilgisiSonucu
 * Meta informations extracted from the WSDL
 * - from schema : {@link https://kpsbasvuru.nvi.gov.tr/Services/WsdlNoPolicy.ashx?Service=KisiSorgulaTCKimlikNoServis&TestMode=true}
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
class KpsServiceStructKisiBilgisiSonucu extends KpsServiceWsdlClass
{
    /**
     * The HataBilgisi
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructParametre
     */
    public $HataBilgisi;
    /**
     * The SorguSonucu
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructArrayOfKisiBilgisi
     */
    public $SorguSonucu;
    /**
     * Constructor method for KisiBilgisiSonucu
     * @see parent::__construct()
     * @param KpsServiceStructParametre $_hataBilgisi
     * @param KpsServiceStructArrayOfKisiBilgisi $_sorguSonucu
     * @return KpsServiceStructKisiBilgisiSonucu
     */
    public function __construct($_hataBilgisi = NULL,$_sorguSonucu = NULL)
    {
        parent::__construct(array('HataBilgisi'=>$_hataBilgisi,'SorguSonucu'=>($_sorguSonucu instanceof KpsServiceStructArrayOfKisiBilgisi)?$_sorguSonucu:new KpsServiceStructArrayOfKisiBilgisi($_sorguSonucu)),false);
    }
    /**
     * Get HataBilgisi value
     * @return KpsServiceStructParametre|null
     */
    public function getHataBilgisi()
    {
        return $this->HataBilgisi;
    }
    /**
     * Set HataBilgisi value
     * @param KpsServiceStructParametre $_hataBilgisi the HataBilgisi
     * @return KpsServiceStructParametre
     */
    public function setHataBilgisi($_hataBilgisi)
    {
        return ($this->HataBilgisi = $_hataBilgisi);
    }
    /**
     * Get SorguSonucu value
     * @return KpsServiceStructArrayOfKisiBilgisi|null
     */
    public function getSorguSonucu()
    {
        return $this->SorguSonucu;
    }
    /**
     * Set SorguSonucu value
     * @param KpsServiceStructArrayOfKisiBilgisi $_sorguSonucu the SorguSonucu
     * @return KpsServiceStructArrayOfKisiBilgisi
     */
    public function setSorguSonucu($_sorguSonucu)
    {
        return ($this->SorguSonucu = $_sorguSonucu);
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see KpsServiceWsdlClass::__set_state()
     * @uses KpsServiceWsdlClass::__set_state()
     * @param array $_array the exported values
     * @return KpsServiceStructKisiBilgisiSonucu
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
