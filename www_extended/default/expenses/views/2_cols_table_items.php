<?php
$cbects = json_decode(_options_option('config_expenses_edit_cols_to_show'), true);
//vardump(_options_option('config_expenses_show_tr_no_price'));
?>

<table class="table table-striped">
    <thead>
        <tr>            
            <?php if (isset($cbects['nl'])) { ?> <th><?php _t("#"); ?></th><?php } ?>
            <?php if ((modules_field_module('status', 'products') || modules_field_module('status', 'audio')) && $cbects['code']) { ?> 
                <th><?php _t("Code"); ?></th> 
            <?php } ?>
            <?php if (isset($cbects['description'])) { ?> <th ><?php _t("Description"); ?></th><?php } ?>
            <?php if (isset($cbects['quantity'])) { ?> <th class="text-center"><?php _t("Quantity"); ?></th><?php } ?>
            <?php if (isset($cbects['price'])) { ?> <th class="text-right"><?php _t("Price U."); ?></th><?php } ?>
            <?php if (isset($cbects['subtotal'])) { ?> <th class="text-right"><?php _t("Sub total"); ?></th><?php } ?>
            <?php if (isset($cbects['discounts'])) { ?> <th class="text-right"><?php _t("Discounts"); ?></th><?php } ?>
            <?php if (isset($cbects['thtva'])) { ?> <th class="text-right"><?php _t("Htva"); ?></th><?php } ?>
            <?php if (isset($cbects['tva'])) { ?> <th class="text-right"><?php _t("Tva"); ?></th><?php } ?>
            <?php if (isset($cbects['ttvac'])) { ?> <th class="text-right"><?php _t("Tvac"); ?></th><?php } ?>            
            <?php if (isset($cbects['category'])) { ?> <th class="text-right"><?php _t("Category"); ?></th><?php } ?>            
            <td></td>                                
            <td></td>                                
            <td></td>                                
        </tr>
    </thead>




    <tbody class="row_position">
        <?php
// <tbody class="row_position">
//        $items = expense_lines_list_by_expense_id_without_transport($id);
//$items = expense_lines_list_by_expense_id($id);

        $total_sub_total = 0;
        $total_tax = 0;
        $total_tvac = 0;
        $total_discounts = 0;
        $class = "";

        $transport_subtotal = 0;
        $transport_tax = 0;
        $transport_tvac = 0;
        $transport_discounts = 0;

        $i = 1;
        $class = "";
        $separator = false;
        $note = false;

        foreach ($expense->getLines() as $key => $line) {

//            vardump($line);
//            vardump($line->getLine_type());

            switch ($line->getLine_type()) {
                case 'separator':
                    $separator = true;
                    $note = false;
                    $class = "success";
                    break;

                case 'note':
                    $separator = true;
                    $note = false;
                    $class = "info";
                    break;

                case 'normal':
                    $separator = false;
                    $note = false;
                    $class = "";
                    break;

                default: // normail
                    $separator = false;
                    $note = false;
                    $class = "";
                    break;
            }
//
//            if ($line->getPrice() && ($line->getPrice() == 0 || $line->getPrice() == null ) && !_options_option('config_expenses_show_tr_no_price')) {
//                include "2_cols_edit_tr_no_price.php";
//            } else {
//                include "2_cols_edit_tr_price.php";
//            }



            switch ($line->getLine_type()) {
                case 'separator':
                    include "2_cols_edit_tr_separator.php";
                    break;
                case 'note':
                    include "2_cols_edit_tr_note.php";
                    break;

                default:
                    include "2_cols_edit_tr.php";
                    break;
            }

            $class = "";
            $separator = false;
            $note = false;
            $i++;
        }
        ?>

        <tr>                       
            <td colspan='<?php echo count($cbects) - 6; ?>'>
                <a name="separator"></a>               
                <?php include "2_cols_modal_add_separator.php"; ?>
                <?php include "2_cols_modal_add_note.php"; ?>
            </td>
        </tr>


        <?php // include "2_cols_table_items_transport.php";       ?>

        <?php
        // por defecto es la horizontal 
        if (_options_option('config_expenses_2_cols_table_items_tva') == 'v') {
            include "2_cols_table_items_tva_vertical.php";
        } else {
            include "2_cols_table_items_tva_horizontal.php";
        }
        ?>

        <?php // order_by_create_javascript_html('expense_lines');       ?>

