<a href="#" data-toggle="modal" data-target="#2_cols_modal_edit" >
    <?php echo icon("wrench"); ?>
</a>
<div class="modal fade" id="2_cols_modal_edit" tabindex="-1" role="dialog" aria-labelledby="2_cols_modal_editLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="2_cols_modal_editLabel">
                    <?php _t("Configuration"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <p><b><?php _t('Show or hide columns'); ?></b></p>
                <form method="post" action="index.php">
                    <input type="hidden" name="c" value="budgets">
                    <input type="hidden" name="a" value="ok_budgets_edit_cols_to_show">
                    <input type="hidden" name="redi[redi]" value="3">
                    <input type="hidden" name="redi[id]" value="<?php echo $id; ?>">
                    <input type="hidden" name="data[nl]" value="1" > 
                    <input type="hidden" name="data[id]" value="1" > 
                    <input type="hidden" name="data[order_by]" value="1" > 
                    <input type="hidden" name="data[status]" value="1" > 
                    <input type="hidden" name="data[budget_id]" value="1" > 
                    <input type="hidden" name="data[order_id]" value="1" > 


                    <?php
                    $cols = array(
//                        'nl' => true, // number line
//                        'id' => true,
//                        'budget_id' => true,
//                        'order_id' => true,
                        'code' => true,
                        'description' => true,
                        'quantity' => true,
                        'price' => true,
                        'subtotal' => true,
                        'discounts' => true,
//                        'discounts_mode' => true,
                        'thtva' => true,
                        'tva' => true,
                        'ttvac' => true,
                            //'order_by' => true,
                            //'status' => true,                        
                    );

                    $cbects = json_decode(_options_option('config_budgets_edit_cols_to_show'), true);

                    $disabled = "";
                    $checked = '';
                    foreach ($cols as $col => $show) {

                        $checked = (isset($cbects[$col])) ? ' checked="" ' : "";

                        switch ($col) {
                            case 'id':
                            case 'budget_id':
                            case 'order_id':
//                            case 'discounts_mode':
                            case 'order_by':
                            case 'status':

                                $disabled = ' disabled ';
                                break;
                            default:
                                break;
                        }

                        echo '<div class="checkbox">
                        <label>
                            <input type="checkbox" name="data[' . $col . ']"  value="' . $show . '" ' . $disabled . ' ' . $checked . '> ' . _tr(ucfirst($col)) . '
                        </label>
                    </div>';
                        $disabled = '';
                        $checked = '';
                    }
                    ?>

                    <div class="checkbox">
                        <label>

                            <input type="hidden" name="data[edit]" value="1" > 
                            <input type="hidden" name="data[delete]" value="1" > 
                        </label>
                    </div>



                    <button type="submit" class="btn btn-primary">
                        <?php echo icon("floppy-disk"); ?>
                        <?php _t("Save"); ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>