<h3 class="text-center">
    <?php _menu_icon("top", 'expenses'); ?>
    <?php _t("Expense Number"); ?>: <a href="index.php?c=expenses&a=details&id=<?php echo $expense->getId(); ?>"><?php echo $expense->getId(); ?></a>
</h3>

<table class="table table-striped">
    <tr>
        <td class="text-right"><b><?php _t("Client"); ?></b></td>
        <td>

            <a href="index.php?c=contacts&a=details&id=<?php echo $expense->getProvider_id(); ?>">
                <?php echo contacts_formated($expense->getProvider_id()); ?>
            </a>
        </td>

    </tr>

    <tr>
        <td class="text-right"><b><?php _t("Client invoice number"); ?></b></td>
        <td><?php echo ($expense->getInvoice_number()); ?></b></td>

    </tr>

    <tr>
        <td class="text-right"><b><?php _t("Office"); ?></b></td>
        <td>
            <a href="index.php?c=contacts&a=details&id=<?php echo $expense->getOffice_id(); ?>">
                <?php echo contacts_formated($expense->getOffice_id()); ?>
            </a>
        </td>
    </tr>

    <tr>
        <td class="text-right"><b><?php _t("My Ref."); ?></b></td>
        <td><?php echo ($expense->getMy_ref()); ?></b></td>
    </tr>


    <tr>
        <td class="text-right"><b><?php _t("Invoice date"); ?></b></td>
        <td><?php echo magia_dates_formated($expense->getDate()); ?></b></td>
    </tr>


    <tr>
        <td class="text-right"><b><?php _t("Date deadline"); ?></b></td>
        <td><?php echo $expense->getDeadline(); ?></b></td>
    </tr>



    <tr>
        <td class="text-right"><b><?php _t("ce"); ?></b></td>
        <td><?php echo $expense->getCe(); ?></b></td>
    </tr>


    <tr>
        <td class="text-right"><b><?php _t("Total"); ?> </b></td>
        <td  class="text-right"><?php echo moneda($expense->getTotal()); ?></td>
    </tr>


    <tr>
        <td class="text-right"><b><?php _t('Tva'); ?></b></td>
        <td  class="text-right"><?php echo moneda($expense->getTax()); ?></td>
    </tr>

    <tr>
        <td class="text-right"><b><?php _t("Total tvac"); ?></b></td>
        <td  class="text-right"><?php echo moneda($expense->getTotal() + $expense->getTax()); ?></td>
    </tr>


    <tr>
        <td class="text-right"><b><?php _t("Advance"); ?></b></td>
        <td  class="text-right"><?php echo moneda($expense->getAdvance()); ?></td>
    </tr>


    <?php
    /**
     * 
      <tr>
      <td>
      <b>
      <?php
      $advance = ($expense->getAdvance() < 0 ) ? abs($expense->getAdvance()) : 0;
      echo moneda((( $expense->getTotal() + $expense->getTax() ) - $advance));
      ?>
      </b>
      </td>


      </tr>
     */
    ?>



</table>

<p class="text-right">
    <a href="index.php?c=expenses&a=details&id=<?php echo $expense->getid(); ?>"><?php _t("More details of this document"); ?></a>
</p>