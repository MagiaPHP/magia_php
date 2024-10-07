<table class="table table-bordered table-striped table-condensed" >
    <thead>
        <tr>
            <th><?php _t('Sector'); ?></th>
            <th><?php _t('Price'); ?></th>
            <th><?php _t('Tickets'); ?></th>
            <th><?php _t('Total'); ?></th>
            <th><?php _t('Action'); ?></th>
        </tr>
    </thead>
    <?php
    $sub_total = 0;
    $total = 0;

    foreach (agenda_price_search_by('agenda_place_date_id', $pd["id"]) as $key => $apd) {


        $link_del = '
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#apd_delete_' . $apd["id"] . '">
  ' . _tr("Delete") . '
</button>


<div class="modal fade" id="apd_delete_' . $apd["id"] . '" tabindex="-1" role="dialog" aria-labelledby="apd_delete_Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="apd_delete_Label">' . _tr("Agenda price") . ' ' . $apd["id"] . ' </h4>
      </div>
      <div class="modal-body">
        <h2>' . _tr("Delete") . '</h2>

        <p>' . _tr("Do you really have to try?") . '</p>

      </div>
      

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="index.php?c=agenda_price&a=ok_delete&id=' . $apd["id"] . '&agenda_id=' . $id . '&redi=3" class="btn btn-danger">' . _tr("Delete") . '</a>
      </div>
      

    </div>
  </div>
</div>';

        $sub_total = $apd["price"] * $apd["tickets"];
        $total = $total + $sub_total;

        echo ' <tr>
        <td>' . $apd["sector"] . '</td>
        <td class="text-right">' . $apd["price"] . '</td>
        <td class="text-right">' . $apd["tickets"] . '</td>
        <td class="text-right">' . moneda($sub_total) . '</td>
        <td>' . $link_del . '</td>
    </tr>';
    }
    ?>   
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-right"><?php echo moneda($total); ?></td>
    </tr>


    <form action="index.php" method="post">
        <input type="hidden" name="c" value="agenda_price">
        <input type="hidden" name="a" value="ok_add">
        <input type="hidden" name="agenda_place_date_id" value="<?php echo $pd["id"]; ?>">
        <input type="hidden" name="agenda_id" value="<?php echo $id; ?>">

        <input type="hidden" name="order_by" value="1">
        <input type="hidden" name="status" value="1">
        <input type="hidden" name="redi" value="3">


        <tr>
            <td><input type="text" name="sector" class="form-control" id="sector" placeholder="General"></td>
            <td><input type="number" name="price" class="form-control" id="price" placeholder="10,50"></td>
            <td><input type="number" name="tickets" class="form-control" id="tickets" placeholder="100"></td>
            <td><button type="submit" class="btn btn-default"><?php _t("Add"); ?></button></td>
        </tr>
    </form>



</table>



