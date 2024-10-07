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
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="doc_models_lines">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start modele -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="modele"><?php _t(ucfirst("modele")); ?>  * </label>
        <div class="col-sm-8">               <select name="modele" class="form-control selectpicker" id="modele" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                doc_models_select("name", array("name"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end modele -->

    <!-- mg_start doc -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="doc"><?php _t(ucfirst("doc")); ?> </label>
        <div class="col-sm-8">               <select name="doc" class="form-control selectpicker" id="doc" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                doc_docs_select("doc", array("doc"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end doc -->

    <!-- mg_start section -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="section"><?php _t(ucfirst("section")); ?> </label>
        <div class="col-sm-8">               <select name="section" class="form-control selectpicker" id="section" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                doc_sections_select("section", array("section"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end section -->

    <!-- mg_start element -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="element"><?php _t(ucfirst("element")); ?>  * </label>
        <div class="col-sm-8">               <select name="element" class="form-control selectpicker" id="element" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                doc_elements_select("element", array("element"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end element -->

    <!-- mg_start name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t(ucfirst("name")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="name" class="form-control" id="name" placeholder="name"  required=""  value="" >
</div>
    </div>
    <!-- mg_end name -->

    <!-- mg_start params -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="params"><?php _t(ucfirst("params")); ?>  * </label>
        <div class="col-sm-8">            <textarea name="params" class="form-control" id="params" placeholder="params - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . params . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end params -->

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
