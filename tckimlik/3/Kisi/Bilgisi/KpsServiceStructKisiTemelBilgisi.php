<?php
/**
 * File for class KpsServiceStructKisiTemelBilgisi
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
/**
 * This class stands for KpsServiceStructKisiTemelBilgisi originally named KisiTemelBilgisi
 * Meta informations extracted from the WSDL
 * - from schema : {@link https://kpsbasvuru.nvi.gov.tr/Services/WsdlNoPolicy.ashx?Service=KisiSorgulaTCKimlikNoServis&TestMode=true}
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
class KpsServiceStructKisiTemelBilgisi extends KpsServiceWsdlClass
{
    /**
     * The Ad
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var string
     */
    public $Ad;
    /**
     * The AnneAd
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var string
     */
    public $AnneAd;
    /**
     * The BabaAd
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var string
     */
    public $BabaAd;
    /**
     * The Cinsiyet
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructParametre
     */
    public $Cinsiyet;
    /**
     * The DogumTarih
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructTarihBilgisi
     */
    public $DogumTarih;
    /**
     * The DogumYer
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var string
     */
    public $DogumYer;
    /**
     * The Soyad
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var string
     */
    public $Soyad;
    /**
     * Constructor method for KisiTemelBilgisi
     * @see parent::__construct()
     * @param string $_ad
     * @param string $_anneAd
     * @param string $_babaAd
     * @param KpsServiceStructParametre $_cinsiyet
     * @param KpsServiceStructTarihBilgisi $_dogumTarih
     * @param string $_dogumYer
     * @param string $_soyad
     * @return KpsServiceStructKisiTemelBilgisi
     */
    public function __construct($_ad = NULL,$_anneAd = NULL,$_babaAd = NULL,$_cinsiyet = NULL,$_dogumTarih = NULL,$_dogumYer = NULL,$_soyad = NULL)
    {
        parent::__construct(array('Ad'=>$_ad,'AnneAd'=>$_anneAd,'BabaAd'=>$_babaAd,'Cinsiyet'=>$_cinsiyet,'DogumTarih'=>$_dogumTarih,'DogumYer'=>$_dogumYer,'Soyad'=>$_soyad),false);
    }
    /**
     * Get Ad value
     * @return string|null
     */
    public function getAd()
    {
        return $this->Ad;
    }
    /**
     * Set Ad value
     * @param string $_ad the Ad
     * @return string
     */
    public function setAd($_ad)
    {
        return ($this->Ad = $_ad);
    }
    /**
     * Get AnneAd value
     * @return string|null
     */
    public function getAnneAd()
    {
        return $this->AnneAd;
    }
    /**
     * Set AnneAd value
     * @param string $_anneAd the AnneAd
     * @return string
     */
    public function setAnneAd($_anneAd)
    {
        return ($this->AnneAd = $_anneAd);
    }
    /**
     * Get BabaAd value
     * @return string|null
     */
    public function getBabaAd()
    {
        return $this->BabaAd;
    }
    /**
     * Set BabaAd value
     * @param string $_babaAd the BabaAd
     * @return string
     */
    public function setBabaAd($_babaAd)
    {
        return ($this->BabaAd = $_babaAd);
    }
    /**
     * Get Cinsiyet value
     * @return KpsServiceStructParametre|null
     */
    public function getCinsiyet()
    {
        return $this->Cinsiyet;
    }
    /**
     * Set Cinsiyet value
     * @param KpsServiceStructParametre $_cinsiyet the Cinsiyet
     * @return KpsServiceStructParametre
     */
    public function setCinsiyet($_cinsiyet)
    {
        return ($this->Cinsiyet = $_cinsiyet);
    }
    /**
     * Get DogumTarih value
     * @return KpsServiceStructTarihBilgisi|null
     */
    public function getDogumTarih()
    {
        return $this->DogumTarih;
    }
    /**
     * Set DogumTarih value
     * @param KpsServiceStructTarihBilgisi $_dogumTarih the DogumTarih
     * @return KpsServiceStructTarihBilgisi
     */
    public function setDogumTarih($_dogumTarih)
    {
        return ($this->DogumTarih = $_dogumTarih);
    }
    /**
     * Get DogumYer value
     * @return string|null
     */
    public function getDogumYer()
    {
        return $this->DogumYer;
    }
    /**
     * Set DogumYer value
     * @param string $_dogumYer the DogumYer
     * @return string
     */
    public function setDogumYer($_dogumYer)
    {
        return ($this->DogumYer = $_dogumYer);
    }
    /**
     * Get Soyad value
     * @return string|null
     */
    public function getSoyad()
    {
        return $this->Soyad;
    }
    /**
     * Set Soyad value
     * @param string $_soyad the Soyad
     * @return string
     */
    public function setSoyad($_soyad)
    {
        return ($this->Soyad = $_soyad);
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see KpsServiceWsdlClass::__set_state()
     * @uses KpsServiceWsdlClass::__set_state()
     * @param array $_array the exported values
     * @return KpsServiceStructKisiTemelBilgisi
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
