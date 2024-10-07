<table class="table table-striped">
    <thead>
        <tr>
            <th><?php // _t("Id"); ?></th>            
            <th><?php _t("Date"); ?></th>            
            <th><?php _t("Account"); ?></th>
            <?php /**
             * <th><?php  _t("Ref"); ?></th>
             */
            ?>
            <th><?php _t("Payment"); ?></th>
            <th><?php // _t("Cancel code");  ?></th>
        </tr>
    </thead>
    <tbody>                     
        <?php
        $i = 1;
        $total = 0;
        foreach (balance_list_by_credit_note($cn->getId()) as $key => $balance_item) {
            $total = $total + ($balance_item["sub_total"] + $balance_item["tax"]);
            ?>
            <tr>
                <td><a href="index.php?c=balance&a=details&id=<?php echo $balance_item['id']; ?>"><?php echo $balance_item['id']; ?></a></td>
                <td>                    
                    <?php echo $balance_item['date_registre']; ?>
                </td>
                <td>                    
                    <?php echo $balance_item['account_number']; ?>                                
                </td>

                <?php
                /**
                 *   <td>                    
                  <?php echo $balance_item['ref']; ?>
                  </td>

                 */
                ?>
                <td class="text-right"><?php echo monedaf($balance_item["sub_total"] + $balance_item["tax"]); ?> </td>


                <td> 
                    <?php if (!$balance_item['canceled_code']) { ?>

                        <?php #### M O D A L ###?>
                        <?php #### M O D A L ###?>
                        <?php #### M O D A L ###?>
                        <?php #### M O D A L ###?>

                        <a href="#" data-toggle="modal" data-target="#modal_payement_cancel_<?php echo $balance_item['id']; ?>"><span class="glyphicon glyphicon-trash"></span></a>


                        <div class="modal fade" id="modal_payement_cancel_<?php echo $balance_item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_payement_cancelLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                        <h4 class="modal-title" id="modal_payement_cancelLabel">
                                            <?php _t("Cancel payment"); ?> <?php echo $balance_item['id']; ?>
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php /*                                         * *
                                         *     si hay cobros
                                          anula los pagos,
                                          crea una nota de credito
                                          si ok, cambia estatus a porr cobrar la facutura
                                         */ ?>

                                        <?php
                                        include "form_payement_cancel.php";
                                        ?>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php _t("Close"); ?></button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php #### M O D A L ###?>
                        <?php #### M O D A L ###?>
                        <?php #### M O D A L ###?>




                        <?php
                    } else {
                        echo "  $balance_item[canceled_code]";
                    }
                    ?>
                </td>

            </tr>                
            <?php
            $i++;
        }
        ?>                       
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" class="text-right"><?php _t("Total"); ?></td>
            <td class="text-right"><?php echo monedaf($total); ?></td>
            <td></td>
        </tr>
    </tfoot>
</table>









