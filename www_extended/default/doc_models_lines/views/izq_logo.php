

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Logo"); ?>
        </h3>
    </div>
    <div class="panel-body">

        <?php logo(null, null, "img-responsive"); ?>

        <form enctype="multipart/form-data" method="post" action="index.php">

            <input type="hidden" name="c" value="gallery">
            <input type="hidden" name="a" value="ok_logo_add">    
            <input type="hidden" name="order_id" id="id"  value="<?php echo $id; ?>">
            <input type="hidden" name="side" value="<?php echo $side; ?>">
            <input type="hidden" name="redi" value="1">
            <input type="hidden" name="notes" value="null">
            <input type="hidden" name="redi" value="1">


            <div class="form-group">


                <p></p>

                <input type="file" id="file" name="file">

                <p class="help-block"><?php //echo _t("Only these file extensions are accepted");            ?></p>

            </div> 


            <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>
        </form>


    </div>
</div>



<?php
/**
 * 
  <div class="panel panel-default">
  <div class="panel-heading"><?php _t("Position"); ?></div>
  <div class="panel-body text-center">
  <a class="btn btn-default" href="#" role="button"><?php _t("Left"); ?></a>
  <a class="btn btn-default" href="#" role="button"><?php _t("Center"); ?></a>
  <a class="btn btn-default" href="#" role="button"><?php _t("Right"); ?></a>
  </div>
  </div>

 */
?>



<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Medidas</h3>
    </div>
    <div class="panel-body">


        <?php
//        vardump($logo);
        ?>

        <form method="POST" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_doc_models_logo_update">

            <input type="hidden" name="redi[c]" value="doc_models">
            <input type="hidden" name="redi[a]" value="edit_logo">




            <div class="form-group">
                <label for="x">X <?php _t("From left"); ?></label>
                <input type="number" class="form-control" name="x" id="x" placeholder="<?php echo $logo['x']; ?>" value="<?php echo $logo['x']; ?>">
            </div>

            <div class="form-group">
                <label for="x">Y <?php _t("From top"); ?></label>
                <input type="number" class="form-control" name="y" id="y" placeholder="<?php echo $logo['y']; ?>" value="<?php echo $logo['y']; ?>">
            </div>

            <div class="form-group">
                <label for="top">W <?php _t("With"); ?></label>
                <input type="number" class="form-control" name="w" id="w" placeholder="<?php echo $logo['w']; ?>" value="<?php echo $logo['w']; ?>">
            </div>

            <div class="form-group">
                <label for="top">H <?php _t("height"); ?></label>
                <input type="number" class="form-control" name="h" id="h" placeholder="<?php echo $logo['h']; ?>" value="<?php echo $logo['h']; ?>">
            </div>

            <div class="form-group">
                <label for="type"><?php _t("Type"); ?></label>
                <select class="form-control" name="type">
                    <option value="JPG">JPG</option>
                    <option>JPEG</option>
                    <option>PNG</option>
                    <option>GIF</option>
                </select>
            </div>

            <div class="form-group">
                <label for="top"><?php _t("Link"); ?></label>
                <input type="text" class="form-control" name="link" id="link" placeholder="<?php echo $logo['link']; ?>" value="<?php echo $logo['link']; ?>">
            </div>

            <div class="form-group">
                <label>
                    <input 
                        type="checkbox" 
                        name="hidden" 
                        value="1"
                        <?php echo ($logo['hidden'] == 1 ) ? ' checked="" ' : ""; ?>
                        > <?php _t("Hidden the logo"); ?>
                </label>
            </div>








            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
