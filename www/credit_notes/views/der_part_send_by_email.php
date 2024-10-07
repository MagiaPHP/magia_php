
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">        
            <?php _t("Send by email"); ?>
        </h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <td>
                    <span class="glyphicon glyphicon-send"></span>

                    <?php _t("Send by email"); ?>
                </td>

                <td>
                    <a href="index.php?c=invoices&a=export_pdf&id=<?php echo $id; ?>">
                        <span class="glyphicon glyphicon-print"></span>
                    </a>

                    <?php
                    include "modal_send_by_email.php";
                    ?>



                </td>

            </tr>

        </table>

    </div>
</div>
