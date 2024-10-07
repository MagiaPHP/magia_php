<?php
/*
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon('top', 'invoices'); ?>
  <?php _t("Invoices"); ?>
  </a>

  <a href="index.php?c=shop&a=invoices" class="list-group-item">
  <span class="glyphicon glyphicon-list"></span>
  <?php _t("List"); ?>
  </a>
  </div> */
?>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "invoices"); ?>
        <?php echo _t("Invoices by status"); ?>
    </a>

    <a href="index.php?c=shop&a=invoices" class="list-group-item">
        <?php _t("All"); ?>
    </a>


    <?php foreach (invoice_status_list_e() as $status) { ?>
        <a href="index.php?c=shop&a=invoices&w=byStatus&status=<?php echo $status['code'] ?>" class="list-group-item"><?php _t($status['status']); ?> 
            <?php
            $total = shop_invoices_total_by_status($status['code']);
            echo ($total) ? '<span class="badge">' . $total . '</span>' : "";
            ?>
        </a>
    <?php } ?>

</div>





