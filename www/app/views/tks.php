<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php // include view("app", "izq"); ?>
    </div>
    <div class="col-sm-8 col-md-8 col-lg-8">

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php /*
          <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 text-right">

          <?php foreach (_languages_list_by_status(1) as $key => $lang) { ?>
          <a href="index.php#"><?php echo _t($lang['name']); ?></a> -
          <?php } ?>
          </div>
          </div>
         * 
         */ ?>


        <div class="panel panel-default">
            <div class="panel-body">
                <h1><?php _t('Thank you'); ?></h1> 
            </div>
        </div>


        <p>
            <?php _t("The budget has been accepted"); ?>
        </p>





    </div>


    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php // include view("app", "der"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>

