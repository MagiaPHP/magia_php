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
# Fecha de creacion del documento: 2024-09-04 08:09:09 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="doc_tags">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $doc_tags->getId(); ?>">
        <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Doc tags"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="controller" class="form-control" id="controller" placeholder="controller"  required=""  value="<?php echo $doc_tags->getController(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /controller ?>

    <?php # tag ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="tag"><?php _t("Doc tags"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="tag" class="form-control" id="tag" placeholder="tag"  required=""  value="<?php echo $doc_tags->getTag(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /tag ?>

    <?php # replace_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="replace_by"><?php _t("Doc tags"); ?></label>
        <div class="col-sm-8">
            <textarea name="replace_by" class="form-control" id="replace_by" placeholder="replace_by - textarea"  disabled="" ><?php echo $doc_tags->getReplace_by(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . replace_by . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /replace_by ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Doc tags"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea"  disabled="" ><?php echo $doc_tags->getDescription(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Doc tags"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $doc_tags->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Doc tags"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($doc_tags->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($doc_tags->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

