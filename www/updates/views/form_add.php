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
# Fecha de creacion del documento: 2024-09-23 09:09:43 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="updates">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t(ucfirst("code")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="code" class="form-control" id="code" placeholder="code"  required=""  value="" >
</div>
    </div>
    <!-- mg_end code -->

    <!-- mg_start date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t(ucfirst("date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="current_timestamp()" >
</div>
    </div>
    <!-- mg_end date -->

    <!-- mg_start controller -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t(ucfirst("controller")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="controller" class="form-control" id="controller" placeholder="controller"  value="" >
</div>
    </div>
    <!-- mg_end controller -->

    <!-- mg_start version -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="version"><?php _t(ucfirst("version")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="version" class="form-control" id="version" placeholder="version"  required=""  value="" >
</div>
    </div>
    <!-- mg_end version -->

    <!-- mg_start name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t(ucfirst("name")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="name" class="form-control" id="name" placeholder="name"  required=""  value="" >
</div>
    </div>
    <!-- mg_end name -->

    <!-- mg_start description -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t(ucfirst("description")); ?>  * </label>
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

    <!-- mg_start code_install -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code_install"><?php _t(ucfirst("code_install")); ?> </label>
        <div class="col-sm-8">            <textarea name="code_install" class="form-control" id="code_install" placeholder="code_install - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . code_install . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end code_install -->

    <!-- mg_start code_uninstall -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code_uninstall"><?php _t(ucfirst("code_uninstall")); ?> </label>
        <div class="col-sm-8">            <textarea name="code_uninstall" class="form-control" id="code_uninstall" placeholder="code_uninstall - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . code_uninstall . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end code_uninstall -->

    <!-- mg_start code_check -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code_check"><?php _t(ucfirst("code_check")); ?> </label>
        <div class="col-sm-8">            <textarea name="code_check" class="form-control" id="code_check" placeholder="code_check - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . code_check . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end code_check -->

    <!-- mg_start installed -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="installed"><?php _t(ucfirst("installed")); ?> </label>
        <div class="col-sm-8">            <select name="installed" class="form-control" id="installed" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end installed -->

    <!-- mg_start pass -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="pass"><?php _t(ucfirst("pass")); ?> </label>
        <div class="col-sm-8">            <textarea name="pass" class="form-control" id="pass" placeholder="pass - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . pass . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end pass -->

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
