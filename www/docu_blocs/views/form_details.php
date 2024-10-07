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
# Fecha de creacion del documento: 2024-09-22 18:09:53 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="docu_blocs">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $docu_blocs->getId(); ?>">
        <?php # docu_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="docu_id"><?php _t("Docu id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="docu_id" class="form-control" id="docu_id" placeholder="docu_id"   required=""  value="<?php echo $docu_blocs->getDocu_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /docu_id ?>

    <?php # bloc ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="bloc"><?php _t("Bloc"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="bloc" class="form-control" id="bloc" placeholder="bloc"  value="<?php echo $docu_blocs->getBloc(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /bloc ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="title" class="form-control" id="title" placeholder="title"  value="<?php echo $docu_blocs->getTitle(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # post ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="post"><?php _t("Post"); ?></label>
        <div class="col-sm-8">
            <textarea name="post" class="form-control" id="post" placeholder="post - textarea"  disabled="" ><?php echo $docu_blocs->getPost(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . post . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /post ?>

    <?php # h ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="h"><?php _t("H"); ?></label>
        <div class="col-sm-8">
            <select name="h" class="form-control" id="h"  disabled="" >                
                <option value="1" <?php echo ($docu_blocs->getH() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($docu_blocs->getH() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /h ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $docu_blocs->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($docu_blocs->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($docu_blocs->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>

        </div>      							
    </div>      							

</form>

