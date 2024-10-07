
<form method="post" action="index.php">
    <input type="hidden" name="c" value="schedule">
    <input type="hidden" name="a" value="ok_show_col_from_table">
    <input type="hidden" name="redi[redi]" value="1">
    
    <table class="table table-bordered">
        
        <?php
//            $checked_array = json_decode(_options_option("config_schedule_show_col_from_table"), true);
//            foreach (schedule_db_col_list_from_table($c) as $th) {
//                // si hay como parte del array $checked_array
//                // o si el array tiene cero elementos (au no registrado)
//                $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";
//                echo '<tr><td><input ' . $checked . ' type="checkbox" name="' . $th . '" id="' . $th . '"> ' . $th . ' </td></tr>';
//            }


        $cols_to_show = array( 'id', 
 'contact_id', 
 'day', 
 'am_start', 
 'am_end', 
 'pm_start', 
 'pm_end', 
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
        
        $checked_array = json_decode(_options_option("config_schedule_show_col_from_table"), true)['cols'];
            
        foreach ($cols_to_show as $th) {
            // si hay como parte del array $checked_array
            // o si el array tiene cero elementos (au no registrado)
            $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";

            switch ($th) {
                case "id":
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst('Id')) . ' </td><tr>';
                    break;
                    
                 case "contact_id": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "day": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "am_start": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "am_end": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "pm_start": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "pm_end": 
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
