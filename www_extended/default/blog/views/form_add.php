<?php
# MagiaPHP 
# file date creation: 2024-03-26 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="blog">
    <input type="hidden" name="a" value="ok_add">    
    <input type="hidden" name="redi[redi]" value="3">


    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3 sr-only" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-10">
            <select name="controller" class="form-control selectpicker" id="controller" data-live-search="true" required="" >
                <?php controllers_select("controller", "controller", "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /controller ?>


    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-3 sr-only" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="<?php echo _tr("Title"); ?>" value=""  required="">
        </div>	
    </div>
    <?php # /title ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3 sr-only" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-10">
            <textarea 
                name="description" 
                class="form-control" 
                id="description" 
                placeholder="" 
                rows="20"
                ></textarea>
        </div>	
    </div>



    <script>
        ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });
    </script>


    <?php # /description ?>

    <div class="form-group">
        <label class="control-label col-sm-3 sr-only"  for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
