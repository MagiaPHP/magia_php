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
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $updates->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code"  required=""  value="<?php echo $updates->getCode(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="<?php echo $updates->getDate(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="controller" class="form-control" id="controller" placeholder="controller"  value="<?php echo $updates->getController(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /controller ?>

    <?php # version ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="version"><?php _t("Version"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="version" class="form-control" id="version" placeholder="version"  required=""  value="<?php echo $updates->getVersion(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /version ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name"  required=""  value="<?php echo $updates->getName(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea"  disabled="" ><?php echo $updates->getDescription(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # code_install ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code_install"><?php _t("Code_install"); ?></label>
        <div class="col-sm-8">
            <textarea name="code_install" class="form-control" id="code_install" placeholder="code_install - textarea"  disabled="" ><?php echo $updates->getCode_install(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . code_install . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /code_install ?>

    <?php # code_uninstall ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code_uninstall"><?php _t("Code_uninstall"); ?></label>
        <div class="col-sm-8">
            <textarea name="code_uninstall" class="form-control" id="code_uninstall" placeholder="code_uninstall - textarea"  disabled="" ><?php echo $updates->getCode_uninstall(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . code_uninstall . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /code_uninstall ?>

    <?php # code_check ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code_check"><?php _t("Code_check"); ?></label>
        <div class="col-sm-8">
            <textarea name="code_check" class="form-control" id="code_check" placeholder="code_check - textarea"  disabled="" ><?php echo $updates->getCode_check(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . code_check . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /code_check ?>

    <?php # installed ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="installed"><?php _t("Installed"); ?></label>
        <div class="col-sm-8">
            <select name="installed" class="form-control" id="installed"  disabled="" >                
                <option value="1" <?php echo ($updates->getInstalled() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($updates->getInstalled() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /installed ?>

    <?php # pass ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="pass"><?php _t("Pass"); ?></label>
        <div class="col-sm-8">
            <textarea name="pass" class="form-control" id="pass" placeholder="pass - textarea"  disabled="" ><?php echo $updates->getPass(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . pass . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /pass ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $updates->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($updates->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($updates->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

