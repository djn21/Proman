<?php
$client = new SoapClient("http://pisio.etfbl.net/~dejand/proman/project-soap/service",array('cache_wsdl' => WSDL_CACHE_NONE));
print_r($client->getAllProjects());
?>