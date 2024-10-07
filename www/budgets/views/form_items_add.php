<form action="index.php" method="post">                                                                                              
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="ok_lines_add"> 
    <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="status" value="1"> 
    <input type="hidden" name="order_by" value="1"> 
    <input type="hidden" name="redi" value="1"> 

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
            rows='5'
            maxlength='<?php echo _options_option("config_budgets_description_maxlength"); ?>'
            ></textarea>
        <div id="count"></div>
    </div>



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


    <?php
    if (contacts_field_id('discounts', budgets_field_id("client_id", $id))) {
        message('info', "This customer has a registered default discount");
    }
    ?>


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




    <button type="submit" class="btn btn-danger">
        <span class="glyphicon glyphicon-plus"></span> 
        <?php _t("Add"); ?></button>
</form>

<br>
<br>

<?php
/**
 * 


  <br>
  <br>

  <tr>
  <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>
  <?php if (modules_field_module('status', 'transport')) { ?><td></td><?php } ?>
  <td colspan="9">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

  </div>
  </div>
  </td>
  <td></td>
  <td></td>
  </tr>



  <tr>
  <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>
  <?php if (modules_field_module('status', 'transport')) { ?><td></td><?php } ?>
  <td colspan="9">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">



  </div>
  </div>
  </td>
  <td></td>
  <td></td>
  </tr>




  <tr>

  <td></td>
  <td></td>
  <td></td>
  <td></td>

  <td class="text-right">
  <div class="row">
  <div class="col-xs-12">

  </div>
  </div>
  </td>
  <td>
  <div class="row">
  <div class="col-xs-12 input-group">










  </div>
  </div>
  </td>
  <td>
  <div class="row">
  <div class="col-xs-12">

  </div>
  </div>
  </td>
  <td>
  <div class="row">
  <div class="col-xs-12">
  <select class="form-control" name="discounts_mode">
  <?php foreach (discounts_mode_list() as $key => $value) { ?>
  <option value="<?php echo $value['discount']; ?>"><?php echo $value['discount']; ?></option>
  <?php } ?>
  </select>
  </div>
  </div>
  </td>


  <td>
  <div class="row">
  <div class="col-xs-12">
  <button type="submit" class="btn btn-default"><?php _t("Add"); ?></button>
  </div>
  </div>
  </td>



  </form>





  <td>
  <div class="row">
  <div class="col-xs-12">
  <?php
  if (modules_field_module('status', 'audio') || modules_field_module('status', 'transport')) {
  include "modal_products_search.php";
  }
  ?>
  </div>
  </div>
  </td>


  <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>





  <td>
  <div class="row">
  <div class="col-xs-12">

  <form action="index.php" method="post" class="form-inline">
  <input type="hidden" name="c" value="budgets">
  <input type="hidden" name="a" value="linesAddOk">
  <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>">
  <input type="hidden" name="status" value="1">
  <input type="hidden" name="quantity" value="1">
  <input type="hidden" name="description" value="---Separator">
  <input type="hidden" name="tax" value="0">
  <input type="hidden" name="discounts" value="0">
  <input type="hidden" name="discounts_mode" value="%">
  <button type="submit" class="btn btn-default"><?php _t("Add separator"); ?></button>
  </form>

  </div>
  </div>
  </td>



  </tr>

 */
?>

