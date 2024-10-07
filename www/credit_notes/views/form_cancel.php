<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="ok_cancel">
    <input type="hidden" name="id" value="<?php echo $cn->getId(); ?>">

    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-12">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Yes"); ?>">
        </div>      							
    </div>      							

</form>
