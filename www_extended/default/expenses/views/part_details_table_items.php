<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr>            
            <?php if (isset($cbects['nl'])) { ?> <th><?php _t("#"); ?></th><?php } ?>
            <?php if ((modules_field_module('status', 'products') || modules_field_module('status', 'audio')) && $cbects['code']) { ?> 
                <th><?php _t("Code"); ?></th> 
            <?php } ?>
                <?php if (isset($cbects['description'])) { ?> <th ><?php _t("Description"); ?></th><?php } ?>
            <?php if (isset($cbects['quantity'])) { ?> <th class="text-right"><?php _t("Quantity"); ?></th><?php } ?>
            <?php if (isset($cbects['price'])) { ?> <th class="text-right"><?php _t("Price U."); ?></th><?php } ?>
            <?php if (isset($cbects['subtotal'])) { ?> <th class="text-right"><?php _t("Sub total"); ?></th><?php } ?>
            <?php if (isset($cbects['discounts'])) { ?> <th class="text-right"><?php _t("Discounts"); ?></th><?php } ?>
            <?php if (isset($cbects['thtva'])) { ?> <th class="text-right"><?php _t("Htva"); ?></th><?php } ?>
            <?php if (isset($cbects['tva'])) { ?> <th class="text-right"><?php _t("Tva"); ?></th><?php } ?>
            <?php if (isset($cbects['ttvac'])) { ?> <th class="text-right"><?php _t("Tvac"); ?></th><?php } ?>            
            <?php if (isset($cbects['category'])) { ?> <th class="text-right"><?php _t("Category"); ?></th><?php } ?>            
        </tr>
    </thead>

    <tbody>

        <?php
        $i = 1;
        foreach ($expense->getLines() as $key => $line) {
            //
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

//            if ($line->getPrice() && ($line->getPrice() == 0 || $line->getPrice() == null ) && !_options_option('config_expenses_show_tr_no_price')) {
//                include "2_cols_details_tr_no_price.php";
//            } else {
//            include "2_cols_details_tr_price.php";
//            }
//            
            include "2_cols_details_tr_price.php";

            $i++;
        }
        ?>
    </tbody>


    <?php
    if (_options_option('config_expenses_2_cols_table_items_tva') == 'v') {

        include "2_cols_details_tva_v.php";
    } else {
        include "2_cols_details_tva_h.php";
    }
    ?>
</table>