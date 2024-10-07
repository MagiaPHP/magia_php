<?php
/*
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon('top', 'credit_notes'); ?>
  <?php _t("Credit notes"); ?>
  </a>

  <a href="index.php?c=shop&a=credit_notes" class="list-group-item">
  <span class="glyphicon glyphicon-list"></span>
  <?php _t("List"); ?>
  </a>
  </div> */
?>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "credit_notes"); ?>
        <?php echo _t("Credit notes  by status"); ?>
    </a>

    <a href="index.php?c=shop&a=credit_notes" class="list-group-item">
        <?php _t("All"); ?>
    </a>



    <?php foreach (credit_notes_status_list() as $status) { ?>
        <a href="index.php?c=shop&a=credit_notes&w=byStatus&status=<?php echo $status['code'] ?>" class="list-group-item"><?php _t($status['status']); ?> 
            <?php
            $total = shop_credit_notes_total_by_status($status['code']);
            echo ($total) ? '<span class="badge">' . $total . '</span>' : "";
            ?>
        </a>
    <?php } ?>

</div>





