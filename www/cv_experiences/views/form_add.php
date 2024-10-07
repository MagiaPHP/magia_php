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
# Fecha de creacion del documento: 2024-09-18 06:09:31 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="cv_experiences">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start cv_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="cv_id"><?php _t(ucfirst("cv_id")); ?> </label>
        <div class="col-sm-8">               <select name="cv_id" class="form-control selectpicker" id="cv_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                cv_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end cv_id -->

    <!-- mg_start role -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="role"><?php _t(ucfirst("role")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="role" class="form-control" id="role" placeholder="role"  value="" >
</div>
    </div>
    <!-- mg_end role -->

    <!-- mg_start company -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="company"><?php _t(ucfirst("company")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="company" class="form-control" id="company" placeholder="company"  value="" >
</div>
    </div>
    <!-- mg_end company -->

    <!-- mg_start employment_type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="employment_type"><?php _t(ucfirst("employment_type")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="employment_type" class="form-control" id="employment_type" placeholder="employment_type"  value="" >
</div>
    </div>
    <!-- mg_end employment_type -->

    <!-- mg_start start_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_date"><?php _t(ucfirst("start_date")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="start_date" class="form-control" id="start_date" placeholder="start_date"  value="" >
</div>
    </div>
    <!-- mg_end start_date -->

    <!-- mg_start end_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="end_date"><?php _t(ucfirst("end_date")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="end_date" class="form-control" id="end_date" placeholder="end_date"  value="" >
</div>
    </div>
    <!-- mg_end end_date -->

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
