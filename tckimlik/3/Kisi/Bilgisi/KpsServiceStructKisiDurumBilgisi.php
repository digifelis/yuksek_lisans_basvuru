<?php
/**
 * File for class KpsServiceStructKisiDurumBilgisi
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
/**
 * This class stands for KpsServiceStructKisiDurumBilgisi originally named KisiDurumBilgisi
 * Meta informations extracted from the WSDL
 * - from schema : {@link https://kpsbasvuru.nvi.gov.tr/Services/WsdlNoPolicy.ashx?Service=KisiSorgulaTCKimlikNoServis&TestMode=true}
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
class KpsServiceStructKisiDurumBilgisi extends KpsServiceWsdlClass
{
    /**
     * The Din
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructParametre
     */
    public $Din;
    /**
     * The Durum
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructParametre
     */
    public $Durum;
    /**
     * The MedeniHal
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructParametre
     */
    public $MedeniHal;
    /**
     * The OlumTarih
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructTarihBilgisi
     */
    public $OlumTarih;
    /**
     * Constructor method for KisiDurumBilgisi
     * @see parent::__construct()
     * @param KpsServiceStructParametre $_din
     * @param KpsServiceStructParametre $_durum
     * @param KpsServiceStructParametre $_medeniHal
     * @param KpsServiceStructTarihBilgisi $_olumTarih
     * @return KpsServiceStructKisiDurumBilgisi
     */
    public function __construct($_din = NULL,$_durum = NULL,$_medeniHal = NULL,$_olumTarih = NULL)
    {
        parent::__construct(array('Din'=>$_din,'Durum'=>$_durum,'MedeniHal'=>$_medeniHal,'OlumTarih'=>$_olumTarih),false);
    }
    /**
     * Get Din value
     * @return KpsServiceStructParametre|null
     */
    public function getDin()
    {
        return $this->Din;
    }
    /**
     * Set Din value
     * @param KpsServiceStructParametre $_din the Din
     * @return KpsServiceStructParametre
     */
    public function setDin($_din)
    {
        return ($this->Din = $_din);
    }
    /**
     * Get Durum value
     * @return KpsServiceStructParametre|null
     */
    public function getDurum()
    {
        return $this->Durum;
    }
    /**
     * Set Durum value
     * @param KpsServiceStructParametre $_durum the Durum
     * @return KpsServiceStructParametre
     */
    public function setDurum($_durum)
    {
        return ($this->Durum = $_durum);
    }
    /**
     * Get MedeniHal value
     * @return KpsServiceStructParametre|null
     */
    public function getMedeniHal()
    {
        return $this->MedeniHal;
    }
    /**
     * Set MedeniHal value
     * @param KpsServiceStructParametre $_medeniHal the MedeniHal
     * @return KpsServiceStructParametre
     */
    public function setMedeniHal($_medeniHal)
    {
        return ($this->MedeniHal = $_medeniHal);
    }
    /**
     * Get OlumTarih value
     * @return KpsServiceStructTarihBilgisi|null
     */
    public function getOlumTarih()
    {
        return $this->OlumTarih;
    }
    /**
     * Set OlumTarih value
     * @param KpsServiceStructTarihBilgisi $_olumTarih the OlumTarih
     * @return KpsServiceStructTarihBilgisi
     */
    public function setOlumTarih($_olumTarih)
    {
        return ($this->OlumTarih = $_olumTarih);
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see KpsServiceWsdlClass::__set_state()
     * @uses KpsServiceWsdlClass::__set_state()
     * @param array $_array the exported values
     * @return KpsServiceStructKisiDurumBilgisi
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
