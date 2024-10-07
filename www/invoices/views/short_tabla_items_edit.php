<thead>
    <tr>
        <th><?php _t("#"); ?></th>
        <th><?php _t("Quantity"); ?></th>            
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("code"); ?></th> <?php } ?>                                    
        <th><?php _t("Description"); ?></th>                            
        <th class="text-right"><?php _t("Price"); ?></th>
        <th class="text-right"><?php _t("Total"); ?></th>
        <th class="text-right"><?php _t("Discounts"); ?></th>
        <th class="text-right"><?php _t("Htva"); ?></th>
        <th class="text-right"><?php _t("Tva"); ?></th>
        <th class="text-right"><?php _t("Tvac"); ?></th>                            
        <th class="text-right"><?php _t("Edit"); ?></th>
        <th class=""><?php _t("Delete"); ?></th>
    </tr>
</thead>

<tbody class="row_position">

    <?php
    // $items = invoice_lines_list_by_invoice_id($id);
    $total_subtotal = 0;
    $total_totaltax = 0;
    $total_totaltvac = 0;
    $total_totaldiscounts = 0;
    $i = 1;
    $separator = false;
    foreach (invoice_lines_list_without_transport_by_invoice_id($id) as $key => $invoice_items) {

        $total_subtotal = $total_subtotal + $invoice_items['subtotal'];
        $total_totaltax = $total_totaltax + $invoice_items['totaltax'];
        $total_totaltvac = $total_totaltvac + ($invoice_items["subtotal"] + $invoice_items["totaltax"]);
        $total_totaldiscounts = $total_totaldiscounts + ($invoice_items["totaldiscounts"]);
        $class = ( strstr($invoice_items['description'], "ORDER") ) ? "info" : ""; // en la posicion cero

        if (stripos($invoice_items['description'], "---") !== FALSE) {
            $class = " success ";
            $separator = true;
        }

        if (_options_option('config_invoices_show_tr_no_price')) {
            include "tr_part_edit.php";
        } else {
            if (intval($invoice_items['price'])) {
                include "tr_part_edit.php";
            } else {
                include "tr_part_edit_no_price.php";
            }
        }

        $i++;
        $class = "";
        $separator = false;
    }
    ?>


    <tr>
        <td></td>
        <td><?php include "modal_add_separator.php"; ?></td>
        <td colspan="9"></td>
    </tr>

    <tr>
        <td colspan="11">
            <?php
            //  if (contacts_field_id('discounts', invoices_field_id("client_id", $id))) {
            //    message('info', "This customer has a registered default discount");
            // }
            ?>
        </td>
    </tr>

<a name = "items_add"></a>

<?php
/**
 * 
  <form method="post" action="index.php">
  <input type="hidden" name="c" value="invoices">
  <input type="hidden" name="a" value="ok_linesAddIndividual">
  <input type="hidden" name="invoice_id" value="<?php echo $id; ?>">
  <input type="hidden" name="redi" value="1">

  <tr>
  <td></td>
  <td>
  <input
  type="number"
  min="1"
  name="quantity"
  id="quantity"
  class="form-control"
  placeholder="<?php _t("Quantity"); ?>"
  value="1"
  size="50" required="">
  </td>

  <td colspan="2">


  <textarea
  class="form-control"
  name="description"
  id='description'
  <?php
  // limita los caracteres a x cuando esta activado web
  // config/controllers/invoices_description_maxlength.php
  if (modules_field_module('status', 'audio')) {
  ?>
  maxlength="<?php echo _options_option("config_invoices_description_maxlength"); ?>"
  <?php } ?>

  placeholder="<?php _t("Description"); ?> (Max: <?php echo _options_option("config_invoices_description_maxlength"); ?> <?php _t("characters"); ?>)"
  rows='5'
  ></textarea>


  </td>
  <td>

  <input
  type="number"
  name="price"
  required=""
  min="0"
  value=""
  step=.01
  class="form-control"
  placeholder="<?php _t("Price"); ?>"
  value="">
  </td>
  <td>
  <?php
  $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);
  ?>

  <select class="form-control" name="tax" id="tax">
  <?php if ($tax_by_country) { ?>
  <?php foreach ($tax_by_country as $tax) { ?>

  <?php //$selected = ($tax['tax'] == $item['tva']) ? " selected " : " "; ?>

  <option
  value="<?php echo $tax['tax']; ?>"
  <?php //echo "$selected"; ?>>
  <?php echo $tax['tax']; ?>%
  </option>

  <?php } ?>
  <?php } else { ?>
  <option value="0">0%</option>
  <?php } ?>
  </select>
  </td>
  <td>
  <input
  type="number"
  name="discounts"
  id="discounts"
  class="form-control"
  min="0"
  max=""
  placeholder="<?php _t("Discount"); ?>"
  value="<?php echo contacts_field_id('discounts', invoices_field_id("client_id", $id)) ?>"
  >
  </td>
  <td>
  <select class="form-control" name="discounts_mode">
  <?php foreach (discounts_mode_list() as $key => $value) { ?>
  <option value="<?php echo $value['discount']; ?>"><?php echo $value['discount']; ?></option>
  <?php } ?>
  </select>
  </td>

  <td></td>
  <td></td>
  <td>
  <button type="submit" class="btn btn-danger">
  <span class="glyphicon glyphicon-plus"></span>
  <?php _t("Add"); ?>
  </button>
  </td>



  </tr>

  </form>



 */
?>
































<tr>
    <th><?php _t("#"); ?></th>
    <th><?php _t("Quantity"); ?></th>            
    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("code"); ?></th> <?php } ?>                                    
    <th><?php _t("Description"); ?></th>                            
    <th class="text-right"><?php _t("Price"); ?></th>
    <th class="text-right"><?php _t("Total"); ?></th>
    <th class="text-right"><?php _t("Discounts"); ?></th>
    <th class="text-right"><?php _t("Htva"); ?></th>
    <th class="text-right"><?php _t("Tva"); ?></th>
    <th class="text-right"><?php _t("Tvac"); ?></th>                            
    <th class="text-right"><?php _t("Edit"); ?></th>
    <th class=""><?php _t("Delete"); ?></th>
</tr>



<tr>
    <td></td>
    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th></th> <?php } ?>                                    
    <td></td>
    <td></td>
    <td></td>
    <td class="text-right"><?php _t("Totals"); ?></td>                                                    
    <td class="text-right"><?php echo monedaf($total_totaldiscounts); ?></td>
    <td class="text-right"><?php echo monedaf($total_subtotal); ?></td>
    <td class="text-right"><?php echo monedaf($total_totaltax); ?></td>
    <td class="text-right info"><b><?php echo monedaf($total_totaltvac); ?></b></td>
    <td></td>
    <td></td>
</tr>


