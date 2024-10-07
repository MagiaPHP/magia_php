
<textarea rows="5" class="form-control">
    <?php
    //
//    echo (json_encode(json_decode($inv->export('json'), true), JSON_PRETTY_PRINT));
    echo (json_encode(json_decode($inv->export('json'), true), JSON_PRETTY_PRINT));
    ?>
</textarea>

<?php
if ($inv->getImportErrors()) {
    vardump($inv->getImportErrors());
} else {
    echo "no hay errores";
}


//    ($invoice_json = $inv->importFromJson($inv->export('json')));
//    
//
//    ($invoice_array = json_decode($invoice_json, true));
//
//    vardump($doc_type = $invoice_array['document']['controller']);
//    vardump($doc_id = $invoice_array['document']['id']);
//    vardump($sender_tva = $invoice_array['sender']['vat']);
//    vardump($reciver_tva = $invoice_array['reciver']['vat']);
//
//// el contacto esta en mis contactos?
//    if (contacts_field_tva('id', $sender_tva . "1020")) {
//        echo "<p>Si, ya esta en mis contactos</p>";
//        // La factura esta en mi docs_exchange?
//        // Busco si hay un documento por 
//        //      Sender_tva, doc_type, doc_id 
//        //
//        if (docs_exchange_search_by_reciver_tva_doc_type_doc_id($sender_tva, $doc_type, $doc_id)) {
//            "<p>Factura ya registrada</p>";
//        } else {
//            echo "<p>Factura debe ser registrada</p>";
//        }
//    } else {
//
//        echo "<p>No, contacto nuevo (Registro cl contacto) </p>";
//    }
//    
?>

<hr>

<code><pre>
    Tva esta en mis contactos?
        Si
            Factura esta e mi sistema
                Si
                    Entonces factura ya registrada xxx
                No
                    Registrar la factura ----
        No
            Factura esta en mi sistema
                No
                    Registrar contacto ---
                    Registrar factura ---
                si
                    Hay un problema !!!
        
    </pre></code>









