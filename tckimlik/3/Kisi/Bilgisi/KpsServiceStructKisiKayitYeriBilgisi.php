<?php
/**
 * File for class KpsServiceStructKisiKayitYeriBilgisi
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
/**
 * This class stands for KpsServiceStructKisiKayitYeriBilgisi originally named KisiKayitYeriBilgisi
 * Meta informations extracted from the WSDL
 * - from schema : {@link https://kpsbasvuru.nvi.gov.tr/Services/WsdlNoPolicy.ashx?Service=KisiSorgulaTCKimlikNoServis&TestMode=true}
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
class KpsServiceStructKisiKayitYeriBilgisi extends KpsServiceWsdlClass
{
    /**
     * The AileSiraNo
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var int
     */
    public $AileSiraNo;
    /**
     * The BireySiraNo
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var int
     */
    public $BireySiraNo;
    /**
     * The Cilt
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructParametre
     */
    public $Cilt;
    /**
     * The Il
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructParametre
     */
    public $Il;
    /**
     * The Ilce
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructParametre
     */
    public $Ilce;
    /**
     * Constructor method for KisiKayitYeriBilgisi
     * @see parent::__construct()
     * @param int $_aileSiraNo
     * @param int $_bireySiraNo
     * @param KpsServiceStructParametre $_cilt
     * @param KpsServiceStructParametre $_il
     * @param KpsServiceStructParametre $_ilce
     * @return KpsServiceStructKisiKayitYeriBilgisi
     */
    public function __construct($_aileSiraNo = NULL,$_bireySiraNo = NULL,$_cilt = NULL,$_il = NULL,$_ilce = NULL)
    {
        parent::__construct(array('AileSiraNo'=>$_aileSiraNo,'BireySiraNo'=>$_bireySiraNo,'Cilt'=>$_cilt,'Il'=>$_il,'Ilce'=>$_ilce),false);
    }
    /**
     * Get AileSiraNo value
     * @return int|null
     */
    public function getAileSiraNo()
    {
        return $this->AileSiraNo;
    }
    /**
     * Set AileSiraNo value
     * @param int $_aileSiraNo the AileSiraNo
     * @return int
     */
    public function setAileSiraNo($_aileSiraNo)
    {
        return ($this->AileSiraNo = $_aileSiraNo);
    }
    /**
     * Get BireySiraNo value
     * @return int|null
     */
    public function getBireySiraNo()
    {
        return $this->BireySiraNo;
    }
    /**
     * Set BireySiraNo value
     * @param int $_bireySiraNo the BireySiraNo
     * @return int
     */
    public function setBireySiraNo($_bireySiraNo)
    {
        return ($this->BireySiraNo = $_bireySiraNo);
    }
    /**
     * Get Cilt value
     * @return KpsServiceStructParametre|null
     */
    public function getCilt()
    {
        return $this->Cilt;
    }
    /**
     * Set Cilt value
     * @param KpsServiceStructParametre $_cilt the Cilt
     * @return KpsServiceStructParametre
     */
    public function setCilt($_cilt)
    {
        return ($this->Cilt = $_cilt);
    }
    /**
     * Get Il value
     * @return KpsServiceStructParametre|null
     */
    public function getIl()
    {
        return $this->Il;
    }
    /**
     * Set Il value
     * @param KpsServiceStructParametre $_il the Il
     * @return KpsServiceStructParametre
     */
    public function setIl($_il)
    {
        return ($this->Il = $_il);
    }
    /**
     * Get Ilce value
     * @return KpsServiceStructParametre|null
     */
    public function getIlce()
    {
        return $this->Ilce;
    }
    /**
     * Set Ilce value
     * @param KpsServiceStructParametre $_ilce the Ilce
     * @return KpsServiceStructParametre
     */
    public function setIlce($_ilce)
    {
        return ($this->Ilce = $_ilce);
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see KpsServiceWsdlClass::__set_state()
     * @uses KpsServiceWsdlClass::__set_state()
     * @param array $_array the exported values
     * @return KpsServiceStructKisiKayitYeriBilgisi
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
