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
# Fecha de creacion del documento: 2024-09-21 12:09:52 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="hr_payroll_items">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $hr_payroll_items->getId(); ?>">
        <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code"  value="<?php echo $hr_payroll_items->getCode(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # in_out ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="in_out"><?php _t("In out"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="in_out" class="form-control" id="in_out" placeholder="in_out"  required=""  value="<?php echo $hr_payroll_items->getIn_out(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /in_out ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea"  disabled="" ><?php echo $hr_payroll_items->getDescription(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # formula ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="formula"><?php _t("Formula"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="formula" class="form-control" id="formula" placeholder="formula"  value="<?php echo $hr_payroll_items->getFormula(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /formula ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $hr_payroll_items->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($hr_payroll_items->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($hr_payroll_items->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

