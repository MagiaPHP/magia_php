<?php
# MagiaPHP 
# file date creation: 2024-04-17 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="banks_lines_tmp">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="account_number" value="4587445544">
    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="banks_lines">
    <input type="hidden" name="redi[a]" value="import_check">
    <input type="hidden" name="redi[params]" value="file=produ-1.csv&account_number=4587445544">

    <?php # template ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="template"><?php _t("Template"); ?></label>
        <div class="col-sm-8">
            <select name="template" class="form-control selectpicker" id="template" data-live-search="true" >
                <?php banks_templates_select("template", "template", "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /template ?>




    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
