<?php
# MagiaPHP 
# file date creation: 2023-09-30 
//vardump($redi); 
?>
<hr>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="docu">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">

    <?php # controllers ?>
    <div class="form-group">
        <label class=" col-sm-1 col-md-1" for="controllers"><?php _t("Controllers"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <select name="controllers" class="form-control selectpicker" id="controllers" data-live-search="true" >
                <?php controllers_select("controller", "controller", "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /controllers ?>
    <?php # controllers ?>
    <div class="form-group">
        <label class=" col-sm-1 col-md-1" for="language"><?php _t("language"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <select name="language" class="form-control selectpicker" id="language" data-live-search="true" >
                <?php
                foreach (_languages_list_by_status(1) as $key => $lang) {

                    $selected = ($lang['language'] == $u_language) ? " selected " : "";

                    echo '<option value="' . $lang['language'] . '" ' . $selected . ' >' . _tr($lang['name']) . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /controllers ?>

    <?php # father_id  ?>
    <div class="form-group">
        <label class=" col-sm-1 col-md-1" for="father_id"><?php _t("Father"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">

            <select name="father_id" class="form-control selectpicker" data-live-search="true"  id="father_id">
                <option value="null"><?php _t("Select one"); ?></option>
                <?php
                foreach (docu_list_widthout_father() as $key => $h1) {
                    echo '<option value="' . $h1['id'] . '">' . $h1['title'] . '</option>';
                    foreach (docu_list_of_children($h1['id']) as $key => $hx) {
                        echo '<option value="' . $hx['id'] . '"> >&nbsp;> ' . $hx['title'] . '</option>';
                        foreach (docu_list_of_children($hx['id']) as $key => $hx) {
                            echo '<option value="' . $hx['id'] . '"> >&nbsp;>&nbsp;> ' . $hx['title'] . '</option>';
                            foreach (docu_list_of_children($hx['id']) as $key => $hx) {
                                echo '<option value="' . $hx['id'] . '"> >&nbsp;>&nbsp;>&nbsp;> ' . $hx['title'] . '</option>';
                                foreach (docu_list_of_children($hx['id']) as $key => $hx) {
                                    echo '<option value="' . $hx['id'] . '"> >&nbsp;>&nbsp;>&nbsp;>&nbsp;> ' . $hx['title'] . '</option>';
                                    foreach (docu_list_of_children($hx['id']) as $key => $hx) {
                                        echo '<option value="' . $hx['id'] . '"> >&nbsp;>&nbsp;>&nbsp;>&nbsp;>&nbsp;> ' . $hx['title'] . '</option>';
                                    }
                                }
                            }
                        }
                    }
                }
                ?>



            </select>


        </div>	
    </div>
    <?php # /father_id  ?>

    <?php # title   ?>
    <div class="form-group">
        <label class="control-label col-sm-1 col-md-1 sr-only" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <input 
                type="text" 
                name="title" 
                class="form-control" 
                id="title" 
                placeholder="<?php _t('Title'); ?>" 
                value="" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # post   ?>
    <div class="form-group">
        <label class="sr-only control-label col-sm-1 col-md-1" for="post"><?php _t("Post"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">

            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

            <textarea 
                name="post" 
                class="form-control" 
                id="post" 
                placeholder="" rows="15" ></textarea>

            <script>
                ClassicEditor
                        .create(document.querySelector('#post'))
                        .catch(error => {
                            console.error(error);
                        });
            </script>

        </div>	
    </div>
    <?php # /post  ?>

    <?php # h   ?>
    <div class="form-group">
        <label class="sr-only control-label col-sm-1 col-md-1" for="h"><?php _t("H"); ?></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <select name="h" class="form-control" id="h" >                
                <option value="null">p</option>
                <option value="1">H1</option>
                <option value="2">H2</option>
                <option value="3">H3</option>
                <option value="4">H4</option>
                <option value="5">H5</option>
                <option value="6">H6</option>
            </select>
        </div>	
    </div>
    <?php # /h  ?>

    <?php
    /**
     * 

      <?php # order_by  ?>
      <div class="form-group">
      <label class="control-label col-sm-1 col-md-1" for="order_by"><?php _t("Order_by"); ?></label>
      <div class="col-sm-8 col-md-12 col-md-12">
      <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
      </div>
      </div>
      <?php # /order_by ?>

      <?php # status  ?>
      <div class="form-group">
      <label class="control-label col-sm-1 col-md-1" for="status"><?php _t("Status"); ?></label>
      <div class="col-sm-8 col-md-12 col-md-12">
      <select name="status" class="form-control" id="status" >
      <option value="1" <?php echo ($docu["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
      <option value="0" <?php echo ($docu["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
      </select>
      </div>
      </div>
      <?php # /status  ?>

     */
    ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8 col-md-12 col-md-12">
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
