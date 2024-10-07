<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="docu">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="<?php echo (isset($redi)) ? $redi : 1; ?>">

    <?php # controllers ?>
    <div class="form-group">
        <label class="col-sm-1 col-md-1" for="controllers"><?php _t("Controllers"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <select name="controllers" class="form-control selectpicker" id="controllers" data-live-search="true" >
                <?php controllers_select("controller", "controller", $docu['controllers'], array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /controllers ?>

    <?php # father_id ?>
    <div class="form-group">
        <label class="col-sm-1 col-md-1" for="father_id"><?php _t("Father_id"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <input type="number" name="father_id" class="form-control" id="father_id" placeholder="father_id" value="<?php echo $docu['father_id']; ?>" >
        </div>	
    </div>
    <?php # /father_id ?>

    <?php # title ?>
    <div class="form-group">
        <label class="col-sm-1 col-md-1" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <input type="text" name="title" class="form-control" id="title" placeholder="title" value="<?php echo $docu['title']; ?>" >
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
                ><?php echo $docu['post']; ?></textarea>

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


    <?php # order_by ?>
    <div class="form-group">
        <label class="col-sm-1 col-md-1" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $docu['order_by']; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="col-sm-1 col-md-1" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($docu["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($docu["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="col-sm-1 col-md-1" for=""></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

