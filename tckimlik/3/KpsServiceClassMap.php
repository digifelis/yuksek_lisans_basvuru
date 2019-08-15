<?php
/**
 * File for the class which returns the class map definition
 * @package KpsService
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
/**
 * Class which returns the class map definition by the static method KpsServiceClassMap::classMap()
 * @package KpsService
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
class KpsServiceClassMap
{
    /**
     * This method returns the array containing the mapping between WSDL structs and generated classes
     * This array is sent to the SoapClient when calling the WS
     * @return array
     */
    final public static function classMap()
    {
        return array (
  'ArrayOfKisiBilgisi' => 'KpsServiceStructArrayOfKisiBilgisi',
  'ArrayOfKisiSorgulaTCKimlikNoSorguKriteri' => 'KpsServiceStructArrayOfKisiSorgulaTCKimlikNoSorguKriteri',
  'KisiBilgisi' => 'KpsServiceStructKisiBilgisi',
  'KisiBilgisiSonucu' => 'KpsServiceStructKisiBilgisiSonucu',
  'KisiDurumBilgisi' => 'KpsServiceStructKisiDurumBilgisi',
  'KisiKayitYeriBilgisi' => 'KpsServiceStructKisiKayitYeriBilgisi',
  'KisiSorgulaTCKimlikNoSorguKriteri' => 'KpsServiceStructKisiSorgulaTCKimlikNoSorguKriteri',
  'KisiTemelBilgisi' => 'KpsServiceStructKisiTemelBilgisi',
  'ListeleCoklu' => 'KpsServiceStructListeleCoklu',
  'ListeleCokluResponse' => 'KpsServiceStructListeleCokluResponse',
  'Parametre' => 'KpsServiceStructParametre',
  'TarihBilgisi' => 'KpsServiceStructTarihBilgisi',
);
    }
}
