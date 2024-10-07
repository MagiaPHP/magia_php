
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Logo"); ?>
        </h3>
    </div>
    <div class="panel-body">
        <?php
        //  vardump(logo(250, 250, "thumbnail")); 

        logo('100%', null, "thumbnail");

        //vardump(logo_img()); 
        ?>

        <?php
        /**
         *         <form enctype="multipart/form-data" method="post" action="index.php">
          <input type="hidden" name="c" value="gallery">
          <input type="hidden" name="a" value="ok_add">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="redi" value="3">
          <div class="form-group">
          <p></p>
          <input type="file" id="file" name="file">
          <p class="help-block"><?php //echo _t("Only these file extensions are accepted");                    ?></p>
          </div>
          <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>
          </form>
         */
        ?>

        <p class="text-center">
            <a href="index.php?c=config&a=logo"><?php _t("Update logo"); ?></a>
        </p>
    </div>
</div>




<form method="POST" action="index.php">
    <input type="hidden" name="c" value="doc_models_lines">
    <input type="hidden" name="a" value="ok_params_update">
    <input type="hidden" name="Image[file]" value="%logo%<?php //echo logo_img();    ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="modele" value="<?php echo $modele; ?>">
    <input type="hidden" name="doc" value="<?php echo $doc; ?>">

    <input type="hidden" name="redi[c]" value="doc_models">
    <input type="hidden" name="redi[a]" value="edit_logo">


    <?php
    include "part_form_panel_image.php";
    include "part_form_panel_section.php";
    ?>
</form>


