<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="projects_status">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $projects_status->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="code" class="form-control" id="code" placeholder="code" value="<?php echo $projects_status->getCode(); ?>" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?php echo $projects_status->getName(); ?>" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # icon ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="icon"><?php _t("Icon"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="icon" class="form-control" id="icon" placeholder="icon" value="<?php echo $projects_status->getIcon(); ?>" >
        </div>	
    </div>
    <?php # /icon ?>

    <?php # color ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="color"><?php _t("Color"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="color" class="form-control" id="color" placeholder="color" value="<?php echo $projects_status->getColor(); ?>" >
        </div>	
    </div>
    <?php # /color ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $projects_status->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($projects_status->getStatus() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($projects_status->getStatus() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil"); ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>

