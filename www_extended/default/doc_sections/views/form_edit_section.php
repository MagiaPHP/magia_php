<form class="form-inline" action="index.php" method="post" >
    <input type="hidden" name="c" value="doc_sections">
    <input type="hidden" name="a" value="ok_edit_section">
    <input type="hidden" name="id" value="<?php echo $doc_sections->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="2">


    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label sr-only" for="section"><?php _t("Section"); ?></label>
        <input 
            type="text" 
            name="section" 
            class="form-control" 
            id="section" 
            placeholder="section" 
            value="<?php echo $doc_sections->getSection(); ?>" >
    </div>
    <?php # /order_by ?>

    <div class="form-group">                
        <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
    </div>      							

</form>

