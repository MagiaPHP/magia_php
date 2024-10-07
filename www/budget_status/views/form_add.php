<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="budget_status">
    <input type="hidden" name="a" value="addOk">

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <select  name="code" class="form-control" id="code">                                
                <?php _select("", "", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /code ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
