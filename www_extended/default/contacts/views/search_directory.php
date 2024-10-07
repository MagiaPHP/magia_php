<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php include "izq_search_directory.php"; ?>
    </div>

    <div class="col-sm-9 col-md-9 col-lg-9">
        <h1><?php _t("Search in directory"); ?></h1>

        <?php
        if ($action == "edit") {
            foreach ($error as $key => $value) {
                // message("info", "$value");
            }
        }
        ?>


        <div class="row">

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="..." alt="...">
                    <div class="caption">
                        <h3><?php echo $data['company']['name']; ?></h3>
                        <p>

                        </p>
                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="..." alt="...">
                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>...</p>
                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                    </div>
                </div>
            </div>



            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="..." alt="...">
                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>...</p>
                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                    </div>
                </div>
            </div>


        </div>





    </div>
</div>

<?php include view("home", "footer"); ?>  