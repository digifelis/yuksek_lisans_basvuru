<?php
/**
 * Test with KpsService for 'https://kpsbasvuru.nvi.gov.tr/Services/WsdlNoPolicy.ashx?Service=KisiSorgulaTCKimlikNoServis&TestMode=true'
 * @package KpsService
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2015-06-16
 */
ini_set('memory_limit','512M');
ini_set('display_errors',true);
error_reporting(-1);
/**
 * Load autoload
 */
require_once dirname(__FILE__) . '/KpsServiceAutoload.php';
/**
 * Wsdl instanciation infos. By default, nothing has to be set.
 * If you wish to override the SoapClient's options, please refer to the sample below.
 * 
 * This is an associative array as:
 * - the key must be a KpsServiceWsdlClass constant beginning with WSDL_
 * - the value must be the corresponding key value
 * Each option matches the {@link http://www.php.net/manual/en/soapclient.soapclient.php} options
 * 
 * Here is below an example of how you can set the array:
 * $wsdl = array();
 * $wsdl[KpsServiceWsdlClass::WSDL_URL] = 'https://kpsbasvuru.nvi.gov.tr/Services/WsdlNoPolicy.ashx?Service=KisiSorgulaTCKimlikNoServis&TestMode=true';
 * $wsdl[KpsServiceWsdlClass::WSDL_CACHE_WSDL] = WSDL_CACHE_NONE;
 * $wsdl[KpsServiceWsdlClass::WSDL_TRACE] = true;
 * $wsdl[KpsServiceWsdlClass::WSDL_LOGIN] = 'myLogin';
 * $wsdl[KpsServiceWsdlClass::WSDL_PASSWD] = '**********';
 * etc....
 * Then instantiate the Service class as: 
 * - $wsdlObject = new KpsServiceWsdlClass($wsdl);
 */
/**
 * Examples
 */


/**************************************
 * Example for KpsServiceServiceListele
 */
$kpsServiceServiceListele = new KpsServiceServiceListele();
// sample call for KpsServiceServiceListele::ListeleCoklu()
if($kpsServiceServiceListele->ListeleCoklu(new KpsServiceStructListeleCoklu(/*** update parameters list ***/)))
    print_r($kpsServiceServiceListele->getResult());
else
    print_r($kpsServiceServiceListele->getLastError());
