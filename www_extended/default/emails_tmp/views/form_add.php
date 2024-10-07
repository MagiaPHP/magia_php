<?php
# MagiaPHP 
# file date creation: 2024-01-25 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="emails_tmp">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">
    <input type="hidden" name="contact_id" value="<?php echo $u_id; ?>">

    <?php
    /**
     *     <?php # contact_id ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
      <div class="col-sm-8">
      <input type="number" name="contact_id" class="form-control" id="contact_id" placeholder="contact_id" value="" >
      </div>
      </div>
      <?php # /contact_id ?>
     */
    ?>

    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <select name="controller" class="form-control selectpicker" id="controller" data-live-search="true" >
                <?php
                // poner los que solo estan activos
                foreach (permissions_search_by_rol($u_rol) as $key => $controller) {

//                    $selected = ( user_options_search_by_user_option($u_id, 'home_page')['data'] == $controller['controller'] ) ? " selected " : "";

                    echo '<option value="' . $controller['controller'] . '">' . _tr($controller['controller']) . '</option>';
                }
                ?>

                <?php //controllers_select("controller", "controller", "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /controller ?>



    <?php # tmp ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="tmp"><?php _t("Tmp"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="tmp" class="form-control" id="tmp" placeholder="tmp" value="" >
        </div>	
    </div>
    <?php # /tmp ?>

    <?php # body ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="body"><?php _t("Body"); ?></label>
        <div class="col-sm-8">


            <script src="includes/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>

            <script>
                tinymce.init({
                    selector: 'textarea#body'
                });
            </script>



            <textarea name="body" class="form-control" id="body" placeholder="body - textarea" ></textarea>
        </div>	
    </div>
    <?php # /body ?>


    <?php
    /**
     * 
      <?php # order_by ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
      <div class="col-sm-8">
      <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
      </div>
      </div>
      <?php # /order_by ?>

      <?php # status ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
      <div class="col-sm-8">
      <select name="status" class="form-control" id="status" >
      <option value="1" <?php echo ($emails_tmp["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
      <option value="0" <?php echo ($emails_tmp["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
      </select>
      </div>
      </div>
      <?php # /status ?>


     */
    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
