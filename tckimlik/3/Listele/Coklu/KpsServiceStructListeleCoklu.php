<?php
/**
 * File for class KpsServiceStructListeleCoklu
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
/**
 * This class stands for KpsServiceStructListeleCoklu originally named ListeleCoklu
 * Meta informations extracted from the WSDL
 * - from schema : {@link https://kpsbasvuru.nvi.gov.tr/Services/WsdlNoPolicy.ashx?Service=KisiSorgulaTCKimlikNoServis&TestMode=true}
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
class KpsServiceStructListeleCoklu extends KpsServiceWsdlClass
{
    /**
     * The kriterListesi
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructArrayOfKisiSorgulaTCKimlikNoSorguKriteri
     */
    public $kriterListesi;
    /**
     * Constructor method for ListeleCoklu
     * @see parent::__construct()
     * @param KpsServiceStructArrayOfKisiSorgulaTCKimlikNoSorguKriteri $_kriterListesi
     * @return KpsServiceStructListeleCoklu
     */
    public function __construct($_kriterListesi = NULL)
    {
        parent::__construct(array('kriterListesi'=>($_kriterListesi instanceof KpsServiceStructArrayOfKisiSorgulaTCKimlikNoSorguKriteri)?$_kriterListesi:new KpsServiceStructArrayOfKisiSorgulaTCKimlikNoSorguKriteri($_kriterListesi)),false);
    }
    /**
     * Get kriterListesi value
     * @return KpsServiceStructArrayOfKisiSorgulaTCKimlikNoSorguKriteri|null
     */
    public function getKriterListesi()
    {
        return $this->kriterListesi;
    }
    /**
     * Set kriterListesi value
     * @param KpsServiceStructArrayOfKisiSorgulaTCKimlikNoSorguKriteri $_kriterListesi the kriterListesi
     * @return KpsServiceStructArrayOfKisiSorgulaTCKimlikNoSorguKriteri
     */
    public function setKriterListesi($_kriterListesi)
    {
        return ($this->kriterListesi = $_kriterListesi);
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see KpsServiceWsdlClass::__set_state()
     * @uses KpsServiceWsdlClass::__set_state()
     * @param array $_array the exported values
     * @return KpsServiceStructListeleCoklu
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
