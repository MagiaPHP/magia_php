<?php

function investments_calcul_total_intereses($id) {

    $amount = investments_field_id('amount', $id);
    $days = investments_field_id('days', $id);
    $rate = investments_field_id('rate', $id);

    $interes_anuales = ($amount * $rate ) / 100;

    $int_diarios = $interes_anuales / 365;

    $int_ganado = $int_diarios * $days;
}

function investments_add_filter($col_name, $value) {

    switch ($col_name) {
        case "institution_id":
            return contacts_formated($value);
            break;

        case "rate":
            return "$value %";
            break;

        case "retention":
            return "$value %";
            break;

        case "amount":
            return moneda($value);
            break;

        case "total":
            return moneda($value);
            break;

        default:
            return $value;
            break;
    }
}
