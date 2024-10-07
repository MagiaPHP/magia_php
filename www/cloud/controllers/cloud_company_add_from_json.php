<?php

/**
 * Este archivo se incrusta en los /controller/edit para agregar a cloud
 * Esto esta presente cada vez que se edita un: 
 * budgets
 * invoices
 * credit notes
 * 
 */
////////////////////////////////////////////////////////////////////////////
//vardump(array(
//    'Edit invoice',
//    'Registra a la empresa en cloud',
//    'Si el contacto ya tiene facturas creadas, ya no puede cambiar de tva',
//    'Si el cliente cambia las factuas creaas a otro cliente podra cambiar la tva',
//    'Si es cloud, desactivar esta opcion',
//));
//vardump(array(
//    "Si tiene factura no puede cmabiar del tva",
//    "Si ya esta en cloud no puede cmabiar de tva",
//    "-",
//));
//// Add company to cloud
// Creo un objeto company
$cloud_company = new Company();
$cloud_company->setCompany($client_id);
$cloud_company_json = (json_encode($cloud_company));
//cloud_company_add_from_json($cloud_company_json);
cloud_company_add_to_cloud_json($cloud_company_json);

////////////////////////////////////////////////////////////////////////////