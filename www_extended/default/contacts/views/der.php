
<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Actions"); ?></div>
    <div class="panel-body">

        <?php if (!orders_lines_article_id_exist($id)) { ?> 
            <form class="form-horizontal" action="index.php" method="post">

                <input type="hidden" name="c" id="c"  value="articles">			    	
                <input type="hidden" name="a" id="c"  value="delete">			    	
                <input type="hidden" name="id" id="id"  value="<?php echo $detail_article["id"] ?>">			    	


                <div class="form-group">	
                    <div class="col-sm-offset-2 col-sm-10">
                        <input class="btn btn-danger active col-sm-2" type ="submit" value ="<?php _t("Delete"); ?>">
                    </div>	
                </div>
            </form>
        <?php } else { ?>
            <form class="form-horizontal" action="" method="">

                <div class="form-group">	
                    <div class="col-sm-offset-2 col-sm-10">
                        <input class="btn btn-danger active col-sm-2" type ="submit" value ="<?php _t("Delete"); ?>" disabled="">

                    </div>	
                </div>

                <div class="form-group">	
                    <div class="col-sm-offset-2 col-sm-10">

                        <p>You can delete only if is not present in a order</p>
                    </div>	
                </div>
            </form>
        <?php } ?>

    </div>
</div>







<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Categories"); ?></div>
    <div class="panel-body">



        <form>

            <?php
            //foreach (type_article_array() as $key => $value) {
            foreach (categories_list() as $key => $value) {

                echo ' <div class="checkbox">
                <label>
                    <input type="checkbox"> ' . $value['category'] . '
                </label>
            </div>';
            }
            ?>   

            <button type="submit" class="btn btn-default">Submit</button>
        </form>



    </div>
</div>



<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Photos"); ?></div>
    <div class="panel-body">

        <?php
        include "form_cat_add2.php";
        ?>

    </div>
</div>



<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Photos"); ?></div>
    <div class="panel-body">



        <h2><?php _t("Fotos"); ?></h2>


        <?php
        // muestra las fotos del articulo

        foreach (articles_photos($id) as $value) {
            echo '<img src="www/gallery/img/articles/' . $value['photo'] . '" alt=""/>';
        }
        ?>



        <hr>


        <form id="subirImg" name="subirImg" enctype="multipart/form-data" method="post" action="index.php">

            <input type="hidden" name="c" value="articles">
            <input type="hidden" name="c" value="photo_add">
            <input type="hidden" name="id" id="id"  value="<?php echo $detail_article["id"] ?>">

            <label for="imagen">Subir imagen:</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
            <input type="file" name="imagen" id="imagen" />
            <input type="submit" name="subirBtn" id="subirBtn" value="<?php _t("Update Image"); ?>" />
        </form>




    </div>
</div>

