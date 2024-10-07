<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-lg-9">
        <?php // include "nav.php"; ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
        ?>

        <div class="row">


            <?php
            $items = array(
                array(
                    "title" => "Base de datos",
                    "description" => "Data base list",
                    "a" => "db",
                ),
                array(
                    "title" => "Emails",
                    "description" => "Email List",
                    "a" => "emails",
                ),
            );
            foreach ($items as $key => $cp_item) {
                ?>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="..." alt="...">
                        <div class="caption">
                            <h3><?php echo $cp_item['title'] ?></h3>
                            <p><?php echo $cp_item['description'] ?></p>
                            <p>
                                <a href="index.php?c=cpanel&a=<?php echo $cp_item['a'] ?>" class="btn btn-primary" role="button">Button</a> 
                                <a href="#" class="btn btn-default" role="button">Button</a>
                            </p>
                        </div>
                    </div>
                </div>

            <?php } ?>


        </div>


        <?php
        /*
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

