<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#expense_edit_<?php echo "$expense_items[id]"; ?>">
    <span class="glyphicon glyphicon-pencil"></span> 
    <?php
//    vardump($expense->getProvider_id()); 
//    vardump($expense_items); 
    ?>
</button>

<div class="modal fade" id="expense_edit_<?php echo "$expense_items[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="expense_edit_<?php echo "$expense_items[id]"; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="expense_edit_<?php echo "$expense_items[id]"; ?>Label"><?php _t("Update item"); ?> <?php echo "$expense_items[id]"; ?></h4>
            </div>
            <div class="modal-body">

                <?php
//                vardump($expense->getProvider_id());
                ?>
                <form action="index.php" method="get">
                    <input type="hidden"  name="c" value="expenses">
                    <input type="hidden"  name="a" value="linesEditOk">
                    <input type="hidden"  name="id" value="<?php echo "$expense_items[id]"; ?>">

                    <div class="form-group">
                        <label for="code"><?php _t("Code"); ?></label>
                        <input type="text" name="code" class="form-control" id="code" placeholder="<?php echo $expense_items['code']; ?>" value="<?php echo $expense_items['code']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="quantity"><?php _t("Quantity"); ?></label>
                        <input 
                            type="number" 
                            name="quantity" 
                            min="1"
                            class="form-control" 
                            id="quantity" 
                            placeholder="<?php echo $expense_items['quantity']; ?>" value="<?php echo $expense_items['quantity']; ?>">
                    </div>


                    <div class="form-group">
                        <label for="description"><?php _t("Description"); ?></label>


                        <textarea class="form-control" name="description" id=""><?php echo $expense_items['description']; ?></textarea>                        


                    </div>


                    <div class="form-group">
                        <label for="price"><?php _t("Price"); ?></label>
                        <input 
                            type="number" 
                            min="0"
                            step="any"
                            name="price" 
                            class="form-control" id="price" placeholder="<?php echo $expense_items['price']; ?>" value="<?php echo $expense_items['price']; ?>">
                    </div>



                    <div class="form-group">
                        <label for="tax"><?php _t("Tva"); ?></label>

                        <?php /**
                          <select class="form-control" name="tax">
                          <?php foreach (tax_list() as $key => $tax) { ?>
                          <?php $selected = ($tax['value'] == $expense_items['tax']) ? " selected " : " "; ?>
                          <option value="<?php echo $tax['value']; ?>" <?php echo "$selected"; ?>><?php echo $tax['value']; ?>%</option>
                          <?php } ?>
                          </select>
                         */ ?>





                        <?php
                        // RC
                        //  vardump($orders['id']);
                        //  vardump($orders['company_id']);
                        //  vardump(country_tax_list_by_country(addresses_billing_by_contact_id($orders['company_id'])['country']));
                        $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);

//                        vardump($expense);
                        ?>

                        <select class="form-control" name="tax">
                            <?php if ($tax_by_country) { ?>
                                <?php foreach ($tax_by_country as $tax) { ?>                                                                
                                    <?php $selected = ($tax['tax'] == $expense_items['tax']) ? " selected " : " "; ?>                                                                
                                    <option 
                                        value="<?php echo $tax['tax']; ?>" 
                                        <?php echo "$selected"; ?>>
                                        <?php echo $tax['tax']; ?>%
                                    </option>
                                <?php } ?>
                            <?php } else { ?> 
                                <option value="0">0%</option>
                            <?php } ?>
                        </select>








                    </div>

                    <div class="form-group">
                        <label for="discounts"><?php _t("Discount"); ?></label>

                    </div>


                    <div class="row form-group">



                        <div class="col-xs-3">

                            <input type="number" name="discounts" class="form-control" id="discounts" placeholder="<?php echo $expense_items['discounts']; ?>" value="<?php echo $expense_items['discounts']; ?>">
                        </div>
                        <div class="col-xs-4">
                            <select class="form-control" name="discounts_mode">
                                <?php foreach (discounts_mode_list() as $key => $value) { ?>
                                    <option value="<?php echo $value['discount']; ?>" <?php echo ($expense_items['discounts_mode'] == $value['discount']) ? " selected " : ""; ?>><?php echo $value['discount']; ?></option>
                                <?php } ?>                                           
                            </select>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
                </form>          



            </div>              
        </div>
    </div>
</div>   
