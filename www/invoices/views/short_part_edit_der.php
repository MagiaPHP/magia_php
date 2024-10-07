
<ul class="nav nav-pills" role="tablist">
    <li role="presentation" class="active"><a href="#">Home <span class="badge">42</span></a></li>

    <?php
//    foreach (products_groups_list() as $key => $pgl) {
//        echo '<li role="presentation"><a href="index.php?c=invoices&a=edit&id=10&der=' . $pgl["name"] . '">' . $pgl["name"] . '</a></li>';
//    }
    ?>
</ul>

<br>
<?php
vardump($der);
include "short_table_products_add.php";
?>




<?php
/**
 * <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>

  <?php
  foreach (products_groups_list() as $key => $pgl) {
  echo '<li role="presentation"><a href="#' . $pgl["name"] . '" aria-controls="' . $pgl["name"] . '" role="tab" data-toggle="tab">' . $pgl["name"] . '</a></li>';
  }
  ?>
  </ul>
  <div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="home">..1.</div>
  <?php
  foreach (products_groups_list() as $key => $pgl) {
  echo '<div role="tabpanel" class="tab-pane" id="' . $pgl["name"] . '">' . $pgl["name"] . '</div>';
  }
  ?>
  </div>

  </div>
 */
?>

<br>

<?php
include "short_table_products_add.php";
?>







<?php # SAVE ##################    ?>
<div class="row">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "part_details_company.php"; ?>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "part_details_dates.php"; ?>
        <?php include "part_date_expiration_update.php"; ?>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "part_details_billing_address.php"; ?>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php
        if (_options_option('config_address_use_delivery')) {
            include "part_details_delivery_address.php";
        }
        ?>
    </div>
</div>

<?php
include "short_table_products_add.php";
include "short_part_items_add.php";
?>

