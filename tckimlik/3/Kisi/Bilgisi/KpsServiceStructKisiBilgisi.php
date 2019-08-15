<?php
/**
 * File for class KpsServiceStructKisiBilgisi
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
/**
 * This class stands for KpsServiceStructKisiBilgisi originally named KisiBilgisi
 * Meta informations extracted from the WSDL
 * - from schema : {@link https://kpsbasvuru.nvi.gov.tr/Services/WsdlNoPolicy.ashx?Service=KisiSorgulaTCKimlikNoServis&TestMode=true}
 * @package KpsService
 * @subpackage Structs
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
class KpsServiceStructKisiBilgisi extends KpsServiceWsdlClass
{
    /**
     * The AnneTCKimlikNo
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var long
     */
    public $AnneTCKimlikNo;
    /**
     * The BabaTCKimlikNo
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var long
     */
    public $BabaTCKimlikNo;
    /**
     * The DogumYerKod
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var int
     */
    public $DogumYerKod;
    /**
     * The DurumBilgisi
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructKisiDurumBilgisi
     */
    public $DurumBilgisi;
    /**
     * The EsTCKimlikNo
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var long
     */
    public $EsTCKimlikNo;
    /**
     * The HataBilgisi
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructParametre
     */
    public $HataBilgisi;
    /**
     * The KayitYeriBilgisi
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructKisiKayitYeriBilgisi
     */
    public $KayitYeriBilgisi;
    /**
     * The TCKimlikNo
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var long
     */
    public $TCKimlikNo;
    /**
     * The TemelBilgisi
     * Meta informations extracted from the WSDL
     * - minOccurs : 0
     * - nillable : true
     * @var KpsServiceStructKisiTemelBilgisi
     */
    public $TemelBilgisi;
    /**
     * Constructor method for KisiBilgisi
     * @see parent::__construct()
     * @param long $_anneTCKimlikNo
     * @param long $_babaTCKimlikNo
     * @param int $_dogumYerKod
     * @param KpsServiceStructKisiDurumBilgisi $_durumBilgisi
     * @param long $_esTCKimlikNo
     * @param KpsServiceStructParametre $_hataBilgisi
     * @param KpsServiceStructKisiKayitYeriBilgisi $_kayitYeriBilgisi
     * @param long $_tCKimlikNo
     * @param KpsServiceStructKisiTemelBilgisi $_temelBilgisi
     * @return KpsServiceStructKisiBilgisi
     */
    public function __construct($_anneTCKimlikNo = NULL,$_babaTCKimlikNo = NULL,$_dogumYerKod = NULL,$_durumBilgisi = NULL,$_esTCKimlikNo = NULL,$_hataBilgisi = NULL,$_kayitYeriBilgisi = NULL,$_tCKimlikNo = NULL,$_temelBilgisi = NULL)
    {
        parent::__construct(array('AnneTCKimlikNo'=>$_anneTCKimlikNo,'BabaTCKimlikNo'=>$_babaTCKimlikNo,'DogumYerKod'=>$_dogumYerKod,'DurumBilgisi'=>$_durumBilgisi,'EsTCKimlikNo'=>$_esTCKimlikNo,'HataBilgisi'=>$_hataBilgisi,'KayitYeriBilgisi'=>$_kayitYeriBilgisi,'TCKimlikNo'=>$_tCKimlikNo,'TemelBilgisi'=>$_temelBilgisi),false);
    }
    /**
     * Get AnneTCKimlikNo value
     * @return long|null
     */
    public function getAnneTCKimlikNo()
    {
        return $this->AnneTCKimlikNo;
    }
    /**
     * Set AnneTCKimlikNo value
     * @param long $_anneTCKimlikNo the AnneTCKimlikNo
     * @return long
     */
    public function setAnneTCKimlikNo($_anneTCKimlikNo)
    {
        return ($this->AnneTCKimlikNo = $_anneTCKimlikNo);
    }
    /**
     * Get BabaTCKimlikNo value
     * @return long|null
     */
    public function getBabaTCKimlikNo()
    {
        return $this->BabaTCKimlikNo;
    }
    /**
     * Set BabaTCKimlikNo value
     * @param long $_babaTCKimlikNo the BabaTCKimlikNo
     * @return long
     */
    public function setBabaTCKimlikNo($_babaTCKimlikNo)
    {
        return ($this->BabaTCKimlikNo = $_babaTCKimlikNo);
    }
    /**
     * Get DogumYerKod value
     * @return int|null
     */
    public function getDogumYerKod()
    {
        return $this->DogumYerKod;
    }
    /**
     * Set DogumYerKod value
     * @param int $_dogumYerKod the DogumYerKod
     * @return int
     */
    public function setDogumYerKod($_dogumYerKod)
    {
        return ($this->DogumYerKod = $_dogumYerKod);
    }
    /**
     * Get DurumBilgisi value
     * @return KpsServiceStructKisiDurumBilgisi|null
     */
    public function getDurumBilgisi()
    {
        return $this->DurumBilgisi;
    }
    /**
     * Set DurumBilgisi value
     * @param KpsServiceStructKisiDurumBilgisi $_durumBilgisi the DurumBilgisi
     * @return KpsServiceStructKisiDurumBilgisi
     */
    public function setDurumBilgisi($_durumBilgisi)
    {
        return ($this->DurumBilgisi = $_durumBilgisi);
    }
    /**
     * Get EsTCKimlikNo value
     * @return long|null
     */
    public function getEsTCKimlikNo()
    {
        return $this->EsTCKimlikNo;
    }
    /**
     * Set EsTCKimlikNo value
     * @param long $_esTCKimlikNo the EsTCKimlikNo
     * @return long
     */
    public function setEsTCKimlikNo($_esTCKimlikNo)
    {
        return ($this->EsTCKimlikNo = $_esTCKimlikNo);
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
     * Get KayitYeriBilgisi value
     * @return KpsServiceStructKisiKayitYeriBilgisi|null
     */
    public function getKayitYeriBilgisi()
    {
        return $this->KayitYeriBilgisi;
    }
    /**
     * Set KayitYeriBilgisi value
     * @param KpsServiceStructKisiKayitYeriBilgisi $_kayitYeriBilgisi the KayitYeriBilgisi
     * @return KpsServiceStructKisiKayitYeriBilgisi
     */
    public function setKayitYeriBilgisi($_kayitYeriBilgisi)
    {
        return ($this->KayitYeriBilgisi = $_kayitYeriBilgisi);
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
     * Get TemelBilgisi value
     * @return KpsServiceStructKisiTemelBilgisi|null
     */
    public function getTemelBilgisi()
    {
        return $this->TemelBilgisi;
    }
    /**
     * Set TemelBilgisi value
     * @param KpsServiceStructKisiTemelBilgisi $_temelBilgisi the TemelBilgisi
     * @return KpsServiceStructKisiTemelBilgisi
     */
    public function setTemelBilgisi($_temelBilgisi)
    {
        return ($this->TemelBilgisi = $_temelBilgisi);
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see KpsServiceWsdlClass::__set_state()
     * @uses KpsServiceWsdlClass::__set_state()
     * @param array $_array the exported values
     * @return KpsServiceStructKisiBilgisi
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
