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
# Fecha de creacion del documento: 2024-09-04 08:09:54 
#################################################################################
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
 <?php include view("doc_elements", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("doc_elements", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php // include view("doc_elements", "top"); ?>
        <?php
        if ($doc_elements) {
            include view("doc_elements", "table_index");
        } else {
            message("info", "No items");
        }
        ?>
                
    <div class="container-fluid">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <?php
                $pagination->createHtml();
            ?>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 text-right">
            <?php
            include view($c, "form_pagination_items_limit");
            ?>
        </div>
        </div>
    </div>
</div>

<?php include view("home", "footer"); ?> 
