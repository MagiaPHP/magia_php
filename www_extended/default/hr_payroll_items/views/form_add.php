<?php
# MagiaPHP 
# file date creation: 2024-07-11 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_payroll_items">
    <input type="hidden" name="a" value="ok_add">

    <input type="hidden" name="redi[redi]" value="1">




    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="" >
        </div>	
    </div>
    <?php # /code ?>


    <?php # in_out ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="in_out"><?php _t("In_out"); ?></label>
        <div class="col-sm-8">

            <select name="in_out" class="form-control" id="status" >                
                <option value="in"><?php echo _t("In"); ?></option>
                <option value="out"><?php echo _t("Out"); ?></option>
            </select>

        </div>	
    </div>
    <?php # /in_out ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.description.''))
                        .catch(error => {
                            console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # formula ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="formula"><?php _t("Formula"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="formula" class="form-control" id="formula" placeholder="formula" value="" >
        </div>	
    </div>
    <?php # /formula ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
