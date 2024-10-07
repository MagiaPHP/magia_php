<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Photos"); ?></div>
    <div class="panel-body">        
        <h2><?php _t("Fotos"); ?></h2>
        <?php
        // muestra las fotos del articulo        
        foreach (contacts_photos($id) as $value) {
            //echo '<img src="www/gallery/img/articles/'.$value['photo'].'" alt=""/>';                 
            //echo '<img src="www/gallery/img/contacts/'.$value['photo'].'" alt=""/ class=\"img-thumbnail\">';                
            echo ' <div class="row">
                <div class="col-xs-3 col-md-3">
                  <a href="#" class="thumbnail">
                    <img src="www/gallery/img/contacts/' . $value['photo'] . '" alt=""/ class=\"img-thumbnail\">
                  </a>
                </div>
                Picture
              </div>';
        }
        ?>       
        <form id="subirImg" name="subirImg" enctype="multipart/form-data" method="post" action="index.php">
            <input type="hidden" name="c" value="contacts">
            <input type="hidden" name="a" value="photo_add">
            <input type="hidden" name="id" id="id"  value="<?php echo "$id"; ?>">            
            <label for="imagen">Subir imagen:</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
            <input type="file" name="imagen" id="imagen" />
            <input type="submit" name="subirBtn" id="subirBtn" value="<?php _t("Update Image"); ?>" />
        </form>        
    </div>
</div>
