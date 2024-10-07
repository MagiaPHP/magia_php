<form action="index.php" method="post">                                                                                              
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="linesAddOk"> 
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

            maxlength="<?php echo _options_option("config_budgets_description_maxlength"); ?>"
            ></textarea>
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
            autocomplete="off"
            >  
    </div>


    <div class="form-group">
        <label for="price"><?php _t("Price"); ?></label>
        <input  
            type="number" 
            name="price" 
            required=""
            min="0" 
            value="<?php echo _options_option('config_budgets_price_value_default') ?? ''; ?>" 
            step=.01
            class="form-control" 
            placeholder="<?php _t("Price"); ?>"
            autocomplete="off"
            >
            <?php
            if (_options_option('config_budgets_price_value_default')) {
                echo '<p class="help-block">' . _tr("A default price is registered") . '</p>';
            }
            ?>





        <?php
//        modal(
//                uniqid(),
//                'Price by default',
//                $button = array("class" => "btn btn danger", "btn" => "lg", "label" => "add"),
//                $view = array("c" => "budgets", "a" => "form_price_value_default"),
//                $params = array("redi" => 1),
//                $rename = "add"
//        );
        ?>
    </div>





    <a data-toggle="collapse" href="#showTvaDiscount" aria-expanded="true" aria-controls="showTvaDiscount">
        <?php echo icon("chevron-down"); ?>
        <?php _t("more"); ?>
    </a>
    <?php
    if (!_options_option('config_budgets_edit_collapseTvaDiscount')) {
        $allways_open = " collapse ";
    } else {
        $allways_open = " false ";
    }
    ?>
    <div class="<?php echo $allways_open; ?>" id="showTvaDiscount">
        <?php
        if (!_options_option('config_budgets_edit_collapseTvaDiscount')) {
            ?>

            <a href="index.php?c=budgets&a=ok_collapseTvaDiscount&data=1&redi[redi]=3&redi[id]=<?php echo $id; ?>" class="btn">
                <?php echo icon('eye-open') ?>
                <?php _t("Allways open"); ?>
            </a>
        <?php } else {
            ?>

            <a href="index.php?c=budgets&a=ok_collapseTvaDiscount&data=0&redi[redi]=3&redi[id]=<?php echo $id; ?>" class="btn">
                <?php echo icon('eye-close')
                ?>

            </a>
        <?php }
        ?>



        <br>
        <div class="form-group">
            <label for="tax"><?php _t("Tva"); ?></label>

            <?php
            $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id(u_owner_id())['country']);
            ?>


            <select class="form-control" name="tax">
                <?php if ($tax_by_country) { ?>
                    <?php foreach ($tax_by_country as $tax) { ?>                                                                
                        <?php $selected = ($tax['tax'] == _options_option("config_budgets_vat_value_default") ) ? " selected " : " "; ?>                                                                
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


        <label for="discounts"><?php _t("Discount"); ?></label>
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
                    autocomplete="off"
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
    </div>

    <br>
    <br>


    <div class="form-group">        
        <button type="submit" class="btn btn-danger">
            <span class="glyphicon glyphicon-plus"></span> 
            <?php _t("Add"); ?>
        </button>
    </div>



</form>

<br>
<br>





<?php
//        modal(
//                uniqid(),
//                'Price by default',
//                $button = array("class" => "btn btn danger", "btn" => "lg", "label" => "Price by default"),
//                $view = array("c" => "budgets", "a" => "form_price_value_default"),
//                $params = array("arg" => 1),
//                $rename = "Price by default"
//        );
?>


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

