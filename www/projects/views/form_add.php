<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-27 11:09:56 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="projects">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1 ; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start contact_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t(ucfirst("contact_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true" >
                        
                <?php contacts_select("id", array("name", "lastname"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end contact_id -->

    <!-- mg_start name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t(ucfirst("name")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="name" class="form-control" id="name" placeholder="name"  value="" >
</div>
    </div>
    <!-- mg_end name -->

    <!-- mg_start description -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t(ucfirst("description")); ?> </label>
        <div class="col-sm-8">            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end description -->

    <!-- mg_start address -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="address"><?php _t(ucfirst("address")); ?> </label>
        <div class="col-sm-8">            <textarea name="address" class="form-control" id="address" placeholder="address - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . address . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end address -->

    <!-- mg_start date_start -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t(ucfirst("date_start")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start"  value="" >
</div>
    </div>
    <!-- mg_end date_start -->

    <!-- mg_start date_end -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t(ucfirst("date_end")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end"  value="" >
</div>
    </div>
    <!-- mg_end date_end -->

    <!-- mg_start code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t(ucfirst("code")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="code" class="form-control" id="code" placeholder="code"  required=""  value="" >
</div>
    </div>
    <!-- mg_end code -->

    <!-- mg_start order_by -->
    <!-- mg_start status -->
  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

<p>* <?php _t("Required"); ?></p>

</form>
