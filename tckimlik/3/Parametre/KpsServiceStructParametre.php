<?php
/**
 * File for class KpsServiceStructParametre
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
/**
 * This class stands for KpsServiceStructParametre originally named Parametre
 * Meta informations extracted from the WSDL
 * - from schema : {@link https://kpsbasvuru.nvi.gov.tr/Services/WsdlNoPolicy.ashx?Service=KisiSorgulaTCKimlikNoServis&TestMode=true}
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
class KpsServiceStructParametre extends KpsServiceWsdlClass
{
    /**
     * The Aciklama
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var string
     */
    public $Aciklama;
    /**
     * The Kod
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var int
     */
    public $Kod;
    /**
     * Constructor method for Parametre
     * @see parent::__construct()
     * @param string $_aciklama
     * @param int $_kod
     * @return KpsServiceStructParametre
     */
    public function __construct($_aciklama = NULL,$_kod = NULL)
    {
        parent::__construct(array('Aciklama'=>$_aciklama,'Kod'=>$_kod),false);
    }
    /**
     * Get Aciklama value
     * @return string|null
     */
    public function getAciklama()
    {
        return $this->Aciklama;
    }
    /**
     * Set Aciklama value
     * @param string $_aciklama the Aciklama
     * @return string
     */
    public function setAciklama($_aciklama)
    {
        return ($this->Aciklama = $_aciklama);
    }
    /**
     * Get Kod value
     * @return int|null
     */
    public function getKod()
    {
        return $this->Kod;
    }
    /**
     * Set Kod value
     * @param int $_kod the Kod
     * @return int
     */
    public function setKod($_kod)
    {
        return ($this->Kod = $_kod);
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see KpsServiceWsdlClass::__set_state()
     * @uses KpsServiceWsdlClass::__set_state()
     * @param array $_array the exported values
     * @return KpsServiceStructParametre
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
