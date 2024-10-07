
<form method="post" action="index.php">
    <input type="hidden" name="c" value="products_providers">
    <input type="hidden" name="a" value="ok_show_col_from_table">
    <input type="hidden" name="redi[redi]" value="1">
    
    <table class="table table-bordered">
        
        <?php
//            $checked_array = json_decode(_options_option("config_products_providers_show_col_from_table"), true);
//            foreach (products_providers_db_col_list_from_table($c) as $th) {
//                // si hay como parte del array $checked_array
//                // o si el array tiene cero elementos (au no registrado)
//                $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";
//                echo '<tr><td><input ' . $checked . ' type="checkbox" name="' . $th . '" id="' . $th . '"> ' . $th . ' </td></tr>';
//            }


        $cols_to_show = array( 'id', 
 'product_code', 
 'provider_id', 
 'provider_code', 
 'url', 
 'price', 
 'notes', 
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
        
        $checked_array = json_decode(_options_option("config_products_providers_show_col_from_table"), true)['cols'];
            
        foreach ($cols_to_show as $th) {
            // si hay como parte del array $checked_array
            // o si el array tiene cero elementos (au no registrado)
            $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";

            switch ($th) {
                case "id":
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst('Id')) . ' </td><tr>';
                    break;
                    
                 case "product_code": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "provider_id": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "provider_code": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "url": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "price": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "notes": 
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
