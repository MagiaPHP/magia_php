<?php

// FACTUX 0.0.1
// Con esto el que recive llena un simple formulario y 
// completa las 5 infos, con esto 
// el sistema busca el documento y lo agrega en su sistema de gastos 

$export['factux']['sender']["user"] = "syb";
$tva = $export['factux']['sender']['vat'] = "BE123.456.789";
$type = $export['factux']['doc']['type'] = "invoices";
$number = $export['factux']['doc']['id'] = 170;
$code = $export['factux']['doc']['code'] = "4155487f5s4s55qq4";

// UUID factux
// una cadena codificada de: 
// tva quien envia 
// tipo de documento 
// numero de documento 
// codigo del documento 

$uuid = "$tva-$type-$number-$code";

$uuid_h = base64_encode($uuid);
$uuid_r = base64_decode($uuid_h);
?>