
<button 
    type="button" 
    class="btn btn-primary btn-md" 
    data-toggle="modal" 
    data-target="#credit_note_items_<?php echo "$item[id]"; ?>">

    <span class="glyphicon glyphicon-pencil"></span> 
    <?php //_t("Edit"); ?>
    <?php //echo "$item[id]"; ?>
</button>

<!-- Modal -->
<div class="modal fade" id="credit_note_items_<?php echo "$item[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="credit_note_items_<?php echo "$item[id]"; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" 
                    id="credit_note_items_<?php echo "$item[id]"; ?>Label">
                        <?php _t("Update butget line"); ?> 
                        <?php echo "$item[id]"; ?>
                </h4>
            </div>
            <div class="modal-body">


                <form action="index.php" method="post">
                    <input type="hidden"  name="c" value="credit_notes">
                    <input type="hidden"  name="a" value="linesEditOk">
                    <input type="hidden"  name="id" value="<?php echo "$item[id]"; ?>">

                    <div class="form-group">
                        <label for="quantity"><?php _t("Quantity"); ?></label>
                        <input type="text" name="quantity" class="form-control" id="quantity" placeholder="<?php echo $item['quantity']; ?>" value="<?php echo $item['quantity']; ?>">
                    </div>


                    <div class="form-group">
                        <label for="description"><?php _t("Description"); ?></label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="<?php echo $item['description']; ?>" value="<?php echo $item['description']; ?>">
                    </div>


                    <div class="form-group">
                        <label for="value"><?php _t("Price"); ?></label>
                        <input 
                            type="number" 
                            step="any"
                            name="value" 
                            class="form-control" 
                            id="value"                             
                            placeholder="<?php echo $item['value']; ?>" 
                            value="<?php echo $item['value']; ?>">
                    </div>



                    <div class="form-group">
                        <label for="tax"><?php _t("Tax"); ?></label>


                        <?php
                        $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);
                        //vardump($tax_by_country);
                        ?>
                        <select class="form-control" name="tax">


                            <?php
                            foreach ($tax_by_country as $key => $tax) {
                                ?>  


                                <?php $selected = ($tax['tax'] == $item['tax']) ? " selected " : " "; ?>                                                                
                                <option value="<?php echo $tax['tax']; ?>" <?php echo "$selected"; ?>><?php echo $tax['tax']; ?>%</option>

                            <?php } ?>
                        </select>
                    </div>





                    <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
                </form>          



            </div>              
        </div>
    </div>
</div>   
