<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;

    }
</style>
<br><br>
<p>Table contacts</p>

<table class="table table-striped table-condensed table-bordered">
    <thead>
        <tr class="info">
            <?php
            $items_list = array(
                '#',
                'Id',
                'owner_id',
                'type',
                'title',
                'name',
                'lastname',
                'birthdate',
                'tva',
                'billing_method',
                'discounts',
                'code',
                'language',
                'order_by',
                'status',
                'email',
                'web',
                'gsm',
                'tel',
                'facebook',
                'tel3',
                'tel2',
                'fax',
                'emailSecure',
                'nationalNumber',
            );
            foreach ($items_list as $key => $il) {
                echo '<th>' . $il . '</th>';
            }
            ?>
        </tr>
    </thead>

    <tbody>

        <?php
        $linea = 0;
//Abrimos nuestro archivo
        $archivo = fopen("tmp/contacts.csv", "r");
//Lo recorremos
        while (($datos = fgetcsv($archivo, ",")) == true) {
            $num = count($datos);
            $linea++;
            //Recorremos las columnas de esa linea
            for ($columna = 0; $columna < $num; $columna++) {
                //echo "<tr><td>" . $datos[$columna] . "</td></tr>";
            }
        }
//Cerramos el archivo
        fclose($archivo);

        $fp = fopen("tmp/contacts.csv", "r");

        $i = 1;

        $class_type = "";

        while ($data = fgetcsv($fp, 501, ",", '"')) {
            $num = count($data);

            $id = $data[1];
            $owner_id = $data[2];
            $type = $data[3];
            $title = $data[4];
            $name = $data[5];
            $lastname = $data[6];
            $birthdate = $data[7];
            $tva = $data[8];
            $billing_method = $data[9];
            $discounts = $data[10];
            $code = $data[11];
            $language = $data[12];
            $order_by = $data[13];
            $status = $data[14];
            $email = $data[15];
            $web = $data[16];
            $gsm = $data[17];
            $tel = $data[18];
            $facebook = $data[19];
            $tel3 = $data[20];
            $tel2 = $data[21];
            $fax = $data[22];
            $emailSecure = $data[23];
            $nationalNumber = $data[24];

            $class_id = (!contacts_field_id('id', $id) ) ? '  ' : ' class="danger" ';
            $class_owner_id = ( is_id($owner_id) ) ? '  ' : ' class="danger" ';
            $class_type = ( $type == '1' || $type == '0' ) ? '  ' : ' class="danger" ';
            $class_title = ( $title == '' || $title == null ) ? '  ' : ' class="danger" ';
            $class_name = ( $name == '' || $name == null ) ? ' class="danger" ' : ' ';
            $class_lastname = ( $lastname == '' || $lastname == null ) ? ' class="danger" ' : ' ';
            $class_birthdate = (is_date($birthdate) ) ? '  ' : ' class="danger" ';
            $class_tva = (($tva) ) ? '  ' : ' class="danger" ';
            $class_billing_method = ( contacts_is_billing_method($billing_method)) ? '  ' : ' class="danger" ';
            $class_discounts = ( contacts_is_discounts($discounts) ) ? '  ' : ' class="danger" ';
            $class_language = ( _languages_is_language($language)) ? '  ' : ' class="danger" ';
            $class_email = ( directory_is_email($email)) ? '  ' : ' class="danger" ';
            $class_web = ( directory_is_web($web) ) ? '  ' : ' class="danger" ';

            print "";
            echo"<tr>";
            echo "<td>" . $i++ . "</td>"; //id                        
            echo "<td $class_id >" . ($id) . "</td>"; //id                        
            echo "<td $class_owner_id>" . ($owner_id) . "</td>"; //id   
            echo "<td $class_type >" . ($type) . "</td>"; //id                        
            echo "<td $class_title >" . ($title) . "</td>"; //id    
            echo "<td $class_name >" . ($name) . "</td>"; //id                        
            echo "<td $class_lastname >" . ($lastname) . "</td>"; //id                        
            echo "<td $class_birthdate >" . ($birthdate) . "</td>"; //id                        
            echo "<td $class_tva >" . ($tva) . "</td>"; //id                        
            echo "<td>" . ($billing_method) . "</td>"; //id                        
            echo "<td>" . ($discounts) . "</td>"; //id                        
            echo "<td>" . ($code) . "</td>"; //id                        
            echo "<td $class_language >" . ($language) . "</td>"; //id                        
            echo "<td>" . ($order_by) . "</td>"; //id                        
            echo "<td>" . ($status) . "</td>"; //id                        
            echo "<td $class_email >" . ($email) . "</td>"; //id                        
            echo "<td $class_web >" . ($web) . "</td>"; //id                        
            echo "<td>" . ($gsm) . "</td>"; //id                        
            echo "<td>" . ($tel) . "</td>"; //id                        
            echo "<td>" . ($facebook) . "</td>"; //id                        
            echo "<td>" . ($tel3) . "</td>"; //id                        
            echo "<td>" . ($tel2) . "</td>"; //id                        
            echo "<td>" . ($fax) . "</td>"; //id                        
            echo "<td>" . ($emailSecure) . "</td>"; //id                        
            echo "<td>" . ($nationalNumber) . "</td>"; //id                        
            echo '</tr>';

            $class_type = "";
            $class_web = "";
        }

        fclose($fp);
        ?>
    </tbody>


</table>