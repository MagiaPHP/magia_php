<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <?php
    /**
      <div class="col-sm-2 col-md-2 col-lg-2">

      <div class="panel panel-primary">
      <div class="panel-heading"><?php echo _t("Orders by address"); ?></div>
      <div class="panel-body">


      <form action="index.php" method="get">

      <input type="hidden" name="c" value="contacts">
      <input type="hidden" name="a" value="orders_by_office">
      <input type="hidden" name="status" value="70">



      <div class="form-group">
      <label for="id"><?php _t("Office list"); ?></label>
      <select name="id" class="selectpicker" data-live-search="true" data-width="100%"  >
      <option value=""><?php _t("Select one"); ?></option>
      <?php
      $j = 1;
      foreach (offices_list_by_headoffice($id) as $key => $sede) {
      echo '<optgroup label="' . contacts_formated($sede['id']) . ' ' . $sede['id'] . '">';
      //  echo '<option value="'.$office['id'].'">'. contacts_formated($sede['id']) .' (headoffice)</option>';
      $i = 1;
      foreach (offices_list_by_headoffice($sede['id']) as $key => $office) {
      $selected = ($office_id == $office['id']) ? " selected " : " ";
      echo '<option value="' . $office['id'] . '" ' . $selected . '>' . contacts_formated($office['id']) . '</option>';
      $i++;
      }
      echo '</optgroup>';
      $j++;
      }
      ?>
      </select>
      </div>

      <div class="form-group">
      <label for="search"></label>
      <button type="submit" class="btn btn-default"><?php echo _t("Search"); ?></button>
      </div>

      </form>

      </div>
      </div>

      <div class="panel panel-default">
      <div class="panel-heading">
      <?php echo _menu_icon('top', 'directory'); ?>
      <?php echo contacts_formated($office_id); ?>
      </div>
      <div class="panel-body">

      <?php
      //vardump(directory_list_by_contact_id($id));

      foreach (directory_list_by_contact_id($office_id) as $directory) {

      if (strtoupper($directory['name']) == 'WEB') {

      $url = $directory['data'];

      $directory['data'] = '<a href="' . $url . '" target="_new">' . $url . '</a>';
      }
      ?>

      <b><?php echo $directory['name']; ?>:</b> <?php echo $directory['data']; ?> <br>
      <?php } ?>




      </div>
      </div>

      <div class="list-group">

      <a href="#" class="list-group-item">

      <?php echo _menu_icon('top', 'addresses'); ?>


      <?php _t("Delivery address"); ?>
      </a>



      <?php
      foreach (addresses_delivery_list_by_contact_id($office_id) as $key => $address) {


      //  vardump(orders_list_by_address_id_status($address['id'], 70));


      $active = ($address_id == $address['id'] )?" active  ":"";



      $total_orders_ready_to_send = (orders_list_by_address_id_status($address['id'], 70));

      // vardump($total_orders_ready_to_send);
      // vardump($address['id']);


      $url = "index.php?c=contacts&a=orders_by_company&id=$id&office_id=$office_id&address_id=$address[id]";


      ?>
      <a href="<?php echo $url; ?>" class="list-group-item <?php echo $active; ?>">
      <h4 class="list-group-item-heading">
      <?php echo contacts_formated($office_id); ?>

      <span class="badge"><?php echo $total_orders_ready_to_send; ?></span></h4>


      <p class="list-group-item-text">

      <?php echo $address['number']; ?>, <?php echo $address['address']; ?> <br>
      <?php echo $address['postcode']; ?> - <?php echo $address['barrio']; ?> <br>
      <?php echo $address['city']; ?> <?php echo _tr(countries_country_by_country_code($address['country'])); ?>

      <br><b> ID: <?php echo $address['id']; ?></b><br>

      </p>
      </a>
      <?php } ?>
      </div>

      <?php // include "izq.php";      ?>
      </div>

     */
    ?>

    <div class="col-sm-10 col-md-10 col-lg-10">

        <?php // include view("contacts", "nav_orders_by_company"); ?>  
        <?php include view("contacts", "nav_orders_by_company2"); ?>  

        <?php include "top_details_company.php"; ?>


        <?php
        if ($orders) {

            include 'page_table_contacts_orders.php';
        } else {
            message('info', "No items");
        }
        ?>

    </div>

</div>

<?php include view("home", "footer"); ?>  



