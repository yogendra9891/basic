<?php
$client = new SoapClient('http://localhost/stylefiesta/index.php/api/soap/?wsdl');

// If somestuff requires api authentification,
// then get a session token
$session = $client->login('Stylefiesta', '123123');

$result = $client->call(
$session,
'customer_address.update',
array('addressId' => 5920, 'addressdata' => array('firstname' => 'yogendra2', 'lastname' => 'Doe', 'street' => array('Street line 1', 'Streer line 2'), 'city' => 'Weaverville', 'country_id' => 'US', 'region' => 'Texas', 'region_id' => 3, 'postcode' => '96093', 'telephone' => '530-623-2513', 'is_default_billing' => TRUE, 'is_default_shipping' => FALSE)));
var_dump ($result);
