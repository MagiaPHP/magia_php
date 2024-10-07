<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo _t("Code"); ?></th>
            <th><?php echo _t("Description"); ?></th>
            <th><?php echo _t("Qty"); ?></th>
            <th><?php echo _t("U."); ?></th>
            <th><?php echo _t("Price"); ?></th>
            <th><?php echo _t("SubTotal"); ?></th>
            <th class="text-right"><?php echo _t("Discounts"); ?></th>
            <th class="text-right"><?php echo _t("Total htva"); ?></th>                    
            <th class="text-right"><?php echo _t("Tva"); ?></th>                                        
            <th class="text-right"><?php echo _t("Total tvac"); ?></th>                                        
            <th><?php echo _t("Category"); ?></th>                                        
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>

    <?php
    /**
     * 
      <form class="form-inline" method="post" action="index.php">
      <input type="hidden" name="c" value="expenses">
      <input type="hidden" name="a" value="ok_add_total_tva">
      <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
      <input type="hidden" name="redi[redi]" value="2">


      <tr>
      <td></td>
      <td colspan="9" class="text-right"><b><?php _t('Subtotal'); ?></b></td>
      <td class="text-right">
      <input
      type="number"
      min="0"
      step="any"
      class="form-control"
      id="total"
      name="total"
      placeholder="<?php _t('Total'); ?>"
      value="<?php echo $expense->getTotal(); ?>"
      >
      </td>
      <td></td>
      </tr>


      <tr>
      <td></td>
      <td colspan="9" class="text-right"><b><?php _t('Total tax'); ?></b></td>
      <td class="text-right">

      <input
      type="number"
      min="0"
      step="any"
      class="form-control"
      id="tva"
      name="tva"
      placeholder="<?php _t('Tva'); ?>"
      value="<?php echo $expense->getTax(); ?>"
      >


      </td>
      <td></td>
      </tr>

      <tr>
      <td></td>
      <td colspan="9" class="text-right"><b><?php _t('Total'); ?></b></td>
      <td class="text-right"><?php echo moneda($expense->getTotal() + $expense->getTax()) ?></td>
      <td></td>
      </tr>
      <tr>
      <td></td>
      <td colspan="9" class="text-right"></td>
      <td class="text-right ">

      <button type="submit" class="btn btn-<?php echo (!$expense->getTotal()) ? "primary" : "default"; ?>">
      <?php echo icon('ok'); ?>
      <?php _t("Save"); ?>
      </button>

      </td>
      <td></td>
      </tr>


      </form>
     */
    ?>




</table>

<div class="form-group">
    <label class="sr-only" for="total"><?php _t("Total"); ?></label>

</div>

<div class="form-group">
    <label class="sr-only" for="tva"><?php _t("Tva"); ?></label>

</div>

