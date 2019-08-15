<?php
/**
 * File for class KpsServiceStructTarihBilgisi
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
/**
 * This class stands for KpsServiceStructTarihBilgisi originally named TarihBilgisi
 * Meta informations extracted from the WSDL
 * - from schema : {@link https://kpsbasvuru.nvi.gov.tr/Services/WsdlNoPolicy.ashx?Service=KisiSorgulaTCKimlikNoServis&TestMode=true}
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
class KpsServiceStructTarihBilgisi extends KpsServiceWsdlClass
{
    /**
     * The Ay
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var int
     */
    public $Ay;
    /**
     * The Gun
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var int
     */
    public $Gun;
    /**
     * The Yil
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var int
     */
    public $Yil;
    /**
     * Constructor method for TarihBilgisi
     * @see parent::__construct()
     * @param int $_ay
     * @param int $_gun
     * @param int $_yil
     * @return KpsServiceStructTarihBilgisi
     */
    public function __construct($_ay = NULL,$_gun = NULL,$_yil = NULL)
    {
        parent::__construct(array('Ay'=>$_ay,'Gun'=>$_gun,'Yil'=>$_yil),false);
    }
    /**
     * Get Ay value
     * @return int|null
     */
    public function getAy()
    {
        return $this->Ay;
    }
    /**
     * Set Ay value
     * @param int $_ay the Ay
     * @return int
     */
    public function setAy($_ay)
    {
        return ($this->Ay = $_ay);
    }
    /**
     * Get Gun value
     * @return int|null
     */
    public function getGun()
    {
        return $this->Gun;
    }
    /**
     * Set Gun value
     * @param int $_gun the Gun
     * @return int
     */
    public function setGun($_gun)
    {
        return ($this->Gun = $_gun);
    }
    /**
     * Get Yil value
     * @return int|null
     */
    public function getYil()
    {
        return $this->Yil;
    }
    /**
     * Set Yil value
     * @param int $_yil the Yil
     * @return int
     */
    public function setYil($_yil)
    {
        return ($this->Yil = $_yil);
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see KpsServiceWsdlClass::__set_state()
     * @uses KpsServiceWsdlClass::__set_state()
     * @param array $_array the exported values
     * @return KpsServiceStructTarihBilgisi
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
