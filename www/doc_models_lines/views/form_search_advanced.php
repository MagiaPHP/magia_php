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
# Fecha de creacion del documento: 2024-09-04 08:09:01 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="doc_models_lines">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # modele ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="modele"><?php _t("Modele"); ?></label>
        <div class="col-sm-8">
               <select name="modele" class="form-control selectpicker" id="modele" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                doc_models_select("name", array("name"), $doc_models_lines->getModele() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /modele ?>

    <?php # doc ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="doc"><?php _t("Doc"); ?></label>
        <div class="col-sm-8">
               <select name="doc" class="form-control selectpicker" id="doc" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                doc_docs_select("doc", array("doc"), $doc_models_lines->getDoc() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /doc ?>

    <?php # section ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="section"><?php _t("Section"); ?></label>
        <div class="col-sm-8">
               <select name="section" class="form-control selectpicker" id="section" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                doc_sections_select("section", array("section"), $doc_models_lines->getSection() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /section ?>

    <?php # element ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="element"><?php _t("Element"); ?></label>
        <div class="col-sm-8">
               <select name="element" class="form-control selectpicker" id="element" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                doc_elements_select("element", array("element"), $doc_models_lines->getElement() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /element ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name"  required=""  value="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # params ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="params"><?php _t("Params"); ?></label>
        <div class="col-sm-8">
            <textarea name="params" class="form-control" id="params" placeholder="params - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . params . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /params ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
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
