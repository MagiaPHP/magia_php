<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="pettycash">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $pcash->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total" value="<?php echo $pcash->getTotal(); ?>" >
        </div>	
    </div>
    <?php # /total ?>



    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ><?php echo $pcash->getDescription(); ?></textarea>    


        </div>	
    </div>
    <?php # /description ?>



    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date" value="<?php echo $pcash->getDate(); ?>" >
        </div>	
    </div>
    <?php # /date ?>





    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("save"); ?> <?php _t("Save"); ?></button>
        </div>      							
    </div>      							

</form>

