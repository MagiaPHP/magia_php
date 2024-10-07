<?php
# MagiaPHP 
# file date creation: 2024-01-23 
?>

<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">       
        <?php include view("forms", "izq_edit"); ?>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">
        <?php
        /**
         *         <h1>
          <?php // _menu_icon("top", 'forms'); ?>
          <?php // _t("Form edit"); ?>
          </h1>
         */
        ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>            
        <?php //include view("forms", "forms_edit"); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php // echo vardump($forms->getName()); ?>
                <?php _t('Form'); ?>: <?php echo $form_edit->getName(); ?>
            </div>
            <div class="panel-body">               
                <?php include view("forms", "edit_details"); ?>
            </div>
        </div>
        <br><br>
        [forms=20]
        <br><br>
        <br><br>
        <br><br>
        <br><br>
        <br><br>
        <br><br>
        <hr>




    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">999
        <?php include view("forms", "der_edit"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
