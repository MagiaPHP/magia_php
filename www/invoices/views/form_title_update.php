<?php
$id = $params['id'];
?>


<form action="index.php" method="post" class="form-horizontal">
    <input type="hidden" name="c" value="invoices"> 
    <input type="hidden" name="a" value="ok_title_update"> 
    <input type="hidden" name="invoice_id" value="<?php echo "$id"; ?>"> 



    <div class="form-group">
        <label for="comments" class="col-sm-2 control-label"><?php _t("Title"); ?></label>
        <div class="col-sm-10">
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="form-control" 
                placeholder="<?php echo $id; ?>" 
                value="<?php echo invoices_field_id("title", $id); ?>"

                >
        </div>
    </div>



    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default"><?php _t("Send"); ?></button>
        </div>
    </div>
</form>