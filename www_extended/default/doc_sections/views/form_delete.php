<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="doc_sections">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">




    <div class="form-group">
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

