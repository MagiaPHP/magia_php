<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-center">

        <form>
            <input type="hidden" name="c" value="invoices"> 
            <input type="hidden" name="a" value="details"> 
            <input type="hidden" name="id" value="<?php echo "$id"; ?>"> 
            <div class="form-group">
            </div>
            <?php if ($invoices['status'] == 0) { ?>
                <button type="submit" class="btn btn-danger btn-md">
                    <span class="glyphicon glyphicon-floppy-disk"></span> 
                    <?php _t("Save draf"); ?>
                </button>    
            <?php } else { ?>
                <button type="submit" class="btn btn-danger btn-md">
                    <span class="glyphicon glyphicon-floppy-disk"></span> 
                    <?php _t("Save invoice"); ?>
                </button>
            <?php } ?>
        </form>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
</div>