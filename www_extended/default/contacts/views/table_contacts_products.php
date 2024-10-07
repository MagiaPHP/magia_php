<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;

    }
</style>


<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
}
?>




<table class="table table-striped table-condensed table-bordered">
    <thead>
        <tr class="info">        
            <?php # <th><input type="checkbox"></th>?>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Category"); ?></th>  
            <th><?php _t("Code"); ?></th>                                                            

            <th><?php _t("Product"); ?></th>                                                            
            <th class="text-right"><?php _t("Price"); ?></th>                                                            
            <th class="text-center"><?php _t("Reduction"); ?></th>                                                            
            <th class="text-right"><?php _t("New price"); ?></th>                                                            
            <th><?php _t("Action"); ?></th>                                                                                    
        </tr>
    </thead>
    <tfoot>
        <tr>         
            <?php # <th><input type="checkbox"></th>?>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Category"); ?></th>  
            <th><?php _t("Code"); ?></th>                                                            

            <th><?php _t("Product"); ?></th>                                                            
            <th class="text-right"><?php _t("Price"); ?></th>                                                            
            <th class="text-center"><?php _t("Reduction"); ?></th>                                                            
            <th class="text-right"><?php _t("New price"); ?></th>                                                            
            <th><?php _t("Action"); ?></th>                                                                                
        </tr>
    </tfoot>
    <tbody>

        <?php
        $i = 1;
        foreach ($products as $product) {
            ?>
            <tr>

                <td><?php echo $i++; ?></td>
                <td>Category</td>
                <td><?php echo "$product[id]"; ?></td>
                <td><?php echo "$product[name]"; ?></td>
                <td class="text-right"><?php echo moneda($product['price']); ?></td>
                <td class="text-center">

                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#updatePrice_<?php echo "$product[id]"; ?>">
                        <?php _t("Update"); ?>
                    </button>


                    <!-- Modal -->
                    <div class="modal fade" id="updatePrice_<?php echo "$product[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="updatePrice_Label">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="updatePrice_Label">
                                        <?php _t('Discount by product'); ?>
                                        <?php echo "$product[id]"; ?>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        <?php _t("You are going to change the discount percentage for the sale of this product"); ?>
                                    </p>
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                            <div class="input-group">                            
                                                <input 
                                                    type="number" 
                                                    min="1" 
                                                    max="100" 
                                                    class="form-control" 
                                                    id="exampleInputAmount" 
                                                    placeholder="Amount"
                                                    required=""
                                                    >
                                                <div class="input-group-addon">%</div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <?php _t("Update"); ?>
                                        </button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>






                </td>
                <td class="text-right"><?php echo moneda($product['price'] * 0.8); ?></td>

                <td>
                    <div class="dropdown">
                        <button
                            class="btn btn-default dropdown-toggle"
                            type="button"
                            id="dropdownMenu1"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="true">

                            <?php _t("Actions"); ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="index.php?c=products&a=details&id=<?php echo "$product[id]"; ?>"><?php _t("Details product"); ?></a></li>
                            <li><a href="index.php?c=products"><?php _t("Products list"); ?></a></li>
                            <li><a href="index.php?c=budgets&a=edit&id=<?php echo "$product[id]"; ?>"><?php _t("Edit"); ?></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="index.php?c=budgets&a=edit&id=<?php echo "$product[id]"; ?>"><?php _t("Pdf"); ?></a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>	
    </tbody>
</table>


