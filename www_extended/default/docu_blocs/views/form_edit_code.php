<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="docu">
    <input type="hidden" name="a" value="ok_edit_code">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $redi; ?>">

    <?php # title ?>
    <div class="form-group">
        <label class="col-sm-1 col-md-1" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <input type="text" name="title" class="form-control" id="title" placeholder="title" value="<?php echo $docu->getTitle(); ?>" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # post ?>


    <div class="form-group">
        <label class="col-sm-1 col-md-1" for="post"><?php _t("Post"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <textarea 
                name="post" 
                class="form-control" 
                id="post" 
                placeholder="" 
                rows="20"
                ><?php echo $docu->getPost(); ?></textarea>

        </div>	
    </div>




    <?php # /post ?>



    <div class="form-group">
        <label class="col-sm-1 col-md-1" for=""></label>
        <div class="col-sm-8 col-md-12 col-md-12">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

