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
# Fecha de creacion del documento: 2024-09-16 19:09:41 
#################################################################################
?>

                
<form action="index.php" method="get" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="campos">
    <input type="hidden" name="a" value="search">

    <div class="form-group">
        <input 
            autofocus=""
            type="text" 
            name="txt" 
            class="form-control" 
            placeholder=""
            required=""
            value="<?php echo (isset($txt)) ? $txt : ""; ?>"
            >
    </div>


    <div class="form-group">

        <?php
        /**
         * Si es multi tva, debo tener las oficionas 
         */
        if (IS_MULTI_VAT) {
            ?>
            <?php # owner_id  ?>
            <select class="form-control" name="owner_id" id="owner_id">
                <option value="all"><?php _t("All offices"); ?></option>
                <?php
                foreach (offices_list_by_headoffice($u_owner_id) as $key => $office) {                                                            
                    echo '<option value="' . $office['id'] . '">' . contacts_formated($office['id']) . '</option>';
                }
                ?>
            </select>
            <?php # /owner_id   ?>
        <?php }
        ?>
    </div>

    <button 
        type="submit" 
        class="btn btn-default">
        <?php echo icon("search"); ?>
        <?php _t("Search"); ?>
    </button>
</form>

