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
# Fecha de creacion del documento: 2024-09-04 08:09:56 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="doc_models">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $doc_models->getId(); ?>">
        <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Doc models"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name"  required=""  value="<?php echo $doc_models->getName(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Doc models"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea"  disabled="" ><?php echo $doc_models->getDescription(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # params ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="params"><?php _t("Doc models"); ?></label>
        <div class="col-sm-8">
            <textarea name="params" class="form-control" id="params" placeholder="params - textarea"  disabled="" ><?php echo $doc_models->getParams(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . params . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /params ?>

    <?php # author ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="author"><?php _t("Doc models"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="author" class="form-control" id="author" placeholder="author"  value="<?php echo $doc_models->getAuthor(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /author ?>

    <?php # author_email ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="author_email"><?php _t("Doc models"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="author_email" class="form-control" id="author_email" placeholder="author_email"  required=""  value="<?php echo $doc_models->getAuthor_email(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /author_email ?>

    <?php # url ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="url"><?php _t("Doc models"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="url" class="form-control" id="url" placeholder="url"  required=""  value="<?php echo $doc_models->getUrl(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /url ?>

    <?php # version ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="version"><?php _t("Doc models"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="version" class="form-control" id="version" placeholder="version"  required=""  value="<?php echo $doc_models->getVersion(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /version ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Doc models"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $doc_models->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Doc models"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($doc_models->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($doc_models->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

