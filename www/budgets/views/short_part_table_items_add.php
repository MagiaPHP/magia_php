
<tr>
    <td>1</td>
    <td>12</td>
    <td>123</td>
    <td>1234</td>
    <td>12345</td>
    <td>123456</td>
    <td>1234567</td>
</tr>




<form action="index.php" method="post">                                                                                              
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="linesAddOk"> 
    <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="status" value="1"> 
    <input type="hidden" name="order_by" value="1"> 
    <input type="hidden" name="redi" value="1"> 


    <tr>
        <td colspan="2">

            <div class="form-group">
                <label for="quantity"><?php _t("Description"); ?></label>
                <textarea 
                    class="form-control" 
                    name='description' 
                    id="description"
                    placeholder="<?php _t("Description"); ?> (Max: <?php echo _options_option("config_budgets_description_maxlength"); ?> <?php _t("characters"); ?>)" 
                    autofocus=""
                    value="" 
                    required=""
                    rows='2'
                    <?php
                    // limita los caracteres a x cuando esta activado audio 
                    // config/controllers/invoices_description_maxlength.php
                    if (modules_field_module('status', 'audio')) {
                        ?>
                        maxlength="<?php echo _options_option("config_budgets_description_maxlength"); ?>"
                    <?php } ?>            
                    ></textarea>

                <div class="checkbox">
                    <label>
                        <input type="checkbox"> <?php _t("Add to products"); ?>
                    </label>
                </div>


            </div>
        </td>


        <td>

            <div class="form-group">
                <label for="quantity"><?php _t("Quantity"); ?></label>
                <input 
                    type="number"
                    min="1"
                    name="quantity" 
                    class="form-control" 
                    placeholder="<?php _t("Quantity"); ?>"
                    size="25"
                    value="1"
                    > 
            </div>
        </td>

        <td>
            <div class="form-group">
                <label for="um"><?php _t("Um"); ?></label>
                <select class="form-control" name="um">
                    <option value="1">M. Metre</option>
                    <option value="1">M2. Metre carre</option>
                    <option value="1">M3. Metre cube</option>
                    <option value="1">FF. Forfait</option>
                </select>
            </div>

        </td>
        <td>
            <div class="form-group">
                <label for="price"><?php _t("Price"); ?></label>


                <input  
                    type="number" 
                    name="price" 
                    required=""
                    min="0" 
                    value="" 
                    step=.01
                    class="form-control" 
                    placeholder="<?php _t("Price"); ?>">
            </div>

        </td>


        <td>


            <div class="form-group">
                <label for="tax"><?php _t("Tax"); ?></label>

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
        </td>


        <?php
        /**
         *             <td>

          <label for="discounts"><?php _t("Discounts"); ?></label>
          <div class="row form-group">
          <div class="col-xs-6">
          <input
          type="number"
          name="discounts"
          id="discounts"
          class="form-control"
          min="0"
          max=""
          placeholder="<?php _t("Discount"); ?>"
          value="<?php echo contacts_field_id('discounts', budgets_field_id("client_id", $id)) ?>"
          >
          </div>


          <div class="col-xs-6">
          <select class="form-control" name="discounts_mode">
          <?php foreach (discounts_mode_list() as $key => $value) { ?>
          <option value="<?php echo $value['discount']; ?>"><?php echo $value['discount']; ?></option>
          <?php } ?>
          </select>
          </div>
          </div>



          </td>
         */
        ?>

        <td>
            <br>
            <button type="submit" class="btn btn-danger " >
                <span class="glyphicon glyphicon-plus"></span> 
                <?php _t("Add"); ?>
            </button>
        </td>
    </tr>




    <?php
    if (contacts_field_id('discounts', budgets_field_id("client_id", $id))) {
        message('info', "This customer has a registered default discount");
    }
    ?>
</form>



