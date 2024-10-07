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
# Fecha de creacion del documento: 2024-09-21 12:09:05 
#################################################################################
?>
<tr>

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_clothes">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="hr_employee_category">
    <input type="hidden" name="redi[a]" value="details">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">
    




    <td>
        <div class="form-group">
            <label class="control-label col-sm-3" for=""></label>
            <div class="col-sm-8">    
                <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
            </div>      							
        </div>      							
    </td>
    <td></td>


</form>

<tr>