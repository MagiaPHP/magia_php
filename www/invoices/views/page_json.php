<?php

//  vardump($invoice_json);
//vardump($invoice_json);
// objeto to string 

$j = '{"_id":"119","_sender":{"_id":"1022","_owner_id":"1022","_type":"1","_title":null,"_name":"web SPRL","_lastname":null,"_birthdate":"1900-01-01","_tva":"BE0450478886","_discounts":"0","_code":null,"_language":null,"_order_by":"1","_status":"1","_addresses":{"Billing":[],"Delivery":[]},"_directory":{"Facebook":false,"Tel":false,"Tel2":false,"Tel3":false,"Email":false,"GSM":false,"Web":false,"Fax":false,"Email-secure":false,"nationalNumber":false},"_banks":[{"id":"10","0":"10","contact_id":"1022","1":"1022","bank":"test","2":"test","account_number":"test","3":"test","bic":"test","4":"test","iban":"test","5":"test","code":"61280a91668f6","6":"61280a91668f6","invoices":"0","7":"0","status":"1","8":"1"},{"id":"9","0":"9","contact_id":"1022","1":"1022","bank":"CASH","2":"CASH","account_number":"000-000000-1","3":"000-000000-1","bic":"BIC-cahs","4":"BIC-cahs","iban":"IBAN-cash","5":"IBAN-cash","code":null,"6":null,"invoices":"0","7":"0","status":"1","8":"1"},{"id":"8","0":"8","contact_id":"1022","1":"1022","bank":"Banco ABC","2":"Banco ABC","account_number":"123-456789-012","3":"123-456789-012","bic":"BC54125541","4":"BC54125541","iban":"I-sddsds","5":"I-sddsds","code":null,"6":null,"invoices":"1","7":"1","status":"1","8":"1"}]},"_budget_id":"949","_credit_note_id":null,"_client_id":"51539","_client":{"_id":"51539","_owner_id":"51539","_type":"1","_title":null,"_name":"Carlos Lift","_lastname":null,"_birthdate":"1900-01-01","_tva":null,"_discounts":null,"_code":"613aeec80c544","_language":null,"_order_by":"1","_status":"1","_addresses":{"Billing":[{"id":"454","0":"454","contact_id":"51539","1":"51539","name":"Billing","2":"Billing","address":"Direccion de facturacion","3":"Direccion de facturacion","number":"1","4":"1","postcode":"5020","5":"5020","barrio":"Madrid","6":"Madrid","city":"Madrid","7":"Madrid","region":"null","8":"null","country":"ES","9":"ES","code":"6146aeeadc71b","10":"6146aeeadc71b","status":"1","11":"1","addresses_id":"454","12":"454","transport_code":"AFON","13":"AFON"}],"Delivery":[{"id":"453","0":"453","contact_id":"51539","1":"51539","name":"Delivery","2":"Delivery","address":"Ch de alsemberg","3":"Ch de alsemberg","number":"1","4":"1","postcode":"1180","5":"1180","barrio":"Uccle","6":"Uccle","city":"Bruxelles","7":"Bruxelles","region":"null","8":"null","country":"BE","9":"BE","code":"6146adb5a6e84","10":"6146adb5a6e84","status":"1","11":"1","addresses_id":"453","12":"453","transport_code":"AFON","13":"AFON"}]},"_directory":{"Facebook":false,"Tel":false,"Tel2":false,"Tel3":false,"Email":false,"GSM":false,"Web":false,"Fax":false,"Email-secure":false,"nationalNumber":false},"_banks":[]},"_title":null,"_seller_id":null,"_addresses_billing":{"id":"443","0":"443","contact_id":"51539","1":"51539","name":"Billing","2":"Billing","address":"","3":"","number":"","4":"","postcode":"","5":"","barrio":"","6":"","city":"","7":"","region":"null","8":"null","country":"BE","9":"BE","code":"613aeec80c548","10":"613aeec80c548","status":"1","11":"1"},"_addresses_delivery":{"id":"444","0":"444","contact_id":"51539","1":"51539","name":"Delivery","2":"Delivery","address":"","3":"","number":"","4":"","postcode":"","5":"","barrio":"","6":"","city":"","7":"","region":"null","8":"null","country":"BE","9":"BE","code":"613aeec80c549","10":"613aeec80c549","status":"1","11":"1"},"_date":"2021-09-17","_date_registre":"2021-09-17 20:36:35","_date_expiration":null,"_total":"1500.00","_tax":"315.00","_advance":null,"_balance":null,"_comments":null,"_comments_private":null,"_r1":null,"_r2":null,"_r3":null,"_fc":null,"_date_update":null,"_days":null,"_ce":"+++000\/2021\/11927+++","_code":"6144e0337a8fb","_type":"I","_status":"10","_lines":[{"id":"11975","0":"11975","invoice_id":"119","1":"119","code":null,"2":null,"quantity":"1","3":"1","description":"demostracaion","4":"demostracaion","price":"1200.00","5":"1200.00","discounts":"0","6":"0","discounts_mode":"%","7":"%","tax":"21","8":"21","subtotal":"1200.000000","9":"1200.000000","totaldiscounts":"0.000000","10":"0.000000","totaltax":"252.0000000000","11":"252.0000000000"},{"id":"11974","0":"11974","invoice_id":"119","1":"119","code":"6144e0337a8fb","2":"6144e0337a8fb","quantity":"1","3":"1","description":"Final invoice","4":"Final invoice","price":"300.00","5":"300.00","discounts":"0","6":"0","discounts_mode":"%","7":"%","tax":"21","8":"21","subtotal":"300.000000","9":"300.000000","totaldiscounts":"0.000000","10":"0.000000","totaltax":"63.0000000000","11":"63.0000000000"}]}';

echo ($json = json_encode($inv));

echo "<hr>";
echo "<p>MD5: " . md5($json) . '</p>';
echo "<p>MD5: " . md5($j) . '</p>';
echo "<hr>";

echo "<hr>";

echo json_last_error_msg();

echo "<hr>";

($objeto = json_decode($json));

//vardump($objeto);
?>



<?php

//foreach ($invoice as $key => $value) {
//    if(!  is_numeric($key) ){
//        echo "\$invoice_json['$key'] = \$invoice['$key'];<br>"; 
//        
//        if($key == 'addresses_billing' || $key == 'addresses_delivery'){
//          //  echo "\$invoice_json['$key'] = '----';<br>"; 
//        }else{
//          //  echo "\$invoice_json['$key'] = \$invoice['$key'];<br>"; 
//        }
//        
//        
//    }
//}
?>

