<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:12 
?>
<a href="#"
   data-toggle="modal" data-target="#myModal_inv_periods_index_cols_to_show"
   >
       <?php echo icon("wrench"); ?>
</a>

<div class="modal fade" id="myModal_inv_periods_index_cols_to_show" tabindex="-1" role="dialog" aria-labelledby="myModal_inv_periods_index_cols_to_showLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_inv_periods_index_cols_to_showLabel">
                    <?php _t("Cols to show"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php include "form_index_cols_to_show.php"; ?>
            </div>
        </div>
    </div>
</div>

