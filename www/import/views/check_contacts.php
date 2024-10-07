<h2><?php _t("Check contacts"); ?></h2>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;

    }
</style>


<table class="table table-striped table-condensed table-bordered">
    <thead>

        <tr class="info">

            <td>#</td>

            <?php
            $cols_contacts = array(
                array("name" => "type", "values" => array(1, 0)),
                array("name" => "type2", "values" => array(1, 0)),
                'title', 'name', 'lastname', 'birthdate', 'tva', 'billing_method', 'discounts', 'language', 'name', 'address', 'number', 'postcode', 'barrio', 'sector', 'ref', 'city', 'province', 'region', 'country', 'Fax', 'Tel', 'GSM', 'Email-secure', 'Web', 'Email', 'nationalNumber', 'Tel2', 'Tel3', 'Facebook'
            );

            foreach ($cols_contacts as $key => $col) {

                vardump($col);

                //echo '<th>' . $col . '</th>';
            }
            ?>
        </tr>

    </thead>


    <form>

        <tbody>

            <?php
//            $fp = fopen("tmp/contacts.csv", "r");

            $i = 1;

            $error_fatal = array();
            $ids_array = array();
            $tvas_array = array();
            $emails_array = array();

            while ($data = fgetcsv($fp, 501, ",", '"')) {
                $num = count($data);

                $indice = 0;
                foreach ($items_list as $key => $il) {
                    $$il = $data[$indice++];
                }


                // a cada linea agrego el id para verificar mas tarde
                if (!empty($id)) {
                    array_push($ids_array, $id);
                }

                // a cada linea agrego el tva para verificar mas tarde
                if (!empty($tva)) {
                    array_push($tvas_array, $tva);
                }





////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                if (!empty($id) && contacts_field_id('id', $id)) {
                    $class['id'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> Id number already exist in your data base');
                }

                if (!empty($id) && array_count_values($ids_array)[$id] > 1) {
                    $class['id'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> The id already exists in your document');
                }

                if (!empty($id) && !is_id($id)) {
                    $class['id'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> Id number format error');
                }
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                // debe existir en la DB
                // debe ser in id 
                // se puede repetir en el documento 
                if ($owner_id && !is_id($owner_id)) {
                    $class['owner_id'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> owner_id format error');
                }
                if (!empty($owner_id) && !contacts_field_id('id', $owner_id)) {
                    $class['owner_id'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> Id number must be exist in your data base');
                }
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                // title
                // no es obligatorio
                // si existe debe ser uno de los que hay en la db 
                if ($title && !contacts_titles_is_title($title)) {
                    $class['title'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> title code error must be: <b>' . implode(',  ', contacts_titles_list_title()) . '</b>');
                }
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                // no es obligatorio
                // si hay, debe ser 1 o cero 
                // si es 1 debe existir la tva
                // si es 0, no debe haber tva
                if ($type && (!($type == '1' || $type == '0'))) {
                    $class['type'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> type must be 1 or 0');
                }
                if ($type == '1' && !$tva) {
                    $class['type'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> If the type is 1 tva it must exist');
                }
                if ($type == '0' && $tva) {
                    $class['type'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> If the type is 0 tva must not exist');
                }

                ////////////////////////////////////////////////////////////////
                //////////////////////////////////////////////////////////////
                //////////////////////////////////////////////////////////////
                // Debe existir 
                // debe ser string 
                // max 250 caracteres
                //
                if ($name == '' || $name == null || $name == 'null' || $name == false || $name == 'false') {
                    $class['name'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> name is mandatory');
                }

                if (strlen($name) > 50) {
                    $class['name'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> The length of the name cannot be more than 50 characters');
                }


                //////////////////////////////////////////////////////////////
                //////////////////////////////////////////////////////////////
                //////////////////////////////////////////////////////////////
                // Puede ser nulo o vacio   
                // si existe debe ser xtring 
                // si existe debe ser max 250 caracteres
                //  
                //$class_lastname = ( $lastname == '' || $lastname == null ) ? ' class="danger" ' : ' ';
                if (strlen($lastname) > 50) {
                    $class['lastname'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> The length of the lastname cannot be more than 50 characters');
                }

                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                // Puede ser null o vacio 
                // si existe debe ser una fecha
                // si existe no inferior a hoy dia 
                // 
                if ($birthdate && !is_date($birthdate)) {
                    $class['birthdate'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> birthdate error format');
                }
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                // puede ser null o vacio 
                // si hay, debe ser tva
                // no debe existir en la db
                if ($tva && !contacts_is_tva($tva)) {
                    $class['tva'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> tva error format');
                }
                if (contacts_field_tva('id', $tva)) {
                    $class['tva'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> The vat number already exists in your database');
                }
                if (!empty($tva) && array_count_values($tvas_array)[$tva] > 1) {
                    $class['tva'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> The tva already exists in your document');
                }
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                // null o vacio
                // si hay, L o M en minusculas
                if ($billing_method && !contacts_is_billing_method($billing_method)) {
                    $class['billing_method'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> billing_method must be emplty, m or l');
                }

                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                // puede ser null o vacio 
                // si hay debe ser 0 hasta max el vamor maximo de los descuentos del sistema 
                if ($discounts && $discounts > _options_option('config_discounts_max_to_customer')) {
                    $class['discounts'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> discounts must be empty or between 0 and ' . _options_option('config_discounts_max_to_customer'));
                }
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                // puede ser null o vacio 
                // si hay debe ser 0 hasta max el vamor maximo de los descuentos del sistema 
//                if ($code) {
//                    $class['code'] = ' class="danger" ';
//                    array_push($error_fatal, '<b>Line ' . $i . '</b> code must be empty');
//                }
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                // puede ser nulo y sera remplazdo por el idioma por defecto del sistem 
                // si se manda, debe ser uno de los codigos del sistema
                if ($language && !_languages_is_language($language)) {
                    $class['language'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> Language code error must be: <b>' . implode(',  ', _languages_list_languages()) . '</b>');
                }
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                foreach ($directory_names_array as $dn) {
                    // a cada linea agrego el email para verificar mas tarde
                    if (!empty($$dn) && $dn == "email") {
                        array_push($emails_array, $$dn);
                    }
                    if ($$dn && !directory_is_format_ok($dn, $$dn)) {
                        $class[$dn] = ' class="danger" ';
                        array_push($error_fatal, '<b>Line ' . $i . '</b> ' . $dn . ' <b>' . $$dn . '</b>format error');
                    }
                }

                if (!empty($email) && array_count_values($emails_array)[$email] > 1) {
                    $class['email'] = ' class="danger" ';
                    array_push($error_fatal, '<b>Line ' . $i . '</b> The email already exists in your document');
                }


                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                // Verifico el formato de las addresses
                foreach ($addresses_col_array as $aca) {
                    if ($$aca && !addresses_is_format_ok($aca, $$aca)) {
                        $class[$aca] = ' class="danger" ';
                        array_push($error_fatal, '<b>Line ' . $i . '</b> ' . $aca . ' format error');
                    }
                }
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////

                echo"<tr>";
                echo "<td>$i</td>";
                foreach ($items_list as $key => $value) {
                    echo '<td ' . $class[$value] . '>' . $$value . ' </td>';
                }
                echo '</tr>';
                $i++;

                foreach ($items_list as $key => $value) {
                    $class[$value] = "";
                }
            }
            fclose($fp);
            ?>
    </form>
</tbody>
</table>

<?php
//vardump($ids_array);

foreach ($error_fatal as $error) {
    echo "<p>$error</p>";
}
?>

<form method="get" action="index.php">
    <input class="hidden" name="c" value="import">
    <input class="hidden" name="a" value="ok_contacts">
    <button type="submit" class="btn btn-default">
        <?php _t("Send"); ?>
    </button>

</form>