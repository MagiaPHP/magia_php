<?php
$cbects = json_decode(_options_option('config_budgets_edit_cols_to_show'), true);

//vardump(_options_option('config_budgets_show_tr_no_price'));
?>

<table class="table table-striped table-bordered">
    <thead>
        <tr>            
            <?php if (isset($cbects['nl'])) { ?> <th><?php _t("#"); ?></th><?php } ?>                        
            <?php if (isset($cbects['code'])) { ?> <th ><?php _t("Code"); ?></th><?php } ?>
            <?php if (isset($cbects['description'])) { ?> <th ><?php _t("Description"); ?></th><?php } ?>
            <?php if (isset($cbects['quantity'])) { ?> <th class="text-right"><?php _t("Quantity"); ?></th><?php } ?>
            <?php if (isset($cbects['price'])) { ?> <th class="text-right"><?php _t("Price U."); ?></th><?php } ?>
            <?php if (isset($cbects['subtotal'])) { ?> <th class="text-right"><?php _t("Sub total"); ?></th><?php } ?>
            <?php if (isset($cbects['discounts'])) { ?> <th class="text-right"><?php _t("Discounts"); ?></th><?php } ?>
            <?php if (isset($cbects['thtva'])) { ?> <th class="text-right"><?php _t("Htva"); ?></th><?php } ?>
            <?php if (isset($cbects['tva'])) { ?> <th class="text-right"><?php _t("Tva"); ?></th><?php } ?>
            <?php if (isset($cbects['ttvac'])) { ?> <th class="text-right"><?php _t("Tvac"); ?></th><?php } ?>            
            <td></td>                                
            <td></td>                                
        </tr>
    </thead>




    <tbody class="row_position">
        <?php
// <tbody class="row_position">
//        $items = budget_lines_list_by_budget_id_without_transport($id);
//$items = budget_lines_list_by_budget_id($id);

        $total_sub_total = 0;
        $total_tax = 0;
        $total_tvac = 0;
        $total_discounts = 0;
        $class = "";

//
//Transport
        $transport_subtotal = 0;
        $transport_tax = 0;
        $transport_tvac = 0;
        $transport_discounts = 0;

        $i = 1;
        $class = "";
        // que tipo de linea es?
        // normal, category, separator, note
        $line_type = "normal";

        $separator = false;
        $note = false;

        $i = 1;

        $line_type = 'normal';
        foreach ($budget->getLines() as $key => $line) {

            if (isset($line['description']) && stripos($line['description'], "---") !== FALSE) {
                $class = " success ";
                $line_type = 'separator';
            }

            if (isset($line['description']) && stripos($line['description'], "***") !== FALSE) {
                $class = " info ";
                $line_type = 'note';
            }

            if (isset($line['price']) && ($line['price'] == 0 || $line['price'] == null ) && !_options_option('config_expenses_show_tr_no_price')) {
                include "2_cols_edit_tr_no_price.php";
            } else {
                include "2_cols_edit_tr_price.php";
            }
            $class = "";
            $line_type = "normal";
        }
        ?>

        <tr>                       
            <td colspan='<?php echo count($cbects); ?>'>
                <a name="separator"></a>
                <?php include "2_cols_modal_add_separator.php"; ?>
                <?php include "2_cols_modal_add_note.php"; ?>
            </td>
        </tr>


        <?php include "2_cols_table_items_transport.php"; ?>

        <?php
// por defecto es la horizontal 
        if (_options_option('config_budgets_2_cols_table_items_tva') == 'v') {
            include "2_cols_table_items_tva_vertical.php";
        } else {
            include "2_cols_table_items_tva_horizontal.php";
        }
        ?>





        <?php // order_by_create_javascript_html('budget_lines');       ?>




