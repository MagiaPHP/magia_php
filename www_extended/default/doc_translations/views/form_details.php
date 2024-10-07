<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="doc_translations">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="1">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$doc_translations[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # doc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Doc_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="doc_id" name="doc_id" class="form-control"  id="doc_id" placeholder="doc_id" value="<?php echo "$doc_translations[doc_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # doc_id ?>

    <?php # language ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Language"); ?></label>
        <div class="col-sm-8">                    
            <input type="language" name="language" class="form-control"  id="language" placeholder="language" value="<?php echo "$doc_translations[language]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # language ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Title"); ?></label>
        <div class="col-sm-8">                    
            <input type="title" name="title" class="form-control"  id="title" placeholder="title" value="<?php echo "$doc_translations[title]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # title ?>

    <?php # body ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Body"); ?></label>
        <div class="col-sm-8">                    
            <input type="body" name="body" class="form-control"  id="body" placeholder="body" value="<?php echo "$doc_translations[body]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # body ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$doc_translations[order_by]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$doc_translations[status]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

