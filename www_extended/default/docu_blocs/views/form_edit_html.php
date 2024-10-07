<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="docu_blocs">
    <input type="hidden" name="a" value="ok_edit_html">
    <input type="hidden" name="id" value="<?php echo $docu_blocs->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="2">

    <?php # title ?>
    <div class="form-group">
        <label class="col-sm-1 col-md-1" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <input type="text" name="title" class="form-control" id="title" placeholder="title" value="<?php echo $docu_blocs->getTitle(); ?>" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # post ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

    <div class="form-group">
        <label class="col-sm-1 col-md-1" for="post"><?php _t("Post"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <textarea 
                name="post" 
                class="form-control" 
                id="post" 
                placeholder="" 
                ><?php echo $docu_blocs->getPost(); ?></textarea>

        </div>	
    </div>

    <script>
        ClassicEditor
                .create(document.querySelector('#post'))
                .catch(error => {
                    console.error(error);
                });
    </script>



    <?php # /post ?>


    <div class="form-group">
        <label class="col-sm-1 col-md-1" for=""></label>
        <div class="col-sm-8 col-md-12 col-md-12">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>

