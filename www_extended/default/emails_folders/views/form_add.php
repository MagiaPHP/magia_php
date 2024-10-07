<?php
# MagiaPHP 
# file date creation: 2023-08-01 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="emails_folders">
    <input type="hidden" name="a" value="ok_add">    
    <input type="hidden" name="redi" value="5">



    <?php # folder ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="folder"><?php _t("Folder"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="folder" class="form-control" id="folder" placeholder="folder" value="" >
        </div>	
    </div>
    <?php # /folder ?>







    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
