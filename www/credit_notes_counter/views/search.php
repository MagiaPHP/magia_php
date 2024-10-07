<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-3">
        <?php include view("credit_notes_counter", "izq"); ?>
    </div>


    <div class="col-lg-9">
        <h1><?php _t("credit_notes_counter"); ?></h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <form class="form-inline" action="index.php" method="get">
            <input type="hidden" name="c" value="credit_notes_counter"> 
            <input type="hidden" name="a" value="search"> 
            <input type="hidden" name="redi" value="1"> 

            <div class="form-group">
                <label class="sr-only" for="txt">Client</label>
                <input class="form-control" type="text" name="txt" id="txt" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
        </form>



    </div>
</div>


<?php include view("home", "footer"); ?>


