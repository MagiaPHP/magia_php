<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 20:08:29 
?>

<form method="post" action="index.php">
    <input type="hidden" name="c" value="inv_transsactions">
    <input type="hidden" name="a" value="ok_show_col_from_table">
    <input type="hidden" name="redi[redi]" value="1">
    
    <table class="table table-bordered">
        
        <?php
//            $checked_array = json_decode(_options_option("config_inv_transsactions_show_col_from_table"), true);
//            foreach (inv_transsactions_db_col_list_from_table($c) as $th) {
//                // si hay como parte del array $checked_array
//                // o si el array tiene cero elementos (au no registrado)
//                $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";
//                echo '<tr><td><input ' . $checked . ' type="checkbox" name="' . $th . '" id="' . $th . '"> ' . $th . ' </td></tr>';
//            }


        $cols_to_show = array( 'id', 
 'company_id', 
 'product', 
 'transaction_number', 
 'period', 
 'start_date', 
 'operation_number', 
 'currency', 
 'amount', 
 'percentage', 
 'term', 
 'interest', 
 'total', 
 'retencion', 
 'company_comission', 
 'comision_bolsa', 
 'total_receivable', 
 'expiration_date', 
 'order_by', 
 'status', 

            "button_details",
            "button_pay",
            "button_edit",
            "modal_edit",
            "button_delete",
            "modal_delete",
//            "button_print",
//            "button_save",
        );
        
        $checked_array = json_decode(_options_option("config_inv_transsactions_show_col_from_table"), true)['cols'];
            
        foreach ($cols_to_show as $th) {
            // si hay como parte del array $checked_array
            // o si el array tiene cero elementos (au no registrado)
            $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";

            switch ($th) {
                case "id":
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst('Id')) . ' </td><tr>';
                    break;
                    
                 case "company_id": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "product": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "transaction_number": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "period": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "start_date": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "operation_number": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "currency": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "amount": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "percentage": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "term": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "interest": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "total": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "retencion": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "company_comission": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "comision_bolsa": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "total_receivable": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "expiration_date": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "order_by": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "status": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;



                default:
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>';
                    break;
            }
        }
        
       

            ?>
        <tr>
            <td>
                <button type="submit" class="btn btn-default"><?php echo icon("floppy-disk");  ?> <?php _t("Save"); ?></button>
            </td>
        </tr>
    </table>
</form>
