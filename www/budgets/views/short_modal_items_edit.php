
<button 
    type="button" 
    class="btn btn-primary btn-md" 
    data-toggle="modal" 
    data-target="#budget_items_<?php echo "$budget_items[id]"; ?>"

    >
    <span class="glyphicon glyphicon-pencil"></span> 
    <?php //_t("Edit"); 
    ?><?php //echo "$budget_items[id]";                 ?>
</button>




<div 
    class="modal fade" 
    id="budget_items_<?php echo "$budget_items[id]"; ?>" 
    tabindex="-1" 
    role="dialog" aria-labelledby="budget_items_<?php echo "$budget_items[id]"; ?>Label"

    >

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 
                    class="modal-title" 
                    id="budget_items_<?php echo "$budget_items[id]"; ?>Label"
                    >
                        <?php _t("Update butget line"); ?> 
                        <?php echo "$budget_items[id]"; ?>
                </h4>
            </div>
            <div class="modal-body">


                <form action="index.php" method="get">
                    <input type="hidden"  name="c" value="budgets">
                    <input type="hidden"  name="a" value="linesEditOk">
                    <input type="hidden"  name="id" value="<?php echo "$budget_items[id]"; ?>">


                    <?php
                    if (modules_field_module('status', 'products') && 1 == 2) {
                        ?>
                        <div class="form-group">
                            <label for="code"><?php _t("Code"); ?></label>
                            <input 
                                type="" 
                                name="code" 
                                class="form-control" 
                                id="code" 
                                placeholder="<?php echo $budget_items['code']; ?>" value="<?php echo $budget_items['code']; ?>">
                        </div>
                        <?php
                    } else {
                        ?>
                        <input type="hidden"  name="code" value="null">
                        <?php
                    }
                    ?>




                    <div class="form-group">
                        <label for="description"><?php _t("Description"); ?></label>
                        <textarea 
                            class="form-control"
                            name="description"
                            id="description"
                            placeholder="<?php echo $budget_items['description']; ?>"
                            ><?php echo $budget_items['description']; ?></textarea>

                    </div>


                    <div class="form-group">
                        <label for="quantity"><?php _t("Quantity"); ?></label>
                        <input 
                            type="number" 
                            min="1"
                            name="quantity" 
                            class="form-control" 
                            id="quantity" 
                            placeholder="<?php echo $budget_items['quantity']; ?>" value="<?php echo $budget_items['quantity']; ?>">
                    </div>



                    <div class="form-group">
                        <label for="price"><?php _t("Price"); ?></label>
                        <input 
                            type="number" 
                            name="price" 
                            min="0"
                            class="form-control" 
                            id="price" 
                            step="any"
                            placeholder="<?php echo $budget_items['price']; ?>" 
                            value="<?php echo $budget_items['price']; ?>">
                    </div>



                    <div class="form-group">
                        <label for="tax"><?php _t("Tax"); ?></label>

                        <?php
                        /*                        <select class="form-control" name="tax">
                          <?php foreach (tax_list() as $key => $tax) { ?>
                          <?php $selected = ($tax['value'] == $budget_items['tax']) ? " selected " : " "; ?>
                          <option value="<?php echo $tax['value']; ?>" <?php echo "$selected"; ?>><?php echo $tax['value']; ?>%</option>

                          <?php } ?>
                          </select>
                         */
                        ?>




                        <?php
// RC
//  vardump($orders['id']);
//  vardump($orders['company_id']);
//  vardump(country_tax_list_by_country(addresses_billing_by_contact_id($orders['company_id'])['country']));
                        $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);
                        ?>

                        <select class="form-control" name="tax">

                            <?php if ($tax_by_country) { ?>
                                <?php foreach ($tax_by_country as $tax) { ?>                                                                
                                    <?php $selected = ($tax['tax'] == $budget_items['tax']) ? " selected " : " "; ?>                                                                
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



                    <?php
                    /**
                     *                     <div class="form-group">
                      <label for="discounts"><?php _t("Discount"); ?></label>
                      </div>
                      <div class="row form-group">
                      <div class="col-xs-3">
                      <input
                      type="number"
                      name="discounts"
                      class="form-control"
                      id="discounts"
                      placeholder="<?php echo $budget_items['discounts']; ?>"
                      value="<?php echo $budget_items['discounts']; ?>">
                      </div>
                      <div class="col-xs-4">
                      <select class="form-control" name="discounts_mode">
                      <?php foreach (discounts_mode_list() as $key => $value) { ?>

                      <option
                      value="<?php echo $value['discount']; ?>"
                      <?php echo ($budget_items['discounts_mode'] == $value['discount']) ? " selected " : ""; ?>>
                      <?php echo $value['discount']; ?>
                      </option>

                      <?php } ?>
                      </select>
                      </div>
                      </div>
                     * 
                     */
                    ?>



                    <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
                </form>          



            </div>              
        </div>
    </div>
</div>   
