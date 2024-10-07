<br>
<br>
<br>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="add_multi">
    <input type="hidden" name="next" value="1">

    <div class="form-group">
        <label class="control-label col-sm-3" for="date_expiration"><?php _t("Date expiration"); ?></label>
        <div class="col-sm-4">
            <input
                type="date" name="date_expiration" class="form-control" id="date_expiration" placeholder=""
                value="<?php echo date('Y-m-d'); ?>"
                >                        
        </div>
        <div class="col-sm-4">
            <input
                type="number" name="total" step="any"
                class="form-control" id="total" placeholder="<?php _t('Total'); ?>"
                value=""
                >                        
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for="intervalo"><?php _t("Intervals"); ?></label>
        <div class="col-sm-4">

            <select class="form-control" name="intervalo">
                <?php
                for ($i = 1; $i <= 30; $i++) {

                    $selected = ($i == 1) ? ' selected ' : '';
                    echo '<option value="' . $i . '" ' . $selected . '>' . $i . '  ';
                    //echo ($i == 1) ? _tr("Day") : _tr("Days");
                    echo '</option>';
                }
                ?>
            </select>

        </div>
        <div class="col-sm-4">
            <select class="form-control" name="intervalo_date">
                <option value='month'><?php _t("Month"); ?></option>
                <option value='days'><?php _t("Days"); ?></option>
            </select>                   
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for="repetir"><?php _t('Maximum'); ?></label>
        <div class="col-sm-8">
            <select class="form-control" name="max">
                <?php
                for ($i = 2; $i <= 30; $i++) {

                    $selected = ($i == 12) ? ' selected ' : '';

                    echo '<option value="' . $i . '" ' . $selected . '>' . $i . '   ';

                    echo ($i == 1) ? _tr("Invoice") : _tr("Invoices");

                    echo '</option>';
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for="title"></label>
        <div class="col-sm-8">
            <input type="text"  name="title" class="form-control" id="title" placeholder="<?php _t("Title"); ?>"
                   value="Factura"
                   >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-default" type ="submit" value ="<?php _t("Next"); ?>">
        </div>      							
    </div>      							

</form>

